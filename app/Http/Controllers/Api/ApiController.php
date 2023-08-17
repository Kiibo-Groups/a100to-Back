<?php

namespace App\Http\Controllers\Api;

use DB;
use Auth;
use Excel;
use Stripe;
use DateTime;

use Redirect;
use Validator;
use App\Models\Cart;
use App\Models\City;
use App\Models\Lang;
use App\Models\Page;
use App\Models\Rate;
use App\Models\Text;
use App\Models\User;
use App\Models\Admin;
use App\Models\Offer;
use App\Models\Order;
use App\Http\Requests;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Tables;
use App\Models\Visits;
use App\Models\Address;
use App\Models\AppUser;
use App\Models\Deposit;
use App\Models\Reserva;
use App\Models\Tickets;
use App\Models\Cashback;
use App\Models\Delivery;
use App\Models\Language;
use App\Models\Sociales;
use App\Models\CardsUser;
use App\Models\Favorites;
use App\Models\OrderItem;

use App\Models\CartCoupen;
use App\Models\OfferStore;
use App\Models\OrderAddon;
use App\Models\Order_staff;
use Illuminate\Http\Request;
use App\Models\CategoryStore;
use App\Models\Opening_times;
use App\Models\SocialesNegocios;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NodejsServer;

use App\Http\Controllers\WhatsAppCloud;
use App\Http\Controllers\OpenpayController;
use App\Models\Coleccion;
use App\Models\Coleccioninit;
use App\Models\Follow;
use App\Models\Follownegocios;

class ApiController extends Controller
{

	public function welcome()
	{
		$res = new Slider;

		return response()->json(['data' => $res->getAppData()]);
	}

	public function city()
	{
		$city = new City;

		return response()->json([
			'data' => $city->getAll(0),

		]);
	}

	public function GetNearbyCity()
	{
		$city = new City;

		return response()->json([
			'data' => $city->GetNearbyCity(0),

		]);
	}

	public function updateCity()
	{
		$res = AppUser::find($_GET['id']);
		$res->last_city = $_GET['city_id'];
		$res->save();

		return response()->json(['data' => 'done']);
	}

	public function lang()
	{
		$res = new Language;
		return response()->json(['data' => $res->getWithEng()]);
	}

	public function getDataInit()
	{
		$text    = new Text;
		$l 		 = Language::find($_GET['lid']);

		$data = [
			'text'		=> $text->getAppData($_GET['lid']),
			'app_type'	=> isset($l->id) ? $l->type : 0,
			'admin'		=> Admin::find(1),
		];

		return response()->json(['data' => $data]);
	}

	public function homepage($city_id)
	{
		$banner  = new Banner;
		$store   = new User;
		$text    = new Text;
		$offer   = new Offer;
		$cats    = new CategoryStore;
		$cat     = isset($_GET['cat']) ? $_GET['cat'] : 0;


		$data = [
			'store'		=> $store->getAppData($city_id),
			'trending'	=> $store->InTrending($city_id), //$store->getAppData($city_id,true),
			'offers'    => $offer->getAll(0),
		];

		return response()->json(['data' => $data]);
	}

	public function homepage_init($city_id)
	{
		$text    = new Text;
		$cats    = new CategoryStore;

		$social  = SocialesNegocios::get();

		$arraySocial = [];

		foreach ($social as $soc) {
			$arraySocial[] = array(
				'nombre' => $soc->NombreSocial->nombre,
			);
		}


		$data = [
			'admin'		=> Admin::where('id', 1)->get(['name', 'email', 'fb', 'insta', 'twitter', 'youtube']),
			'Categorys' => $cats->ViewOrderCats(),
			'c_sociales' =>  Sociales::get(['id', 'nombre', 'descripcion']),

		];

		return response()->json(['data' => $data]);
	}

	public function ViewAllCats()
	{
		try {
			$cats    = new CategoryStore;
			$cat     = isset($_GET['cat']) ? $_GET['cat'] : 0;
			$data = [
				'Categorys' => $cats->getSelectSubCat($cat),
			];

			return response()->json(['data' => $data]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function getStores($city_id)
	{
		$store   = new User;
		$data = [
			'store'		=> $store->getStoreOpen($city_id),
			'trending'		=> $store->getStoreOpen($city_id, true),
			'admin'		=> Admin::where('id', 1)->get(['name', 'email', 'fb', 'insta', 'twitter', 'youtube']),
		];

		return response()->json(['data' => $data]);
	}

	public function getStore($id)
	{
		try {
			$store   = new User;
			return response()->json(['data' => $store->getStore($id)]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function getStoreOpen($city_id)
	{
		$store   = new User;
		$data = [
			'store'		=> $store->getStoreOpen($city_id),
			'admin'		=> Admin::find(1),
		];

		return response()->json(['data' => $data]);
	}

	public function GetInfiniteScroll($city_id)
	{

		$store   = new User;

		$data = [
			'store'		=> $store->GetAllStores($city_id)
		];

		return response()->json(['data' => $data]);
	}

	public function getTypeDelivery($id)
	{
		$user = new User;
		return response()->json([$user->getDeliveryType($id)]);
	}

	public function search($query, $type, $city)
	{
		$user = new User;

		return response()->json(['data' => $user->getUser($query, $type, $city)]);
	}

	public function SearchCat($city_id)
	{
		try {
			$user = new User;
			return response()->json([
				'cat'	=> CategoryStore::find($_GET['cat'])->name,
				'data' 	=> $user->SearchCat($city_id)
			]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function SearchFilters($city_id)
	{
		try {
			$user = new User;
			return response()->json([
				'data' 	=> $user->SearchFilters($city_id)
			]);
		} catch (\Exception $th) {
			return response()->json([
				'data' 	=> 'error',
				'error' => $th->getMessage()
			]);
		}
	}

	public function addToCart(Request $Request)
	{
		$res = new Cart;

		return response()->json(['data' => $res->addNew($Request->all())]);
	}

	public function updateCart($id, $type)
	{
		$res = new Cart;

		return response()->json(['data' => $res->updateCart($id, $type)]);
	}

	public function cartCount($cartNo)
	{
		try {
			if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
				$order = Order::where('user_id', $_GET['user_id'])->whereIn('status', [0, 1, 1.5, 3, 4, 5])->count();
			} else {
				$order = 0;
			}

			$cart = new Cart;
			$req  = new Order;

			return response()->json([
				'data'  => Cart::where('cart_no', $cartNo)->count(),
				'order' => $order,
				'data_order' => ($order > 0) ? Order::where('user_id', $_GET['user_id'])->whereIn('status', [0, 1, 1.5, 3, 4, 5])->first()->external_id : '',
				'list_orders' => ($order > 0) ? $req->getListOrder($_GET['user_id']) : [],
				'cart'	=> $cart->getItemQty($cartNo)
			]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function getCart($cartNo)
	{
		try {
			$res = new Cart;
			return response()->json(['data' => $res->getCart($cartNo)]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function deleteAll($cartNo)
	{
		$res = new Cart;

		return response()->json(['data' => $res->deleteAll($cartNo)]);
	}

	public function getOffer($cartNo)
	{
		$res = new Offer;

		return response()->json(['data' => $res->getOffer($cartNo)]);
	}

	public function applyCoupen($id, $cartNo)
	{
		$res = new CartCoupen;

		return response()->json($res->addNew($id, $cartNo));
	}

	public function signup(Request $Request)
	{
		try {
			$res = new AppUser;
			return response()->json($res->addNew($Request->all()));
		} catch (\Exception $th) {
			return response()->json(['msg' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function sendOTP(Request $Request)
	{
		$phone = $Request->phone;
		$hash  = $Request->hash;

		return response()->json(['otp' => app('App\Http\Controllers\Controller')->sendSms($phone, $hash)]);
	}

	public function SignPhone(Request $Request)
	{
		$res = new AppUser;

		return response()->json($res->SignPhone($Request->all()));
	}

	public function chkUser(Request $Request)
	{
		try {
			$res = new AppUser;
			return response()->json($res->chkUser($Request->all()));
		} catch (\Exception $th) {
			return response()->json(['msg' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function login(Request $Request)
	{
		$res = new AppUser;

		return response()->json($res->login($Request->all()));
	}

	public function Newlogin(Request $Request)
	{
		try {
			$res = new AppUser;
			return response()->json($res->Newlogin($Request->all()));
		} catch (\Exception $th) {
			return response()->json(['msg' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function forgot(Request $Request)
	{
		$res = new AppUser;
		return response()->json($res->forgot($Request->all()));
	}

	public function verify(Request $Request)
	{
		$res = new AppUser;

		return response()->json($res->verify($Request->all()));
	}

	public function updatePassword(Request $Request)
	{
		$res = new AppUser;

		return response()->json($res->updatePassword($Request->all()));
	}

	public function loginFb(Request $Request)
	{
		$res = new AppUser;

		return response()->json($res->loginFb($Request->all()));
	}



	public function getAddress($id)
	{
		$address = new Address;
		$cart 	 = new Cart;

		$data 	 = [
			'address'	 => $address->getAll($id),
			'Comercio'   => User::find($_GET['store']),
			'total'   	 => $cart->getCart($_GET['cart_no'])['total'],
			'c_charges'  => $cart->getCart($_GET['cart_no'])['c_charges']
		];

		return response()->json(['data' => $data]);
	}

	public function getAllAdress($id)
	{
		$address = new Address;

		return response()->json(['data' => $address->getAll($id)]);
	}

	public function addAddress(Request $Request)
	{
		$res = new Address;

		return response()->json($res->addNew($Request->all()));
	}

	public function removeAddress($id)
	{
		$res = new Address;
		return response()->json($res->Remove($id));
	}

	public function searchLocation(Request $Request)
	{
		$city = new City;
		return response()->json([
			'citys' => $city->getAll()
		]);
	}

	public function order(Request $Request)
	{
		try {
			$res = new Order;
			return response()->json($res->addNew($Request->all()));
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function userinfo($id)
	{
		try {
			$user = new AppUser;
			//$deposit = new Deposit;
			return response()->json([
				'data' => AppUser::where('id', $id)->get(['id', 'name', 'user_name', 'email', 'last_name', 'birthday', 'sex_type', 'phone', 'refered']),
				'cashback' => $user->getAllUser($id),
				//'deposits' => $deposit->getDeposits($id)
			]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}


	public function KardexUsuario()
	{

		try {
			$res = AppUser::get();


			$data = [];

			foreach ($res as $row) {



				$data[] = [
					'id'          => $row->id,
					'name'        => $row->name,
					'user_name'   => $row->user_name,
					'email'       => $row->email,
					'foto'        => asset($row->foto),
					'last_name'   => $row->last_name,
					'birthday'    => $row->birthday,
					'sex_type'    => $row->sex_type,
					'phone'       => $row->phone,
					'refered'     => $row->refered,


				];
			}





			return response()->json([
				'data' => $data,

			]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}


	public function ImagenUsuario(Request $request)
	{
		$input  = $request->all();

		$id = $input['id'];

		$target_path = "public/upload/perfil/";
		if (!file_exists("public/upload/perfil/")) {
			mkdir("public/upload/perfil/", 0777, true);
		}
		$filename   = time() . rand(1119, 6999) . '.' . $request->file('foto')->getClientOriginalExtension();
		// Recibimos nombre del archivo y lo asociamos a la ruta
		//$target_path = $target_path .basename($_FILES['foto']['name']);
		$target_path = $target_path . $filename;

		// Movemos el archivo blob a la ruta especificada
		if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
			echo true; // Retornamos valor
		} else {
			echo false; // Retornamos valor
		}


		$res = AppUser::find($id);
		$res->foto = $target_path;
		$res->save();

		if (!$res) {
			return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al actualizar imagen.']);
		}

		return response()->json(['code' => 200, 'data' => $res->id, 'message' => 'Se ha actualizado imagen.']);
	}




	public function signupOP(Request $Request)
	{
		try {
			$res = new AppUser;
			return response()->json(['data' => $res->signupOP($Request->all())]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}

	public function updateInfo($id, Request $Request)
	{
		$res = new AppUser;
		return response()->json($res->updateInfo($Request->all(), $id));
	}

	public function cancelOrder($id, $uid)
	{
		try {
			$res = new Order;
			return response()->json($res->cancelOrder($id, $uid));
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function rate(Request $Request)
	{
		try {
			$rate = new Rate;
			return response()->json($rate->addNew($Request->all()));
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function pages()
	{
		$res = new Page;
		return response()->json(['data' => $res->getAppData()]);
	}

	public function myOrder($id)
	{
		$res = new Order;
		$req = new Commaned;

		return response()->json([
			'data' 		=> $res->history($id),
			'events' 	=> $req->history($id)
		]);
	}

	public function stripe()
	{

		try {
			Stripe\Stripe::setApiKey(Admin::find(1)->stripe_api_id);

			$res = Stripe\Charge::create([
				"amount" => $_GET['amount'] * 100,
				"currency" => "MXN",
				"source" => $_GET['token'],
				"description" => "Pago de compra en A100To"
			]);

			if ($res['status'] === "succeeded") {
				return response()->json(['data' => "done", 'id' => $res['source']['id']]);
			} else {
				return response()->json(['data' => "error"]);
			}
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}

	public function getChat($id)
	{
		$message = new WhatsAppCloud;

		return response()->json(['data' => $message->SendMessage()]);
	}

	public function getStatus($id)
	{
		try {
			$order = Order::find($id);
			$dboy  = Delivery::find($order->d_boy);
			$store = User::find($order->store_id);

			return response()->json(['data' => $order, 'dboy' => $dboy, 'store' => $store]);
		} catch (\Throwable $th) {
			return response()->json(['data' => [], 'dboy' => [], 'store' => []]);
		}
	}

	public function getPolylines()
	{
		$url = "https://maps.googleapis.com/maps/api/directions/json?origin=" . $_GET['latOr'] . "," . $_GET['lngOr'] . "&destination=" . $_GET['latDest'] . "," . $_GET['lngDest'] . "&mode=driving&key=" . Admin::find(1)->ApiKey_google;
		$max      = 0;

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		$http_result = $info['http_code'];
		curl_close($ch);


		$request = json_decode($output, true);

		return response()->json($request);
	}

	public function sendChat(Request $Request)
	{
		$chat = new Chat;
		return response()->json($chat->addNew($Request->all()));
	}

	public function deleteOrders(Request $Request)
	{
		$items  = $Request->all()['SendChk'];

		for ($i = 0; $i < count($items); $i++) {
			Order::find($items[$i])->delete();
			Order_staff::where('order_id', $items[$i])->delete();
			OrderAddon::where('order_id', $items[$i])->delete();
			OrderItem::where('order_id', $items[$i])->delete();
		}

		return response()->json(['data' => 'done']);
	}

	/**
	 * Metodos OpenPay
	 */

	public function getClient(Request $Request)
	{
		try {
			$openPay = new OpenpayController;
			return response()->json(['data' => $openPay->getClient($Request->all())]);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}

	public function SetCardClient(Request $Request)
	{
		try {
			$openpay = new OpenpayController;
			$req     = $openpay->SetCardClient($Request->all());
			if ($req['status'] == true) {
				$user = AppUser::find($Request->get('user_id'));
				$card = new CardsUser;
				$data 	 = [
					'user_id'	 	=> $user->id,
					'token_card'   	=> $req['data']['id']
				];

				$card->addNew($data, 'add');
			}

			return response()->json(['data' => $req]);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error", 'error' => $th]);
		}
	}

	public function GetCards(Request $Request)
	{
		try {
			$openpay = new OpenpayController;
			return response()->json(['data' => $openpay->getCardsClient($Request->all())]);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}

	public function DeleteCard(Request $Request)
	{
		try {
			$openpay = new OpenpayController;

			return response()->json(['data' => $openpay->DeleteCard($Request->all())]);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}

	public function getCard(Request $Request)
	{
		try {
			$openpay = new OpenpayController;

			return response()->json(['data' => $openpay->getCard($Request->all())]);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}

	public function chargeClient(Request $Request)
	{
		try {
			$openpay = new OpenpayController;

			return response()->json(['data' => $openpay->chargeClient($Request->all())]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'msg' => $th->getMessage()]);
		}
	}

	public function addBalance(Request $Request)
	{
		try {
			$data = $Request->all();
			Deposit::create($data);

			$user = AppUser::find($data['user_id']);

			$saldo = $user->saldo;
			$user->saldo = $saldo + $data['amount'];
			$user->save();

			return response()->json(['data' => 'done']);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}


	public function setTableCustomer($id)
	{
		try {
			$res 			= Tables::where("mesa", $id)->first();
			if ($res) {
				if ($res->status == 1) { // La mesa esta tomada
					return response()->json(['data' => 'table_inuse']);
				} else {
					$res->status = 1;
					$res->save();
					return response()->json(['data' => 'done']);
				}
			} else {
				return response()->json(['data' => 'not_found_table']);
			}
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'msg' => $th->getMessage()]);
		}
	}

	/**
	 * 
	 *  Favorites Funcions
	 * 
	 */

	public function SetFavorite(Request $Request)
	{
		try {
			$req = new Favorites;

			return response()->json(['data' => $req->addNew($Request->all())]);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}

	public function GetFavorites($id)
	{
		try {
			$req = new Favorites;

			return response()->json(['data' => $req->GetFavorites($id)]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}

	public function TrashFavorite($id, $user)
	{
		try {
			$req = new Favorites;
			return response()->json(['data' => $req->TrashFavorite($id, $user)]);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error", 'error' => $th]);
		}
	}


	/**
	 * 
	 * Solcitud de repartidores cercanos
	 *
	 */

	public function getNearbyStaffs($order, $type_staff)
	{
		// Obtenemos repartidores Mas cercanos
		$delivery = new Delivery;
		return response()->json(['data' => $delivery->getNearby($order, $type_staff)]);
	}

	public function setStaffOrder($order, $dboy)
	{
		// Chequeo de pedido y registro de repartidores
		$delivery = new Delivery;
		return response()->json(['data' => $delivery->setStaffOrder($order, $dboy)]);
	}

	public function delStaffOrder($order)
	{
		// Chequeo de pedido y registro de repartidores
		$delivery = new Delivery;
		return response()->json(['data' => $delivery->delStaffEvent($order)]);
	}

	public function updateStaffDelivery($staff, $external_id)
	{
		$staff = Delivery::find($staff);

		$staff->external_id = $external_id;
		$staff->save();

		return response()->json(['data' => 'done']);
	}

	/**
	 * 
	 * Seccion de mandaditos
	 *
	 */

	public function OrderComm(Request $Request)
	{
		try {
			$res = new Commaned;
			return response()->json($res->addNew($Request->all()));
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function ViewCostShipCommanded(Request $Request)
	{
		try {

			$req = new Commaned;

			return response()->json(['data' => $req->Costs_shipKM($Request->all())]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'fail', 'error' => $th->getMessage()]);
		}
	}

	public function chkEvents_comm($id)
	{
		try {
			$req = new Commaned;
			return response()->json(['data' => $req->chkEvents_comm($id)]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}

	public function chkEvents_staffs(Request $Request)
	{
		// Reseteamos
		$event = Commaned::find($Request->get("id_order"));
		$event->status = 0;
		$event->save();

		$req = new NodejsServer;

		return response()->json(['data' => $req->NewOrderComm($Request->all()), 'req' => $Request->all()]);
	}

	public function getNearbyEvents($id)
	{
		try {
			$req = new Commaned;
			return response()->json(['data' => $req->getNearby($id)]);
		} catch (\Exception $th) {
			return response()->json(['data' => $id, 'error' => $th->getMessage()]);
		}
	}

	public function setStaffEvent($event_id, $dboy)
	{
		try {
			$req = new Commaned;
			return response()->json(['data' => $req->setStaffEvent($event_id, $dboy)]);
		} catch (\Exception $th) {
			return response()->json(['data' => $id, 'error' => $th->getMessage()]);
		}
	}

	public function delStaffEvent($event_id)
	{
		$req = new Commaned;
		return response()->json(['data' => $req->delStaffEvent($event_id)]);
	}

	public function cancelComm_event($event_id)
	{
		$req = new Commaned;
		return response()->json(['data' => $req->cancelComm_event($event_id)]);
	}

	public function rateComm_event(Request $Request)
	{
		try {
			$req = new Commaned;
			return response()->json(['data' => $req->rateComm_event($Request->all())]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function SetNewVisitStore($store_id, $user_id)
	{
		try {
			$visit = new Visits;
			return response()->json(['data' => $visit->addNew($store_id, $user_id)]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}


	/**
	 * 
	 * Categorias
	 * 
	 */
	public function getCategory($id)
	{
		try {
			$req = new CategoryStore;
			return response()->json(['data' => $req->getSelectCat($id)]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function getSelectSubCat($id)
	{
		try {
			$req = new CategoryStore;
			return response()->json(['data' => $req->getSelectSubCat($id)]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}


	// ---------------Tickets ----------------

	public function Tickets(Request $request)
	{
		//dd($request->imagen);
		try {


			$input  = $request->all();
			$imagen = $input['imagen'];
			//$imagen = $request->imagen;

			//

			$target_path = "public/assets/img/tickets/";
			if (!file_exists("public/assets/img/tickets/")) {
				mkdir("public/assets/img/tickets/", 0777, true);
			}


			// Cadena base64 de la imagen
			//$base64Image = "data:image/jpeg;base64,/9j/4AAQSk..."; // 

			//$base64Image ="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAApgAAAKYB3X3/OAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAANCSURBVEiJtZZPbBtFFMZ/M7ubXdtdb1xSFyeilBapySVU8h8OoFaooFSqiihIVIpQBKci6KEg9Q6H9kovIHoCIVQJJCKE1ENFjnAgcaSGC6rEnxBwA04Tx43t2FnvDAfjkNibxgHxnWb2e/u992bee7tCa00YFsffekFY+nUzFtjW0LrvjRXrCDIAaPLlW0nHL0SsZtVoaF98mLrx3pdhOqLtYPHChahZcYYO7KvPFxvRl5XPp1sN3adWiD1ZAqD6XYK1b/dvE5IWryTt2udLFedwc1+9kLp+vbbpoDh+6TklxBeAi9TL0taeWpdmZzQDry0AcO+jQ12RyohqqoYoo8RDwJrU+qXkjWtfi8Xxt58BdQuwQs9qC/afLwCw8tnQbqYAPsgxE1S6F3EAIXux2oQFKm0ihMsOF71dHYx+f3NND68ghCu1YIoePPQN1pGRABkJ6Bus96CutRZMydTl+TvuiRW1m3n0eDl0vRPcEysqdXn+jsQPsrHMquGeXEaY4Yk4wxWcY5V/9scqOMOVUFthatyTy8QyqwZ+kDURKoMWxNKr2EeqVKcTNOajqKoBgOE28U4tdQl5p5bwCw7BWquaZSzAPlwjlithJtp3pTImSqQRrb2Z8PHGigD4RZuNX6JYj6wj7O4TFLbCO/Mn/m8R+h6rYSUb3ekokRY6f/YukArN979jcW+V/S8g0eT/N3VN3kTqWbQ428m9/8k0P/1aIhF36PccEl6EhOcAUCrXKZXXWS3XKd2vc/TRBG9O5ELC17MmWubD2nKhUKZa26Ba2+D3P+4/MNCFwg59oWVeYhkzgN/JDR8deKBoD7Y+ljEjGZ0sosXVTvbc6RHirr2reNy1OXd6pJsQ+gqjk8VWFYmHrwBzW/n+uMPFiRwHB2I7ih8ciHFxIkd/3Omk5tCDV1t+2nNu5sxxpDFNx+huNhVT3/zMDz8usXC3ddaHBj1GHj/As08fwTS7Kt1HBTmyN29vdwAw+/wbwLVOJ3uAD1wi/dUH7Qei66PfyuRj4Ik9is+hglfbkbfR3cnZm7chlUWLdwmprtCohX4HUtlOcQjLYCu+fzGJH2QRKvP3UNz8bWk1qMxjGTOMThZ3kvgLI5AzFfo379UAAAAASUVORK5CYII="; // 


			$base64Image = $imagen; // 

			// Obtener el tipo y los datos binarios desde la cadena base64
			list($type, $data) = explode(';', $base64Image);
			list(, $data)      = explode(',', $data);

			// Decodificar los datos binarios de base64
			$filename   = time() . rand(1119, 6999) . '.png';
			$imageData = base64_decode($data);
			$rutaImagenJPG = "public/assets/img/tickets/" . $filename;

			file_put_contents($rutaImagenJPG, $imageData);


			$tickets   = Tickets::create([
				'id_cliente'   => $request->id_cliente,
				'imagen'       => $target_path . $filename,

			]);




			if (!$tickets) {
				return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al crear Tickets.']);
			}

			return response()->json(['code' => 200, 'data' => $tickets, 'message' => 'Se ha creado el Tickets.']);
		} catch (\Throwable $th) {
			return response()->json(['data' => $th]);
		}
	}

	public function TicketsHistorial($id)
	{
		$social  = Tickets::where('id_cliente', $id)->orderBy('id', 'asc')->get();

		$array = [];

		foreach ($social as $soc) {
			$array[] = array(
				'reserva' => $soc->reserva,
				'id_cliente' => $soc->id_cliente,
				'id_negocio' => $soc->id_negocio,
				'descripcion' => $soc->descripcion,
				'imagen' => asset($soc->imagen),
				'status' => $soc->status,

			);
		}

		return response()->json(['data' => $array]);
	}









	public function getCausasSociales()
	{
		$social  = Sociales::orderBy('nombre', 'asc')->get();

		$array = [];

		foreach ($social as $soc) {
			$array[] = array(
				'nombre' => $soc->nombre,
				'id' => $soc->id,

			);
		}

		return response()->json(['data' => $array]);
	}


	public function getCashback($id)
	{
		$cashback  = Cashback::where('store_id', $id)->where('status', 0)->orderBy('hora', 'asc')->get();

		$array = [];

		foreach ($cashback as $cas) {
			$array[] = array(
				'cashback' => $cas->cashback,
				'hora'    => $cas->hora,

			);
		}

		return response()->json(['data' => $array]);
	}




	// ----------------Reservas ----------------
	public function CrearReserva(Request $request)
	{
		try {

			$input         = $request->all();

			$reserva   = Reserva::create([
				'store_id'   => $request->store_id,
				'user_id'    => $request->user_id,
				'recompensa' => $request->recompensa,
				'invitados'  => $request->invitados,
				'primera'    => $request->primera,
				'fecha'      => $request->fecha,
				'hora'       => $request->hora,
				'reserva'    => $request->reserva,


			]);

			if (!$reserva) {
				return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al crear la Reserva.']);
			}

			return response()->json(['code' => 200, 'data' => $reserva, 'message' => 'Se ha creado el Reserva.']);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}

	public function CancelarReserva($id)
	{
		try {


			$res = Reserva::find($id);
			$res->status = 3;
			$res->save();

			return response()->json(['data' => 'done', 'message' => 'Se ha cancelado la Reserva.']);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}
	public function HistorialReserva($id)
	{
		try {

			$reserva  = Reserva::where('user_id', $id)->orderBy('status', 'asc')->get();

			$array = [];

			foreach ($reserva as $res) {
				$array[] = array(
					'id'          => $res->id,
					'negocio'    => $res->negocio->name,
					'store_id'    => $res->store_id,
					'user_id'     => $res->user_id,
					'invitados'   => $res->invitados,
					'recompensa'  => $res->recompensa,
					'fecha'       => $res->fecha,
					'hora'        => $res->hora,
					'status'      => $res->full_estado,

				);
			}

			return response()->json(['data' => $array]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}


	// ----------------Follow ----------------
	public function SeguirFollow(Request $request)
	{
		try {

			$input         = $request->all();

			$reserva   = Follow::create([
				'seguido_id'   => $request->seguido_id,
				'seguidor_id'  => $request->user_id,
			]);

			if (!$reserva) {
				return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al crear Follow.']);
			}

			return response()->json(['code' => 200, 'data' => $reserva, 'message' => 'Se ha creado el Follow.']);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}

	public function SeguirVerFollow($id)
	{
		try {

			$reserva  = Follow::where('seguidor_id', $id)->get();
			$cantidad = $reserva->count();
			$array = [];

			foreach ($reserva as $res) {
				$array[] = array(
					'id'       => $res->usuario->id,
					'name'     => $res->usuario->name,
					'usuario'  => $res->usuario->user_name,


				);
			}

			return response()->json(['cantidad' => $cantidad, 'data' => $array]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}

	public function SeguidoresVerFollow($id)
	{
		try {

			$reserva  = Follow::where('seguido_id', $id)->get();
			$cantidad = $reserva->count();
			$array = [];

			foreach ($reserva as $res) {
				$array[] = array(
					'id'       => $res->seguidor->id,
					'name'     => $res->seguidor->name,
					'usuario'  => $res->seguidor->user_name,


				);
			}

			return response()->json(['cantidad' => $cantidad, 'data' => $array]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}



	// ----------------Coleccion ----------------

	public function Coleccion(Request $request)
	{
		
		try {


			$input  = $request->all();
			$imagen = $input['imagen'];
			$tipo   = $input['tipo'];


			$target_path = "public/assets/img/coleccion/";

			if (!file_exists("public/assets/img/coleccion/")) {
				mkdir("public/assets/img/coleccion/", 0777, true);
			}

			if ($tipo == 1) {
				if ($request->file('imagen')) {

					$filename   = time() . rand(1119, 6999) . '.' . $request->file('imagen')->getClientOriginalExtension();
					$input['imagen']->move($target_path, $filename);
					$input['imagen'] = $filename;
				}
			} else {
				$base64Image = $imagen; // 

				// Obtener el tipo y los datos binarios desde la cadena base64
				list($type, $data) = explode(';', $base64Image);
				list(, $data)      = explode(',', $data);

				// Decodificar los datos binarios de base64
				$filename   = time() . rand(1119, 6999) . '.png';
				$imageData = base64_decode($data);
				$rutaImagenJPG = "public/assets/img/coleccion/" . $filename;

				file_put_contents($rutaImagenJPG, $imageData);
			}



			$coleccion   = Coleccioninit::create([
				'nombre'   => $request->nombre,
				'id_user'  => $request->id_user,
				'imagen'   => $target_path . $filename,

			]);


			if (!$coleccion) {
				return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al crear Coleccion.']);
			}

			return response()->json(['code' => 200, 'data' => $coleccion, 'message' => 'Se ha creado la Coleccion.']);
		} catch (\Throwable $th) {
			return response()->json(['data' => $th]);
		}
	}

	public function Colecciones($id)
	{
		try {

			$coleccion  = Coleccioninit::where('id_user', $id)->get();

			$array = [];

			foreach ($coleccion as $res) {
				$array[] = array(
					'id'        => $res->id,
					'nombre'    => $res->nombre,
					'id_user'   => $res->id_user,
					'usuario'   => $res->usuario->name,
					'imagen'    => asset($res->imagen),
				);
			}

			return response()->json(['data' => $array]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}


	public function ColeccionEliminar($id)
	{
		try {

			$res = Coleccioninit::find($id)->delete();

			return response()->json(['data' => 'done', 'message' => 'Se ha Eliminado la Coleccion.']);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}


	public function ColeccionesVer($id)
	{
		try {

			$reserva  = Coleccion::where('id_coleccion', $id)->get();

			$array = [];

			foreach ($reserva as $res) {
				$array[] = array(
					'id'           => $res->id,
					'negocio'      => $res->negocio->name,
					'store_id'     => $res->store_id,
					'user_id'      => $res->user_id,
					'usuario'      => $res->usuario->name,
					'id_coleccion' => $res->id_coleccion,
					'coleccion'    => $res->coleccion->nombre,


				);
			}

			return response()->json(['data' => $array]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}







	public function CrearColeccion(Request $request)
	{
		try {


			$coleccion   = Coleccion::create([
				'store_id'     => $request->store_id,
				'user_id'      => $request->user_id,
				'id_coleccion' => $request->id_coleccion,

			]);

			if (!$coleccion) {
				return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al crear la Coleccion.']);
			}

			return response()->json(['code' => 200, 'data' => $coleccion, 'message' => 'Se ha creado la Coleccion.']);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}

	public function CancelarColeccion($id)
	{
		try {

			$res = Coleccion::find($id)->delete();

			return response()->json(['data' => 'done', 'message' => 'Se ha cancelado la Coleccion.']);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}


	public function HistorialColeccion($id)
	{
		try {

			$reserva  = Coleccion::where('user_id', $id)->get();

			$array = [];

			foreach ($reserva as $res) {
				$array[] = array(
					'id'           => $res->id,
					'negocio'      => $res->negocio->name,
					'store_id'     => $res->store_id,
					'user_id'      => $res->user_id,
					'usuario'      => $res->usuario->name,
					'id_coleccion' => $res->id_coleccion,
					'coleccion'    => $res->coleccion->nombre,


				);
			}

			return response()->json(['data' => $array]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}




	// ----------------Follow ----------------
	public function FollowNegocio(Request $request)
	{
		try {

			$follow   = Follownegocios::create([
				'store_id'   => $request->store_id,
				'user_id'    => $request->user_id,
			]);

			if (!$follow) {
				return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al crear Follow.']);
			}

			return response()->json(['code' => 200, 'data' => $follow, 'message' => 'Se ha creado el Follow.']);
		} catch (\Throwable $th) {
			return response()->json(['data' => "error"]);
		}
	}


	public function FollowNegocioVer($id)
	{
		try {

			$follow  = Follownegocios::where('user_id', $id)->get();
			//$cantidad = $reserva->count();
			$array = [];

			foreach ($follow as $res) {
				$array[] = array(
					'id'       => $res->id,
					'name'     => $res->usuario->name,
					'user_id'  => $res->usuario->id,
					'store'  => $res->negocio->name,
					'store_id'  => $res->negocio->id,


				);
			}

			return response()->json(['code' => 200,  'data' => $array]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}


	public function FollowNegocioEliminar($id)
	{
		try {

			$res = Follownegocios::find($id)->delete();

			return response()->json(['data' => 'done', 'message' => 'Se ha Eliminado el Follow.']);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}


}

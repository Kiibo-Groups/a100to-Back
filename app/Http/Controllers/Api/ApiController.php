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
use App\Models\Order;
use App\Http\Requests;
use App\Models\Banner;
use App\Models\Follow;
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
use App\Models\Coleccion; 
use App\Models\GiftCards;

use App\Models\Favorites;
use App\Models\OrderItem;
use App\Models\CartCoupen; 
use App\Models\OrderAddon;
use App\Models\Order_staff;
use Illuminate\Http\Request;
use App\Models\CategoryStore;
use App\Models\Coleccioninit;
use App\Models\Opening_times;

use App\Models\Follownegocios;
use Illuminate\Support\Carbon;
use App\Models\SocialesNegocios;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\NodejsServer;
use App\Http\Controllers\WhatsAppCloud;
use App\Http\Controllers\OpenpayController;
use App\Models\Recompensa;
use App\Models\Reportar;
use App\Models\Bloquear;
use App\Models\ChangedRewards;

use App\Models\FeedSurvey;
use App\Models\TrendingUsers;

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
		
		$data = collect(Admin::find(1))->except(['password','shw_password','remember_token','city_id','city_notify','created_at','updated_at']);

		return response()->json(['data' => $data]);
	}

	public function homepage($city_id)
	{
		$banner  = new Banner;
		$store   = new User;
		$text    = new Text; 
		$cats    = new CategoryStore;
		$cat     = isset($_GET['cat']) ? $_GET['cat'] : 0;


		$data = [
			'store'		=> $store->getAppData($city_id),
			'trending'	=> $store->InTrending($city_id), //$store->getAppData($city_id,true),
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
			'recompensa' => $store->getStoreOpen($city_id),
			'store'		 => $store->getStoreOpen($city_id),
			'trending'	 => $store->getStoreOpen($city_id, true),
			'admin'		 => Admin::where('id', 1)->get(['name', 'email', 'fb', 'insta', 'twitter', 'youtube']),
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

	public function SocialMediaSign(Request $Request)
	{
		try {
			$res = new AppUser; 
			return response()->json($res->SocialMediaSign($Request->all()));
		} catch (\Exception $th) {
			return response()->json([
				'data' => 'error', 
				'error' => $th->getMessage()
			]);
		}
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
			$row  = AppUser::where('id', $id)->first(['id', 'name', 'user_name', 'email', 'last_name', 'birthday', 'sex_type', 'phone', 'refered', 'foto', 'saldo', 'saldo_xp', 'tickets']);
			if ($row->foto != null) {
				$foto = asset($row->foto);
			} else {
				$foto = null;
			}

			$data[] = [
				'id'          => $row->id,
				'name'        => $row->name,
				'user_name'   => $row->user_name,
				'email'       => $row->email,
				'foto'        => $foto,
				'last_name'   => $row->last_name,
				'birthday'    => $row->birthday,
				'sex_type'    => $row->sex_type,
				'phone'       => $row->phone,
				'refered'     => $row->refered,
				'saldo'       => $row->saldo,
				'saldo_xp'    => $row->saldo_xp,
				'tickets6m'   => $row->tickets, 

			];
			//$deposit = new Deposit;
			return response()->json([
				'data' => $data,
				'cashback' => $user->getAllUser($id),
				//'deposits' => $deposit->getDeposits($id)
			]);
		} catch (\Exception $th) {
			return response()->json(['data' => 'error', 'error' => $th->getMessage()]);
		}
	}
	
	public function getTrendingUsers()
	{
		try {
			$data = []; 
			$level = 'Bronce';
			$topic10 = [];
			$trendUsers = [];
			// Obtenemos todos los usuarios que sumen
			$trendingUser = TrendingUsers::where('type',0)->select('user_id')->distinct('user_id')->get();
			foreach ($trendingUser as $trend) {
				$topic = TrendingUsers::where('user_id',$trend->user_id)->sum('xp');
				$data[] = [
					'user_id' => $trend->user_id,
					'xp'      => $topic					
				];
			} 
 
			// Ordenamos de mayor a menor
			function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
				$sort_col = array();
				foreach ($arr as $key => $row) {
					$sort_col[$key] = $row[$col];
				}
			
				array_multisort($sort_col, $dir, $arr);
			}
			array_sort_by_column($data, 'xp');

			// Obtenemos los ultimos 10 mejores de la lista
			for ($i=0; $i < 10; $i++) { 
				if ($i < count($data)) {
					$topic10[] = $data[$i];
				}else {
					break;
				}
			}

			// Rellenamos con la informacion del usuario
			foreach ($topic10 as $key => $value) {

				$row = AppUser::find($value['user_id']);

				// Obtenemos el nivel
				if ($value['xp'] >= 50) {
					$level = 'Bronce';
				}
				if ($value['xp'] >= 400) {
					$level = 'Plata';
				}
				if ($value['xp'] >= 1000) {
					$level = 'Oro';
				}
				if ($value['xp'] >= 2500) {
					$level = 'Diamante';
				}

				$trendUsers[] = [
					'id'          => $row->id,
					'name'        => $row->name,
					'user_name'   => $row->user_name,
					'email'       => $row->email, 
					'last_name'   => $row->last_name,
					'foto'		  => ($row->foto != null) ? asset($row->foto) : null,
					'birthday'    => $row->birthday,
					'sex_type'    => $row->sex_type,
					'phone'       => $row->phone, 
					'saldo'       => $row->saldo,
					'level'       => $level,
					'xp_acum'  => $value['xp'], 
				];	
			}

			//$deposit = new Deposit;
			return response()->json([
				'code' => 200,   
				'data' => $trendUsers
			]);
		} catch (\Exception $th) {
			return response()->json(['code' => 301, 'data' => 'error', 'error' => $th->getMessage()]);
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
					'foto'        => ($row->foto != null) ? asset($row->foto) : null,
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
		try {
			$input  = $request->all();
			$imagen = $input['imagen'];
			$tipo   = $input['tipo'];
			$id     = $input['id_user'];

			$target_path = "public/upload/perfil/";


			if (!file_exists("public/upload/perfil/")) {
				mkdir("public/upload/perfil/", 0777, true);
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
				$rutaImagenJPG = $target_path . $filename;

				file_put_contents($rutaImagenJPG, $imageData);
			}



			$res = AppUser::find($id);
			$res->foto = $target_path . $filename;
			$res->save();

			// if (!$res) {
			// 	return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al actualizar imagen.']);
			// }

			return response()->json(['code' => 200, 'data' => $res->id, 'message' => 'Se ha actualizado imagen.']);
		} catch (\Exception $th) {
			return response()->json(['data' => "Ha ocurrido un error al actualizar imagen", 'error' => $th->getMessage()]);
		}
	}



	public function EliminarCuenta(Request $request)
	{
		$id = $request->id;

		try {
			// se debe eliminar Reservas, Tickets, Follow
			AppUser::find($id)->delete();
			Follow::where('seguido_id', $id)->delete();
			Tickets::where('id_cliente', $id)->delete();
			Reserva::where('user_id', $id)->delete();


			return response()->json(['code' => 200, 'data' => 'done', 'message' => 'Se ha Eliminada cuenta de Usuario.']);
		} catch (\Exception $th) {
			return response()->json(['code' => 500, 'data' => "error", 'message' => $th->getMessage()]);
		}
	}


	public function editarNombre(Request $request, $id)
	{
		try {

			$count  = AppUser::whereRaw('LOWER(user_name) LIKE(?)', '%' . $request->nombre . '%')->count();
			if ($count > 0) {

				return response()->json(['data' => 'done', 'message' => 'Ya existe ese user name, intenta uno diferente.']);
			} else {

				$res          = AppUser::find($id);
				$fecha_cambio = Carbon::parse($res->fecha_cambio)->age;

				if ($fecha_cambio > 0) {

					$res->user_name = $request->nombre;
					$res->save();

					return response()->json(['data' => 'done', 'message' => '¡Tu usuario ha sido modificado exitosamente!.']);
				} else {
					return response()->json(['data' => 'done', 'message' => 'No es posible cambiar el user name por el momento.']);
				}
			}
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}


	public function cambiarPassword(Request $request)
	{

		$request->validate([
			'password_actual' => ['required', 'string'],
			'password_nuevo' => ['required', 'string',  'confirmed'],
		]);

		$user = AppUser::find($request->user_id);

		if ($request->input('password_actual') !== $user->password) {
			return response()->json(['code' => 401, 'message' => 'La contraseña actual es incorrecta.'], 401);
		}

		// $user->update([
		//     'password' => $request->input('password_nuevo'),
		// ]);
		$user->password = $request->input('password_nuevo');
		$user->save();

		return response()->json(['code' => 200, 'message' => 'Contraseña cambiada exitosamente.']);
	}

	public function updateInformacion($id, Request $request)
	{

		try {
			$count = AppUser::where('id', '!=', $id)->where('email', $request->input('email'))->count();

			if ($count == 0) {
				$add                = AppUser::find($id);
				$add->name          = $request->input('name');
				$add->email         = $request->input('email');
				$add->phone         = $request->input('phone');
				$add->last_name     = $request->input('last_name');
				$add->birthday      = $request->input('birthday');
				$add->sex_type      = $request->input('sex_type');


				$add->save();

				return ['msg' => 'done', 'user_id' => $add->id];
			} else {
				return ['msg' => 'Este email ya existe!.'];
			}
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}

	public function updateCiudad($id, Request $request)
	{

		$res = AppUser::find($id);
		$res->last_city = $request->last_city;
		$res->save();

		if (!$res) {
			return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al actualizar Ciudad.']);
		}

		return response()->json(['code' => 200, 'data' => $res->id, 'message' => 'Se ha actualizado la Ciudad.']);
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


	/**
	 * GiftCars
	 */
	public function getGiftCards()
	{
		try {
			$res = new GiftCards;
			return response()->json(['code' => 200, 'data' => $res->getGiftCards()]);
		} catch (\Exception $th) {
			return response()->json(['code' => 401, 'data' => 'error', 'error' => $th->getMessage()]);
		}
	}


	public function addReward(Request $request)
	{
		try {
			$gifts = new GiftCards;
			$input = $request->all();
		
			$idGift = $input['id'];
			$user   = AppUser::find($input['user_id']);
			$lims_data_gift = GiftCards::find($idGift);


			$giftCard = $gifts->getGiftCard($idGift);
			$newRecompensas = [];
			$newStock_g = 0;
			$amount_spent = 0;
			for ($i=0; $i < count($giftCard['recompensas']); $i++) { 
				// Obtenemos el nuevo Stock dela tarjeta
				$newStock = ($giftCard['recompensas'][$i]['stock'] - $input['recompensas'][$i]['total']);
				// Agregamos el nuevo Stock a la recompensa
				$newRecompensas[] = [
					'amount' => $giftCard['recompensas'][$i]['amount'],
					'stock'  => $newStock
				];
				// Sumamos el stock General
				$newStock_g += $newStock;
				// Si se adquirio una recompensa agregamos el monto a cobrar al usuario
				if ($input['recompensas'][$i]['total'] > 0) { // Siginifica que si se adquirio esta recompensa
					$qty_amount = ($input['recompensas'][$i]['amount'] * $input['recompensas'][$i]['total']);
					$amount_spent += $qty_amount;
				}
			}

			// Agregamos el nuevo JSON
			$input['stock_g']     = $newStock_g;
			$input['recompensas'] = json_encode($newRecompensas);
			// Guardamos
			$lims_data_gift->update($input);

			// Descontamos saldo del usuario
			$saldo = $user->saldo;
			$user->saldo = ($saldo - $amount_spent); 
			$user->save();

			// Agregamos al historial
			$lims_data_chrew = new ChangedRewards;
			$inputChrew['user_id'] = $user->id;
			$inputChrew['gift_card_id'] = $idGift;
			$inputChrew['spent'] 		= $amount_spent;
			$inputChrew['reward_code']  = $giftCard['codigo'];

			$lims_data_chrew->create($inputChrew);

			// Enviamos respuesta
			return response()->json([
				'code' 		=> 200, 
				'amount_spent' => $amount_spent,
				'reward_code'  => $giftCard['codigo']
			]);
		
		} catch (\Exception $th) {
			return response()->json(['code' => 401, 'data' => 'error', 'error' => $th->getMessage()]);
		}
	}

	public function getRewards($id)
	{
		try {
			$res = ChangedRewards::where('user_id',$id)->get();
			$data = [];

			foreach ($res as $key => $value) {

				// Obtenemos la GiftCard
				$gifts = new GiftCards;
				$giftCard = GiftCards::find($value->gift_card_id);
				$card     = []; //collect($giftCard)->except(['codigo','trending','stock_g','recompensas','created','updated_at','created_at']);

				// Creamos la tarjeta
				$card['id']  = $giftCard['id'];
				$card['logo'] = asset('upload/giftcards/'.$giftCard['logo']);
				$card['name'] = $giftCard['name'];
				$card['descript'] = $giftCard['descript'];


				$data[] = [
					'spent'    		=> $value->spent,
					'reward_code' 	=> $value->reward_code,
					'giftCard' 		=> $card
				];
			}
			return response()->json(['code' => 200, 'data' => $data]);
		} catch (\Exception $th) {
			return response()->json(['code' => 401, 'data' => 'error', 'error' => $th->getMessage()]);
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

			$data = [
				'id_cliente'   => $request->id_cliente,
				'imagen'       => $target_path . $filename,
				'fecha'        => Carbon::now()->format('Y-m-d'),
			];

			if (isset($request->id_negocio)) {
				$data['id_negocio'] = $request->id_negocio;
			}

			$tickets   = Tickets::create($data);

			//numero de tickets en 6 meses
			$fecha = Carbon::now();
			$fechaActual = $fecha->format('Y-m-d');
			$fechaHace6Meses = $fecha->subMonths(6);

			$tickets6m = Tickets::where('id_cliente', $request->id_cliente)->whereIn('status', [0,1, 2]);

			if (isset($request->id_negocio)) {
				$tickets6m = $tickets6m->where('id_negocio', $request->id_negocio);
			}

			$tickets6m = $tickets6m->whereBetween('fecha', [$fechaHace6Meses, $fechaActual])
				->count();

				
			$resus          = AppUser::find($request->id_cliente);
			$resus->tickets = $tickets6m;
			$resus->save();	

			/**
			 * Sumamos los XP
			 * Subir comprobante de tu recibo 100XP
			 */
			$feed_survey = new FeedSurvey;
			$feed_survey->addXpAward($request->id_cliente, 100);


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
		$social  = Tickets::where('id_cliente', $id)->whereIn('status', [1, 2, 3])->orderBy('id', 'asc')->get();

		$array = [];

		foreach ($social as $soc) {

			if ($soc->reserva) {
				$datos_reserva = Reserva::where('id', $soc->reserva)->first(['invitados', 'recompensa', 'fecha', 'hora']);
			} else {
				$datos_reserva = null;
			}


			$array[] = array(
				'reserva' => $soc->reserva,
				'datos_reserva' => $datos_reserva,
				'valor' => $soc->valor,
				'fecha' => $soc->fecha,
				'id_cliente' => $soc->id_cliente,
				'id_negocio' => $soc->id_negocio,
				'nombre' => $soc->negocio->name,
				'imagen_negocio'  => asset('upload/user/' . $soc->negocio->img),
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
					'negocio'     => $res->negocio->name,
					'logo' 		  => asset('upload/user/logo/' . $res->negocio->logo),
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
					'foto'     => ($res->usuario->foto != null) ? asset($res->usuario->foto) : null,
					'siguiendo' => $res->seg_seguidor,
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
					'id'        => $res->seguidor->id,
					'name'      => $res->seguidor->name,
					'usuario'   => $res->seguidor->user_name,
					'foto'      => ($res->seguidor->foto != null) ? asset($res->seguidor->foto) : null,
					'siguiendo' => $res->siguiendo,



				);
			}

			return response()->json(['cantidad' => $cantidad, 'data' => $array]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}

	public function Eliminarfollow(Request $request)
	{
		try {

			$follow  = Follow::where('seguidor_id', $request->seguidor_id)->where('seguido_id', $request->seguido_id)->value('id');

			$res = Follow::find($follow)->delete();

			return response()->json(['data' => 'done', 'message' => 'Se ha Cancelado el Follow.']);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}



	// ----------------Coleccion ----------------

	public function Coleccion(Request $request)
	{


		try {

			//return response()->json(['code' => 200, 'data' => $request, 'message' => 'Se holaa.']);
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
			$store   = new User;
			$array = [];

			foreach ($reserva as $res) {
				$array[] = array(
					'id'           => $res->id,
					'user_id'      => $res->user_id,
					'usuario'      => $res->usuario->name,
					'id_coleccion' => $res->id_coleccion,
					'coleccion'    => $res->coleccion->nombre,
					'negocio'      => $res->negocio->name,
					'store_id'     => $res->store_id,
					'data'         => $store->getStore($res->store_id),


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

			$store   = new User;
			$array = [];

			foreach ($follow as $res) {
				$array[] = array(
					'id'       => $res->id,
					'name'     => $res->usuario->name,
					'user_id'  => $res->usuario->id,
					'store'  => $res->negocio->name,
					'store_id'  => $res->negocio->id,
					'imagen'    => asset('upload/user/' . $res->negocio->img),
					'data'      => $store->getStore($res->negocio->id),



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

	//--------------  Top Restaurantes

	public function topRestaurantes($id)
	{
		try {

			//$reserva  = Reserva::where('user_id', $id)->orderBy('status', 'asc')->distinct()->count('store_id');
			$reserva  =  Reserva::where('user_id', $id)->where('status', 2)->select('store_id', DB::raw('COUNT(store_id) as cantidad'))
				->groupBy('store_id')
				->orderBy('cantidad', 'desc')
				->get();
			$store   = new User;
			$array = [];

			foreach ($reserva as $res) {
				$array[] = array(
					'cantidad'   => $res->cantidad,
					'store_id'   => $res->store_id,
					'data'       => $store->getStore($res->store_id),
				);
			}

			return response()->json(['data' => $array]);
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}

	// ----------------Follow ----------------
	public function ReportarUsuario(Request $request)
	{
		try {

			$reporte   = Reportar::create([
				'seguido_id'   => $request->seguido_id,
				'seguidor_id'  => $request->user_id,
				'detalle'  => $request->detalle,
			]);

			if (!$reporte) {
				return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al crear Reporte.']);
			}

			return response()->json(['code' => 200, 'data' => $reporte, 'message' => 'Se ha creado el Reporte.']);
		} catch (\Throwable $th) {
			return response()->json(['data' => $th]);
		}
	}

	public function block_user(Request $request)
	{
		try {
			$input = $request->all();
			$bloqueo   = Bloquear::create($input);

			if (!$bloqueo) {
				return response()->json(['code' => 500, 'data' => null, 'message' => 'Ha ocurrido un error al Bloquear.']);
			}

			return response()->json(['code' => 200, 'data' => $bloqueo, 'message' => 'Se ha creado el Bloqueo.']);
		} catch (\Exception $th) {
			return response()->json(['code' => 401,'data' => $th->getMessage()]);
		}
	}
 
	public function RecompensasUsuario($id)
	{
		try {
			$res     = Recompensa::where('id_cliente', $id)->where('visto', 0)->first();

			if ($res == null) {
				$res     = AppUser::where('id', $id)->first();

				$array[] = array(
					'id'          => $res->id,
					'name'        => $res->name,
					'usuario'     => $res->user_name,
					'foto'        => ($res->foto != null) ? asset($res->foto) : null,
				);


				return response()->json(['code' => 201, 'data' => $array, 'message' => 'Usuario sin información encontrada.']);
			} else {
				$recomp  = Recompensa::where('id_cliente', $id)->where('status', 0)->where('visto', 0);
				$valor   = Recompensa::where('id_cliente', $id)->where('status', 0)->where('visto', 0)->where('primaria', 0)->sum('valor');
				$valor_primera   = $recomp->where('primaria', 1)->sum('valor');
				$chk_negocio = Recompensa::where('id_cliente',$id)->where('status',0)->where('visto',0)->where('id_negocio','!=',null)->get();
				// $recompensa =  Recompensa::where('id_cliente', $id)->where('visto', 0)->where('status', 0)->get(['id', 'valor']);
				$array = [];


				$array[] = array(

					'id'          => $res->usuario->id,
					'name'        => $res->usuario->name,
					'usuario'     => $res->usuario->user_name,
					'foto'        => ($res->usuario->foto != null) ? asset($res->usuario->foto) : null,
					'saldo'       => $valor,
					'saldo_primera_compra'  => $valor_primera,
					'id_negocio'  => $chk_negocio
					//'adq_total'    => $valor_primera + $valor,
				);
 
				return response()->json(['code' => 200, 'data' => $array, 'message' => 'Información encontrada.']);
			}
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}
 
	public function DividirRecompensasUsuario(Request $request)
	{
		try {
			$input    = $request->all();
			$id_user  = $input['id_user'];
			$divide   = $input['divide'];
			$usuarios = $input['usuarios'];


			$res     = AppUser::where('id', $id_user)->first();
			$usuario = $res->user_name;
			$usuario_id = $res->id;
			$array[] = array(

				'id'          => $res->id,
				'name'        => $res->name,
				'usuario'     => $res->user_name,
				'foto'        => ($res->foto != null) ? asset($res->foto) : null,

			);

			if ($divide == 1) {

				$numeroDeElementos = count($usuarios);
				$recomp        = Recompensa::where('id_cliente', $id_user)->where('status', 0)->where('visto', 0);
				$valor         = Recompensa::where('id_cliente', $id_user)->where('status', 0)->where('visto', 0)->where('primaria', 0)->sum('valor');
				$valor_primera = $recomp->where('primaria', 1)->sum('valor');
				$adq_total     = $valor_primera + $valor;
				$cantidad      = $adq_total / ($numeroDeElementos + 1);


				foreach ($usuarios as $res => $valor) {
					$id = $valor['id'];


					$add2                   = new Recompensa();
					$add2->id_cliente       = $id;
					$add2->id_negocio       = null;
					$add2->reserva          = null;
					$add2->valor            = $cantidad;
					$add2->visto            = 1;
					$add2->divide           = $id_user;
					$add2->descripcion      = 'División de recompensa : ' . $usuario;
					$add2->fecha            = Carbon::now()->format('Y-m-d');
					$add2->primaria         = 0;
					$add2->save();

					// Notificamos al usuario
					app('App\Http\Controllers\Controller')->sendPush("Recompensa recibida", "Haz recibido" . $cantidad . " pesos de @" . $usuario . ".", $usuario_id);

					// Actualizacion del saldo

					$saldo      = Recompensa::where('id_cliente', $id)->where('status', 0)->sum('valor');
					$res        = AppUser::find($id);
					$res->saldo = $saldo;
					$res->save();

					// Actualizacion de XP
				}

				$delete   = Recompensa::where('id_cliente', $id_user)->where('status', 0)->where('visto', 0)->get();

				foreach ($delete as $res) {

					Recompensa::find($res->id)->delete();
				}

				$add1                   = new Recompensa();
				$add1->id_cliente       = $id_user;
				$add1->id_negocio       = null;
				$add1->reserva          = null;
				$add1->visto            = 1;
				$add1->valor            = $cantidad;
				$add1->divide            = $id_user;
				$add1->descripcion      = 'División de recompensa';
				$add1->fecha            = Carbon::now()->format('Y-m-d');
				$add1->primaria         = 0;
				$add1->save();

				$saldousu     = Recompensa::where('id_cliente', $id_user)->where('status', 0)->sum('valor');
				$resus        = AppUser::find($id_user);
				$resus->saldo = $saldousu;
				$resus->save();

				return response()->json(['code' => 200, 'data' => $array, 'message' => 'Se ha dividido la recompensa.']);
			} else {

				$recomprensa   = Recompensa::where('id_cliente', $id_user)->where('status', 0)->where('visto', 0)->get();

				foreach ($recomprensa as $res) {

					$res = Recompensa::find($res->id);
					$res->visto = 1;
					$res->save();
				}


				return response()->json(['code' => 200, 'data' => $array, 'message' => 'No se ha dividido la recompensa.']);
			}
		} catch (\Exception $th) {
			return response()->json(['data' => "error", 'error' => $th->getMessage()]);
		}
	}

	/**
	 * Funciones para encuesta Retroalimentacion
	 */
	public function setSurvey(Request $request)
	{
		try {
			// {
			// 	"usuario_id": 0,
			// 	"preguntas": [
			// 		{
			// 			"id": 1,
			// 			"pregunta_string": "¿Elegiste regresar a KAMPAI porqué está en Aciento?",
			// 			"respuesta": [
			// 				{
			// 					"id": 1,
			// 					"respuesta_string": "SI"
			// 				},
			// 				{
			// 					"id": 2,
			// 					"respuesta_string": "NO"
			// 				}
			// 			],
			// 			"respuesta_seleccionada": {
			// 				"id": 0,
			// 				"respuesta_string": ""
			// 			}
			// 		},
			// 		{
			// 			"id": 2,
			// 			"pregunta_string": "Si no estuviera en Aciento, ¿qué harías?",
			// 			"respuesta": [
			// 				{
			// 					"id": 1,
			// 					"respuesta_string": "Iría aún así"
			// 				},
			// 				{
			// 					"id": 2,
			// 					"respuesta_string": "Escogería otro restaurante en Aciento"
			// 				}
			// 			],
			// 			"respuesta_seleccionada": {
			// 				"id": 0,
			// 				"respuesta_string": ""
			// 			}
			// 		},
			// 		{
			// 			"id": 3,
			// 			"pregunta_string": "¿Cuánto tiempo esperaste por tu mesa?",
			// 			"respuesta": [
			// 				{
			// 					"id": 1,
			// 					"respuesta_string": "0-10 minutos"
			// 				},
			// 				{
			// 					"id": 2,
			// 					"respuesta_string": "10-30 minutos"
			// 				},
			// 				{
			// 					"id": 3,
			// 					"respuesta_string": "30-60 minutos"
			// 				},
			// 				{
			// 					"id": 4,
			// 					"respuesta_string": "Más de 1 hora"
			// 				}
			// 			],
			// 			"respuesta_seleccionada": {
			// 				"id": 0,
			// 				"respuesta_string": ""
			// 			}
			// 		}
			// 	],
			// 	"rating": {},
			// 	"description_string": ""
			// }

			$input = $request->all();
			$data  = [];
			$lims_data_survey = new FeedSurvey;

			$data['user_id'] = $input['usuario_id'];
			$data['id_negocio'] = $input['id_negocio'];
			$data['rating']  = $input['rating'];
			$data['descript_rating'] = $input['description_string'];
			$data['preguntas']  = json_encode($input['preguntas']);
			
			$lims_data_survey->create($data);

			/**
			 * Sumamos los XP
			 * Completar retroalimentacion al finalizar tu conssumo 50 XP
			 */
			$user = new FeedSurvey;
			$user->addXpAward($data['user_id'], 50);

			return response()->json([
				'code' => 200, 
				'data' => $data, 
				'message' => 'survey_complete']);

		} catch (\Exception $th) {
			return response()->json(['code' => 301, 'data' => "error", 'error' => $th->getMessage()]);
		}
	}
}

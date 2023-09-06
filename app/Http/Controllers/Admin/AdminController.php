<?php namespace App\Http\Controllers\Admin;

use DB;
use Auth;

use Redirect;
use Validator;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Http\Requests;
use App\Models\Follow;
use App\Models\AppUser;
use App\Models\Reserva;
use App\Models\Tickets;
use App\Models\Delivery;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller {

	public $folder = "admin.";

	/*
	|------------------------------------------------------------------
	|Index page for login
	|------------------------------------------------------------------
	*/
	public function index()
	{
	
		return View($this->folder.'index',[
			'form_url' => Asset(env('admin').'/login')
		]);
	}

	/*
	|------------------------------------------------------------------
	|Login attempt,check username & password
	|------------------------------------------------------------------
	*/
	public function login(Request $request)
	{
		
		$username = $request->input('username');
		$password = $request->input('password');

		if (auth()->guard('admin')->attempt(['username' => $username, 'password' => $password]))
		{
			return Redirect::to(env('admin').'/home')->with('message', 'Bienvenido ! Estás conectado ahora.');
		}
		else
		{
			return Redirect::to(env('admin').'/login')->with('error', 'La contraseña y/o Nombre de usuario no coinciden')->withInput();
		}
	}

	/*
	|------------------------------------------------------------------
	|Homepage, Dashboard
	|------------------------------------------------------------------
	*/
	public function home()
	{
		$admin = new Admin;
		$order = new Order;

		return View($this->folder.'dashboard.home',[
			'overview'	=> $admin->overview(),
			'admin'		=> $admin,
			'link' 		=> env('admin').'/order/',
			'item'		=> new OrderItem,
			'schart'	=> $admin->storeChart(),
			'orders'	=> $order->getAll(),
			'form_url'	=> env('admin').'/order/dispatched',
			'boys'		=> Delivery::where('status',0)->where('store_id',0)->get(),
			'arraydboy' => [],
			'currency'  => Admin::find(1)->currency
		]);
	}

	/*
	|------------------------------------------------------------------
	|Logout
	|------------------------------------------------------------------
	*/
	public function logout()
	{
		auth()->guard('admin')->logout();

		return Redirect::to(env('admin').'/login')->with('message', '¡Cierre de sesión con éxito!');
	}

	/*
	|------------------------------------------------------------------
	|Account setting's page
	|------------------------------------------------------------------
	*/
	public function setting()
	{
		$admin = new Admin;

		if($admin->hasperm('Dashboard - Configuraciones')){
			return View($this->folder.'dashboard.setting',[
				'data' 		=> auth()->guard('admin')->user(),
				'form_url'	=> Asset(env('admin').'/setting'),
				'admin'		=> new Admin,

				]);
		}else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección configuraciones');
		}
	}

	/*
	|------------------------------------------------------------------
	|update account setting's
	|------------------------------------------------------------------
	*/
	public function update(Request $Request)
	{
		$admin = new Admin;

		if($admin->matchPassword($Request->get('password')))
		{
			return Redirect::back()->with('error','Opps! Su contraseña actual no coincide.');
		}
		else
		{
			$admin->updateData($Request->all());

			return Redirect::back()->with('message','Información actualizada con éxito.');
		}
	}

	public function admin()
	{
		return Redirect(env('admin'));
	}

	public function appUser()
	{
		$admin = new Admin;
		if($admin->hasperm('Subaccount')){

			return View(
				$this->folder.'dashboard.appUser',
				[
					'data' => AppUser::orderBy('id','DESC')->paginate(60),
					'link' => env('admin').'/appUser/'
				]
			);
		}else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección Usuarios Registrados');
		}
	}

	public function status($id)
	{
		$res = AppUser::find($id);
		if ($res) {
			$res->status = $res->status == 0 ? 1 : 0;
			$res->save();
			return redirect(env('admin').'/appUser')->with('message','Status del usuario Actualizado');
		}else {
			return redirect(env('admin').'/appUser')->with('error','Usuarios No Encontrado');
		}
	}

	public function trash($id)
	{
		AppUser::where('id',$id)->delete();
		Follow::where('seguido_id', $id)->delete();
		Tickets::where('id_cliente', $id)->delete();
		Reserva::where('user_id', $id)->delete();

		return redirect(env('admin').'/appUser')->with('message','Usuario Eliminado.');
	}
}

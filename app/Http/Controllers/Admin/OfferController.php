<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Offer;
use App\Models\User;
use App\Models\OfferStore;
use App\Models\Admin;
use DB;
use Validator;
use Redirect;
use IMS;
class OfferController extends Controller {

	public $folder  = "admin/offer.";
	/*
	|---------------------------------------
	|@Showing all records
	|---------------------------------------
	*/
	public function index()
	{					
		$admin = new Admin;

		if ($admin->hasperm('Ofertas de descuento')) {

		$res = new Offer;
		$user = new User;

		return View($this->folder.'index',[

			'data' 		=> $res->getAll(),
			'link' 		=> env('admin').'/offer/',
			'form_url'	=> env('admin').'/offer/assign',
			'users'		=> $user->getAll(0),
			'assign'	=> new OfferStore

			]);

		} else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección Ofertas de descuento');
		}
	}	
	
	/*
	|---------------------------------------
	|@Add new page
	|---------------------------------------
	*/
	public function show()
	{			
		
		$admin = new Admin;

		if ($admin->hasperm('Ofertas de descuento')) {
		
		$u = new User;

		return View($this->folder.'add',[

			'data' 		=> new Offer,
			'form_url' 	=> env('admin').'/offer',
			'users' 	=> $u->getAll(),
			'array'		=> []

			]);
		} else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección Ofertas de descuento');
		}
	}
	
	/*
	|---------------------------------------
	|@Save data in DB
	|---------------------------------------
	*/
	public function store(Request $Request)
	{			
		$data = new Offer;	
		
		if($data->validate($Request->all(),'add'))
		{
			return redirect::back()->withErrors($data->validate($Request->all(),'add'))->withInput();
			exit;
		}

		$data->addNew($Request->all(),"add");
		
		//$this->sendPush('Discount Offer',$Request->get('description'));


		return redirect(env('admin').'/offer')->with('message','New Record Added Successfully.');
	}
	
	/*
	|---------------------------------------
	|@Edit Page 
	|---------------------------------------
	*/
	public function edit($id)
	{				

		
		$admin = new Admin;

		if ($admin->hasperm('Ofertas de descuento')) {

		$u = new User;
		
		return View($this->folder.'edit',[

			'data' 		=> Offer::find($id),
			'form_url' 	=> env('admin').'/offer/'.$id,
			'users' 	=> $u->getAll(),
			'array'		=> OfferStore::where('offer_id',$id)->pluck('store_id')->toArray()

			]);
		} else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección Ofertas de descuento');
		}
	}
	
	/*
	|---------------------------------------
	|@update data in DB
	|---------------------------------------
	*/
	public function update(Request $Request,$id)
	{	
		$data = new Offer;
		
		if($data->validate($Request->all(),$id))
		{
			return redirect::back()->withErrors($data->validate($Request->all(),$id))->withInput();
			exit;
		}

		$data->addNew($Request->all(),$id);
		
		return redirect(env('admin').'/offer')->with('message','Registro actualizado con éxito.');
	}
	
	/*
	|---------------------------------------------
	|@Delete Data
	|---------------------------------------------
	*/
	public function delete($id)
	{
		Offer::where('id',$id)->delete();

		return redirect(env('admin').'/offer')->with('message','Registro eliminado con éxito.');
	}

	/*
	|---------------------------------------------
	|@Change Status
	|---------------------------------------------
	*/
	public function status($id)
	{
		$res 			= Offer::find($id);
		$res->status 	= $res->status == 0 ? 1 : 0;
		$res->save();

		return redirect(env('admin').'/offer')->with('message','Estado actualizado con éxito.');
	}

	public function assign(Request $Request)
	{
		$res = new OfferStore;

		$res->addNew($Request->all());

		return redirect(env('admin').'/offer')->with('message','Actualizado con éxito.');
	}
}
<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Reserva;
use App\Models\Tickets;
use App\Models\OfferStore;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TicketsController extends Controller
{
    public $folder  = "admin/tickets.";
	
	/*
	|---------------------------------------
	|@Showing all records
	|---------------------------------------
	*/
	public function index()
	{
		$admin = new Admin;
		if ($admin->hasperm('Tickets')) {

		
		return View($this->folder.'index',[

			'data' 		=> Tickets::orderBy('status', 'asc')->paginate(10),
            'link' 		=> env('admin').'/tickets/',
			'form_url'	=> env('admin').'/tickets',
			'users'		=> 1,
			'assign'	=>1
			
			]);

		} else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección Ofertas de descuento');
		}
	}
    
    /*
	|---------------------------------------------
	|@Change Status
	|---------------------------------------------
	*/
	public function status($id)
	{
		$res 			= Tickets::find($id);
		$res->status 	= $res->status == 0 ? 1 : 0;
		$res->save();

		return redirect(env('admin').'/tickets')->with('message','Estado actualizado con éxito.');
	}


    public function verFiles($id){

        $img  = Tickets::where('id', $id)->value('imagen');
	
		$partes = explode(".", $img);
		$rutaDeArchivo = $img;
	
        return response()->download($rutaDeArchivo, 'imagen.'.$partes[1]);
     }

	 public function SelectReserva(Request $request){


		$reservas = Reserva::where('store_id', $request->negocio_id)->where('user_id', $request->user_id)->where('status', 1)->get();
	
		$arrayName[] = array('id' => '','valor' =>'Seleccione');
		foreach ($reservas as $d) {
			$hora = Carbon::parse($d->hora)->format('h:i  A'); 
			$arrayName[] = array('id' => $d->id,
							'valor' => 'Fecha:  '.$d->fecha.' - Hora:  '.$hora .' - Invitados:  '.  $d->invitados .' - Recompensa:  '.  $d->recompensa . ' %'  );

		}

	return $arrayName;


}


	 public function edit($id)
	{				

		
		$admin = new Admin;

		if ($admin->hasperm('Tickets')) {

		$u = new User;
		
		return View($this->folder.'edit',[

			'data' 		=> Tickets::find($id),
			'negocios'  => User::orderBy('name', 'asc')->get(),
			'form_url' 	=> env('admin').'/tickets/'.$id,
			'users' 	=> $u->getAll(),
			//'array'		=> OfferStore::where('offer_id',$id)->pluck('store_id')->toArray()

			]);
		} else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección de Tickets');
		}
	}

	public function update(Request $request,$id)
	{	

	
		$input         = $request->all();
		$requests_data = Tickets::find($id);

		$requests_data->update($input);


		$res 			= Reserva::find($request->reserva);
		$res->status 	= $request->status ;
		$res->save();
		
		return redirect(env('admin').'/tickets')->with('message','Registro actualizado con éxito.');
	}
}

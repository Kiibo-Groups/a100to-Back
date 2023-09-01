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
use App\Models\AppUser;
use App\Models\Recompensa;
use Illuminate\Support\Facades\Redirect;

class TicketsController extends Controller
{
	public $folder  = "admin/tickets.";

	/*
	|---------------------------------------
	|@Showing all records
	|---------------------------------------
	*/
	public function index(Request $request)
	{
		//dd($request);
		$from    = $request->filter_from;
		$even    = $request->filter_even;
		$status  = $request->filter_status;
		$filter_negocio = $request->filter_negocio;
		$filter_usuario = $request->filter_usuario;


		$tickest = Tickets::orderBy('status', 'asc')->orderBy('fecha', 'asc');

		if (!is_null($filter_negocio)) {
			$tickest = $tickest->where('id_negocio', $filter_negocio);
		}
		if (!is_null($filter_usuario)) {
			$tickest = $tickest->where('id_cliente', $filter_usuario);
		}
		if (!is_null($status)) {
			$tickest = $tickest->where('status', $status);
		}

		if (!is_null($from)) {

			$tickest = $tickest->whereBetween('fecha', [$from, $even]);
		}

		$admin = new Admin;
		if ($admin->hasperm('Tickets')) {


			return View($this->folder . 'index', [

				'data' 		=> $tickest->paginate(10),
				'link' 		=> env('admin') . '/tickets/',
				'form_url'	=> env('admin') . '/tickets',
				'users'		=> 1,
				'usuarios'  => AppUser::orderBy('name', 'asc')->get(),
				'negocios'	=> User::orderBy('name', 'asc')->get(),
				'assign'	=> 1,
				'filter_from'	  => $from,
				'filter_even'     => $even,
				'filter_negocio'  => $filter_negocio,
				'filter_usuario'  => $filter_usuario,
				'status'          => $status

			]);
		} else {
			return Redirect::to(env('admin') . '/home')->with('error', 'No tienes permiso de ver la sección Ofertas de descuento');
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

		return redirect(env('admin') . '/tickets')->with('message', 'Estado actualizado con éxito.');
	}


	public function verFiles($id)
	{

		$img  = Tickets::where('id', $id)->value('imagen');

		$partes = explode(".", $img);
		$rutaDeArchivo = $img;

		return response()->download($rutaDeArchivo, 'imagen.' . $partes[1]);
	}

	public function SelectReserva(Request $request)
	{
		$reservas = Reserva::where('store_id', $request->negocio_id)->where('user_id', $request->user_id)->where('status', 1)->get();

		$arrayName[] = array('id' => '', 'valor' => 'Seleccione');
		foreach ($reservas as $d) {
			$hora = Carbon::parse($d->hora)->format('h:i  A');
			$arrayName[] = array(
				'id' => $d->id,
				'valor' => 'Fecha:  ' . $d->fecha . ' - Hora:  ' . $hora . ' - Invitados:  ' .  $d->invitados . ' - Recompensa:  ' .  $d->recompensa . ' %'
			);
		}

		return $arrayName;
	}

	public function SelectReservaSelect(Request $request)
	{


		$reservas = Reserva::where('id', $request->reserva)->get();


		foreach ($reservas as $d) {
			$hora = Carbon::parse($d->hora)->format('h:i  A');
			$arrayName[] = array(
				'id' => $d->id,
				'valor' => 'Fecha:  ' . $d->fecha . ' - Hora:  ' . $hora . ' - Invitados:  ' .  $d->invitados . ' - Recompensa:  ' .  $d->recompensa . ' %'
			);
		}

		return $arrayName;
	}


	public function edit($id)
	{


		$admin = new Admin;

		if ($admin->hasperm('Tickets')) {

			$tickets = Tickets::find($id);
			if ($tickets->reserva) {
				$negocios = User::where('id', $tickets->id_negocio)->get();
			} else {
				$negocios = User::orderBy('name', 'asc')->get();
			}


			return View($this->folder . 'edit', [

				'data' 		=> $tickets,
				'negocios'  => $negocios,
				'form_url' 	=> env('admin') . '/tickets/' . $id,


			]);
		} else {
			return Redirect::to(env('admin') . '/home')->with('error', 'No tienes permiso de ver la sección de Tickets');
		}
	}

	public function update(Request $request, $id)
	{


		$input         = $request->all();
		$requests_data = Tickets::find($id);
		$requests_data->update($input);

		$res 			= Reserva::find($request->reserva);
		$res->status 	= $request->status;
		$res->save();

		if ($request->status == 2) {

			$data = new Recompensa();	
			$data->addNew($request->all(),"add");
		}




		return redirect(env('admin') . '/tickets')->with('message', 'Registro actualizado con éxito.');
	}
}

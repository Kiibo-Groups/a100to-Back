<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Tickets;
use Illuminate\Http\Request;
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

			'data' 		=> Tickets::get(),
            'link' 		=> env('admin').'/tickets/',
			'form_url'	=> env('admin').'/tickets',
			'users'		=> 1,
			'assign'	=>1
			
			]);

		} else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección Ofertas de descuento');
		}
	}	
}

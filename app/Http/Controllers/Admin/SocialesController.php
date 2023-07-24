<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Sociales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SocialesController extends Controller
{
    public $folder  = "admin/sociales.";
    /*
    |---------------------------------------
    |@Showing all records
    |---------------------------------------
    */
    public function index()
    {
        $admin = new Admin();

        if ($admin->hasperm('Causas sociales')) {

            $res = new Sociales();
        

            return View($this->folder.'index', [

                'data' 		=> $res->get(),
                'link' 		=> env('admin').'/sociales/',
                'form_url'	=> env('admin').'/sociales/assign',
               

                ]);

        } else {
            return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección Ofertas de descuento');
        }
    }

    public function show()
	{			
		
		$admin = new Admin;

		if ($admin->hasperm('Causas sociales')) {
		
	

		return View($this->folder.'add',[

			'data' 		=> new Sociales,
			'form_url' 	=> env('admin').'/sociales',
			
			'array'		=> []

			]);
		} else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección Ofertas de descuento');
		}
	}

    public function store(Request $Request)
	{		
        
		$data = new Sociales;	
		$data->addNew($Request->all(),"add");
		return redirect(env('admin').'/sociales')->with('message','Nuevo registro agregado con éxito.');
	}

    public function edit($id)
	{				

		
		$admin = new Admin;

		if ($admin->hasperm('Causas sociales')) {

		
		return View($this->folder.'edit',[

			'data' 		=> Sociales::find($id),
			'form_url' 	=> env('admin').'/sociales/'.$id,
		

			]);
		} else {
			return Redirect::to(env('admin').'/home')->with('error', 'No tienes permiso de ver la sección de Tickets');
		}
	}

	public function update(Request $request,$id)
	{	
		$input         = $request->all();
		$requests_data = Sociales::find($id);

		$requests_data->update($input);
		
		return redirect(env('admin').'/sociales')->with('message','Registro actualizado con éxito.');
	}
	

    public function delete($id)
	{
		
        Sociales::find($id)->delete();

		return redirect(env('admin').'/sociales')->with('message','Registro eliminado con éxito.');
	}

}

<?php

namespace App\Http\Controllers\User;


use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservasController extends Controller
{
    public $folder  = "user/reservas.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $res = new Reserva();

        $id  = auth()->user()->id;
        return View($this->folder . 'index', [

            'data'         => $res->where('store_id', $id)->orderBy('id', 'DESC')->paginate(10),
            'link'         => env('user') . '/reservas/',
            'form_url'    => env('user') . '/reservas/assign',


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return View($this->folder . 'edit', [

            'data'         => Reserva::find($id),
            'form_url'     => env('user') . '/reservas/' . $id,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
	{	

     
		$input         = $request->all();
		$requests_data = Reserva::find($id);
       // dd($requests_data);
		$requests_data->update($input);
		
		return redirect(env('user').'/reservas')->with('message','Registro actualizado con éxito.');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

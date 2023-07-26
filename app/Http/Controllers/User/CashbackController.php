<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cashback;
use Illuminate\Http\Request;

class CashbackController extends Controller
{
    public $folder  = "user/cashback.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


	public function index()
	{					
		$id = auth()->user()->id;	
        
		return View($this->folder.'index',[
			'data' => Cashback::where('store_id', $id)->orderBy('status','ASC')->paginate(10),
			'user' => $id,
			'name' => '',
			'type' => 0,
			
			'link' => env('user').'/cashback/']);
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
        //dd( $request);
        $Cashback = Cashback::create($request->all());
        return redirect(env('user').'/cashback')->with('message','Nuevo registro agregado con éxito.');
	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = auth()->user()->id;	
        return View(
			$this->folder.'add',
			[
				'data' => new Cashback,
				'user' => $id,
				'stat' => 'new',
				'form_url' => env('user').'/cashback'
			]
		);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser = auth()->user()->id;
        return View(
			$this->folder.'edit',
			['data' => Cashback::find($id),
			'user' => $iduser,
			'stat'  => 'edit',
			
			'form_url' => env('user').'/cashback/'.$id]
		);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        $registro = Cashback::find($id);      
        $registro->cashback = $request->cashback;
        $registro->hora     = $request->hora;
        $registro->save();
		return redirect(env('user').'/cashback')->with('message','Registro actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       
        Cashback::find($id)->delete();
        return redirect(env('user').'/cashback')->with('message','Registro eliminado con éxito.');
    }

    	/*
	|---------------------------------------------
	|@Change Status
	|---------------------------------------------
	*/
	public function status($id)
	{
		$res 			= Cashback::find($id);
		$res->status 	= $res->status == 0 ? 1 : 0;
		$res->save();

		return redirect(env('user').'/cashback')->with('message','Estado actualizado con éxito.');
	}
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\{Cashback, Hora, Day, Schedule, BlockedDay};
use App\Helpers\Schedules;
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
        
        $schedule = Schedule::get();

        $days = Schedules::$days;

        foreach($schedule as $item) {
            $days = Schedules::updateDay($days, $item->id, $item->day->name, $item->hora->name, $item->per, $item->status);
        }

		$id = auth()->user()->id;	
        $hours = Hora::get();

            return View($this->folder.'index',[
			'data' => Cashback::where('store_id', $id)->orderBy('status','ASC')->paginate(10),
            'blocked_days' => BlockedDay::where('store_id', $id)->latest()->paginate(10),
			'user' => $id,
			'name' => '',
			'type' => 0,
			'hours' => $hours,
            'schedules' => $days,
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
        $cashback = Schedule::where('day_id', $request->day_id)->where('hora_id', $request->hora_id)->where('store_id', $request->store_id)->first();

        if ($cashback) {
            return redirect(env('user').'/cashback')->with('message','Cashback de Hora de ya existe.');
        }
        $data = Schedule::create($request->all());
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
                'days' => Day::get(),
                'hours' => Hora::get(),
				'stat' => 'new',
				'form_url' => env('user').'/cashback'
			]
		);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addBlockedDays()
    {
        $id = auth()->user()->id;	
        return View(
			$this->folder.'blocked_days',
			[
				'data' => new BlockedDay,
				'user' => $id,
				'stat' => 'new',
				'form_url' => env('user').'/cashback/blocked_days'
			]
		);
    }

    public function saveBlockedDays(Request $request)
    {

        $blockedDay = BlockedDay::create($request->all());
        return redirect(env('user').'/cashback')->with('message','Nuevo registro agregado con éxito.');
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
			['data' => Schedule::find($id),
			'user' => $iduser,
			'stat'  => 'edit',
            'days' => Day::get(),
            'hours' => Hora::get(),
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
        $res 			= Schedule::find($id);

        if($res) {
            $res->status 	= $res->status == 0 ? 1 : 0;
		    $res->save();

            return redirect(env('user').'/cashback')->with('message','Estado actualizado con éxito.');
  
        }

		return redirect(env('user').'/cashback')->with('message','Se requiere tener porcentaje para cambio de status.');
	}
}

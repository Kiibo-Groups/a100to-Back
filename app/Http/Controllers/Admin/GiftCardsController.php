<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\GiftCards;
use App\Models\User; 
use App\Models\Admin;
use DB;
use Validator;
use Redirect;
use IMS;
class GiftCardsController extends Controller {

	public $folder  = "admin/giftcards.";
	/*
	|---------------------------------------
	|@Showing all records
	|---------------------------------------
	*/
	public function index()
	{					
		$admin = new Admin;
        $res = new GiftCards;
        $user = new User;

        return View($this->folder.'index',[
            'data' 		=> $res->getAll(),
            'link' 		=> env('admin').'/giftcards/', 
        ]);
	}	
	
	/*
	|---------------------------------------
	|@Add new page
	|---------------------------------------
	*/
	public function show()
	{			
		return View($this->folder.'add',[
			'data' 		=> new GiftCards,
			'form_url' 	=> env('admin').'/giftcards',
		]);
	}
	
	/*
	|---------------------------------------
	|@Save data in DB
	|---------------------------------------
	*/
	public function store(Request $Request)
	{			
		$lims_data_gifts = new GiftCards;	
		$input           = $Request->all();
        $stock_g         = 0;
        $data = [];
        $recompensas     = [];
        for ($i=0; $i < count($input['amount']) ; $i++) { 
            $recompensas[] = [
                'amount' => $input['amount'][$i],
                'stock'  => $input['stock'][$i]
            ];

            $stock_g += $input['stock'][$i];
        }

        if ($input['img']) {
            $filename   = time() . rand(111, 699) . '.' . $input['img']->getClientOriginalExtension();
            $input['img']->move("public/upload/giftcards/", $filename);
            $input['logo'] = $filename;
        }

        $input['recompensas'] = json_encode($recompensas);
        $input['stock_g']     = $stock_g;

        $lims_data_gifts->create($input);
		return redirect(env('admin').'/giftcards')->with('message','Nueva tarjeta agregada.');
	}
	
	/*
	|---------------------------------------
	|@Edit Page 
	|---------------------------------------
	*/
	public function edit($id)
	{
		$admin = new Admin;
        $req   = GiftCards::find($id);
        $data  = $req;
        $data->recompensas = json_decode($req->recompensas, true);

		return View($this->folder.'edit',[
			'data' 		=> $data,
			'form_url' 	=> env('admin').'/giftcards/'.$id
        ]);
	}
	
	/*
	|---------------------------------------
	|@update data in DB
	|---------------------------------------
	*/
	public function update(Request $Request,$id)
	{	
		$lims_data_gifts = GiftCards::find($id);	
		$input           = $Request->all();
        $stock_g         = 0;
        $data = [];
        $recompensas     = [];
        for ($i=0; $i < count($input['amount']) ; $i++) { 
            $recompensas[] = [
                'amount' => $input['amount'][$i],
                'stock'  => $input['stock'][$i]
            ];

            $stock_g += $input['stock'][$i];
        }

        if (isset($input['img'])) {

            $filename   = time() . rand(111, 699) . '.' . $input['img']->getClientOriginalExtension();
            $input['img']->move("public/upload/giftcards/", $filename);
            $input['logo'] = $filename;
        }

        $input['recompensas'] = json_encode($recompensas);
        $input['stock_g']     = $stock_g;
         

        // return response()->json([
        //     'data'  => $data
        // ]);

        $lims_data_gifts->update($input);
		return redirect(env('admin').'/giftcards')->with('message','Tarjeta actualizada...');
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
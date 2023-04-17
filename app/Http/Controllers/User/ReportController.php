<?php namespace App\Http\Controllers\User;

use DB;
use IMS;
use Auth;
use Redirect;
use Validator;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Http\Requests;
use App\Exports\OrderExport;
use Illuminate\Http\Request;
use Excel;
use App\Http\Controllers\Controller;

class ReportController extends Controller {

	public $folder  = "user/report.";
	/*
	|---------------------------------------
	|@Showing all records
	|---------------------------------------
	*/
	public function index()
	{					
		$res = new User;
		
		return View($this->folder.'index',['data' => $res->getAll(),'overview'	=> $res->overview(),'currency'  => Admin::find(1)->currency,'form_url' => env('user').'/exportData']);
	}	
	
	public function report(Request $Request)
	{
		
		$res = new Order;

		return View($this->folder.'report',[

		'data' => $res->getReport($Request->all()),
		'from' => $Request->get('from') ? date('d-M-Y',strtotime($Request->get('from'))) : null,
		'to'   => $Request->get('to') ? date('d-M-Y',strtotime($Request->get('to'))) : null,
		'user' => new User

		]);
	}

	public function payment()
	{					
		$res = new User;
		
		return View($this->folder.'payment',['data' => $res->getAll(),'form_url' => env('user').'/paymentReport']);
	}

	public function paymentReport()
	{
		return Excel::download(new OrderExport, 'payment.xlsx');
	}

	public function exportData(Request $Request)
	{
		return Excel::download(new OrderExport, 'report.xlsx');		
	}
}
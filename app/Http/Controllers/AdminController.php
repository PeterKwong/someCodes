<?php

namespace App\Http\Controllers;

use Hash;
use App\Role;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    	public function __construct()
	    {
	    	// $this->middleware('guest:admin')
	    	// 	->except(['logout','loginBlade','login']);
	    }   

		  public function login(Request $request)
		  {

			$this->validate($request, [
    		'email' => 'required | email',
    		'password' => 'required | between:6,25'
    		]);

	    	$admin = Admin::where('email', $request->email)->first();
	    	$admin->authorizeRoles(['admin','employee','purchase']);

			// dd($request);
			if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password' => $request->password ] ) ) {
				 	
				 	return response()
	    			->json([
	    				'authenticated' => true,
	    				'api_token' => $admin->api_token,
	    				'admin_id' => $admin->id,
	    				'role' => $admin->roles()->first(['name'])
	    				]);
	    	
			}
			


		  	// $this->validate($request, [
	    // 		'email' => 'required | email',
	    // 		'password' => 'required | between:6,25'
	    // 		]);

	    // 	$admin = Admin::where('email', $request->email)->first();
	    // 	$admin->authorizeRoles(['admin','employee']);

	    // 	if ($admin && Hash::check($request->password, $admin->password)) {
	    // 		$admin->api_token = str_random(60);
	    // 		$admin->save();

	    // 		return response()
	    // 			->json([
	    // 				'authenticated' => true,
	    // 				'api_token' => $admin->api_token,
	    // 				'admin_id' => $admin->id,
	    // 				'role' => $admin->roles()->first(['name'])
	    // 				]);
	    // 	}

	    	return response()
	    		->json([
	    			'email' => ['Provided email and password does not match!']
	    			], 422);
	    		


		  }


		public function index(){

			return view('backEnd.app');
		}

		public function loginBlade(){

			return view('admin.login');
		}	

		public function purchaseProgressInvoices(){
			
			return view('backEnd.purchase.progressInvoice');
		}

		public function duedProgressInvoices(){
			
			return view('backEnd.purchase.duedProgressInvoices');
		}

		public function onStockDiamond(){
			// dd('hi');
			return view('backEnd.purchase.onStockDiamond'); 
		}
		public function starredDiamondsExport(){
			// dd('hi');
			return view('backEnd.purchase.starredDiamondsExport'); 
		}

		public function invoiceExport(){
			// dd('hi');
			return view('backEnd.accounting.invoiceExport'); 
		}
				  /*
		  public function someAdminStuff(Request $request)
		  {
		    $request->admin()->authorizeRoles('manager');
		    return view(‘some.view’);
		  }
		  */
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{

	protected $user = '';

	public function __construct()
	{
		$this->middleware('auth') ;

	}

    public function index(){

        Auth::user()->api_token = Str::random(60);
        Auth::user()->update();

        if (isset($_COOKIE['coupon_code']) && Auth::user()->coupon_id == Null) {

            return redirect('/coupon?code=' . $_COOKIE['coupon_code'] );
        }

    	return redirect('/'.App()->getLocale().'/account');
        
    }

    public function indexLang ($locale) {

    	return view('account.index');
    }

    public function setting ($locale) {

    	return view('account.setting');
    }

    public function pending ($locale) {

        return view('account.pending');
    }
    public function invoices ($locale) {

        return view('account.invoices');
    }
    public function getAuthUser(){

		$this->user = Auth::guard('api')->user();

    }

    //referral
    public function couponCode(){

        return view('account.referral.promoteCode');
    }

    public function refundBlade(){

       return view('account.referral.refund');

    }

    public function recordBlade(){
        
       return view('account.referral.record');

    }

    public function getUserInfo(){

		$this->getAuthUser();

        $user = User::where('id',$this->user->id)->with('customers')->first();

		return response()->
			json([
			'user' => $user,
            'nullPassword' => $this->user->password == NULL?1:0,
		]);

    }

    public function getInvoices(){

        $this->getAuthUser();

        // dd($this->user->id);
    }

    public function userUpdate(Request $request){

    	$user = auth()->user();

    	// dd($request);

        $updateStatus = ['message'=>'password not correct'];
        $statusCode = 422;

    	$this->validate($request, [
    		'user.name' => 'required',
    		'user.email' => 'required | email'
    	]);

    	if ($user) {

            ['message'=>'update not success'];

            if (!empty($request->password['new']) ) {
                $user->password = Hash::make($request->password['new']);
            }
            $user->email = $request->user['email'];
            $user->name = $request->user['name'];

            // dd($request->user['customers']);

            if ( count($request->user['customers']) ) {
                $customer = $request->user['customers'][0];
                $user->customers()->update($customer);
            }

            $user->update();

            $updateStatus = ['saved' => true, 'message' => 'success'];
            $statusCode = 200;
    	}

        return response()
                ->json($updateStatus, $statusCode
                );
    }

    
}

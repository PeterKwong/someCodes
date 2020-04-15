<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookiesController extends Controller
{
    protected $sessionTime = 1;

    public function store(Request $request){

    	// dd($request->all());
    	$cookie = cookie('shoppingCart', json_encode($request->shoppingCart), $this->sessionTime);

    	// dd($cookie);
    	// $cookie = cookie('name', 'value', $this->sessionTime);


		return response()->json([
    			'shoppingCart' => $request->shoppingCart,
    		])->cookie($cookie);

    }


    public function index(){

    	$cookie = Cookie::get('shoppingCart');

    	if (!$cookie) {
    		$cookie = '{"items":[],"haveShoppingCart":0,"selectingIndex":0,"selectingType":""}';
    	}
    	// dd($cookie);

    	return response()->json([
    			'shoppingCart' => json_decode($cookie)
    		]);
    	
    }


}

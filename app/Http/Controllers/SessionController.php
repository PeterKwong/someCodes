<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	protected $sessionTime = 1;

    public function store(Request $request){

    	// $request->session()->regenerate();

    	// dd($request);

    	// $request->session()->put(['session' => 'hi']);

    	$cookie = cookie('name', 'value', $this->sessionTime);

		return response('Hello World')->cookie($cookie);

    	return session()->all();

    }


    public function index(){
    	
    	return session()->all();

    	return response()->json([
    		'model' => session()->get('session')
    	]);
    }


    public function setSession(){

		return request()->session(['test' => 'hi']);

    }
}

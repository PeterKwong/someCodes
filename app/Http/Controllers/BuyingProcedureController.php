<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyingProcedureController extends Controller
{


	public function BladeIndex ($locale) {

	    return view('fronend.buyingProcedure.index');
	}

    public function index(){
        $trans = trans('buyingProcedure');
        return response()
            ->json([
                'trans' => $trans
            ]);
    }

    public function appointment(){

    	
    	$trans = trans('buyingProcedure');

    	return response()
    			->json([
    			'trans' => $trans
    			]);
    }		
}

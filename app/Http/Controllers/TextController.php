<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextController extends Controller
{
    public function translateFetch(){

    	$words = [
    				'Accessory',
    				'Bracelet',
    				];

    	$translatedData ;
    	$originalLocale = app()->getLocale();

    	$locales = ['en','hk','cn'];


		foreach ($words as $keyJ => $word) {


			foreach ($locales as $keyI => $locale) {

	    		app()->setLocale($locale);
	    		$translatedData[$word][] =  __('api.' . $word) ;

	    	}
    	}



    	return response()->json([
    				$translatedData
    			]);
    }
    
}

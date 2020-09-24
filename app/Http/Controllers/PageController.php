<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function show($id)
    {
    	$page  = Page::findOrFail($id);

    	return response()
    		->json([
    			'page' =>$page,
    			]);
    }

    public function hca($locale){

	    return view('page.HCA');
    }

    public function characteristics($locale){

        return view('page.characteristics');
    }

    public function hkLabs($locale){

        return view('page.hkLabs');
    }

    public function sellYourDiamonds($locale){

        return view('page.sellYourDiamonds');

    }

}

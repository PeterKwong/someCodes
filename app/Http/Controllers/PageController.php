<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

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

	    return view('frontend.page.HCA');
    }

    public function characteristics($locale){

        return view('frontend.page.characteristics');
    }

    public function hkLabs($locale){

        return view('frontend.page.hkLabs');
    }

    public function sellYourDiamonds($locale){

        return view('frontend.page.sellYourDiamonds');

    }

}

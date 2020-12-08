<?php

namespace App\Http\Controllers;

use Illuminate\Cache\Cache;
use Illuminate\Http\Request;

class CacheController extends Controller
{
	public function index(){
		return view('backEnd.purchase.cache');
	}
}

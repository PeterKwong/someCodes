<?php

namespace App\Http\Controllers;

use App\InvPost;
use App\CustomerMoment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function authIndex()
    {
        return view('home');
    }

    public function index () {

        // App()->setLocale($locale);

        $customer_post = Cache::remember('home_page_customer_post', 10, function(){

            return  $customer_post = InvPost::where('published', 1)
                                    ->with(['images','texts'])->orderBy('date','desc')
                                    ->take(10)->get();

        });


        $jewellery = Cache::remember('home_page_jewellery', 10, function(){

            return  $jewellery = CustomerMoment::where('published',1)
                                ->orderBy('created_at','desc')->take(4)
                                ->with(['images','texts'])->get(); 

        });
        // dd($customer_post);     

        // dd(print_r($jewellery));
        return view('home.index', compact('customer_post','jewellery'));
        
    }

    public function indexLang ($locale) {

        // $redis = Redis::Connection();
        // $customer_post = InvPost::where('published',1)->with(['images','texts'])->orderBy('date','desc')->take(10)->get();
  

        $customer_post = Cache::remember('home_page_customer_post', 10, function(){

            return  $customer_post = InvPost::where('published', 1)
                                    ->with(['images','texts'])->orderBy('date','desc')
                                    ->take(10)->get();

        });


        $jewellery = Cache::remember('home_page_jewellery', 10, function(){

            return  $jewellery = CustomerMoment::where('published',1)
                                ->orderBy('created_at','desc')->take(4)
                                ->with(['images','texts'])->get(); 

        });
        
        // dd($jewellery);     


        return view('home.index', compact('customer_post','jewellery'));
    }
}

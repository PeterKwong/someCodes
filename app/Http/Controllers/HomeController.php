<?php

namespace App\Http\Controllers;

use App\Models\InvoicePost;
use App\Models\CustomerMoment;
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
        return view('frontend.home');
    }

    public function index () {

        return $this->home();
        
    }

    public function indexLang ($locale) {

        return $this->home();

        // $redis = Redis::Connection();
        // $customer_post = InvoicePost::where('published',1)->with(['images','texts'])->orderBy('date','desc')->take(10)->get();
  

    }

    public function home(){
        
        cache()->forget('home_page_customer_post');

        $customer_post = Cache::remember('home_page_customer_post', 10, function(){

            $customer_post = InvoicePost::where('published', 1)
                                    ->with(['images','texts'])->orderBy('date','desc')
                                    ->take(10)->get();
                                    // dd($customer_post);
                            $invoicePosts = [];
                                                                
                            foreach ($customer_post as $key => $post ) {
                                    $post['texts']['content'] = $post->title($post->id);
                                    $invoicePosts[] = $post;
            
                            }

            return  $invoicePosts;


        });
        cache()->forget('home_page_customerMoments');

        $customerMoments = Cache::remember('home_page_customerMoments', config('global.cache.day'), function(){

            return  $customerMoments = CustomerMoment::where('published',1)
                                ->orderBy('created_at','desc')->take(4)
                                ->with(['images','texts'])->get(); 

        });
        
        // dd($customerMoments);     


        return view('frontend.home.index', compact('customer_post','customerMoments'));

    }
}

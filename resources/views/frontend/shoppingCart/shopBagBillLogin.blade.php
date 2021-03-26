
@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('home.webTitle')}}</title>
        <meta name="description" content=" {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content=""> 


        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('home.webTitle')}}"> 
        <meta itemprop="description" content=" {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">


        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="" /> 
        
        <script src="https://checkout.stripe.com/checkout.js" defer></script>

 

    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-span-12">
                    <center><h3 class="text-lg font-semibold">{{__('shoppingCart.Secure Checkout')}}</h3>                        
                    </center>
                    
                </div>
            </div>


        <div>
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <br>

                      <div>
                        <ul class="grid grid-cols-12 px-4 text-center">
                          <li class="col-span-4 text-lg border bg-blue-400 text-white">
                            <a class="p-1" href="/{{app()->getLocale()}}/shop-bag-bill-login" >
                              <p>
                                <span>1. {{__('shoppingCart.Login') }}</span>
                                <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                <span v-if="form.onProgress.login">{{__('shoppingCart.Edit') }}</span>
                              </p>
                            </a>
                          </li>
                          <li class="col-span-4 text-lg border" class="">
                            <a class="p-1" href="/{{app()->getLocale()}}/shop-bag-bill-customer">
                              <p>
                                <span>2. {{__('shoppingCart.Info') }}</span>
                                <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                <span v-if="form.onProgress.customerInfo">{{__('shoppingCart.Edit') }}</span>
                              </p>
                            </a>
                          </li>
                          <li class="col-span-4 text-lg border" class="">
                            <a class="p-1" href="/{{app()->getLocale()}}/shop-bag-bill">
                              <p>
                                <span>3. {{__('shoppingCart.Review') }} </span>
                                <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                <span v-if="form.onProgress.peyment">{{__('shoppingCart.Edit') }}</span>
                              </p>
                            </a>
                          </li>
                        </ul>

                        <br>

                        <div>

                          @if(!auth()->user())                          
                            <div>
                                <div class="grid grid-cols-12 text-center">
                                    <div class="col-span-12 sm:col-span-5 sm:col-start-4">
                                        <div class="">
                                          @include('frontend.auth.lang.socialLogin')
                                        </div>

                                        <div class="col-span-12 p-8">
                                            <a href="/{{app()->getLocale()}}/login" class="btn btn-primary bg-green-400">{{__('shoppingCart.Create New Account/Login') }}</a>
                                        </div>                                        
                                    </div>
                                </div>                                
                            </div>
                          @endif

                          @if(auth()->user())
                            <div>

                                <div class="grid grid-cols-12 ">
                                    <div class="col-span-12 rounded border p-8 mx-8">
                                      <a href="/{{app()->getLocale()}}/shop-bag-bill-customer">

                                        <center>
                                            <p class="text-lg font-light btn btn-primary w-48">{{__('shoppingCart.You Logged in!') }}</p>
                                        </center>
                                      </a>
                                    </div>

                                </div>
                                
                            </div>
                          @endif


                      </div>





                      </div>



                    
                </div>
                
            </div>
            
        </div>

    @endSection





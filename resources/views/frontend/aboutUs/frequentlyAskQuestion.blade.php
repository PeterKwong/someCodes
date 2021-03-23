@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('buyingProcedure.metaTitle1')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('buyingProcedure.metaDescription1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('buyingProcedure.metaTitle1')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('buyingProcedure.metaDescription1')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('buyingProcedure.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('buyingProcedure.metaDescription1')}}" /> 
        <meta property="og:site_name" content="{{trans('buyingProcedure.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" /> 
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

 

    @endSection

    @section('content')
        <br>
            <div class="" >
                <div class="">
                    <center><h3 class="sm:text-lx font-semibold">{{trans('buyingProcedure.BUYING PROCEDURE')}}</h3>                 {{trans('buyingProcedure.First to buy diamonds, then buy ring setting')}}     
                    </center>
                    
                </div>
            </div>


        <div id="aboutUs">
          <div class="grid grid-cols-12">
            <div class="col-span-12 sm:col-span-10">
              <br>
                <div class="grid grid-cols-12">
                  <div class="col-span-12">
                    <ul class="flex justify-center items-center border-b" id="myTab" role="tablist">
                      <li class="">
                        <a class="text-blue-600 text-center px-2" href="{{ url( app()->getLocale() . '/buying-procedure' )}}" >{{trans('buyingProcedure.Appointment First')}}</a>
                      </li>
                      <li class="">
                        <a class="text-blue-600 text-center px-2" href="{{ url( app()->getLocale() . '/buying-procedure/take-from-shop-or-gia' )}}" >{{trans('buyingProcedure.Shop Or GIA Lab')}} </a>
                      </li> 
                      <li class="">
                        <a class="text-blue-600 text-center px-2" href="{{ url( app()->getLocale() . '/buying-procedure/custom-engagement-rings' )}}" >{{trans('buyingProcedure.Choose Ring Setting')}}</a>
                      </li>
                        <li class="">
                        <a class="text-blue-600 text-center px-2" href="{{ url( app()->getLocale() . '/buying-procedure/diamond-inlay-engrave' )}}">{{trans('buyingProcedure.Ring Inlay | Engrave')}}</a>
                      </li> 
                        <li class="">
                        <a class="nav-link bg-blue-300 text-white" href="{{ url( app()->getLocale() . '/buying-procedure/full-satisfaction' )}}" >{{trans('buyingProcedure.Pay With Satisfaction')}} </a>
                      </li>                
                    </ul>

                    <br>
                    
                    <div class="grid grid-cols-12" >
                        <div class="col-span-10">
                          <center>
                            <p class="sm:text-lx font-semibold">{{trans('buyingProcedure.Guarantee Satisfaction')}}</a></p>

                            <li>{{trans('buyingProcedure.para11')}}</li>
                            <li>{{trans('buyingProcedure.para11.1')}}</li>

                          </center>
                          
                              
                        </div>

                        <div class="col">
                             <center>
                            <p class="sm:text-lx font-semibold">{{trans('buyingProcedure.Guarantee Satisfaction')}}</p>
                            <figure class="image">
                                  <img class="img-fluid" src="/images/front-end/aboutUs/buyingProcedure/39940971-Zufriedenheitsgarantie-Stempel-Lizenzfreie-Bilder-300x300.jpg">
                              </figure>


                          </center>
                        </div>
                      </div>


              </div>
            
            <x-side-bar/>
            
          </div>      

        </div>
      </div>
    </div>

    @endSection




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
            <div class="row" >
                <div class="col-span-12">
                    <center><h3 class="sm:text-xl font-semibold">{{trans('buyingProcedure.BUYING PROCEDURE')}}</h3>                 {{trans('buyingProcedure.First to buy diamonds, then buy ring setting')}}     
                    </center>
                    
                </div>
            </div>


        <div id="aboutUs">
          <div class="grid grid-cols-12">
            <div class="col-span-12">
              
              <br>
              <div class="grid grid-cols-12">
                <div class="col-span-12 sm:col-span-10">                    
                  <ul class="flex justify-center items-center border-b" id="myTab" role="tablist">
                    <li class="">
                      <a class="nav-link bg-blue-300 text-white" href="{{ url( app()->getLocale() . '/buying-procedure' )}}" >{{trans('buyingProcedure.Appointment First')}}</a>
                    </li>
                    <li class="">
                      <a class="text-blue-600 text-center px-2" href="{{ url( app()->getLocale() . '/buying-procedure/custom-engagement-rings' )}}" >{{trans('buyingProcedure.Choose Ring Setting')}}</a>
                    </li>
                      <li class="">
                      <a class="text-blue-600 text-center px-2" href="{{ url( app()->getLocale() . '/buying-procedure/diamond-inlay-engrave' )}}">{{trans('buyingProcedure.Ring Inlay | Engrave')}}</a>
                    </li> 
                    <li class="">
                      <a class="text-blue-600 text-center px-2" href="{{ url( app()->getLocale() . '/buying-procedure/take-from-shop-or-gia' )}}" >{{trans('buyingProcedure.Shop Or GIA Lab')}} </a>
                    </li> 
                      <li class="">
                      <a class="text-blue-600 text-center px-2" href="{{ url( app()->getLocale() . '/buying-procedure/full-satisfaction' )}}" >{{trans('buyingProcedure.Pay With Satisfaction')}} </a>
                    </li>                
                  </ul>

                  <br>
                        
                  <div class="grid grid-cols-12" >
                    <div class="col-span-9 p-4">
                        <p class="sm:text-xl font-semibold">{{trans('buyingProcedure.title1')}}</p>
                        <p>{{trans('buyingProcedure.para1')}}</p>
                        <p class="text-gray-700">1. {{trans('buyingProcedure.para1.1')}}</p>
                        <p class="text-gray-700">2. {{trans('buyingProcedure.para1.2')}}</p>
                        <p class="text-gray-700">3. {{trans('buyingProcedure.para1.3')}}</p>
                    </div>
                    <div class="col-span-3 ">
                     <center>
                        <p class="sm:text-xl font-semibold">{{trans('buyingProcedure.title2')}}：</p>
                        <p class="sm:text-xl font-semibold">{{trans('buyingProcedure.title3')}}</p>
                        <a class="text-blue-600" 
                          href="{{url(app()->getLocale() . '/gia-loose-diamonds/on-stock') }}">{{trans('buyingProcedure.para2')}}</a>
                      </center>
                    </div>
                  </div>
                          
                  <div class="p-4" >
                    @include('layouts.components.contacts')
                  </div>

                </div>
              @include('layouts.components.sideBar')
            </div>      

        </div>
      </div>
    </div>

    @endSection




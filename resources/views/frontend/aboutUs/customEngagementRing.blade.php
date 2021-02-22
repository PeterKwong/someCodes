@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('buyingProcedure.metaTitle2')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('buyingProcedure.metaDescription2')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('buyingProcedure.metaTitle2')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('buyingProcedure.metaDescription2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('buyingProcedure.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('buyingProcedure.metaDescription2')}}" /> 
        <meta property="og:site_name" content="{{trans('buyingProcedure.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" /> 
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

 

    @endSection

    @section('content')
        <br>
            <div class="" >
                <div class="">
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
                      <a class="text-blue-600 text-center px-2" href="{{ url( app()->getLocale() . '/buying-procedure' )}}" >{{trans('buyingProcedure.Appointment First')}}</a>
                    </li>
                    <li class="">
                      <a class="nav-link bg-blue-300 text-white" href="{{ url( app()->getLocale() . '/buying-procedure/custom-engagement-rings' )}}" >{{trans('buyingProcedure.Choose Ring Setting')}}</a>
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

                  
                  <div class="grid grid-cols-12" v-if="activedSubTab=='Choose Ring Setting'|| activedSubTab=='custom-engagement-rings'">
                    <div class="col-span-12">
                      <div class="grid grid-cols-12 items-center p-2">
                          <div class="col-span-8 text-center">
                            <p class="sm:text-xl font-semibold">1. {{trans('buyingProcedure.Choose')}} <a class="sm:text-xl font-semibold text-blue-600" href="/{{  app()->getLocale() }}/engagement-rings">{{trans('buyingProcedure.On Stock Engagaement Ring')}}</a></p>

                            <p>{{trans('buyingProcedure.para5')}}</p>

                          </div>

                          <div class="col-span-4">
                            <img class="w-full" src="/images/front-end/aboutUs/buyingProcedure/IMG_0108_1-e1473742419200.jpg">
                          </div>
                      </div>
                      
                    </div>


                    <div class="col-span-12">
                      <div class="grid grid-cols-12 items-center p-2">
                        <div class="col-span-12 text-center">
                          <p class="sm:text-xl font-semibold">2. {{trans('buyingProcedure.title4')}}</p>
                          <li>{{trans('buyingProcedure.para6')}}</li>
                          <li>{{trans('buyingProcedure.para7')}}</li>
                          <p class="sm:text-xl font-semibold">{{trans('buyingProcedure.para7.1')}}</p>
                        </div>
                        <div class="col-span-6 text-center">
                          <img class="img-fluid" src="/images/front-end/aboutUs/buyingProcedure/WhatsApp-Image-2017-01-04-at-7.26.31-PM_1.jpg">
                        </div>
                        <div class="col-span-6 text-center">
                          <li>{{trans('buyingProcedure.para8')}}</li>
                          <img class="img-fluid" src="/images/front-end/aboutUs/buyingProcedure/0.7-626x453.jpg">
                        </div>
                      </div>
                    </div>
                  </div>

                           
              </div>
            @include('layouts.components.sideBar')
          </div>      

        </div>
      </div>
    </div>

    @endSection





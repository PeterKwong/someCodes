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
                <div class="col-12">
                    <center><h3 class="title is-5">{{trans('buyingProcedure.BUYING PROCEDURE')}}</h3>                 {{trans('buyingProcedure.First to buy diamonds, then buy ring setting')}}     
                    </center>
                    
                </div>
            </div>


        <div id="aboutUs">
          <div class="row justify-content-center">
            <div class="col-11">
              
              <br>
              <div class="row justify-content-center">
                <div class="col">                    
                  <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link  active show" href="{{ url( app()->getLocale() . '/buying-procedure' )}}" >{{trans('buyingProcedure.Appointment First')}}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url( app()->getLocale() . '/buying-procedure/take-from-shop-or-gia' )}}" >{{trans('buyingProcedure.Shop Or GIA Lab')}} </a>
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url( app()->getLocale() . '/buying-procedure/custom-engagement-rings' )}}" >{{trans('buyingProcedure.Choose Ring Setting')}}</a>
                    </li>
                      <li class="nav-item">
                      <a class="nav-link" href="{{ url( app()->getLocale() . '/buying-procedure/diamond-inlay-engrave' )}}">{{trans('buyingProcedure.Ring Inlay | Engrave')}}</a>
                    </li> 
                      <li class="nav-item">
                      <a class="nav-link" href="{{ url( app()->getLocale() . '/buying-procedure/full-satisfaction' )}}" >{{trans('buyingProcedure.Pay With Satisfaction')}} </a>
                    </li>                
                  </ul>

                  <br>
                        
                  <div class="row justify-content-center" >
                    <div class="col-sm-9">
                      <center>
                        <p class="title is-5">{{trans('buyingProcedure.title1')}}</p>
                        <p>{{trans('buyingProcedure.para1')}}</p>
                        <p>{{trans('buyingProcedure.para1.1')}}</p>
                        <p>{{trans('buyingProcedure.para1.2')}}</p>
                        <p>{{trans('buyingProcedure.para1.3')}}</p>
                      </center>
                    </div>
                    <div class="col ">
                     <center>
                        <p class="title is-5">{{trans('buyingProcedure.title2')}}：</p>
                        <p class="title is-6">{{trans('buyingProcedure.title3')}}</p>
                        <p >{{trans('buyingProcedure.para2')}}</p>
                      </center>
                    </div>
                  </div>
                          
                  <div class="row justify-content-center" >
                    @include('layouts.components.contacts')
                  </div>

                </div>
              @include('layouts.components.sideBar')
            </div>      

        </div>
      </div>
    </div>

    @endSection




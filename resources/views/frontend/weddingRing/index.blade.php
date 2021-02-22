@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('weddingRing.metaTitle2')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('weddingRing.metaDescription2')}} - {{trans('home.meta2')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('weddingRing.metaTitle2')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('weddingRing.metaDescription2')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('weddingRing.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('weddingRing.metaDescription2')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('weddingRing.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

 
 

    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-12">
                    <center><h3 class="text-2xl">{{trans('weddingRing.metaTitle2')}}</h3>                        
                    </center>
                    
                </div>
            </div>


        <div id="weddingRings">
            <div class="row justify-content-center">
                <div class="col-11">
                    <br>

                    @include('frontend.weddingRing.weddingRingContent')
                    
                </div>
                
            </div>
            
        </div>

    @endSection




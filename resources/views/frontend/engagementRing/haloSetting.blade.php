@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('engagementRing.metaTitle1')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content="{{trans('engagementRing.halo')}}"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('engagementRing.metaTitle1')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}"> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('engagementRing.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('engagementRing.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

 

    @endSection


    @section('hero')
        <!-- Hero Section  -->
        <div class="hero-image flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
            <center>
                <h2 class="text-lg xl:text-2xl font-medium font-suranna tracking-widest uppercase">
                    {{trans('engagementRing.metaTitle2')}}
                </h2>
                <h5>{{trans('engagementRing.metaTitle1')}}</h5>                     
            </center>
        </div>
        
    @endsection

    @section('content')

        @include('frontend.engagementRing.engagementRingContent')


    @endSection

 <!--    @section('content')
        <br>
            <div class="row" >
                <div class="col-12">
                    <center><h1 class="title is-5">{{trans('engagementRing.metaTitle2')}}</h1> 
                                <h5>{{trans('engagementRing.metaTitle1')}}</h5>                     
                    </center>
                    
                </div>
            </div>


        <div id="engagementRings">
            <div class="row justify-content-center">
                <div class="col-11">
                    <br>

                    @include('frontend.engagementRing.engagementRingContent')
                    
                </div>
                
            </div>
            
        </div>

    @endSection


 -->
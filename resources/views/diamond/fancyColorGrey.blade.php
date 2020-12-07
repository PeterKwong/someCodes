@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('diamond.metaTitle6')}}  {{trans('diamondSearch.Search')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('diamond.metaDescription6')}}  {{trans('diamondSearch.Search')}} - {{trans('home.meta2')}}" />
        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('diamond.metaTitle6')}}  {{trans('diamondSearch.Search')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('diamond.metaDescription6')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('diamond.metaTitle6')}}  {{trans('diamondSearch.Search')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('diamond.metaDescription6')}}  {{trans('diamondSearch.Search')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('diamond.metaTitle6')}}  {{trans('diamondSearch.Search')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

        @include('diamond.head')

    @endSection

    @section('content')
    
        <div class="flex" >
            <div class="flex-auto">

                <div class="relative">
                    <a class="absolute m-1 sm:m-8" href="{{url(app()->getLocale())}}/gia-loose-diamonds" >{{trans('diamondSearch.Diamond')}} > {{trans('diamondSearch.Diamond Price')}}</a>
                    <img class="object-contain w-full" src="{{url('images/front-end/diamond/search/frame.png')}}">
                </div>

                <div class="">
                  <div class="w-5/6 sm:w-4/6 p-2" style="
                        background-image:url(/images/front-end/diamond/search/grad.png);
                        background-repeat-x: repeat;
                        background-size:100%;
                        font-size:24px;
                        color:#fff;">
                    <span><b class="text-base sm:text-2xl">{{trans('diamond.metaTitle6')}} {{trans('diamondSearch.Search')}}</b>
                    </span>&nbsp;&nbsp;<br class=""> 
                    <span class="text-base">
                    {{__('diamondSearch.0.30- 20 Diamond ( Carat )')}}</span>
                  </div>
                </div>
                
            </div>
        </div>


        <div id="diamondViewerIndex">
            <div class="">
                <div class="">

                    @include('diamond.diamondContent')            
                    
                    
                </div>
                
            </div>
            
        </div>

    @endSection

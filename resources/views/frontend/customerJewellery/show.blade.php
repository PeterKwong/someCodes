@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{$meta}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{$meta}} - {{trans('customerMoment.metaDescription1')}}" />
        <meta itemprop="keywords" content="{{$meta}}"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{$meta}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('customerMoment.metaDescription1')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{$meta}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{$meta}} - {{trans('customerMoment.metaDescription1')}}" /> 
        <meta property="og:site_name" content="{{$meta}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{$meta}}" /> 
 

    @endSection

    @section('hero')
        <!-- Hero Section  -->
        <div class="relative z-10 hero-image customer-jewellery flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
            <h2 class="text-sm md:text-xl font-medium font-suranna tracking-widest uppercase p-8">
                {{$meta}}
            </h2>

        </div>
    @endsection

    @section('content')

        @livewire('customer-jewellery.show')

    @endSection




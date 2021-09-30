@extends('layouts.section.frontend')

    @section('meta')
    
        <!-- Place this data between the <head> tags of your website --> 
        <title>{{__('customerMoment.metaTitle1')}} - {{__('home.webTitle')}}</title>
        <meta name="description" content="{{__('customerMoment.metaDescription1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{__('customerMoment.metaTitle1')}} - {{__('home.webTitle')}}"> 
        <meta itemprop="description" content="{{__('customerMoment.metaDescription1')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{__('customerMoment.metaTitle1')}} - {{__('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{__('customerMoment.metaDescription1')}}" /> 
        <meta property="og:site_name" content="{{__('customerMoment.metaTitle1')}} - {{__('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{__('tag.Diamond')}},{{__('tag.Diamond Ring')}}" /> 

 

    @endSection

    @section('hero')
        <!-- Hero Section  -->
        <div class="relative z-10 hero-image customer-jewellery flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
            <h2 class="text-sm md:text-xl font-medium font-suranna tracking-widest uppercase p-8">
                {{__('customerJewellery.Customer Jewellery')}}
            </h2>

        </div>
    @endsection

    @section('content')
        
        @livewire('customer-jewellery.post-fetch')

    @endSection








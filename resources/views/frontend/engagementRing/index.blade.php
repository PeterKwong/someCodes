@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('engagementRing.metaTitle2')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('engagementRing.metaDescription2')}} - {{trans('home.meta2')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('engagementRing.metaTitle2')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('engagementRing.metaDescription2')}} - {{trans('home.meta2')}}"> 
        <meta itemprop="image" content="{{url('/front_end/home/h1_300-1.png')}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('engagementRing.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url('/')}}" />
        <meta property="og:image" content="{{url('/front_end/home/h1_300-1.png')}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription2')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('engagementRing.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 


    @endSection



    @section('hero')
        <!-- Hero Section  -->
        <div class="hero-image flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
            <h2 class="text-lg xl:text-2xl font-medium font-suranna tracking-widest uppercase">
                {{trans('engagementRing.metaTitle2')}}
            </h2>
        </div>
        
    @endsection

    @section('content')

        @include('frontend.engagementRing.engagementRingContent')


    @endSection

   
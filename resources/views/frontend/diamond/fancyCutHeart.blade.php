@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('diamond.metaTitle15')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('diamond.metaDescription15')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('diamond.metaTitle15')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('diamond.metaDescription15')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('diamond.metaTitle15')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('diamond.metaDescription15')}}" /> 
        <meta property="og:site_name" content="{{trans('diamond.metaTitle15')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

 
         @include('frontend.diamond.head')


    @endSection

    @section('hero')

        <x-diamond.hero>{{trans('diamond.metaTitle15')}}</x-diamond.hero>
   
        
    @endsection

    @section('content')


        @include('frontend.diamond.diamondContent')            


    @endSection
    

    
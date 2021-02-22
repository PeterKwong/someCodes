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

    @section('content')
        <br>
            <div class="flex justify-center" >
                <div class="">
                    <center><h3 class="sm:text-2xl">{{trans('engagementRing.metaTitle2')}}</h3>                        
                    </center>
                    
                </div>
            </div>


        <div id="engagementRings">
            <div class="block justify-center">
                <div class="">
                    <br>

                    @include('frontend.engagementRing.engagementRingContent')
                    
                </div>
                
            </div>
            
        </div>

    @endSection




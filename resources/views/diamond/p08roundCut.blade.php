@extends('layouts.section.frontend')

    @section('meta')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('diamond.metaTitle23')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('diamond.metaDescription23')}} - {{trans('home.meta2')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('diamond.metaTitle23')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('diamond.metaDescription23')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('diamond.metaTitle23')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('diamond.metaDescription23')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('diamond.metaTitle23')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

         @include('diamond.head')


    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-12">

                    <div class="section-1">
                      <div class="container-fluid">
                        <div class="row">
                            <p class="frame-para">{{trans('diamondSearch.Diamond')}} > {{trans('diamondSearch.Diamond Price')}}</p>
                            <img class="w-100" src="{{url('images/front-end/diamond/search/frame.png')}}">
                        </div>
                      </div>
                    </div>

                    <div class="section-2">
                      <div class="grad-div">
                        <span><b>{{trans('diamondSearch.Diamond Price')}}</b></span>&nbsp;&nbsp;<br class="d-none d-sm-block d-md-none d-block d-sm-none"> <span>{{trans('diamond.metaTitle23')}}</span>
                      </div>
                    </div>
                    
                </div>
            </div>


        <div id="diamondViewerIndex">
            <div class="row justify-content-center">
                <div class="col-11">
                    <br>

                    @include('diamond.diamondContent')            
                    
                </div>
                
            </div>
            
        </div>

    @endSection



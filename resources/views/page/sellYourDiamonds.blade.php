@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('page.Hong Kong Sell Your Diamond Price')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('page.Hong Kong Sell Your Diamond Price')}} - {{trans('home.meta2')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('page.Hong Kong Sell Your Diamond Price')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('page.Hong Kong Sell Your Diamond Price')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('page.Hong Kong Sell Your Diamond Price')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('page.Hong Kong Sell Your Diamond Price')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('page.Hong Kong Sell Your Diamond Price')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 
 

    @endSection

    @section('content')
        <br>


        <div id="home" class="p-4">
                       
                <h1 class="text-2xl text-center">{{__('page.How to deal with some unwanted diamond jewelry')}}?</h1>
                <h3>{{__('page.For some old-fashioned and broken diamond jewelry, it’s pity to leave them idle or throw them away. What about transforming them into new one or something valuable')}}?</h3>
                <h3>{{__('page.Method')}} 1 : </h3>
                <p>{{__('page.If the classic style jewelry looks unattractive just because of fading coating and scratches, it simply costs you few hundred HK dollars to renew them by polishing and coating.')}}
                </p>

                <h3>{{__('page.Method')}} 2 : </h3>
                <p>{{__('page.Some jewelry setting may be out-of-fashion or deformed, you can have a new ring, pendant, earring or bracelet by buying a new trendy setting or even tailor made a unique style for yourself.')}}
                </p>

                <h3>{{__('page.Method')}} 3 : </h3>
                <p>{{__('page.In case you think it’s time to say good bye to the old diamond, you can sell your diamond to jeweler or even upgrade your diamond. Ting Diamond provides free professional diamond valuation, you may contact us for more details.')}}
                </p>

                <h2>{{__('page.Diamond Resell Procedures')}} : </h2>

                <h2>{{__('page.Requirement')}} : </h2>
                <p>{{__('page.The diamond must be in its original condition with original diamond grading report.')}} </p>
                <p>{{__('page.Any damage to the original diamond will not be accepted.')}} </p>
                <p>{{__('page.If 1ct or above diamond is without any certification, we will purchase your diamond on the condition customer is willing to apply for certification in GIA Lab.')}} </p>
                <p>{{__('page.Ting Diamond Limited reserve the right to interpret these Terms of Use and decide on any questions or disputes arising under these Terms of Use.')}} </p>
                <p>{{__('page.Method')}} </p>
                <p>{{__('page.Method')}} </p>
                <p>{{__('page.Method')}} </p>


        </div>

            
    </div>

    @endSection





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
                       
                <h1 class="text-2xl text-center">{{__('page.How to deal with some unwanted diamond jewelry')}} || {{trans('page.Hong Kong Sell Your Diamond Price')}}</h1>
                <h3 class="p-2 text-xl text-gray-800 text-center">{{__('page.For some old-fashioned and broken diamond jewelry, it’s pity to leave them idle or throw them away. What about transforming them into new one or something valuable')}}！</h3>

                <div class="p-4">
                    <h3 class="p-4 text-xl text-gray-800">{{__('page.Method')}} 1 : </h3>
                    <p class="text-base text-gray-600">{{__('page.If the classic style jewelry looks unattractive just because of fading coating and scratches, it simply costs you few hundred HK dollars to renew them by polishing and coating.')}}
                    </p>

                    <h3 class="p-4 text-xl text-gray-800">{{__('page.Method')}} 2 : </h3>
                    <p class="text-base text-gray-600">{{__('page.Some jewelry setting may be out-of-fashion or deformed, you can have a new ring, pendant, earring or bracelet by buying a new trendy setting or even tailor made a unique style for yourself.')}}
                    </p>
                    <img src="/images/front-end/sell_your_diamonds/broken ring.jpg">

                    <h3 class="p-4 text-xl text-gray-800">{{__('page.Method')}} 3 : </h3>
<!--                     <a href="{{ '/links/whatsapp/852' .  config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') . '?text=' . urlencode( url()->current() ) }} "  class="text-base text-blue-600 hover:text-blue-800">
 -->                        {{__('page.In case you think it’s time to say good bye to the old diamond, you can sell your diamond to jeweler or even upgrade your diamond. Ting Diamond provides free professional diamond valuation, you may contact us for more details.')}}
<!--                     </a>
 -->
                </div>

                <div class="p-8">
                    <h2 class="p-2 text-xl text-gray-900">{{__('page.Diamond Resell Procedures')}} : </h2>

                    <div class="grid grid-cols-12">
                        <div class="box p-2 col-span-12 sm:col-span-4">
                            <div class="bg-rose-300 ...">
                              <img class="object-cover h-64 w-full" src="/images/front-end/sell_your_diamonds/diamond cert.jpg">
                            </div>
                            <h2 class="p-2 text-xl text-gray-900">1. {{__('page.With GIA Certificate')}}</h2>
                            <p class="text-base text-gray-600">．{{__('page.Loose diamond or diamond jewelry.')}}</p>
                        </div>
                        <div class="box p-2 col-span-12 sm:col-span-4">
                            <div class="bg-rose-300 ...">
                              <img class="object-cover h-64 w-full" src="/images/front-end/sell_your_diamonds/diamond quote.jpg">
                            </div>                            
                            <h2 class="p-2 text-xl text-gray-900">2. {{__('page.Valuation based on 4C info')}}</h2>
                            <p class="text-base text-gray-600">．{{__('page.Inclusion plot, fluorescence effect will also affect the value.')}}</p>
                            <p class="text-base text-gray-600">．{{__('page.Magnified diamond photo would help valuation.')}}</p>
                        </div>
                        <div class="box p-2 col-span-12 sm:col-span-4">
                            <div class="bg-rose-300 ...">
                              <img class="object-cover h-64 w-full" src="/images/front-end/sell_your_diamonds/money HKD.jpg">
                            </div>
                            <h2 class="p-2 text-xl text-gray-900">3. {{__('page.Close the deal')}}</h2>
                            <p class="text-base text-gray-600">．{{__('page.For high clarity e.g. VS2 or above, GIA verification is required. The verification fee will be paid by us if the result is consistent with the GIA report.')}}</p>
                            <p class="text-base text-gray-600">．{{__('page.Cash Payment')}}</p>
                            
                        </div>
                    </div>
                   
                </div>
                

                

                <div class="p-12">
                    
                    <h2 class="p-2 text-xl text-gray-900">{{__('page.Requirement')}} : </h2>
                    <p class="text-base text-gray-600"> ． {{__('page.The diamond must be in its original condition with original diamond grading report.')}} </p>
                    <p class="text-base text-gray-600"> ． {{__('page.Any damage to the original diamond will not be accepted.')}} </p>
                    <p class="text-base text-gray-600"> ． {{__('page.If 1ct or above diamond is without any certification, we will purchase your diamond on the condition customer is willing to apply for certification in GIA Lab.')}} </p>
                    <p class="text-base text-gray-600"> ． {{__('page.Ting Diamond Limited reserve the right to interpret these Terms of Use and decide on any questions or disputes arising under these Terms of Use.')}} </p>

                    <div class="flex">
                      @if(config('global.locale.' . app()->getLocale())  != '2')
                        <a target="_blank" class="text-blue-600 hover:text-blue-800" href="{{ '/links/whatsapp/852' .  config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') . '?text=' . urlencode( url()->current() ) }} " >
                            <p><img class="h-4" src="/images/front-end/diamond/search/whatsapp.png" alt="">    
                                    ( {{ config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.name') }} :  {{ config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') }} ) 

                            </p>
                        </a>
                      @endif

                      @if(config('global.locale.' . app()->getLocale())  == '2')

                      <p >          
                          <img width="100" src="/images/front-end/aboutUs/wechat.jpg">
                      </p>

                      @endif

                    </div>


                </div>



        </div>

            
    </div>

    @endSection





@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('frontend.jewellery.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('frontend.jewellery.meta') {{trans('jewellery.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="@include('frontend.jewellery.keywords')"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('frontend.jewellery.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('frontend.jewellery.meta') {{trans('jewellery.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{ config('global.CF_s3') }}{{'public/images/'. $meta->images[0]->image }}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('frontend.jewellery.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="@include('frontend.jewellery.meta') {{trans('jewellery.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('frontend.jewellery.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('frontend.jewellery.keywords')" /> 


        <script type="application/ld+json" defer="">

                {

                 "@context":"https://schema.org",

                 "@type":"Product",

                 "productID": "{{ $meta->stock }}" ,

                 "name": "{{ $meta->texts[0]->content }}" ,

                 "description": "{{ $meta->texts[0]->content }}",

                 "url": "{{ url()->current() }}" ,

                 "image": "{{ config('global.CF_s3') }}{{'public/images/'. $meta->images[0]->image }}" ,

                 "brand":"Ting Diamond Limited",

                 "offers":[

                 {

                 "@type":"Offer",

                 "price": {{ $meta->unit_price }} ,

                 "priceCurrency":"HKD",

                 "itemCondition":"https://schema.org/NewCondition",

                 "availability":"https://schema.org/InStock"

                 }

                 ]

                }
         </script>


    @endSection

    @section('content')
        <br>



        <div id="jewellery">
            <div class="row justify-center">
                <div class="col-span-11">

                    <div class="flex justify-center p-4" >
                        <div class="">
                            <h3 class="sm:text-2xl">@{{jewellery.metal | transJs(langs,locale)}} @{{jewellery.gemstone==0?'': jewellery.gemstone | transJs(langs,locale)}} @{{jewellery.type | transJs(langs,locale)}} @{{jewellery.setting==0?'': 'setting' | transJs(langs,locale)}}</h3>        
                        </div>
                    </div>

                    <div class="grid grid-cols-12 p-2">

                    <div class="col-span-12 sm:col-span-7">
                            <div class=" box">
                                    <figure class="image" @click="carouselState=!carouselState">
                                    <keep-alive>
                                    <carousel @active="carouselState=!carouselState" :active="carouselState" :height="'500'" :width="'100%'" :upperitems="jewellery" :items="customerItems" title="customer jewellries"></carousel></keep-alive>
                                    </figure>
                            </div>
                        </div>


                    <div class="col-span-12 sm:col-span-5">
                        <div class="p-4 box">
                            
                            <div class="">
                            <article>
                                <center>
<!--                                     <button class="btn btn-primary" @click="appointmentState=!appointmentState">{{__('jewellery.Appointment')}}</button>
 -->                                    
                                    <appointment v-model="jewellery" :title="appointmentTitle" @active="appointmentState=!appointmentState" :active="appointmentState" :columns="columns"  :processing="false" :langs="langs" :locale="locale"></appointment>
                                    
                                </center>
                                <br>
                                <p>
                                {{trans('jewellery.For more detailed information')}}, 
                                <br>
                                <a @click="appointmentState=!appointmentState">{{trans('jewellery.Make Appointment')}}</a> or <a :href="hrefLangs + '/about-us'">{{trans('jewellery.contact us')}}</a> {{trans('jewellery.for further')}}：
                                </p>
                            </article>
                            </div>
                            
                            <article class="">

                                    <div class="grid grid-cols-12 border-b p-2 font-semibold sm:text-lg">
                                        <div class="col-span-6">{{__('jewellery.Jewellery Info')}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b p-2 font-light">
                                        <div class="col-span-6">{{__('jewellery.Unit Price')}}</div>
                                        <div class="col-span-6">$@{{jewellery.unit_price }}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b p-2 font-light">
                                        <div class="col-span-6">{{__('jewellery.Type')}}</div>
                                        <div class="col-span-6">@{{jewellery.type | transJs(langs,locale)}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b p-2 font-light">
                                        <div class="col-span-6">{{__('jewellery.Gemstone')}}</div>
                                        <div class="col-span-6">@{{jewellery.gemstone | transJs(langs,locale)}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b p-2 font-light">
                                        <div class="col-span-6">{{__('jewellery.Metal')}}</div>
                                        <div class="col-span-6">@{{jewellery.metal | transJs(langs,locale)}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b p-2 font-light">
                                        <div class="col-span-6">{{__('jewellery.Side Stone')}}</div>
                                        <div class="col-span-6">{{__('engagementRing.Around')}} @{{jewellery.ct}} {{trans('jewellery.ct')}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b p-2 font-semibold sm:text-lg">
                                        <div class="col-span-6">{{__('jewellery.More Details')}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b p-2 font-light">
                                        <div class="col-span-6">{{__('jewellery.Stock')}}</div>
                                        <div class="col-span-6">@{{jewellery.stock}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b p-2 font-light">
                                        <div class="col-span-6">{{__('jewellery.Name')}}</div>
                                        <div class="col-span-6" v-if="jewellery.texts">@{{jewellery.texts[locale].content}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b p-2 font-light">
                                        <div class="col-span-6">{{__('jewellery.Description')}}</div>
                                        <div class="col-span-6">@{{jewellery.type | transJs(langs,locale)}} @{{jewellery.metal | transJs(langs,locale)}} @{{jewellery.setting==0?'': 'setting' | transJs(langs,locale)}}</div>
                                    </div>
                           
                            </article>

                            
                        </div>
                    </div>


                </div>
                
            </div>
            
        </div>

    @endSection




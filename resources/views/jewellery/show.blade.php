@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('jewellery.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('jewellery.meta') {{trans('jewellery.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="@include('jewellery.keywords')"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('jewellery.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('jewellery.meta') {{trans('jewellery.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{ config('global.CF_s3') }}{{'public/images/'. $meta->images[0]->image }}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('jewellery.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="@include('jewellery.meta') {{trans('jewellery.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('jewellery.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('jewellery.keywords')" /> 


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
            <div class="row justify-content-center">
                <div class="col-11">

                    <div class="row justify-content-center" >
                        <div class="col-9">
                            <h3 class="text-center">@{{jewellery.metal | transJs(langs,locale)}} @{{jewellery.gemstone==0?'': jewellery.gemstone | transJs(langs,locale)}} @{{jewellery.type | transJs(langs,locale)}} @{{jewellery.setting==0?'': 'setting' | transJs(langs,locale)}}</h3>        
                        </div>
                    </div>

                    <div class="row">

                    <div class="col-md-7">
                            <div class="tile is-child box">
                                    <figure class="image" @click="carouselState=!carouselState">
                                    <keep-alive>
                                    <carousel @active="carouselState=!carouselState" :active="carouselState" :height="'500'" :width="'100%'" :upperitems="jewellery" :items="customerItems" title="customer jewellries"></carousel></keep-alive>
                                    </figure>
                            </div>
                        </div>


                    <div class="col-md-5">
                        <div class="tile is-child box">
                            
                            <div class="tile is-child">
                            <article>
                                <center>
                                    <button class="btn btn-primary" @click="appointmentState=!appointmentState">{{__('jewellery.Appointment')}}</button>
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
                            
                            <article>

                                <table class="table is-striped is-fullwidth">
                                <thead>
                                    <tr><th>{{__('jewellery.Jewellery Info')}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr><td>{{__('jewellery.Unit Price')}}</td><td>$@{{jewellery.unit_price }}</td></tr>
                                    <tr><td>{{__('jewellery.Type')}}</td><td>@{{jewellery.type | transJs(langs,locale)}}</td></tr>
                                    <tr><td>{{__('jewellery.Gemstone')}}</td><td>@{{jewellery.gemstone | transJs(langs,locale)}}</td></tr>
                                    <tr><td>{{__('jewellery.Metal')}}</td><td>@{{jewellery.metal | transJs(langs,locale)}}</td></tr>
                                    <tr><td>{{__('jewellery.Side Stone')}}</td><td>{{__('engagementRing.Around')}} @{{jewellery.ct}} {{trans('jewellery.ct')}}</td></tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th>{{__('jewellery.More Details')}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr><td>{{__('jewellery.Stock')}}</td><td>@{{jewellery.stock}}</td></tr>
                                    <tr><td>{{__('jewellery.Name')}}</td><td v-if="jewellery.texts">@{{jewellery.texts[locale].content}}</td></tr>
                                    <tr><td>{{__('jewellery.Description')}}</td><td>@{{jewellery.type | transJs(langs,locale)}} @{{jewellery.metal | transJs(langs,locale)}} @{{jewellery.setting==0?'': 'setting' | transJs(langs,locale)}}</td></tr>
                                </tbody>

                                </table>
                           
                            </article>

                            
                        </div>
                    </div>


                </div>
                
            </div>
            
        </div>

    @endSection




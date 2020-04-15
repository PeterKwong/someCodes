
@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('weddingRing.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('weddingRing.meta') {{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="@include('weddingRing.keywords')"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('weddingRing.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('weddingRing.meta') {{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{ config('global.CF_s3') }}{{'public/images/'. $meta->images[0]->image }}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('weddingRing.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="@include('weddingRing.meta'){{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('weddingRing.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('weddingRing.keywords')" /> 

        <script type="application/ld+json" defer="">

            {

             "@context":"https://schema.org",

             "@type":"Product",

             "productID": "{{ $meta->stock }}" ,

             "name": "{{ $meta->texts[0]->content }}" ,

             "description": "{{ $meta->texts[0]->content }} {{trans('engagementRing.setting')}}" ,

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
        <div id="weddingRingsShow">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                                <h3 class="text-center">
                                @{{weddingRing.wedding_rings[0].style | transJs(langs,locale)}} @{{weddingRing.wedding_rings[0].metal | transJs(langs,locale)}} @{{weddingRing.wedding_rings[0].sideStone? transJsMet(columns[2],langs,locale):''}} 
                                {{trans('weddingRing.Wedding Ring')}}
                                </h3>
                        </div>       
                    </div>


                    <div class="row justify-content-center">

                        <div class="col-md-7">
                                <div class="tile is-child">
                                        <figure class="image box" @click="carouselState=!carouselState">
                                        <carousel @active="carouselState=!carouselState" :active="carouselState"  :height="'500'" :width="'100%'" :upperitems="combinedUpperWeddingRings" :items="combinedLowerWeddingRings" title="customer jewellries"></carousel>
                                        </figure>
                                </div>
                            </div>


                        <div class="col-md-5 box">
                            <div class="tile is-child">

                                <div class="tile is-child">
                                <article>
                                    <center>
                                        <button class="btn btn-primary" @click="appointmentState=!appointmentState">{{trans('weddingRing.Appointment')}}</button>
                                        <appointment v-model="weddingRing.wedding_rings[0]" :title="appointmentTitle" @active="appointmentState=!appointmentState" :active="appointmentState" :columns="columns"  :processing="false" :langs="langs" :locale="locale"></appointment>
                                    </center>
                                    <br>
                                    <p>
                                    {{trans('engagementRing.For more detailed information')}}, 
                                    <br>
                                    <a @click="appointmentState=!appointmentState">{{trans('engagementRing.Make Appointment')}}</a> or <a :href="hrefLangs + '/about-us'">{{trans('engagementRing.contact us')}}</a> {{trans('engagementRing.for further')}}：
                                </article>
                                </div>
                                <article>
                                    <table class="table is-striped is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>{{trans('weddingRing.Wedding Rings Info')}}</th><th v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[0].gender | transJs(langs,locale)}}</th><th v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[1].gender | transJs(langs,locale)}}</th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody>
                                        <tr><td>{{trans('weddingRing.Unit Price')}}</td><td>$@{{weddingRing.wedding_rings[0].unit_price}}</td><td v-if="weddingRing.wedding_rings[1]">$@{{weddingRing.wedding_rings[1].unit_price}}</td></tr>
                                        <tr><td>{{trans('weddingRing.Metal')}}</td><td>@{{weddingRing.wedding_rings[0].metal | transJs(langs,locale)}}</td><td v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[1].metal | transJs(langs,locale)}}</td></tr>
                                        <tr><td>{{trans('weddingRing.Side Stone')}}</td><td>{{__('engagementRing.Around')}} @{{weddingRing.wedding_rings[0].ct}}ct</td><td v-if="weddingRing.wedding_rings[1]">{{__('engagementRing.Around')}} @{{weddingRing.wedding_rings[1].ct}}ct</td></tr>
                                    </tbody>

                                    <thead>
                                        <tr>
                                            <th colspan="3">{{trans('weddingRing.More Details')}}</th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody>
                                        <tr><td>{{trans('weddingRing.Stock')}}</td><td>@{{weddingRing.wedding_rings[0].stock}}</td><td v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[1].stock}}</td></tr>
                                        <tr><td>{{trans('weddingRing.Name')}}</td><td>@{{weddingRing.wedding_rings[0].name}}</td><td v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[1].name}}</td></tr>

                                        <tr><td>{{trans('weddingRing.Description')}}</td><td>@{{weddingRing.wedding_rings[0].style | transJs(langs,locale)}},@{{weddingRing.wedding_rings[0].metal | transJs(langs,locale)}},@{{weddingRing.wedding_rings[0].sideStone? transJsMet(columns[2],langs,locale):''}}
                                        {{trans('weddingRing.Wedding Ring')}}

                                        </td><td v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[1].style | transJs(langs,locale)}},@{{weddingRing.wedding_rings[1].metal | transJs(langs,locale)}},@{{weddingRing.wedding_rings[1].sideStone? transJsMet(columns[2],langs,locale):''}}
                                        {{trans('weddingRing.Wedding Ring')}}
                                        </td></tr>
                                    </tbody>

                                    </table>
                                </article>

                                
                            </div>
                        </div>

                        
                      

                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

    @endSection


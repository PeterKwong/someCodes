
@extends('layouts.section.frontendWithoutLW')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('frontend.weddingRing.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('frontend.weddingRing.meta') {{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="@include('frontend.weddingRing.keywords')"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('frontend.weddingRing.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('frontend.weddingRing.meta') {{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{ config('global.CF_s3') }}{{'public/images/'. $meta->images[0]->image }}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('frontend.weddingRing.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="@include('frontend.weddingRing.meta'){{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('frontend.weddingRing.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('frontend.weddingRing.keywords')" /> 

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
            <div class="flex justify-center">
                <div class="flex-auto">
                    <div class="flex justify-center p-4">
                        <div class="col-span-9">
                                <h3 class="text-center sm:text-2xl">
                                @{{weddingRing.wedding_rings[0].style | transJs(langs,locale)}} @{{weddingRing.wedding_rings[0].metal | transJs(langs,locale)}} @{{weddingRing.wedding_rings[0].sideStone? transJsMet(columns[2],langs,locale):''}} 
                                {{trans('weddingRing.Wedding Ring')}}
                                </h3>
                        </div>       
                    </div>


                    <div class="grid grid-cols-12 ">

                        <div class="col-span-12 sm:col-span-7">
                                <div class="tile is-child">
                                        <figure class="image box" @click="carouselState=!carouselState">
                                        <carousel @active="carouselState=!carouselState" :active="carouselState"  :height="'500'" :width="'100%'" :upperitems="combinedUpperWeddingRings" :items="combinedLowerWeddingRings" title="customer jewellries"></carousel>
                                        </figure>
                                </div>
                            </div>


                        <div class="col-span-12 sm:col-span-5 box p-4">
                            <div class="tile is-child">

                                <div class="tile is-child">
                                <article>
                                    <center>
<!--                                         <button class="btn btn-primary" @click="appointmentState=!appointmentState">{{trans('weddingRing.Appointment')}}</button>
 -->                                        
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

                                    <div class="grid grid-cols-12 border-b font-semibold p-2" >
                                        <div class="col-span-4 sm:text-lg">{{trans('weddingRing.Wedding Rings Info')}}</div>
                                        <div class="col-span-4 sm:text-lg" v-if="weddingRing.wedding_rings[1]">
                                            @{{weddingRing.wedding_rings[0].gender | transJs(langs,locale)}}
                                        </div>
                                        <div class="col-span-4 sm:text-lg" v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[1].gender | transJs(langs,locale)}}</div>
                                    </div>

                                    <div class="grid grid-cols-12 border-b font-light p-2" >
                                        <div class="col-span-4">{{trans('weddingRing.Unit Price')}}</div>
                                        <div class="col-span-4">$@{{weddingRing.wedding_rings[0].unit_price}}</div>
                                        <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">$@{{weddingRing.wedding_rings[1].unit_price}}</div>
                                    </div>

                                    <div class="grid grid-cols-12 border-b font-light p-2" >
                                        <div class="col-span-4">
                                            {{trans('weddingRing.shape')}}
                                        </div>
                                        <div class="col-span-4">
                                            <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?shape=' + weddingRing.wedding_rings[0].shape + '&type=wedding ring'">
                                                @{{weddingRing.wedding_rings[0].shape | transJs(langs,locale)}}
                                            </a>
                                        </div>
                                        <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">
                                            <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?shape=' + weddingRing.wedding_rings[1].shape + '&type=wedding ring'">
                                                @{{weddingRing.wedding_rings[1].shape | transJs(langs,locale)}}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b font-light p-2" >
                                        <div class="col-span-4">
                                            {{trans('weddingRing.finish')}}
                                        </div>
                                        <div class="col-span-4">
                                            <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?finish=' + weddingRing.wedding_rings[0].finish + '&type=wedding ring'">
                                                @{{weddingRing.wedding_rings[0].finish | transJs(langs,locale)}}
                                            </a>
                                        </div>
                                        <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">
                                            <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?finish=' + weddingRing.wedding_rings[1].finish + '&type=wedding ring'">
                                                @{{weddingRing.wedding_rings[1].finish | transJs(langs,locale)}}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b font-light p-2" >
                                        <div class="col-span-4">
                                            {{trans('weddingRing.Metal')}}
                                        </div>
                                        <div class="col-span-4">
                                            <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?metal=' + weddingRing.wedding_rings[0].metal + '&type=wedding ring'">
                                                @{{weddingRing.wedding_rings[0].metal | transJs(langs,locale)}}
                                            </a>
                                        </div>
                                        <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">
                                            <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?metal=' + weddingRing.wedding_rings[1].metal + '&type=wedding ring'">
                                                @{{weddingRing.wedding_rings[1].metal | transJs(langs,locale)}}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12 border-b font-light p-2" >
                                        <div class="col-span-4">{{trans('weddingRing.Side Stone')}}</div>
                                        <div class="col-span-4">{{__('engagementRing.Around')}} @{{weddingRing.wedding_rings[0].ct}}ct</div>
                                        <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">{{__('engagementRing.Around')}} @{{weddingRing.wedding_rings[1].ct}}ct</div>
                                    </div>

                                    <div>
                                        <div class="col-span-4 sm:text-lg" colspan="3">{{trans('weddingRing.More Details')}}</div>
                                    </div>

                                    <div class="grid grid-cols-12 border-b font-light p-2" >
                                        <div class="col-span-4">{{trans('weddingRing.Stock')}}</div>
                                        <div class="col-span-4">@{{weddingRing.wedding_rings[0].stock}}</div>
                                        <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[1].stock}}</div>
                                    </div>

                                    <div class="grid grid-cols-12 border-b font-light p-2" >
                                        <div class="col-span-4">{{trans('weddingRing.Name')}}</div>
                                        <div class="col-span-4">@{{weddingRing.wedding_rings[0].name}}</div>
                                        <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[1].name}}</div>
                                    </div>

                                    <div class="grid grid-cols-12 border-b font-light p-2" >
                                        <div class="col-span-4 sm:text-lg">{{trans('weddingRing.Description')}}</div>
                                        <div class="col-span-4">@{{weddingRing.wedding_rings[0].style | transJs(langs,locale)}},@{{weddingRing.wedding_rings[0].metal | transJs(langs,locale)}},@{{weddingRing.wedding_rings[0].sideStone? transJsMet(columns[2],langs,locale):''}}
                                        {{trans('weddingRing.Wedding Ring')}}

                                        </div>
                                        <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">@{{weddingRing.wedding_rings[1].style | transJs(langs,locale)}},@{{weddingRing.wedding_rings[1].metal | transJs(langs,locale)}},@{{weddingRing.wedding_rings[1].sideStone? transJsMet(columns[2],langs,locale):''}}
                                        {{trans('weddingRing.Wedding Ring')}}
                                        </div>
                                    </div>

                                </article>

                                
                            </div>
                        </div>

                        
                      

                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

    @endSection


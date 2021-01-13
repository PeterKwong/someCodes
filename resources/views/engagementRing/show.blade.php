@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('engagementRing.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('engagementRing.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content="@include('engagementRing.keywords')"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('engagementRing.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('engagementRing.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{ config('global.CF_s3') }}{{'public/images/'. $meta->images[0]->image }}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('engagementRing.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('engagementRing.'.$meta->style)}} {{trans('engagementRing.'.$meta->prong)}} {{trans('engagementRing.'.$meta->shoulder)}}  {{trans('engagementRing.Engagement Ring Setting')}} {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('engagementRing.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('engagementRing.keywords')" /> 

        <script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/2.3.2/js-cloudimage-360-view.min.js" defer></script>
        <!-- 
        <script src="https://code.createjs.com/easeljs-0.6.0.min.js"></script>

        <script src="https://unpkg.com/dynamics.js@1.1.5/lib/dynamics.js"></script>
 -->

 

    @endSection

    @section('content')



        <div id="engagementRingsShow">

            <br>
            <div class="" >
                <div class="">
                    <center><h3 class="sm:text-2xl"> {{__('engagementRing.' .$meta->style )}} {{__('engagementRing.' .$meta->prong )}} {{__('engagementRing.' .$meta->shoulder )}} {{trans('engagementRing.setting')}}</h3> 
                                <h5>{{trans('engagementRing.metaTitle3')}}</h5>                     
                    </center>
                    
                </div>
            </div>

            <div class="grid-cols-12 justify-center">
                <div class="col-span-12">
                    <br>

                    <div class="grid grid-cols-12">
                      <div class="col-span-12 sm:col-span-7">
                        <figure class="box" @click="carouselState=!carouselState">
                          <keep-alive >
                            <carousel @active="carouselState=!carouselState" :active="carouselState" :height="'500'" :width="'100%'" :upperitems="engagementRing" :items="customerItems" title="customer jewellries"></carousel>
                          </keep-alive>
                        </figure>
                        
<!-- 

                        <product-viewer :folder="mutualVar.storage[mutualVar.storage.live] + 'public/test/weddingring1/' " :filename="filename"></product-viewer> -->

                      </div>

                      <div class="col-span-12 sm:col-span-5 box px-4">
                        <article>
                              <center class="p-2">
                                  
                                 <!--  <button class="button is-info" @click="appointmentState=!appointmentState">{{__('engagementRing.Appointment')}}</button>
                                  <appointment v-model="engagementRing" :title="appointmentTitle" @active="appointmentState=!appointmentState" :active="appointmentState" :columns="columns"  :processing="false" :langs="langs" :locale="locale"></appointment> -->
                                  
                                  <shopping-cart :item="engagementRing" :type="shoppingCartType" :title="appointmentTitle" :carousel-item="carouselItem" ></shopping-cart>

                              </center>

                              <p class="p-2">
                              {{trans('engagementRing.For more detailed information')}}, 

                                  <a @click="appointmentState=!appointmentState">{{trans('engagementRing.Make Appointment')}}</a> or <a :href="hrefLangs + '/about-us'">{{trans('engagementRing.contact us')}}
                                  </a> {{trans('engagementRing.for further')}}：
                              </p>
                          </article>


                            <article class="p-2">

                                    <div class="grid grid-cols-12 border-b p-2" >
                                      <div class="col-span-6 p-2 text-lg sm:text-2xl font-semibold" >{{__('engagementRing.Engagement Ring Info')}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b" >
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Unit Price')}}</div>
                                      <div class="col-span-6 p-2 font-light" >${{ $meta->unit_price }}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b" >
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Style')}}</div>
                                      <div class="col-span-6 p-2 font-light" >
                                        <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?style=' . $meta->style .'&type=engagement ring'}}" target="_blank">
                                          {{__('engagementRing.' .$meta->style )}}
                                        </a>
                                      </div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b" >
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Shoulder')}}</div>
                                      <div class="col-span-6 p-2 font-light" >
                                        <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?shoulder=' . $meta->shoulder }}" target="_blank">
                                          {{__('engagementRing.' .$meta->shoulder )}}
                                        </a>
                                      </div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b" >
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Prong')}}</div>
                                      <div class="col-span-6 p-2 font-light" >
                                        <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?prong=' . $meta->prong }}" target="_blank">
                                          {{__('engagementRing.' .$meta->prong )}}
                                        </a>
                                      </div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b" >
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Side Stone')}}</div>
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Around')}} {{ $meta->ct }} {{trans('engagementRing.ct')}}</div>
                                    </div>
                              
                                    <div class="grid grid-cols-12 border-b p-2" >
                                      <div class="col-span-12 p-2 font-light" >{{__('engagementRing.More Details')}}</div>
                                    </div>
                               
                                    <div class="grid grid-cols-12 border-b" >
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Stock')}}</div>
                                      <div class="col-span-6 p-2 font-light" >{{ $meta->stock }}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b" >
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Name')}}</div>
                                      <div  class="col-span-6 p-2 font-light" v-if="engagementRing.texts">{{ $meta->texts[0]->content }}</div>
                                    </div>
                                    <div class="grid grid-cols-12 border-b" >
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Description')}}</div>
                                      <div class="col-span-6 p-2 font-light" >{{__('engagementRing.' .$meta->style )}},{{__('engagementRing.' .$meta->prong )}},{{__('engagementRing.' .$meta->shoulder )}},{{trans('engagementRing.setting')}}</div>
                                    </div>
           
                           
                            </article>
                      </div>


                    </div>
                    
                </div>
                
            </div>
            
        </div>


    @endSection








  

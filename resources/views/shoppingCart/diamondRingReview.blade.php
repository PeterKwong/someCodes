@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('shoppingCart.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content="@include('shoppingCart.keywords')"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('shoppingCart.keywords')" /> 

 

    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-12">
                    <center><h3 class="title is-5">{{__('shoppingCart.Congratulations! Review Your Ring, Here is your design.')}}</h3>                        
                    </center>
                    
                </div>
            </div>


        <div id="diamondRingReview">
            <div class="row justify-content-center">
                <div class="col-11">
                    <br>

                    <div class="row">
                        <div class="col-sm-7">
                            <div  v-if="selectingCarousel== 'engagementRings'">
                                    <keep-alive>
                                    <carousel :active="carouselItem.active" :height="'500'" :width="'100%'" :upperitems="carouselItem.upperitems" :items="carouselItem.items" title="customer jewellries"></carousel></keep-alive>
                            </div>
                            <div class="tile is-child box" v-if="selectingCarousel== 'diamonds'">
                                    <figure class="image">
                                    <img :src="shortenName.filter((data)=>{return data.type == 'diamonds'})[0].image">
                                    </figure>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <article>
                                    <center>
                                        <p class="subtitle is-3">{{__('shoppingCart.Diamond Arrival')}}</p>
                                        <p class="subtitle is-6">{{__('shoppingCart.Today Order, Get Free shipment')}}
                                            <strong>{{__('shoppingCart.on')}} <a> @{{ extraWorkingDates( maxDeliveryDate ,'months') |transJs() }} @{{ extraWorkingDates( maxDeliveryDate ) }} @{{ 'day' |transJs() }},  @{{ extraWorkingDates( maxDeliveryDate ,'dates') |transJs() }}</a></strong> 
                                        </p>

                                    </center>
                                    <hr>
                                    <div v-for="item in shortenName">
                                        <div class="row " >

                                          <div class="col">
                                            <img class="rounded border p-6" width="128" :src="item.image" @click="selectingCarousel = item.type">
                                          </div>

                                          <div class="col-6">
                                            <a :href="item.url + item.id ">@{{item.title}}</a>
                                            <a class="title is-6" :href="item.url"><u>{{__('shoppingCart.change')}}</u></a>
                                          </div>

                                          <div class="col-2"  @click="selectingCarousel = item.type">
                                            <img class="rounded border p-6" width="64" :src=" '/images/front-end/shoppingCart/' + item.type + '.png' ">
                                            <a>$@{{item.unit_price}}</a>
                                          </div>
                                          
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="row ">
                                        <div class="col-6">
                                            
                                        </div>

                                        <div class="col">
                                            <div class="row ">
                                                <div class="col">
                                                    <p>{{__('shoppingCart.Total')}} </p>
                                                </div>
                                                <div class="col-5">
                                                    <p>HK$ @{{subTotal}}</p>
                                                </div>
                                                
                                            </div>

                                            <div class="row ">
                                                <div class="col">
                                                    <p></p>
                                                </div>
                                                <div class="col">
                                                    <p class="btn btn-primary" @click="addItemToCart()">{{__('shoppingCart.Add Cart')}}</p>
                                                </div>


                                            </div>
                                            
                                        </div>
                                    </div>

                                    <br>
                                    

                                </article>
                        </div>
                    </div>
                    




                </div>
                
            </div>
            
        </div>

    @endSection






<style>
    .opacityImg:hover {
        opacity: 0.5;
    }
</style>

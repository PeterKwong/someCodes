@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('engagementRing.Engagement Ring Setting')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('engagementRing.Engagement Ring Setting')}} {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content="{{trans('engagementRing.Engagement Ring Setting')}}"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('engagementRing.Engagement Ring Setting')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('engagementRing.Engagement Ring Setting')}} {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('engagementRing.Engagement Ring Setting')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('engagementRing.Engagement Ring Setting')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('engagementRing.Engagement Ring Setting')}}" /> 
 

    @endSection

    @section('hero')
        <!-- Hero Section  -->
        <div class="hero-image diamond flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
            <h2 class="text-lg xl:text-2xl font-medium uppercase mt-7 font-suranna tracking-widest">
                {{__('shoppingCart.Congratulations! Review Your Ring, Here is your design.')}}
            </h2>
        </div>
    @endsection

    @section('content')
    

    <!-- Shop Section  -->
    <div class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-3 md:px-0 font-lato">
        
        <!-- Steps  -->
        <x-shopping-cart.progress-bar />

        <!-- Product Details -->
        <div class="flex flex-col space-y-3 md:space-y-0 md:grid md:grid-cols-7 md:space-x-10">
            <!-- Column-1 - Ring Display  -->
            <x-carousel type="engagementRing" typeId="{{isset($_COOKIE['shoppingCartEngage'])?$_COOKIE['shoppingCartEngage']:1}}" />


            <!-- Column-2 - Ring Detials  -->
            @livewire('shopping-cart.review',[
                        'engagementRingId'=> isset($_COOKIE['shoppingCartEngage'])?$_COOKIE['shoppingCartEngage']:0,
                        'diamondId' => isset($_COOKIE['shoppingCartDiam'])?$_COOKIE['shoppingCartDiam']:0,
                        ])
        </div>
    </div>
   


<!-- 
        <br>
            <div class="grid grid-cols-12" >
                <div class="col-span-12">
                    <center><h3 class="sm:text-2xl font-semibold">{{__('shoppingCart.Congratulations! Review Your Ring, Here is your design.')}}</h3>                        
                    </center>
                    
                </div>
            </div>


        <div id="diamondRingReview">
            <div class="grid grid-cols-12 justify-center">
                <div class="col-span-12">
                    <br>

                    <div class="grid grid-cols-12">
                        <div class="col-span-12 sm:col-span-7 items-center">
                            <figure class="" v-if="selectingCarousel== 'engagementRings'" >
                                <keep-alive >
                                    <carousel :active="carouselItem.active" :upperitems="carouselItem.upperitems" :items="carouselItem.items" :height="'500'" :width="'100%'"  title="customer jewellries"></carousel>
                                </keep-alive>
                            </figure>
                            <div class="tile is-child box" v-if="selectingCarousel== 'diamonds'">
                                    <figure class="image">
                                    <img :src="shortenName.filter((data)=>{return data.type == 'diamonds'})[0].image">
                                    </figure>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-5">
                            <article>
                                <center>
                                    <p class="sm:text-lg font-light">{{__('shoppingCart.Diamond Arrival')}}</p>
                                    <p class="font-light">{{__('shoppingCart.Today Order, Get Free shipment')}}
                                        <strong class="sm:text-lg font-semibold">{{__('shoppingCart.on')}} <a> @{{ extraWorkingDates( maxDeliveryDate ,'months') |transJs() }} @{{ extraWorkingDates( maxDeliveryDate ) }} @{{ 'day' |transJs() }},  @{{ extraWorkingDates( maxDeliveryDate ,'dates') |transJs() }}</a></strong> 
                                    </p>

                                </center>
                                <hr>
                                <div v-for="item in shortenName">
                                    <div class="grid grid-cols-12" :class="{' text-blue-600' : selectingCarousel == item.type}" >
                                      <div class="col-span-4">
                                        <img class="rounded border p-2" :class="{' border-blue-600' : selectingCarousel == item.type}" width="128" :src="item.image" @click="selectingCarousel = item.type">
                                      </div>
                                      <div class="col-span-6">
                                        <a :href="item.url + item.id ">@{{item.title}}</a>
                                        <a class="sm:text-lx font-semibold" :href="item.url"><u>{{__('shoppingCart.change')}}</u></a>
                                      </div>
                                      <div class="col-span-2"  @click="selectingCarousel = item.type">
                                        <img class="rounded" width="64" :src=" '/images/front-end/shoppingCart/' + item.type + '.png' ">
                                        <a>$@{{item.unit_price}}</a>
                                      </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="grid grid-cols-12">
                                    <div class="col-span-6 col-start-7">
                                        <div class="grid grid-cols-12 p-4">
                                            <div class="col-span-4">
                                                <p>{{__('shoppingCart.Total')}} </p>
                                            </div>
                                            <div class="col-span-8 text-center">
                                                <p class="text-2xl font-semibold text-blue-600">HK$ @{{subTotal}}</p>
                                            </div>
                                            
                                        </div>

                                        <div class="grid grid-cols-12 text-center">
                                            <div class="col-span-8 col-start-5 col-end-11">
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
 -->
    @endSection



<!-- 


<style>
    .opacityImg:hover {
        opacity: 0.5;
    }
</style>
 -->
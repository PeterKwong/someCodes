@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('customerMoment.metaTitle2')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('customerMoment.metaDescription2')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('customerMoment.metaTitle2')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('customerMoment.metaDescription2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('customerMoment.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('customerMoment.metaDescription2')}}" /> 
        <meta property="og:site_name" content="{{trans('customerMoment.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 
 

    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-12">

                   <center><h2 class="title is-5">{{__('customerMoment.Customer Moments')}}</h2>
                    
                        
                        <h5 >
                        {{__('customerMoment.Thank you for customers support, so that we could share their precious moments.')}}
                        </h5>
                        
                    
                        <h5 >
                        {{__('customerMoment.Things worth celebrating in Life are too much. Know how to cherish, everthings now we had are the best.')}}
                        </h5>
                    
                    </center>
 
                </div>
            </div>

        <br>

        <div id="customerJewellryIndex">
            <div class="box">
               
               <!-- <img :src="`/images/lJ2fvr7ni4k1SdRP.jpeg`" >  -->

                <div class="">      
                        <div class="row">
                            <div class="col-md-3" v-for="arr in customers.data">
                                <div class="" v-if="arr.images[0]">
                                    <article class="tile" @click="selectedCarouselItems(arr.images)">
                                        <a>
                                        <figure class="image">
                                            <img width="100%" :src=" mutualVar.storage[mutualVar.storage.live] + 'public' + '/images/sq-' + arr.images[0].image" v-if="arr.images[0].image">
                                        <center>
                                            <p  class="subtitle" ></p>
                                            <p v-if="arr.id">@{{arr.texts[locale].content}}</p>
                                        </center>
                                        </figure>
                                        </a>
                                        
                                    </article>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary " @click="more()">{{trans('engagementRing.More')}}</button>
                            </div>
                        </div>

                </div>
                    
               <!--  <div class="">      
                        <div class="tile is-ancestor" v-for="(arrs,index) in chunkedItemsDesktop">
                            <div class="tile is-parent is-3" v-for="(arr,ind) in arrs">
                                <div class="tile is-child" v-if="arr.images[0]">
                                    <article class="tile" @click="selectedCarouselItems(arr.images)">
                                        <a>
                                        <figure class="image">
                                            <img :src=" mutualVar.storage[mutualVar.storage.live] + 'public' + '/images/sq-' + arr.images[0].image" v-if="arr.images[0].image">
                                        <center>
                                            <p  class="subtitle" ></p>
                                            <p v-if="arr.id">@{{arr.texts[locale].content}}</p>
                                        </center>
                                        </figure>
                                        </a>
                                        
                                    </article>
                                </div>
                            </div>
                        </div>
                                <div class="level">
                                    <article class="level-item" >
                                        <button class="button is-primary" @click="more()">{{trans('engagementRing.More')}}</button>
                                    </article>
                                </div>
                    </div> -->

        </div>
        <image-carousel :active="carouselActive" :items="carouselItems" @active="carouselActive=!carouselActive"></image-carousel>

            
        </div>

    @endSection




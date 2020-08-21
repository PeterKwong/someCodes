@extends('layouts.section.frontend')

    @section('meta')
    
        <!-- Place this data between the <head> tags of your website --> 
        <title>{{__('customerMoment.metaTitle1')}} - {{__('home.webTitle')}}</title>
        <meta name="description" content="{{__('customerMoment.metaDescription1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{__('customerMoment.metaTitle1')}} - {{__('home.webTitle')}}"> 
        <meta itemprop="description" content="{{__('customerMoment.metaDescription1')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{__('customerMoment.metaTitle1')}} - {{__('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{__('customerMoment.metaDescription1')}}" /> 
        <meta property="og:site_name" content="{{__('customerMoment.metaTitle1')}} - {{__('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{__('tag.Diamond')}},{{__('tag.Diamond Ring')}}" /> 

 

    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-12">
                    <center>
                        <h3 class="sm:text-xl font-semibold">{{__('customerMoment.Customer moments')}} - {{__('customerMoment.Customer Jewelrries')}}
                        </h3>    

                        <br>

                        <h5>
                        {{__('customerMoment.Thank you for customers support, so that we could share their precious moments.')}}
                        </h5>
                        
                    
                        <h5>
                        {{__('customerMoment.Things worth celebrating in Life are too much. Know how to cherish, everthings now we had are the best.')}}
                        </h5>          
                    </center>
                    
                </div>
            </div>

        <br>

        <div id="customerJewelleryIndex">

            <div class="grid grid-cols-12 gap-4">
                <div class="sm:col-span-4 col-span-6" v-for="(post,index) in posts.data">
                    <div @click="clickRow(post)" >
                        <a @mouseover="loopImages(index)" @mouseleave="loopImages(index,0)">
                            <img :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${post.images[0].image}`" v-if="post.images[0]" width="100%">
                                <center class="p-4">
                                    <p v-if="post.texts[0]" class="truncate">@{{post.texts[locale].content }} </p>
                                    </a>
                                    <p v-if="post.created_at">@{{post.date}} </p>
                                </center>
                        </a>
                    </div>
                </div>
            </div>
                            

            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <center>
                        <button class="btn btn-primary" @click="more()">{{trans('engagementRing.More')}}</button>
                    </center>
                </div>
            </div>


            
        </div>

    @endSection








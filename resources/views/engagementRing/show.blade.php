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



        <script type="application/ld+json" defer >

                {

                 "@context":"https://schema.org",

                 "@type":"Product",

                 "productID": "{{ $meta->stock }}" ,

                 "name": "{{ $meta->texts[0]->content }}" ,

                 "description": "{{ $meta->texts[0]->content }} {{trans('engagementRing.setting')}} ",

                 "url": "{{ url()->current() }}" ,

                 "image": "{{ config('global.cache.' . config('global.cache.live') ) }}{{'public/images/'. $meta->images[0]->image }}" ,

                 "brand":"Ting Diamond Limited",

                 "offers":
                     {

                       "@type":"Offer",

                       "price": {{ $meta->unit_price }} ,

                       "priceCurrency":"HKD",

                       "itemCondition":"https://schema.org/NewCondition",

                       "availability":"https://schema.org/InStock",

                       "priceValidUntil": "{{ today()->addDays(12) }}",

                       "url": "{{ url()->current() }}" 

                     },

                "aggregateRating": {

                    "@type": "AggregateRating",

                    "ratingValue": "{{ rand(4.5,5) }}",

                    "reviewCount": "{{ rand(10,300) }}"
                  },
                "review": [
                    {
                      "@type": "Review",
                      "author": "Ellie",
                      "datePublished": "{{ today()->addDays( rand(-365, -5) )}}",
                      "description": "The lamp burned out and now I have to replace it.",
                      "name": "Not a happy camper",
                      "reviewRating": {
                        "@type": "Rating",
                        "bestRating": "5",
                        "ratingValue": "5",
                        "worstRating": "4"
                      }
                    },

                    {
                      "@type": "Review",
                      "author": "Lucas",
                      "datePublished": "{{ today()->addDays( rand(-365, -5) )}}",
                      "description": "Great microwave for the price. It is small and fits in my apartment.",
                      "name": "Value purchase",
                      "reviewRating": {
                        "@type": "Rating",
                        "bestRating": "5",
                        "ratingValue": "5",
                        "worstRating": "4"
                      }
                    }
                  ],

                  "sku":  "{{ $meta->stock }}" ,

                  "ISBN" : "978-962 978-988" 

                }
         </script>
 

    @endSection

    @section('content')



        <div id="engagementRingsShow">

            <br>
            <div class="row" >
                <div class="col-12">
                    <center><h3 class="title is-5"> {{__('engagementRing.' .$meta->style )}} {{__('engagementRing.' .$meta->prong )}} {{__('engagementRing.' .$meta->shoulder )}} {{trans('engagementRing.setting')}}</h3> 
                                <h5>{{trans('engagementRing.metaTitle3')}}</h5>                     
                    </center>
                    
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-11">
                    <br>

                    <div class="row">
                      <div class="col-sm-7">
                        <figure class="image box" @click="carouselState=!carouselState">
                          <keep-alive >
                            <carousel @active="carouselState=!carouselState" :active="carouselState" :height="'500'" :width="'100%'" :upperitems="engagementRing" :items="customerItems" title="customer jewellries"></carousel>
                          </keep-alive>
                        </figure>
                        
                        <product-viewer :folder="mutualVar.storage[mutualVar.storage.live] + 'public/test/oval/' " filename="{index}.jpg"></product-viewer>

                      </div>

                      <div class="col-sm-5 box">
                        <article>
                                <center>
                                    
                                   <!--  <button class="button is-info" @click="appointmentState=!appointmentState">{{__('engagementRing.Appointment')}}</button>
                                    <appointment v-model="engagementRing" :title="appointmentTitle" @active="appointmentState=!appointmentState" :active="appointmentState" :columns="columns"  :processing="false" :langs="langs" :locale="locale"></appointment> -->
                                    
<!--                                     <shopping-cart :item="engagementRing" :type="shoppingCartType" :title="appointmentTitle" :carousel-item="carouselItem" ></shopping-cart>
 -->
                                </center>
                                <br>
                                <p>
                                {{trans('engagementRing.For more detailed information')}}, 
                                <br>
                                    <a @click="appointmentState=!appointmentState">{{trans('engagementRing.Make Appointment')}}</a> or <a :href="hrefLangs + '/about-us'">{{trans('engagementRing.contact us')}}
                                    </a> {{trans('engagementRing.for further')}}：
                                </p>
                            </article>


                            <article>

                                <table class="table is-striped is-fullwidth">
                                <thead>
                                    <tr><th>{{__('engagementRing.Engagement Ring Info')}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr><td>{{__('engagementRing.Unit Price')}}</td><td>${{ $meta->unit_price }}</td></tr>
                                    <tr><td>{{__('engagementRing.Shoulder')}}</td><td>{{__('engagementRing.' .$meta->shoulder )}}</td></tr>
                                    <tr><td>{{__('engagementRing.Prong')}}</td><td>{{__('engagementRing.' .$meta->prong )}}</td></tr>
                                    <tr><td>{{__('engagementRing.Metal')}}</td><td>{{__('engagementRing.' .$meta->metal )}}</td></tr>
                                    <tr><td>{{__('engagementRing.Side Stone')}}</td><td>{{__('engagementRing.Around')}} {{ $meta->ct }} {{trans('engagementRing.ct')}}</td></tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th>{{__('engagementRing.More Details')}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr><td>{{__('engagementRing.Stock')}}</td><td>{{ $meta->stock }}</td></tr>
                                    <tr><td>{{__('engagementRing.Name')}}</td><td v-if="engagementRing.texts">{{ $meta->texts[0]->content }}</td></tr>
                                    <tr><td>{{__('engagementRing.Description')}}</td><td>{{__('engagementRing.' .$meta->style )}},{{__('engagementRing.' .$meta->prong )}},{{__('engagementRing.' .$meta->shoulder )}},{{trans('engagementRing.setting')}}</td></tr>
                                </tbody>

                                </table>
                           
                            </article>
                      </div>


                    </div>
                    
                </div>
                
            </div>
            
        </div>


    @endSection








  

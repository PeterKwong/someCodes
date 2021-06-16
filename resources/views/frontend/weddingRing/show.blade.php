
@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{ $title }} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{ $title }} {{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="{{ $tags[0] }}"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{ $title }} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{ $title }} {{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}"> 
        <meta itemprop="image" content="{{ config('global.cache.' . config('global.cache.live') ) 
                                          . 'public/images/' . $weddingRings->images[0]->image }}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{ $title }} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image" content="{{ config('global.cache.' . config('global.cache.live') ) 
                                          . 'public/images/' . $weddingRings->images[0]->image }}" />
        <meta property="og:description" content="{{ $title }}{{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{ $title }} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{ $tags[0] }}" /> 

    @endSection

    @section('content')
        <br>
        <div id="weddingRingsShow">
            <div class="flex justify-center">
                <div class="flex-auto">
                    <div class="flex justify-center p-4">
                        <div class="col-span-9">
                                <h1 class="text-center sm:text-2xl">
                                {{$title}}
                                </h1>
                        </div>       
                    </div>


                    <div class="grid grid-cols-12 ">

                        <div class="col-span-12 sm:col-span-7">
                                <div class="tile is-child">
                                        <figure class="image box" @click="carouselState=!carouselState">
              <!--                           <carousel @active="carouselState=!carouselState" :active="carouselState"  :height="'500'" :width="'100%'" :upperitems="combinedUpperWeddingRings" :items="combinedLowerWeddingRings" title="customer jewellries"></carousel> -->
                                        <carousel @active="carouselState=!carouselState" :active="carouselState" :height="'500'" :width="'100%'" :upperitems="weddingRing" :items="customerItems" title="customer jewellries" />
                                        </figure>
                                </div>
                            </div>

                        <div class="col-span-12 sm:col-span-5 box p-4">
                            <x-wedding-ring.show-details :weddingRings="$weddingRings" :tags="$tags"/>
                        </div>
                      

                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

        <div class="p-4 text-center border-b">
            <p class="text-2xl">{{__('customerJewellery.Cusomter Jewellery')}} {{__('customerJewellery.May Interested')}}</p>
            @livewire('customer-jewellery.post-fetch-row',
              ['draggableId'=>'draggable0' , 'type'=>'Wedding Ring', 'upperType'=>'shape', 'query'=>$weddingRings->weddingRings[1]->shape ])
            <a class="btn btn-primary text-white text-lg" href="/{{app()->getlocale()}}/customer-jewellery" target="_blank">{{__('engagementRing.More')}}</a>


          <script type="text/javascript">            

            const draggable0 = document.getElementById('draggable0');
            draggableItem(draggable0)
          
          </script>
        </div>


    @endSection


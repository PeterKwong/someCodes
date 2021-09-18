
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

    @section('hero')
        <!-- Hero Section  -->
        <div class="hero-image flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
            <h2 class="text-lg xl:text-2xl font-medium font-suranna tracking-widest">
                {{$title}}
            </h2>
        </div>
    @endsection

    @section('content')



    <!-- Shop Section  -->
    <div class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 py-10 md:px-0 font-lato">

        <!-- Product Details -->
        <div class="flex flex-col space-y-3 md:space-y-0 md:grid md:grid-cols-7 md:space-x-10">

            <!-- Column-1 - Ring Display  -->
            <div class="md:col-span-4 flex flex-col space-y-4">
                <x-carousel type="weddingRing" :typeId="$meta->wedding_ring_pair_id" />
                
            </div>
            <!-- Column-2 - Wedding Ring Detials  -->

                 <x-wedding-ring.show-details :weddingRings="$weddingRings" :tags="$tags"/>

        </div>
        <!-- Recommend Wedding Rings - Products -->
            @livewire('wedding-ring.recommendation')
        <!--Recommend Customer Jewellery - Products -->
        <div class="">
            @livewire('customer-jewellery.post-fetch-row',
              ['draggableId'=>'draggable0' , 'type'=>'Wedding Ring', 'upperType'=>'shape', 'query'=>$weddingRings->weddingRings[1]->shape ])
        </div>

    </div>



    @endSection


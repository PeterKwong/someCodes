@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{ $title }} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{ $title }} {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content="{{ $tags }}"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{ $title }} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{ $title }} {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}"> 
        <meta itemprop="image" content="{{ config('global.cache.' . config('global.cache.live') ) 
                                          . 'public/images/' . $meta->images[0]->image }}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{ $title }} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image" content="{{ config('global.cache.' . config('global.cache.live') ) 
                                          . 'public/images/' . $meta->images[0]->image }}" />
        <meta property="og:description" content="{{ $title }} {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{ $title }} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{ $tags }}" /> 

        <!-- <script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/2.3.2/js-cloudimage-360-view.min.js" defer></script> -->
        <!-- 
        <script src="https://code.createjs.com/easeljs-0.6.0.min.js"></script>

        <script src="https://unpkg.com/dynamics.js@1.1.5/lib/dynamics.js"></script>
 -->

 

    @endSection

    @section('hero')
      <!-- Hero Section  -->
      <div class="hero-image flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
          <h2 class="text-lg xl:text-2xl font-medium font-suranna tracking-widest">
               {{ $title }}
          </h2>
      </div>
    @endsection

    @section('content')


    <!-- Shop Section  -->
    <div class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">

        <!-- Steps  -->

        <x-shopping-cart.progress-bar />

        <!-- Product Details -->
        <div class="flex flex-col space-y-3 md:space-y-0 md:grid md:grid-cols-7 md:space-x-10">
            <!-- Column-1 - Ring Display  -->

            <x-carousel type="engagementRing" :typeId="$meta->id" />


<!--             <div class="md:col-span-4 flex flex-col space-y-4" >
                <figure @click="carouselState=!carouselState">
                  <keep-alive >
                    <carousel @active="carouselState=!carouselState" :active="carouselState" :height="'500'" :width="'100%'" :upperitems="engagementRing" :items="customerItems" title="customer jewellries"></carousel>
                  </keep-alive>
                </figure>
            </div> -->
            <!-- Column-2 - Ring Detials  -->
            <div class="md:col-span-3 flex flex-col space-y-3">
                <div class="max-w-xl flex items-center justify-between">
                    <span class="text-xl font-suranna">{{__('engagementRing.' .$meta->metal )}} {{__('engagementRing.Diamond Ring')}}</span>
                    <p class="flex items-center space-x-1 text-gold-light text-xl font-suranna">
                        <span>HKD</span>
                        <span class="text-3xl">${{ $meta->unit_price }}</span>
                    </p>
                </div>
                <p class="text-base">{{__('engagementRing.Engagement Ring Info')}}</p>
                <div class="grid grid-cols-6 space-x-10">
                    <span class="col-span-2 md:col-span-2 flex items-center space-x-2">
                        <span class="font-medium">{{__('engagementRing.' .$meta->style )}}</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </span>
                    <span class="col-span-3 md:col-span-4">
                        <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?style=' . $meta->style .'&type=engagement ring'}}" target="_blank">
                            {{__('engagementRing.' .$meta->style )}}
                        </a>
                    </span>
                </div>
                <div class="grid grid-cols-6 space-x-10">
                    <span class="col-span-2 md:col-span-2 flex items-center space-x-2">
                        <span class="font-medium">{{__('engagementRing.Shoulder')}}</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </span>
                    <span class="col-span-3 md:col-span-4">
                        <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?shoulder=' . $meta->shoulder }}" target="_blank">
                            {{__('engagementRing.' .$meta->shoulder )}}
                        </a>
                    </span>
                </div>
                <div class="grid grid-cols-6 space-x-10">
                    <span class="col-span-2 md:col-span-2 flex items-center space-x-2">
                        <span class="font-medium">{{__('engagementRing.Claw Prong')}}</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </span>
                    <span class="col-span-3 md:col-span-4">
                        <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?prong=' . $meta->prong }}" target="_blank">
                                {{__('engagementRing.' .$meta->prong )}}
                            </a>
                        </a>
                    </span>
                </div>
                <div class="grid grid-cols-6 space-x-10">
                    <span class="col-span-2 md:col-span-2 flex items-center space-x-2">
                        <span class="font-medium">{{__('engagementRing.Side Stone')}}</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </span>
                    <span class="col-span-3 md:col-span-4">
                        {{__('engagementRing.Around')}} {{ $meta->ct }} {{trans('engagementRing.ct')}}
                    </span>
                </div>
                <p class="font-lato text-grey-lighter text-sm border-t pt-6">{{__('engagementRing.Stock')}}. {{ $meta->stock }}</p>
                <!-- 
                <div class="flex flex-col space-y-5 font-lato">
                    <div class="flex items-center space-x-2">
                        <label for="ring_size"  class="flex space-x-2">
                            <span class="font-medium">{{__('engagementRing.Ring Size')}}:</span>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                            </svg>
                        </label>
                        <select id="ring_size" name="ring_size" class="block w-44 md:w-36 pb-1 text-black text-opacity-50 bg-white border-b border-opacity-20 focus:outline-none">
                            <option>Please select</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="engrave1" class="flex space-x-2">
                            <span class="font-medium">{{__('engagementRing.Engrave')}}:</span>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                            </svg>

                        </label>
                        <input type="text" id="engrave1" name="engrave" placeholder="Please type your engrave" class="block w-full md:w-56 pb-1 text-black text-opacity-50 border-b border-opacity-20 focus:outline-none">
                    </div>
                </div> -->
                <div  id="engagementRingsShow">
                    
                    <shopping-cart :item="engagementRing" :type="shoppingCartType" :carousel-item="carouselItem" title="{{ $title }}" ></shopping-cart>
                </div>

                <script defer type="text/javascript">
                    mutualVar.vComponents.push({'engagementRingShow':true})
                </script>

                
            </div>
        </div>
        <!-- Recommend Settings - Products -->

          @livewire('engagement-ring.recommendation')

            <div class="pt-10 pb-20 2xl:py-20">
                @livewire('customer-jewellery.post-fetch-row',
                ['draggableId'=>'draggableItem0' ,
                  'title'=>'',  
                  'type'=>'Engagement Ring', 
                  'upperType'=>'style', 
                  'query'=>$meta->style ])
            </div>

                  
            
    </div>



    @endSection








  

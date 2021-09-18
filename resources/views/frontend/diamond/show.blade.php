@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{ $title }} - {{__('home.webTitle')}}</title>
        <meta name="description" content="{{ $title }} {{__('diamond.metaDescription30')}} - {{__('home.meta2')}}" />
        <meta itemprop="keywords" content="{{ $tags }}"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{ $title }} {{__('diamond.metaTitle30')}} - {{__('home.webTitle')}}"> 
        <meta itemprop="description" content="{{ $title }} {{__('diamond.metaDescription30')}} - {{__('home.meta2')}}"> 
        <meta itemprop="image" content="{{url('/images/front-end/home/h1_300-1.png')}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{ $title }} {{__('diamond.metaTitle30')}} - {{__('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:image" content="{{url('/images/front-end/home/h1_300-1.png')}}" />
        <meta property="og:description" content="{{ $title }} {{__('diamond.metaDescription30')}} - {{__('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{ $title }} {{__('diamond.metaTitle30')}} - {{__('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{ $tags }}" /> 


        <!-- Fonts -->
       
 

    @endSection

    @section('hero')
        <!-- Hero Section  -->
        <div class="hero-image diamond flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
            <h2 class="text-lg xl:text-2xl font-medium font-suranna tracking-widest uppercase">
                {{ $title }}
            </h2>
        </div>


    @endsection

    @section('content')


        <!-- Steps  -->
        <x-shopping-cart.progress-bar />

    <!-- Shop Section  -->
    <div id="diamondViewerShow" class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">

        <!-- Product Details -->
        <div class="flex flex-col space-y-3 md:space-y-0 md:grid md:grid-cols-7 md:space-x-10">
            <!-- Column-1 - Ring Display  -->
            <div class="md:col-span-3 flex flex-col space-y-4">
                <!-- Row 1  -->
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-full h-auto relative border">
                        <div v-if="!loadingStatus.image">
                            <center>
                            <img class="w-1/3" src="/images/front-end/loader.gif"  width="200">
                            </center>
                        </div>
                        <div v-if="loadingStatus.image">
                            <div class="p-2">
                            <div v-if="diamond.image_cache && selectingShowType == 'image' ">
                                <img class="w-full" :src="storageURL + 'images/' + diamond.id + '.jpg' " ></img>
                            </div>
                            <div v-if=" selectingShowType == 'video' ">
                                <iframe :src="diamond.video_link.replace('http:','https:')" width="100%" height="500" class="hidden sm:block"></iframe>
                                <iframe :src="diamond.video_link.replace('http:','https:')" width="100%" height="300"  class="block sm:hidden"></iframe>
                            </div>
                            <div v-if="diamond.plot && selectingShowType == 'plot' ">
                                <img class="w-full" :src="storageURL + 'plots/' + diamond.id + '.jpg' "  width="100%" height="auto"></img>
                            </div>
                            <div v-if="!diamond.image_cache && selectingShowType == null">
                                <img class="w-full" :src="`/images/front-end/diamond_show/RoundDiamonds_sample.png`"></img>
                            </div>
                            </div>
                        </div>

<!--                         <img  src="/assets/images/detailed-preview.jpg" alt="">
 -->                        <!-- zoom in/out  -->
<!--                         <div class="absolute top-6 right-6 flex flex-col divide-y bg-white border">
                            <button class="w-7 h-7 flex items-center justify-center">
                                <svg class="" width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.0975 9.5239H14.9512V6.59707H9.0975V0.743408H6.17067V6.59707H0.317017V9.5239H6.17067V15.3776H9.0975V9.5239Z" fill="#666666"/>
                                </svg> 
                            </button> 
                            <button class="w-7 h-7 flex items-center justify-center border-t-2">
                                <svg width="15" height="4" viewBox="0 0 15 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.0975 3.25557H14.9512V0.328735H9.0975H6.17067H0.317017V3.25557H6.17067H9.0975Z" fill="#666666"/>
                                </svg>  
                            </button>                                            
                        </div> -->
                        <!-- 360 view  -->
 <!--                        <div class="absolute bottom-3 w-full flex justify-end items-center px-4">
                            <div class="flex items-center">
                                <button class="flex items-center justify-center">
                                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.31586 22.3407C4.31586 12.604 12.2383 4.68158 21.975 4.68158C31.7117 4.68158 39.6342 12.604 39.6342 22.3407C39.6342 32.0775 31.7117 39.9999 21.975 39.9999C12.2383 39.9999 4.31586 32.0775 4.31586 22.3407Z" fill="white" stroke="#CCCCCC" stroke-width="0.905157"/>
                                        <path d="M15.1831 29.1326H19.711V15.5488H15.1831V29.1326Z" fill="#666666"/>
                                        <path d="M24.239 29.1326H28.7669V15.5488H24.239V29.1326Z" fill="#666666"/>
                                    </svg>                                                                                                       
                                </button>
                            </div>                                          
                        </div> -->
                    </div>
                </div>
                <!-- Row 2  -->
                <div class="flex md:space-x-4">
                    <div class="w-full flex items-center space-x-3">
                        <div class="relative flex items-center justify-center border w-32 md:w-40 h-40 cursor-pointer"  :class="{ ' border-gold-light': selectingShowType == 'video'}" v-if="diamond.video_link" @click="selectingShowType = 'video'" >
                            <img class="w-full" :src="storageURL + 'images/' + diamond.id + '.jpg' " alt="" v-if="diamond.image_cache">
                            <div class="absolute bottom-2 w-full">
                                <p class="flex items-center justify-center space-x-1 border bg-gray-300">
                                    <svg width="24" height="24" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5987 5.09811C14.8234 4.96838 15.0999 4.96721 15.3257 5.09518L21.3455 8.50637L15.0035 12.1851L8.66356 8.52473L14.5987 5.09811ZM10.5967 20.7044C10.19 20.2906 9.48326 20.4928 9.35914 21.0613L9.03555 22.5431C4.18829 21.2384 1.86104 18.4324 6.46729 16.1307V14.5189C0.42305 17.1264 1.37154 22.0238 8.72266 23.9757L8.43169 25.3079C8.30694 25.8791 8.873 26.3623 9.41895 26.1439L13.0798 24.6795C13.5641 24.4859 13.6968 23.8598 13.3302 23.4866L10.5967 20.7044ZM23.5414 14.5189V16.1307C25.119 16.9189 26.0356 17.8947 26.0356 18.8626C26.0356 21.0811 21.5722 22.8239 17.1564 23.1912C16.7532 23.2244 16.4535 23.5783 16.4872 23.981C16.5188 24.3683 16.8528 24.681 17.2769 24.6506C21.1208 24.3342 27.5 22.6755 27.5 18.8626C27.5 16.7802 25.4624 15.3476 23.5414 14.5189ZM7.93144 16.6461C7.93144 16.9077 8.07099 17.1494 8.29751 17.2802L14.2722 20.7296V13.4537L7.93139 9.79282V16.6461H7.93144ZM22.0773 9.77474V16.6461C22.0773 16.9077 21.9378 17.1494 21.7113 17.2802L15.7366 20.7297V13.4527L22.0773 9.77474Z" fill="#666666"></path>
                                    </svg>
                                    <span class="text-sm">360° {{__('diamondSearch.view')}}</span>
                                </p>                                           
                            </div>
                        </div>
                        <div class="flex items-center justify-center border w-32 md:w-40 h-40 cursor-pointer overflow-hidden" :class="{ ' border-gold-light': selectingShowType == 'image'}" v-if="diamond.image_cache" @click="selectingShowType = 'image'" >
                            <img class="w-full" :src="storageURL + 'images/' + diamond.id + '.jpg' " alt="">
                        </div>
                        <div class="flex items-center justify-center border w-32 md:w-40 h-40 cursor-pointer overflow-hidden" :class="{ ' border-gold-light': selectingShowType == 'plot'}" v-if="diamond.plot" @click="selectingShowType = 'plot'">
                            <img class="w-full" :src="storageURL + 'plots/' + diamond.id + '.jpg' " alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column-2 - Ring Detials  -->
            <div class="md:col-span-4 flex flex-col space-y-3">
                <div class="max-w-xl flex items-center justify-between">
                    <span class="text-xl font-suranna">{{$diamond->weight}} {{__('diamondSearch.Carat')}} {{__('diamondSearch.' .$diamond->shape)}} {{__('diamondSearch.Diamond')}}</span>
                    <p class="flex items-center space-x-1 text-gold-light text-xl font-suranna">
                        @if($diamond->available)
                            <span>HKD</span>
                            <span class="text-3xl">${{$diamond->price}}</span>
                        @else
                            <p class="text-3xl"> {{__('diamondSearch.Sold')}}</p>
                        @endif
                    </p>
                </div>
                <div class="tags flex flex-wrap items-center gap-3">
                    @if($diamond->starred)
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            {{ __('diamondSearch.starred')}}
                        </p>
                    @endif
                    @if($diamond->location == '1Hong Kong')
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                           {{ __('diamondSearch.1-2 Days')}}
                        </p>
                    @else
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            {{__('diamondSearch.Order')}}
                        </p>
                    @endif
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 flex flex-col space-y-3">
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Carat')}}</span>
                                <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/carat' }}" target="_blank">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="col-span-3">
                                <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?weight=' . $diamond->weight }}" target="_blank">
                                    {{$diamond->weight}}
                                </a>
                            </span>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Color')}}</span>
                                <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/color' }}" target="_blank">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="col-span-3">
                                <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?color=' . $diamond->color }}" target="_blank">
                                    {{$diamond->color}}
                                </a>
                            </span>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Clarity')}}</span>
                                <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/clarity' }}" target="_blank">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="col-span-3">
                                <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?clarity=' . $diamond->clarity }}" target="_blank">
                                    {{$diamond->clarity}}
                                </a>
                            </span>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Cut')}}</span>
                                <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/cut' }}" target="_blank">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="col-span-3">
                                <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?cut=' . $diamond->cut }}" target="_blank">
                                    {{$diamond->cut}}
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="col-span-3 flex flex-col space-y-3">
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Polish')}}</span>
                                <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/polish' }}" target="_blank">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="col-span-3">
                                <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?polish=' . $diamond->polish }}" target="_blank">
                                    {{$diamond->polish}}
                                </a>
                            </span>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Symmetry')}}</span>
                                <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/symmetry' }}" target="_blank">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="col-span-3">
                                <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?symmetry=' . $diamond->symmetry }}" target="_blank">
                                    {{$diamond->symmetry}}
                                </a>
                            </span>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Fluorescence')}}</span>
                                <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/fluorescence' }}" target="_blank">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="col-span-3">
                                <a class="text-brown" href="{{ '/' . app()->getlocale() . '/customer-jewellery?fluorescence=' . $diamond->fluorescence }}" target="_blank">
                                    {{$diamond->fluorescence}}
                                </a>
                            </span>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{$diamond->lab}} {{__('diamondSearch.Certificate')}}</span>
                                <a href="/{{app()->getLocale() . '/education-diamond-grading/gia-report' }}" target="_blank">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                    </svg>
                                </a>
                            </span>
                            <span class="col-span-3">
                                {{$diamond->certificate}} 
                                @if( $diamond->lab == 'GIA')
                                    <a href="https://www.gia.edu/report-check?reportno={{$diamond->certificate}}" target="_blank"  class="ml-2 text-brown font-bold">{{__('diamondSearch.Download')}}</a>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <p class="font-lato text-grey-lighter text-sm border-t pt-6">Stock No. TD-LD{{$diamond->location}}-{{$diamond->id}}</p>
                <p class="flex items-center space-x-5">
                    <span class="text-xs text-grey-04">{{__('diamondSearch.For more detailed information, can reach GIA website query')}} : </span>
                    <img src="/assets/images/details-GIA.png" alt="">
                </p>
                <div class="pt-5">
                    <shopping-cart :item="diamond" :type="shoppingCartType" title="{{$title}}" ></shopping-cart>
                </div>
            </div>
        </div>
        <!-- GIA Certificate -->
        <div class="flex flex-col py-10 2xl:py-20 2xl:pb-10">
            <div class="flex items-center justify-between py-7">
                <h2 class="text-xl font-suranna text-brown">{{$diamond->lab}} {{__('diamondSearch.Certificate')}}</h2>
                @if( $diamond->lab == 'GIA')
                    <a href="https://www.gia.edu/report-check?reportno={{$diamond->certificate}}" target="_blank"  class="ml-2 text-brown font-bold">{{__('diamondSearch.Download')}}</a>
                @endif
            </div>
            <div class="relative flex items-center w-full h-full border">
                <div v-if="!loadingStatus.cert">
                    <center>
                        <img class="w-1/3" src="/images/front-end/loader.gif" >
                    </center>
                </div>

                <div v-if="loadingStatus.cert" class="w-full" >
                    <img class="w-full" :src="storageURL + 'certs/' + diamond.id + '.jpg' "  v-if="diamond.cert_cache">
                </div>

                <a href="https://www.gia.edu/report-check?reportno={{$diamond->certificate}}" target="_blank" class="absolute top-3 right-3">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.2221 0V2.22224H16.2054L5.2832 13.1444L6.85544 14.7167L17.7776 3.79443V7.77776H19.9999V0H12.2221Z" fill="black"/>
                        <path d="M17.7778 17.7778H2.22224V2.22224H10V0H2.22224C0.994427 0 0 0.994427 0 2.22224V17.7778C0 19.0056 0.994427 20 2.22224 20H17.7778C19.0056 20 20 19.0056 20 17.7778V10H17.7778V17.7778Z" fill="black"/>
                    </svg>
                </a>             
            </div>
        </div>
    </div>
    <div class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">

        <!-- Recommend Diamond - Products -->
       
        <!-- Know More about your diamond -->
        <div x-data="sliders()" x-init="init()"class="flex flex-col w-full pt-10 pb-20 2xl:py-20 font-lato">
            <h2 class="text-xl font-suranna font-medium text-brown">{{__('diamondSearch.Know More about your diamond')}}</h2>
            <ul class="flex flex-col space-y-3 mt-5">
                <li class="flex flex-col border">
                  <h2 @click="tab1 = !tab1" class="flex flex-row justify-between items-center cursor-pointer py-3.5 px-7">
                    <span class="font-bold md:text-lg">{{__('diamondSearch.DIAMOND SIZE')}}: {{$diamond->weight}} {{__('diamondSearch.Carat')}}</span>
                    <svg :class="{'rotate-180' : tab1}" class="rotate-0 fill-current transform duration-200" width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.31112 0.756836L8.31181 6.48184L14.3125 0.756836L16.1558 2.51934L8.31181 10.0193L0.467773 2.51934L2.31112 0.756836Z"/>
                    </svg>
                  </h2>
                  <div x-show="tab1" class="flex flex-col space-y-10 duration-200 transition-all pt-5 md:pt-7">
                    <p class="px-3 md:px-7">
                        {{__('diamondSearch.caratDescription')}}
                        {{__('diamondSearch.caratDescription1')}}
                        <a class="text-brown font-bold underline" target="_blank" href="/{{app()->getLocale()}}/education-diamond-grading/4cs/carat" >{{__('diamondSearch.Learn More')}}</a>
                    </p>
                    <div class="flex flex-col md:flex-row items-center space-y-5 md:space-y-0 w-full">
                        <div class="flex flex-col items-center md:space-y-3 md:mx-20">
                            <img class="w-16 md:w-36 h-16 md:h-28" src="/assets/images/dd-tab-1.png" />
                            <span class="text-sm text-grey-04">{{$diamond->length}}mm</span>
                        </div>
                        <div class="flex flex-col w-full md:mr-16 space-y-5 px-2">
                            <div class="flex flex-wrap justify-between items-center gap-3 relative">
                                <div class="absolute" x-bind:style="'left: '+weightMin+'%'">
                                    <div class="relative px-1 md:px-2 text-center right-9">
                                        <div class="absolute -top-18 left-2 w-24 bg-white border border-gold-light rounded-md">
                                            <p class="relative z-20 bg-white rounded-md p-1 text-xs text-gold-light">
                                                <span class="font-bold">{{__('diamondSearch.Your Dimaond')}}</span>  
                                                <span class="md:text-xl text-suranna">{{$diamond->weight}}</span>
                                                <span class="text-xs font-normal">{{__('diamondSearch.Carat')}}</span>
                                            </p>
                                            <div class="tooltip-top-triangle absolute -bottom-2 left-7 w-4 h-4 transform rotate-45 bg-white border border-gold-light"></div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="text-center">
                                    <span class="font-lato">0</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">1</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">2</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">3</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">4</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">5</span>
                                </div>
                            </div>
                            <div class="relative max-w-xs md:max-w-2xl max-w-full w-full">
                                <div>
                                    <div class="relative z-10 h-2">
                                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+weight+'%; left:'+minthumb+'%'"></div>
                                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+weight+'%'"></div>
                                        <div class="flex items-center justify-between absolute top-0 z-30 w-full h-2">
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-transparent"></div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            
                        </div> 
                    </div>   
                    <!-- Products -->
                    <div class="w-full gap-3 md:gap-7 md:items-center py-5 px-2 md:px-7 bg-grey-03">
                              
                        @livewire('customer-jewellery.post-fetch-row',
                        ['draggableId'=>'draggable3' , 'title' => $diamond->weight, 'type'=>'Diamond', 'upperType'=>'weight', 'query'=>$diamond->weight ])
                      
                      <!-- More Products .... -->
                    </div>
                    
                  </div>
                </li>
                <li class="flex flex-col border">
                    <h2 @click="tab2 = !tab2" class="flex flex-row justify-between items-center cursor-pointer py-3.5 px-7">
                      <span class="font-bold md:text-lg">{{__('diamondSearch.Diamond Clarity')}}｜{{$diamond->clarity}}</span>
                      <svg :class="{'rotate-180' : tab2}" class="rotate-0 fill-current transform duration-200" width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.31112 0.756836L8.31181 6.48184L14.3125 0.756836L16.1558 2.51934L8.31181 10.0193L0.467773 2.51934L2.31112 0.756836Z"/>
                      </svg>
                    </h2>
                    <div x-show="tab2" class="flex flex-col space-y-10 duration-200 transition-all pt-5 md:pt-7">
                      <p class="px-3 md:px-7">
                        @if($diamond->clarity == 'I1')
                            <span class="text-gray-600 text-lg">
                                {{__('diamondSearch.clarityI')}}
                            </span>
                        @endif
                        @if($diamond->clarity == 'SI2' || $diamond->clarity == 'SI1')
                            <span class="text-gray-600 text-lg" >{{__('diamondSearch.claritySi')}}
                            </span>
                        @endif
                        @if($diamond->clarity == 'VS2' || $diamond->clarity == 'VS1')                                
                            <span class="text-gray-600 text-lg" >
                                {{__('diamondSearch.clarityVs')}}
                            </span>
                        @endif
                        @if($diamond->clarity == 'VVS2' || $diamond->clarity == 'VVS1')                                
                            <span class="text-gray-600 text-lg" >{{__('diamondSearch.clarityVvs')}}
                            </span>
                        @endif
                        @if($diamond->clarity == 'IF' || $diamond->clarity == 'FL')                                
                            <span class="text-gray-600 text-lg" >
                                {{__('diamondSearch.clarityIf')}}
                            </span>
                        @endif
                        <br>
                        {{__('diamondSearch.clarityDescription1')}}
                        {{__('diamondSearch.clarityDescription2')}}
                        {{__('diamondSearch.clarityDescription')}}?
                        <a class="text-brown font-bold underline" href="/{{app()->getLocale()}}/education-diamond-grading/4cs/clarity" target="_blank">{{__('diamondSearch.Learn More')}}</a>
                      </p>
                      <div class="flex flex-col md:flex-row items-center space-y-5 md:space-y-0 w-full">
                          <div class="flex flex-col items-center md:space-y-3 md:mx-20">
                              <img class="w-16 md:w-40 h-16 md:h-28" src="/assets/images/dd-tab-2.png" />
                          </div>
                          <div class="flex flex-col w-full md:mr-16 space-y-5 px-2">
                            <div class="flex flex-wrap justify-between items-center gap-3 relative">
                                <div class="absolute" x-bind:style="'left: '+clarityMin+'%'">
                                    <div class="relative px-1 md:px-2 text-center right-9">
                                        <div class="absolute -top-18 left-2 w-24 bg-white border border-gold-light rounded-md">
                                            <p class="relative z-20 bg-white rounded-md p-1 text-xs text-gold-light">
                                                <span class="font-bold">{{__('diamondSearch.Your Dimaond')}}</span>  
                                                <span class="md:text-xl text-suranna">{{$diamond->clarity}}</span>
                                                <span class="text-xs font-normal">{{__('diamondSearch.Clarity')}}</span>
                                            </p>
                                            <div class="tooltip-top-triangle absolute -bottom-2 left-7 w-4 h-4 transform rotate-45 bg-white border border-gold-light"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">FL</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">IF</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">VVS1</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">VVS2</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">VS1</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">VS2</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">SI1</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">SI2</span>
                                </div>
                                <div class="text-center">
                                    <span class="font-lato">I1</span>
                                </div>
                            </div>
                            <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full">
                                <div>
                                    <div class="relative z-10 h-2">
                                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+clarity+'%; left:'+minthumb+'%'"></div>
                                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+clarity+'%'"></div>
                                        <div class="flex items-center justify-between absolute top-0 z-30 w-full h-2">
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-transparent"></div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            
                        </div> 
                      </div>   
                      <!-- Products -->
                      <div class="w-full gap-3 md:gap-7 md:items-center py-5 px-2 md:px-7 bg-grey-03">
                                  
                            @livewire('customer-jewellery.post-fetch-row',
                            ['draggableId'=>'draggable1' , 'title' => $diamond->clarity, 'type'=>'Diamond', 'upperType'=>'clarity', 'query'=>$diamond->clarity ])
                          
                          <!-- More Products .... -->
                      </div>
                    </div>
                </li>
                <li class="flex flex-col border">
                    <h2 @click="tab3 = !tab3" class="flex flex-row justify-between items-center cursor-pointer py-3.5 px-7">
                      <span class="font-bold md:text-lg">{{__('diamondSearch.Diamond Color')}}｜{{$diamond->color}}</span>
                      <svg :class="{'rotate-180' : tab3}" class="rotate-0 fill-current transform duration-200" width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.31112 0.756836L8.31181 6.48184L14.3125 0.756836L16.1558 2.51934L8.31181 10.0193L0.467773 2.51934L2.31112 0.756836Z"/>
                      </svg>
                    </h2>
                    <div x-show="tab3" class="flex flex-col space-y-10 duration-200 transition-all pt-5 md:pt-7">
                      <p class="px-3 md:px-7">
                        @if($diamond->color == 'D' || $diamond->color == 'E' || $diamond->color == 'F')
                            <span class="cut-text">{{__('diamondSearch.colorDtoF')}}
                            </span>
                        @endif
                        @if($diamond->color == 'G')
                        <span class="text-gray-600 text-lg">
                            {{__('diamondSearch.colorG')}}
                        </span>
                        @endif
                        @if($diamond->color == 'H')
                        <span class="text-gray-600 text-lg">
                            {{__('diamondSearch.colorH')}}
                        </span>
                        @endif
                        @if($diamond->color == 'I')
                        <span class="text-gray-600 text-lg">
                            {{__('diamondSearch.colorI')}}
                        </span>
                        @endif
                        @if($diamond->color == 'J')
                        <span class="text-gray-600 text-lg">
                            {{__('diamondSearch.colorJ')}}
                        </span>
                        @endif
                        <br>
                        {{__('diamondSearch.colorDescription')}}
                       {{__('diamondSearch.colorDescription1')}}
                         {{__('diamondSearch.Want to learn even more about colour')}}?
                        <a class="text-brown font-bold underline" href="/{{app()->getLocale()}}/education-diamond-grading/4cs/color" target="_blank">{{__('diamondSearch.Learn More')}}</a>
                      </p>
                      <div class="flex flex-col md:flex-row items-center space-y-5 md:space-y-0 w-full">
                          <div class="flex flex-col items-center md:space-y-3 md:mx-20">
                              <img class="w-16 md:w-44 h-16 md:h-32" src="/assets/images/dd-tab-3.png" />
                          </div>
                          <div class="flex flex-col w-full md:mr-16 space-y-5 px-2">
                            <div class="flex flex-wrap justify-between items-center gap-3 relative">
                                <div class="absolute" x-bind:style="'left: '+colorMin+'%'">
                                    <div class="relative px-1 md:px-2 text-center right-9">
                                        <div class="absolute -top-18 left-2 w-24 bg-white border border-gold-light rounded-md">
                                            <p class="relative z-20 bg-white rounded-md p-1 text-xs text-gold-light">
                                                <span class="font-bold">{{__('diamondSearch.Your Dimaond')}}</span>  
                                                <span class="md:text-xl text-suranna">{{$diamond->color}}</span>
                                                <span class="text-xs font-normal">{{__('diamondSearch.color')}}</span>
                                            </p>
                                            <div class="tooltip-top-triangle absolute -bottom-2 left-7 w-4 h-4 transform rotate-45 bg-white border border-gold-light"></div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="text-center">
                                      <span class="font-lato">D</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">E</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">F</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">G</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">H</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">I</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">J</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">K</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">L</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">M</span>
                                  </div>
                                  <div class="text-center">
                                      <span class="font-lato">N</span>
                                  </div>
                              </div>
                              <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full">
                                  <div>
                                      <div class="relative z-10 h-2">
                                          <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                                          <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+color+'%; left:'+minthumb+'%'"></div>
                                          <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+color+'%'"></div>
                                          <div class="flex items-center justify-between absolute top-0 z-30 w-full h-2">
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-white"></div>
                                              <div class="w-0.5 h-2 bg-transparent"></div>
                                          </div>
                                      </div>
                                  </div>    
                              </div>
                              
                          </div> 
                      </div>   
                      <!-- Products -->
                      <div class="w-full gap-3 md:gap-7 md:items-center py-5 px-2 md:px-7 bg-grey-03">
                                  
                            @livewire('customer-jewellery.post-fetch-row',
                            ['draggableId'=>'draggable2' , 'title' => $diamond->color, 'type'=>'Diamond', 'upperType'=>'color', 'query'=>$diamond->color ])
                          
                          <!-- More Products .... -->
                      </div>
                    </div>
                </li>
                <li class="flex flex-col border">
                    <h2 @click="tab4 = !tab4" class="flex flex-row justify-between items-center cursor-pointer py-3.5 px-7">
                      <span class="font-bold md:text-lg">{{__('diamondSearch.Diamond Cut')}}｜{{$diamond->cut==0?__('diamondSearch.No'):$diamond->cut}}</span>
                      <svg :class="{'rotate-180' : tab4}" class="rotate-0 fill-current transform duration-200" width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.31112 0.756836L8.31181 6.48184L14.3125 0.756836L16.1558 2.51934L8.31181 10.0193L0.467773 2.51934L2.31112 0.756836Z"/>
                      </svg>
                    </h2>
                    <div x-show="tab4" class="flex flex-col space-y-10 duration-200 transition-all pt-5 md:pt-7">
                      <p class="px-3 md:px-7">
                        @if($diamond->cut == 'EX' ||$diamond->cut == 'Excellent')
                            <span class="text-gray-600 text-lg">
                                {{__('diamondSearch.cutEx')}}
                            </span>
                        @endif
                        @if($diamond->cut == 'VG' || $diamond->cut == 'Very Good')
                            <span class="text-gray-600 text-lg">
                                {{__('diamondSearch.cutVg')}}
                            </span>
                        @endif
                        @if($diamond->cut == 'GD' || $diamond->cut == 'Good')
                            <span class="text-gray-600 text-lg">
                                {{__('diamondSearch.cutGd')}}
                            </span>
                        @endif
                        <br>
                        {{__('diamondSearch.cutDesrciption')}}
                        {{__('diamondSearch.Want to learn even more about cut')}}? 
                        <a class="text-brown font-bold underline" target="_blank" href="/{{app()->getLocale()}}/education-diamond-grading/4cs/cut">{{__('diamondSearch.Learn More')}}</a>
                      </p>
                      <div class="flex flex-col md:flex-row items-center md:justify-center space-y-16 md:space-y-0 w-full">
                            <div class="flex flex-col items-center md:space-y-3 md:mx-10">
                                <img class="" src="/assets/images/dd-tab-4.png" />
                            </div>
                            <div class="flex flex-col w-full max-w-md md:mr-16 space-y-5">
                                <div class="flex flex-wrap justify-between items-center gap-3">
                                    <div class="relative text-center">
                                        <span class="font-lato">Excellent</span>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-lato">Very Good</span>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-lato">Good</span>
                                    </div>
                                </div>
                                <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full">
                                    <div>
                                        <div class="relative z-10 h-2">
                                            <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                                            <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+cut+'%; left:'+minthumb+'%'"></div>
                                            <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+cut+'%'"></div>
                                            <div class="flex items-center justify-between absolute top-0 z-30 w-full h-2">
                                                <div class="w-0.5 h-2 bg-white"></div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                
                            </div> 
                      </div>   
                    <!-- Products -->
                        <div class="w-full gap-3 md:gap-7 md:items-center py-5 px-2 md:px-7 bg-grey-03">
                                  
                            @livewire('customer-jewellery.post-fetch-row',
                            ['draggableId'=>'draggable3' , 'title' => $diamond->cut, 'type'=>'Diamond', 'upperType'=>'cut', 'query'=>$diamond->cut ])
                          
                          <!-- More Products .... -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>


        <script>
        function sliders(){
            return{
                tab1:true,
                tab2:false,
                tab3:false,
                tab4:false,
                weight:@json($diamond->weight),
                weightMin:0,
                color:@json($diamond->color),
                colorMin:0,
                clarity:@json($diamond->clarity),
                clarityMin:0,
                cut:@json($diamond->cut),
                cutMin:0,
                maxthumb:1,
                minthumb:0,
                init(){
                    this.cal()
                },
                cal(){
                    this.weightMin = this.weight/5*100 
                    this.weight =100 - this.weightMin
                    this.setClarity()
                    this.setColor()
                    this.setCut()
                },
                calClarity(i){
                    this.clarityMin = Math.round( i/8*100 )
                    this.clarity =100 - this.clarityMin
                },
                setClarity(){
                    var c = ['FL','IF','VVS1','VVS2','VS1','VS2','SI1','SI2','I1']
                    for (var i = 0; c.length >= i ; i++) {
                        if(c[i]== this.clarity){
                            this.calClarity(i)
                        }
                    }
                },
                calColor(i){
                    this.colorMin = Math.round( i/10*100 )
                    this.color =100 - this.colorMin
                },
                setColor(){
                    var c = ['D','E','F','G','H','I','J','K','L','M','N']
                    for (var i = 0; c.length >= i ; i++) {
                        if(c[i]== this.color){
                            this.calColor(i)
                        }
                    }
                },
                calCut(i){
                    this.cutMin = Math.round( i/2*100 )
                    this.cut =100 - this.cutMin
                },
                setCut(){
                    var c = ['EX','VG','GD']
                    for (var i = 0; c.length >= i ; i++) {
                        if(c[i]== this.cut){
                            this.calCut(i)
                        }
                    }
                },                
            }
        }
    </script>



    @endSection



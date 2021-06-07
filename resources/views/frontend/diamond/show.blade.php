@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{ $title }} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{ $title }} {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="{{ $tags }}"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{ $title }} {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{ $title }} {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}"> 
        <meta itemprop="image" content="{{url('/images/front-end/home/h1_300-1.png')}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{ $title }} {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{ $title }} {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{ $title }} {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{ $tags }}" /> 


        <!-- Fonts -->
       
 

    @endSection

    @section('content')
    <div class=" sm:px-4 md:px-8">        
        <div id="diamondViewerShow">
            <div class="flex justify-center p-6 text-center" >
                <h1 class="text-gray-600 sm:text-2xl">{{ $title }}</h1>                        
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 p-1 sm:px-6">
                <keep-alive>
                    <div class="box">
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
                                <iframe :src="diamond.video_link.replace('http:','https:')" width="100%" height="700" ></iframe>
                            </div>
                            <div v-if="diamond.plot && selectingShowType == 'plot' ">
                                <img class="w-full" :src="storageURL + 'plots/' + diamond.id + '.jpg' "  width="100%" height="auto"></img>
                            </div>
                            <div v-if="!diamond.image_cache && selectingShowType == null">
                                <img class="w-full" :src="`/images/front-end/diamond_show/RoundDiamonds_sample.png`"></img>
                            </div>
                            </div>
                        </div>

                        <div class="flex items-center w-2/6">
                                <img v-if="diamond.video_link" @click="selectingShowType = 'video'"  :src="`/images/front-end/diamond_show/d360_degree.png`" class="p-2 w-auto" :class="{ ' border border-blue-500': selectingShowType == 'video'}"></img>
                                <img v-if="diamond.image_cache" @click="selectingShowType = 'image'"  :src="storageURL + 'images/' + diamond.id + '.jpg' " class="p-2 w-auto" :class="{ ' border border-blue-500': selectingShowType == 'image'}"></img>
                                <img v-if="diamond.plot" :src="storageURL + 'plots/' + diamond.id + '.jpg' " @click="selectingShowType = 'plot'" class="p-2 w-auto" :class="{ ' border border-blue-500': selectingShowType == 'plot'}"></img>
                                
                        </div>
                    </div>
                </keep-alive>

                <div class="box p-4">
                     
                      <div class="message-body">
                        <center>
                            @if($diamond->available)
                                <strong>
                                    <h3 class="text-primary text-2xl">{{__('diamondSearch.Price')}} HK$: {{$diamond->price}}
                                        <h4 class="text-gray-600 text-xl">({{__('diamondSearch.location')}} : {{$diamond->location == '1Hong Kong'? __('diamondSearch.1-2 Days') : __('diamondSearch.Order')}} )</h4>
                                    </h3>

                                </strong>
                            @else
                                <strong><p class="text-2xl"> {{__('diamondSearch.Sold')}}</p></strong>
                            @endif
                        </center>
                      </div>
                      <div class="p-2">
                        <center>
                            
                            <shopping-cart :item="diamond" :type="shoppingCartType" title="{{$title}}" ></shopping-cart>
                            @if($diamond->location == '1Hong Kong')
                                <x-appointment/>
                            @endif
                            
<!--                             <button  v-if="diamond.location == '1Hong Kong' " class="btn btn-primary" @click="appointmentState=!appointmentState">{{trans('diamondSearch.Appointment')}}</button>
                            <appointment  v-model="diamond" :title="appointmentTitle" @active="appointmentState=!appointmentState" :active="appointmentState" :columns="columns" :processing="false" :langs="langs" :locale="locale"></appointment>
 -->                            
                        </center>
                      </div>

                        <br>
                        <p>
                        {{trans('diamondSearch.For more detailed information, can reach GIA website query')}}：
                        </p>
                        <a target="_blank" :href="`https://www.gia.edu/report-check?reportno=${diamond.certificate}`">
                            <div class="">
                            <div class="w-auto">
                                <img class="w-auto" src="https://www.gia.edu/onlineopinionV5/GIA-Logo.png" class="w-auto">
                            </div>
                            <button class="btn btn-primary">GIA {{trans('diamondSearch.Certificate Download')}}</pbutton>
                            </div>
                        </a>
                       
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b text-lg font-semibold">
                                    {{trans('diamondSearch.Diamond Info')}}
                                </div>
                                <div class="col-span-6 p-2 border-b"> 
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?shape=' . $diamond->shape }}" target="_blank">
                                        ( {{__($diamond->shape)}} )
                                    </a>
                                </div>
                            </div>
                            
                       
                        
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">{{trans('diamondSearch.Stock no')}}
                                </div>
                                <div class="col-span-6 p-2 border-b font-light"> TD-LD{{$diamond->location}}-{{$diamond->id}}</div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light flex">
                                    {{trans('diamondSearch.Carat Weight')}}
                                    <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/carat' }}" target="_blank">
                                        <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                                          <g>
                                            <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                                            <rect x="241" y="353.5" width="30" height="30"/>
                                            <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                                          </g>
                                        </svg>
                                      </a>
                                </div>
                                <div class="col-span-6 p-2 border-b font-light">
                                     <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?weight=' . $diamond->weight }}" target="_blank">
                                        {{$diamond->weight}}
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light flex">
                                    {{trans('diamondSearch.Color Grade')}}
                                    <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/color' }}" target="_blank">
                                        <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                                          <g>
                                            <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                                            <rect x="241" y="353.5" width="30" height="30"/>
                                            <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                                          </g>
                                        </svg>
                                      </a>                                    
                                </div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?color=' . $diamond->color }}" target="_blank">
                                        {{$diamond->color}}
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light flex">
                                    {{trans('diamondSearch.Clarity Grade')}}
                                    <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/clarity' }}" target="_blank">
                                        <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                                          <g>
                                            <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                                            <rect x="241" y="353.5" width="30" height="30"/>
                                            <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                                          </g>
                                        </svg>
                                      </a>                                    
                                </div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?clarity=' . $diamond->clarity }}" target="_blank">
                                        {{$diamond->clarity}}
                                    </a>
                                </div>
                            </div>


                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light flex">
                                    {{trans('diamondSearch.Cut Grade')}}
                                    <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/cut' }}" target="_blank">
                                        <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                                          <g>
                                            <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                                            <rect x="241" y="353.5" width="30" height="30"/>
                                            <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                                          </g>
                                        </svg>
                                      </a>                                    
                                </div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?cut=' . $diamond->cut }}" target="_blank">
                                        {{$diamond->cut}}
                                    </a>
                                </div>
                            </div>
                       


                       
                        
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light flex">
                                    {{trans('diamondSearch.Polish')}}
                                    <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/polish' }}" target="_blank">
                                        <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                                          <g>
                                            <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                                            <rect x="241" y="353.5" width="30" height="30"/>
                                            <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                                          </g>
                                        </svg>
                                      </a>
                                </div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?polish=' . $diamond->polish }}" target="_blank">
                                        {{$diamond->polish}}
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light flex">
                                    {{trans('diamondSearch.Symmetry')}}
                                    <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/symmetry' }}" target="_blank">
                                        <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                                          <g>
                                            <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                                            <rect x="241" y="353.5" width="30" height="30"/>
                                            <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                                          </g>
                                        </svg>
                                      </a>                                    
                                </div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?symmetry=' . $diamond->symmetry }}" target="_blank">
                                        {{$diamond->symmetry}}
                                    </a>
                                </div>
                            </div>
                       


                       
                        
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light flex">
                                    {{trans('diamondSearch.Fluorescence')}}
                                    <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/fluorescence' }}" target="_blank">
                                        <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                                          <g>
                                            <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                                            <rect x="241" y="353.5" width="30" height="30"/>
                                            <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                                          </g>
                                        </svg>
                                      </a>                                    
                                </div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?fluorescence=' . $diamond->fluorescence }}" target="_blank">
                                        {{$diamond->fluorescence}}
                                    </a>
                                </div>
                            </div>
                       

                       
                        
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light flex">
                                    {{trans('diamondSearch.Certificate')}}
                                    <a href="/{{app()->getLocale() . '/education-diamond-grading/gia-report' }}" target="_blank">
                                        <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                                          <g>
                                            <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                                            <rect x="241" y="353.5" width="30" height="30"/>
                                            <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                                          </g>
                                        </svg>
                                      </a>                                     
                                </div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="https://www.gia.edu/report-check?reportno={{$diamond->certificate}}" target="_blank">
                                        {{$diamond->certificate}}                                    
                                    </a>
                                </div>
                            </div>
                       
                        </div>
                    </div>

                    <div class="grid grid-cols-12">
                        <div class="col-span-12 p-4">
                            <div v-if="!loadingStatus.cert">
                                <center>
                                    <img class="w-1/3" src="/images/front-end/loader.gif" >
                                </center>
                            </div>

                            <div v-if="loadingStatus.cert" class="w-full" >
                                <img class="w-full" :src="storageURL + 'certs/' + diamond.id + '.jpg' "  v-if="diamond.cert_cache">
                            </div>


                        </div>
                    </div>
                </div>



            <div class="flex justify-center p-4">
                <div class="flex-auto">
        
                    <h3 class="sm:text-2xl">
                        {{trans('diamondSearch.DIAMOND SIZE')}}: {{$diamond->weight}} {{__('diamondSearch.Carat')}}
                    </h3>
                    <br>
                           
                    <p1 class="subtitle is-6">
                        {{trans('diamondSearch.caratDescription')}}
                    </p1>
                    <p1 class="subtitle is-6">
                        {{trans('diamondSearch.caratDescription1')}}
                    </p1>
                                       
                    <a class="text-blue-400" href="/{{app()->getLocale()}}/education-diamond-grading/4cs/carat/">
                        {{trans('diamondSearch.Learn More')}}
                    </a>
                                       
                    <br>
                                
                    <img class="w-auto" src="/images/front-end/diamond_show/diamond_weight.jpg" width="100%">
                    

                </div>
            </div>
            <div class="p-2 text-center border-b">
                <p class="text-2xl">{{__('customerJewellery.Cusomter Jewellery')}}
                    <a class="text-blue-600 text-lg" href="/{{app()->getlocale()}}/customer-jewellery" target="_blank">
                    ( {{$diamond->weight}} {{__('diamondSearch.Carat')}} )</a>
                </p>
                @livewire('customer-jewellery.post-fetch-row',
                  ['draggableId'=>'draggable0' , 'type'=>'Diamond', 'upperType'=>'weight', 'query'=>$diamond->weight ])
            </div>


            <div class="flex justify-center p-4">
                <div class="flex-auto">
                    <div style="background-image: url('/images/front-end/diamond_show/diamond_clarity.jpg'); background-repeat: no-repeat; background-size: cover;">
                        <div class="p-8 sm:p-24 lg:p-56">
                            <h3 class="text-white">{{trans('diamondSearch.Clarity')}}: {{$diamond->clarity}}</h3>
                            <hr style="border: 0.2px solid white; ">

                            @if($diamond->clarity == 'I1')
                                <span class="text-white p-2">
                                    {{trans('diamondSearch.clarityI')}}
                                </span>
                            @endif
                            @if($diamond->clarity == 'SI2' || $diamond->clarity == 'SI1')
                                <span class="text-white p-2" >{{trans('diamondSearch.claritySi')}}
                                </span>
                            @endif
                            @if($diamond->clarity == 'VS2' || $diamond->clarity == 'VS1')                                
                                <span class="text-white p-2" >
                                    {{trans('diamondSearch.clarityVs')}}
                                </span>
                            @endif
                            @if($diamond->clarity == 'VVS2' || $diamond->clarity == 'VVS1')                                
                                <span class="text-white p-2" >{{trans('diamondSearch.clarityVvs')}}
                                </span>
                            @endif
                            @if($diamond->clarity == 'IF' || $diamond->clarity == 'FL')                                
                                <span class="text-white p-2" >
                                    {{trans('diamondSearch.clarityIf')}}
                                </span>
                            @endif

                            <hr>
                            
                            <span class="text-white">
                                {{trans('diamondSearch.clarityDescription')}}?
                                <br>
                                <a class="text-blue-400" href="/{{app()->getLocale()}}/education-diamond-grading/4cs/clarity/">
                                    {{trans('diamondSearch.Learn More')}}
                                </a>
                            </span>
                            <span class="text-white">
                                <li>{{trans('diamondSearch.clarityDescription1')}}
                                </li>
                                <li>
                                {{trans('diamondSearch.clarityDescription2')}}</li>
                            </span>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="p-2 text-center border-b">
                <p class="text-2xl">{{__('customerJewellery.Cusomter Jewellery')}}
                    <a class="text-blue-600 text-lg" href="/{{app()->getlocale()}}/customer-jewellery" target="_blank">
                    ( {{$diamond->clarity}} {{__('diamondSearch.Clarity')}} )</a>
                </p>                
                @livewire('customer-jewellery.post-fetch-row',
                  ['draggableId'=>'draggable1' , 'type'=>'Diamond', 'upperType'=>'clarity', 'query'=>$diamond->clarity  ])
            </div>

            <div class="flex justify-center p-4">
                <div class="flex-auto">
                    <article>
                        <div class="">
                        
                            <center>
                                <h3 class="sm:text-2xl">
                                    {{trans('diamondSearch.Diamond Color')}}: {{$diamond->color}} 
                                </h3>
                                <br>
                            </center>
                        
                        </div>

                        <div class="flex justify-center">
                            <div class="flex-auto">
                                <center>
                                    @if($diamond->color == 'D' || $diamond->color == 'E' || $diamond->color == 'F')
                                        <span class="cut-text">{{trans('diamondSearch.colorDtoF')}}
                                        </span>
                                    @endif
                                    @if($diamond->color == 'G')
                                    <span class="cut-text">
                                        {{trans('diamondSearch.colorG')}}
                                    </span>
                                    @endif
                                    @if($diamond->color == 'H')
                                    <span class="cut-text">
                                        {{trans('diamondSearch.colorH')}}
                                    </span>
                                    @endif
                                    @if($diamond->color == 'I')
                                    <span class="cut-text">
                                        {{trans('diamondSearch.colorI')}}
                                    </span>
                                    @endif
                                    @if($diamond->color == 'J')
                                    <span class="cut-text">
                                        {{trans('diamondSearch.colorJ')}}
                                    </span>
                                    @endif


                                <center>
                                    {{trans('diamondSearch.Want to learn even more about colour')}}?
                                    <a class="text-blue-400" href="/{{app()->getLocale()}}/education-diamond-grading/4cs/color/">
                                    {{trans('diamondSearch.Learn More')}}
                                    </a>
                                    </center>
                                    
                                </center>
                                
                            </div>
                            <div class="flex-auto">
                                <center>
                                    <p1 class="subtitle is-6">
                                        <li>{{trans('diamondSearch.colorDescription')}}
                                        </li>
                                    </p1>
                                    <br>
                                    <p1 class="subtitle is-6">
                                        <li>{{trans('diamondSearch.colorDescription1')}}
                                        </li>
                                    </p1>
                                </center>
                                
                            </div>
                            <br>
                        </div>
                        <img class="w-auto" src="/images/front-end/diamond_show/diamond_color.jpg" width="100%">                        
                    </article>
                </div>
            </div>
             <div class="p-2 text-center border-b">
                <p class="text-2xl">{{__('customerJewellery.Cusomter Jewellery')}}
                    <a class="text-blue-600 text-lg" href="/{{app()->getlocale()}}/customer-jewellery" target="_blank">
                    ( {{$diamond->color}} {{__('diamondSearch.Color')}} )</a>
                </p>  
                @livewire('customer-jewellery.post-fetch-row',
                  ['draggableId'=>'draggable2' , 'type'=>'Diamond', 'upperType'=>'color', 'query'=>$diamond->color  ])
            </div>

                            
            <div class="flex justify-center p-4">
                <div class="flex-auto">
                    <div class="image-background" style="background-image: url('/images/front-end/diamond_show/diamond_cut.jpg'); background-repeat: no-repeat; background-size: cover;">
                        <div class="p-8 sm:p-24 lg:p-56">
                            <h3 class="text-white border-b border-white sm:text-2xl">{{trans('diamondSearch.Cut Grade')}}: {{$diamond->cut}}</h3>
                            @if($diamond->cut == 'EX' ||$diamond->cut == 'Excellent')
                                <span class="text-white">
                                    {{trans('diamondSearch.cutEx')}}
                                </span>
                            @endif
                            @if($diamond->cut == 'VG' || $diamond->cut == 'Very Good')
                                <span class="text-white">
                                    {{trans('diamondSearch.cutVg')}}
                                </span>
                            @endif
                            @if($diamond->cut == 'GD' || $diamond->cut == 'Good')
                                <span class="text-white">
                                    {{trans('diamondSearch.cutGd')}}
                                </span>
                            @endif
                            <span class="text-white">{{trans('diamondSearch.Want to learn even more about cut')}}? 
                           <a class="text-blue-400" href="/{{app()->getLocale()}}/education-diamond-grading/4cs/cut/">{{__('diamondSearch.Learn More')}}<br>
                           </a>
                            </span>
                            <span class="text-white">
                            {{trans('diamondSearch.cutDesrciption')}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 text-center border-b">
                <p class="text-2xl">{{__('customerJewellery.Cusomter Jewellery')}}
                    <a class="text-blue-600 text-lg" href="/{{app()->getlocale()}}/customer-jewellery" target="_blank">
                    ( {{$diamond->shape}} {{__('diamondSearch.Shape')}} )</a>
                </p>  
                @livewire('customer-jewellery.post-fetch-row',
                  ['draggableId'=>'draggable3' , 'type'=>'Diamond', 'upperType'=>'shape', 'query'=>$diamond->shape  ])
            </div>

        </div>



         <script type="text/javascript">            

            function draggableItem(item) {
               let isDown = false;
               let startX;
               let scrollLeft;
              console.log(item)
               item.addEventListener('mousedown', (e) => {
                isDown = true;
                item.classList.add('active');
                startX = e.pageX - item.offsetLeft;
                scrollLeft = item.scrollLeft;
               });
               item.addEventListener('mouseleave', () => {
                isDown = false;
                item.classList.remove('active');
               });
               item.addEventListener('mouseup', () => {
                isDown = false;
                item.classList.remove('active');
               });
               item.addEventListener('mousemove', (e) => {
                if(!isDown) return;
                e.preventDefault();
                const x = e.pageX - item.offsetLeft;
                const walk = (x - startX) * 3; //scroll-fast
                item.scrollLeft = scrollLeft - walk;
               });
              item.addEventListener("touchstart", (e)=>{
                  isDown = true;
                  item.classList.add('active');
                  startX = e.changedTouches[0].pageX - item.offsetLeft;
                  scrollLeft = item.scrollLeft;
               }, false);

               item.addEventListener("touchend", () => {
                isDown = false;
                item.classList.remove('active')}, false);

               item.addEventListener('touchmove', (e) => {
                if(!isDown) return;
                e.preventDefault();
                const x = e.changedTouches[0].pageX - item.offsetLeft;
                const walk = (x - startX) * 3; //scroll-fast
                item.scrollLeft = scrollLeft - walk;
               },false);

            }

            const draggable0 = document.getElementById('draggable0');
            draggableItem(draggable0)
            const draggable1 = document.getElementById('draggable1');
            draggableItem(draggable1)
            const draggable2 = document.getElementById('draggable2');
            draggableItem(draggable2)
            const draggable3 = document.getElementById('draggable3');
            draggableItem(draggable3)

          </script>

    @endSection

        <script>document.write()</script>



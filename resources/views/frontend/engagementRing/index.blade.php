@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('engagementRing.metaTitle2')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('engagementRing.metaDescription2')}} - {{trans('home.meta2')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('engagementRing.metaTitle2')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('engagementRing.metaDescription2')}} - {{trans('home.meta2')}}"> 
        <meta itemprop="image" content="{{url('/front_end/home/h1_300-1.png')}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('engagementRing.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url('/')}}" />
        <meta property="og:image" content="{{url('/front_end/home/h1_300-1.png')}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription2')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('engagementRing.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 


    @endSection

    @section('content')
        <br>
            <div class="flex justify-center" >
                <div class="text-center">
                <center>
                   <h1 class="sm:text-2xl">{{trans('engagementRing.metaTitle2')}}</h1>

                   <button class="btn btn-primary">
                       <a href="/{{app()->getLocale() . '/gia-loose-diamonds'}}" class=" flex justify-center"  target="_blank">
                        {{__('engagementRing.Choose Diamond First')}}                     
                        <svg class="fill-current w-6 h-6 h-6 text-white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                       viewBox="0 0 295.82 295.82" style="enable-background:new 0 0 295.82 295.82;" xml:space="preserve">
                        <g>
                          <path d="M85.06,140.048c-0.905-2.492-3.389-4.138-6.041-4.138H10.706c-2.251,0-4.195,1.121-5.072,3.078
                            c-0.878,1.957-0.494,4.169,1.003,5.851L123.963,276.58c1.424,1.602,3.002,1.926,4.075,1.927l2.649-0.03l1.494-2.132
                            c0.58-0.828,1.423-2.532,0.544-4.959L85.06,140.048z"/>
                          <path d="M186.238,138.141c-1.082-1.479-2.778-2.231-4.652-2.231h-67.35c-1.872,0-3.567,0.751-4.65,2.227
                            c-1.082,1.476-1.381,3.299-0.818,5.088l34.074,107.961c0.746,2.361,2.735,3.876,5.068,3.876c2.337,0,4.327-1.535,5.069-3.896
                            l34.072-107.934C187.617,141.446,187.321,139.619,186.238,138.141z"/>
                          <path d="M113.72,111.413c1.006,1.691,2.824,2.497,4.863,2.497h62.546c2.037,0,3.854-0.804,4.861-2.494
                            c1.007-1.69,1.029-3.666,0.058-5.461l-31.321-57.697c-0.998-1.835-2.863-2.949-4.87-2.949c-2.011,0-3.878,1.155-4.872,2.991
                            l-31.317,57.644C112.694,107.737,112.713,109.721,113.72,111.413z"/>
                          <path d="M58.275,113.91c2.315,0,4.276-1.058,5.118-3.089c0.842-2.032,0.348-4.209-1.29-5.846L29.576,72.499
                            c-1.108-1.108-2.566-1.692-4.104-1.692c-2.017,0-3.857,1.057-4.926,2.807L0.861,105.86c-1.087,1.785-1.148,3.697-0.162,5.451
                            c0.985,1.754,2.821,2.6,4.912,2.6H58.275z"/>
                          <path d="M203.513,93.376c1.017,1.87,2.944,3.031,5.03,3.032c1.526,0,2.975-0.606,4.083-1.713l43.4-43.4
                            c2.021-2.025,2.402-5.266,0.913-7.697L242.583,20.12c-1.188-1.941-3.513-3.21-5.788-3.21h-65.394c-2.039,0-3.858,0.975-4.864,2.667
                            c-1.007,1.691-1.026,3.753-0.055,5.542L203.513,93.376z"/>
                          <path d="M85.289,97.999c1.104,1.107,2.556,1.717,4.087,1.717c2.086,0,4.014-1.162,5.032-3.036l38.824-71.582
                            c0.971-1.792,0.948-3.834-0.059-5.524c-1.007-1.69-2.824-2.663-4.861-2.663H59.024c-2.278,0-4.605,1.271-5.788,3.212L38.418,44.37
                            c-1.488,2.443-1.099,5.674,0.922,7.688L85.289,97.999z"/>
                          <path d="M285.115,135.91h-68.313c-2.652,0-5.136,1.646-6.041,4.139l-47.667,131.337c-0.878,2.424-0.035,4.359,0.545,5.186
                            l1.541,2.337h2.397v-0.207c1,0,2.754-0.441,4.174-2.038l117.382-131.822c1.497-1.682,1.906-3.872,1.028-5.829
                            C289.284,137.057,287.366,135.91,285.115,135.91z"/>
                          <path d="M294.956,105.861l-20.14-32.986c-1.069-1.749-2.91-2.793-4.926-2.793c-1.539,0-2.997,0.61-4.104,1.719l-33.273,33.272
                            c-1.64,1.636-2.137,3.711-1.296,5.744c0.841,2.034,2.803,3.093,5.12,3.093h53.873c2.092,0,3.93-0.844,4.914-2.6
                            C296.109,109.554,296.045,107.644,294.956,105.861z"/>
                        </g>
                      </svg> 
                        </a>
                   </button>
                </center>                    
                </div>
            </div>


        <div id="engagementRings">
            <div class="block justify-center">
                <div class="">
                    <br>

                    @include('frontend.engagementRing.engagementRingContent')
                    
                </div>
                
            </div>
            
        </div>

    @endSection




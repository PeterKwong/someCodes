@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle14')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription14')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle14')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription14')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle14')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription14')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle14')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 


    @endSection

    @section('content')
        <br>


        <div id="education">
            <div class="p-4">
                <div class="">
                    <br>

                    <div class="grid grid-cols-12 text-center" >
                        <div class="col-span-2 col-start-2">
                            <center>     
                                    <figure>
                                        <img class=" img-thumbnail" :src="'/images/front-end/education/' + activedSubTab +'/pageImage.jpg'"  >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col-span-8">
                            <center>
                                <h3 class="title is-5">{{__('education.eyeCleanTitle1')}}</h3>
                                {{__('education.According to their ratings, GIA diamond gradings of clarity in Flawless (FL), within Internal Flawless (IF), very very slight (VVS), and slight (VS) are eye clean visually')}}
                            </center>
                        </div>
                    </div>

                    <br>

                    <div class="grid grid-cols-12 text-center" >
                        <div class="col-span-12 sm:col-span-10">

                            <ul class="flex justify-center items-center border-b" id="myTab" role="tablist">
                              <li class="">
                                <a class="text-blue-600 text-center px-2"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-certficate" role="tab" aria-controls="carat" aria-selected="true">{{__('education.Diamond certficate')}}</a>
                              </li>
                              <li class="">
                                <a class="text-blue-600 text-center px-2"  id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report" role="tab" aria-controls="cut" aria-selected="true">{{__('education.Gia Report')}}</a>
                              </li>
                              <li class="">
                                <a class="nav-link bg-blue-300 text-white"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-eye-clean" role="tab" aria-controls="color" aria-selected="true">{{__('education.Eye Clean Diamond')}}</a>
                              </li>
                            </ul>
                            
                            <br>

                            <article class="message is-primary" v-if="activedSubTab=='grading-eye-clean'">
                              <div class="level is-centered">
                                <div class="message-body">
                                <center>

                                <center><p class="title is-6">{{trans('education.eyeCleanTitle1')}}</p></center>
                                <div class="grid grid-cols-12">
                                    <div class="col-span-10">
                                        <li>{{trans('education.eyeCleanPara1')}}</li>
                                    </div>
                                    <div class="col-span-2">
                                        <a>
                                        <center>  
                                          <p>{{__('education.Eye Clean Diamond')}}</p>
                                            <img class="img-thumbnail" src="/images/front-end/education/grading-eye-clean/pageImage1.jpg">
                                        </center>
                                          </a>
                                    </div>
                                
                                </center>
                                <li>{{trans('education.eyeCleanPara2')}}</li>
                                <li>{{trans('education.eyeCleanPara2.1')}}</li>
                                <li>{{trans('education.eyeCleanPara3')}}</li>
                                <li>{{trans('education.eyeCleanPara4')}}</li>
                              </div>
                                 

                              </div>
                              
                            </article>

                        </div>
                      @include('layouts.components.sideBar')
                    </div>




                </div>
                
            </div>
            
        </div>

    @endSection




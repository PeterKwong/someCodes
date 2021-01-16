@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle4')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription4')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle4')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription4')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle4')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription4')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle4')}} - {{trans('home.webTitle')}}" /> 
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
                        <div class="col-span-6 sm:col-span-2 sm:col-start-2">
                            <center>     
                                    <figure>
                                        <img class=" img-thumbnail" :src="'/images/front-end/education/clarity/pageImage.jpg'" >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col-span-6 sm:col-span-8">
                            <center>
                                <h3 class="sm:text-xl font-semibold">{{__('education.DIAMOND Clarity | EDUCATION')}}</h3>
                                {{__('education.To select a diamond, and its inclusions will not affect the overall beauty of the diamond, which is very important.')}} 
                            </center>
                        </div>
                    </div>

                    <br>

                    <div class="grid grid-cols-12 text-center" >
                      <div class="col-span-12 sm:col-span-10">
                        <ul class="flex justify-center items-center border-b" id="myTab" role="tablist">
                          <li class="">
                            <a class="text-blue-600 text-center px-2"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat" role="tab" aria-controls="carat" aria-selected="true">{{__('education.Diamond Carat')}}</a>
                          </li>
                          <li class="">
                            <a class="text-blue-600 text-center px-2" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut" role="tab" aria-controls="cut" aria-selected="true">{{__('education.Diamond Cut')}}</a>
                          </li>
                          <li class="">
                            <a class="text-blue-600 text-center px-2"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color" role="tab" aria-controls="color" aria-selected="true">{{__('education.Diamond Color')}}</a>
                          </li>
                          <li class="">
                            <a class="nav-link bg-blue-300 text-white"  id="contact-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity" role="tab" aria-controls="clarity" aria-selected="true">{{__('education.Diamond Clarity')}}</a>
                          </li>
                        </ul>                    
                        <br>


                        <div class="tab-pane fade active show "      
                            id="contact" role="tabpanel" aria-labelledby="contact-tab">

                          <br>

                          <div class="grid grid-cols-12 text-center">
                            <div class="col-span-6 sm:col-span-8">
                                <p class="sm:text-xl font-semibold">{{trans('education.clarityTitle1')}}</p>
                                <li>{{trans('education.clarityPara1')}}</li>
                            </div>
                            <div class="col-span-6 sm:col-span-4 flex justify-center">
                                <figure class="image is-128x128">
                                  <p>{{__('education.Diamond Clarity')}}</p>
                                  <img class="img-fluid" src="/images/front-end/education/clarity/pageImage.jpg">
                                </figure>
                            </div>
                          </div>

                          <div class="grid grid-cols-12 text-center">
                            <div class="col-span-12">
                                <p class="sm:text-xl font-semibold">{{trans('education.clarityPara2')}}</p>
                            </div>
                          </div>

                          <div class="grid grid-cols-12 text-center">
                            <div class="col-span-12">
                                <figure class="image is-128x128">
                                  <p>{{__('education.Diamond Clarity')}}</p>
                                  <img class="img-fluid" src="/images/front-end/education/clarity/1100808_orig.jpg">
                                </figure>
                            </div>
                          </div>
                        </div>

                        <br>

                        <div class="grid grid-cols-12 text-center">
                            <div class="col-span-10">
                                <h2 class="sm:text-xl font-semibold"><span>&nbsp;</span><strong><a>{{trans('home.Must Watch')}} : </a></strong><small>{{trans('home.GIA Teaches You 4Cs')}} - {{trans('home.How To Choose Giamond')}}</small></h2>
                                @include('layouts.components.giaVideo')
                            </div>
                        </div>


                      </div>
                    @include('layouts.components.sideBar')

                    </div>



                </div>
                
            </div>
            
        </div>

    @endSection



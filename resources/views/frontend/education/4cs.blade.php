@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle1')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription1')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle1')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription1')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription1')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
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
                        <div class="col-span-6 sm:col-start-2 sm:col-span-2">
                            <center>     
                                    <figure>
                                        <img class=" img-thumbnail" :src="'/images/front-end/education/' + activedSubTab +'/pageImage.jpg'" >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col-span-6 sm:col-span-8">
                            <center>
                                <h3 class="sm:text-2xl">{{trans('education.DIAMOND GRADING | EDUCATION')}}</h3>
                                {{trans('education.It increases the weight of a diamond, and looking up from the diameter of the surface will also increase, but add a lot of weight, just add a little diameter.')}}
                            </center>
                        </div>
                    </div>


                    <br>


                    <div class="grid grid-cols-12">
                      <div class="col-span-12 sm:col-span-10">
                        <div class="flex justify-center items-center border-b" id="myTab" role="tablist">
                          <div class="">
                            <a class="nav-link bg-blue-300 text-white"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat" role="tab" aria-controls="carat" aria-selected="true">{{__('education.Diamond Carat')}}</a>
                          </div>
                          <div class="">
                            <a class="text-blue-600 text-center px-2" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut" role="tab" aria-controls="cut" aria-selected="true">{{__('education.Diamond Cut')}}</a>
                          </div>
                          <div class="">
                            <a class="text-blue-600 text-center px-2"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color" role="tab" aria-controls="color" aria-selected="true">{{__('education.Diamond Color')}}</a>
                          </div>
                          <div class="">
                            <a class="text-blue-600 text-center px-2"  id="contact-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity" role="tab" aria-controls="clarity" aria-selected="true">{{__('education.Diamond Clarity')}}</a>
                          </div>
                        </div>


                        <div class="" id="myTabContent">
                          <div class="" 
                              id="carat" role="tabpanel" aria-labelledby="carat-tab">

                              <br>

                              <div class="grid grid-cols-12 text-center">
                                <div class="col-span-8">
                                    <p class="sm:text-lg font-semibold">{{trans('education.caratTitle1')}}</p>
                                    <div>{{trans('education.caratPara1')}}</div>
                                </div>
                                <div class="col-span-4 flex justify-center">
                                    <div class="">
                                      <p>{{__('education.Diamond Carat & Size')}}</p>
                                        <img class="img-fluid"src="/images/front-end/education/carat/pod-150x150.png">
                                    </div>
                                </div>
                              </div>


                              <div class="grid grid-cols-12 text-center">
                                <div class="col-span-8">
                                    <p class="sm:text-lg font-semibold">{{trans('education.caratTitle2')}}</p>
                                    <div>{{trans('education.caratPara2')}}</div>
                                </div>
                                <div class="col-span-4 flex justify-center">
                                    <div class="">
                                        <img class="img-fluid"src="/images/front-end/education/carat/Different-carat-sizes-150x150.jpg">
                                    </div>
                                </div>
                              </div>

                              <div class="grid grid-cols-12 text-center">
                                <div class="col-start-2 col-span-10 ">
                                  <div class="">
                                    <center>
                                      <div>{{trans('education.caratPara3')}}</div>
                                      <img class="img-fluid"src="/images/front-end/education/carat/caratsizes.jpg">
                                    </center>
                                  </div>
                                </div>
                              </div>

                          </div>
                        </div>

                        <br>

                        <div class="grid grid-cols-12 text-center">
                            <div class="col-start-2 col-span-10">
                                <h2 class="sm:text-2xl"><span>&nbsp;</span><strong><a>{{trans('home.Must Watch')}} : </a></strong><small>{{trans('home.GIA Teaches You 4Cs')}} - {{trans('home.How To Choose Giamond')}}</small></h2>
                                <x-gia-video/>
                            </div>
                        </div>


                      </div>

                      <x-side-bar/>

                    </div>




                </div>
                
            </div>
            
        </div>

    @endSection






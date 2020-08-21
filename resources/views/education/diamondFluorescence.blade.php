@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle7')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription7')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle7')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription7')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle7')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription7')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle7')}} - {{trans('home.webTitle')}}" /> 
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
                                        <img class=" img-thumbnail" src="/images/front-end/education/anatomy-fluorescence/pageImage.jpg" >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col-span-8">
                            <center>
                                <h3 class="sm:text-xl font-semibold">{{__('education.metaTitle7')}}</h3>
                                 {{__('education.Diamond fluorescence response is a natural reaction. Different gems will also appear fluorescence. Some diamonds when they are exposed to ultraviolet light, visible light will be emitted, this is the diamond fluorescence.')}}  
                            </center>
                        </div>
                    </div>


                    <br>

                    
                    <br>
                    <div class="grid grid-cols-12 text-center" >
                        <div class="col-span-12 sm:col-span-10">
                            
                            <ul class="flex justify-center items-center border-b" id="myTab" role="tablist">
                              <li class="">
                                <a class="text-blue-600 text-center px-2"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/shape" role="tab" aria-controls="carat" aria-selected="true">{{__('diamondShape.Diamond Shape')}}</a>
                              </li>
                              <li class="">
                                <a class="text-blue-600 text-center px-2" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/hearts-and-arrows" role="tab" aria-controls="cut" aria-selected="true">{{__('diamondHeartArrow.Hearts And Arrows diamond')}}</a>
                              </li>
                              <li class="">
                                <a class="text-blue-600 text-center px-2" id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/proportion" role="tab" aria-controls="color" aria-selected="true">{{__('diamondProportion.Anatomy Proportion')}}</a>
                              </li>
                              <li class="">
                                <a class="text-blue-600 text-center px-2"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/symmetry" role="tab" aria-controls="color" aria-selected="true">{{__('diamondSymmetry.Anatomy Symmetry')}}</a>
                              </li>
                              <li class="">
                                <a class="text-blue-600 text-center px-2"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/polish" role="tab" aria-controls="color" aria-selected="true">{{__('diamondPolish.Anatomy Polish')}}</a>
                              </li>
                              <li class="">
                                <a class="nav-link bg-blue-300 text-white" id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/fluorescence" role="tab" aria-controls="color" aria-selected="true">{{__('diamondFluorescence.Anatomy Fluorescence')}}</a>
                              </li>
                            </ul>


                            
                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="tile is-ancestor">
                                      <div class="tile is-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondFluorescence.DIAMOND FLUORESCENCE')}}</p>
                                                  <li>{{trans('diamondFluorescence.title1')}}</li>
                                                </center>
                                                <div class="level">
                                                
                                                   
                                                </div>
                                            
                                            
                                            </center>

                                            <li>{{trans('diamondFluorescence.para1')}}</li>

                                            <center>
                                                  <li>{{trans('diamondFluorescence.title2')}}</li>
                                            </center>
                                                <div class="level">
                                                
                                                   
                                                </div>
                                            
                                            
                                            </center>

                                            <li>{{trans('diamondFluorescence.para2')}}</li>


                                            
                                          </div>
                                             
                                      </div>

                                  <div class="tile">

                                     <a class="">
                                        <center>  
                                            <figure class="image">
                                              <p>{{trans('diamondFluorescence.DIAMOND FLUORESCENCE')}}</p>
                                                <img  src="/images/front-end/education/anatomy-fluorescence/diamond-fluorescence-1.jpg">
                                            </figure>
                                        </center>
                                    </a>
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





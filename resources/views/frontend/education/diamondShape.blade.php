@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle11')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription11')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle11')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription11')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle11')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription11')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle11')}} - {{trans('home.webTitle')}}" /> 
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

                    <div class="grid grid-cols-12" >
                        <div class="col-span-6 sm:col-span-2 sm:col-start-2">
                            <center>
                              <img class="box img-thumbnail" :src="'/images/front-end/education/shape/pageImage.jpg'" class="">
                              
                            </center>
                            
                        </div>
                        <div class="col-span-6 sm:col-span-8">
                            <center><h3 class="sm:text-xl font-semibold">{{__('diamondShape.HOW TO INTERPRET DIAMOND SHAPE ?')}}</h3>   
                                    {{__('diamondShape.Diamonds can have many different shapes, each a diamond shape has its own unique properties.')}}
                            </center>
                            
                        </div>                
                      </div>

                    <br>

                    <div class="grid grid-cols-12 justify-center">
                        <div class="col-span-12 sm:col-span-10">
                          
                          <ul class="flex justify-center items-center border-b" id="myTab" role="tablist">
                            <li class="">
                              <a class="nav-link bg-blue-300 text-white" id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/shape" role="tab" aria-controls="carat" aria-selected="true">{{__('diamondShape.Diamond Shape')}}</a>
                            </li>
                            <li class="">
                              <a class="text-blue-600 text-center px-2" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/hearts-and-arrows" role="tab" aria-controls="cut" aria-selected="true">{{__('diamondHeartArrow.Hearts And Arrows diamond')}}</a>
                            </li>
                            <li class="">
                              <a class="text-blue-600 text-center px-2" id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/proportion" role="tab" aria-controls="color" aria-selected="true">{{__('diamondProportion.Anatomy Proportion')}}</a>
                            </li>
                            <li class="">
                              <a class="text-blue-600 text-center px-2" id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/symmetry" role="tab" aria-controls="color" aria-selected="true">{{__('diamondSymmetry.Anatomy Symmetry')}}</a>
                            </li>
                            <li class="">
                              <a class="text-blue-600 text-center px-2" id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/polish" role="tab" aria-controls="color" aria-selected="true">{{__('diamondPolish.Anatomy Polish')}}</a>
                            </li>
                            <li class="">
                              <a class="text-blue-600 text-center px-2" id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/fluorescence" role="tab" aria-controls="color" aria-selected="true">{{__('diamondFluorescence.Anatomy Fluorescence')}}</a>
                            </li>
                          </ul>


                        <div class="grid grid-cols-12 justify-center text-center">
                            <div class="col-span-12">
                               <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.ASSHER CUT')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara1')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.ASSHER CUT DIAMOND')}}</p>
                                            <img  class="box img-fluid" src="/images/front-end/education/shape/asscher-glam-1-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>


                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.ROUND BRILLIANT CUT')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara2')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.ROUND BRILLIANT CUT DIAMOND')}}</p>
                                            <img class="box img-fluid" src="/images/front-end/education/shape/round-brilliant-cut-2-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>


                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.CUSHION CUT')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara3')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.CUSHION CUT DIAMOND')}}</p>
                                            <img class="box img-fluid" src="/images/front-end/education/shape/cushion-glam-1-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>

                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.EMERALD CUT')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara4')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.EMERALD CUT DIAMOND')}}</p>
                                            <img class="box img-fluid" src="/images/front-end/education/shape/emerald-glam-1-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>


                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.HEART SHAPE')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara5')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.HEART SHAPE DIAMOND')}}</p>
                                            <img class="box img-fluid" src="/images/front-end/education/shape/heart-glam-e1461491201975-1-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>


                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.MARQUISE CUT')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara6')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.MARQUISE CUT DIAMOND')}}</p>
                                            <img class="box img-fluid" src="/images/front-end/education/shape/marquise-glam-1-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>


                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.OVAL CUT')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara7')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.OVAL CUT DIAMOND')}}</p>
                                            <img class="box img-fluid" src="/images/front-end/education/shape/oval-glam-1-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>


                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.PEAR SHAPE')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara8')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.PEAR SHAPE DIAMOND')}}</p>
                                            <img class="box img-fluid" src="/images/front-end/education/shape/pear-glam-1-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>


                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.PRINCESS CUT')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara9')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.PRINCESS CUT DIAMOND')}}</p>
                                            <img class="box img-fluid" src="/images/front-end/education/shape/princess-brilliant-cut-1-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>


                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="grid grid-cols-12 justify-center">
                                      <div class="col-span-12 sm:col-span-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="sm:text-xl font-semibold">{{trans('diamondShape.RADIANT CUT')}}</p>
                                                </center>
                                                <div class="level">
                                                <li>{{trans('diamondShape.shapePara10')}}</li>
                                                   
                                                </div>
                                            
                                            </center>
                                            
                                          </div>
                                             
                                      </div>

                                  <div class="col-span-12 sm:col-span-2">

                                 <a class="">
                                    <center>  
                                        <figure class="image">
                                          <p>{{__('diamondShape.RADIANT CUT DIAMOND')}}</p>
                                            <img class="box img-fluid" src="/images/front-end/education/shape/radiant-glam-1-150x150.jpg">
                                        </figure>
                                    </center>
                                </a>
                              </div>

                            </div>
                            </article>


                            </div>
                        </div>
                        </div>
                      @include('layouts.components.sideBar')
                    </div>



                </div>
                
            </div>
            
        </div>

    @endSection




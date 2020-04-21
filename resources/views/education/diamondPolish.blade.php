@extends('layouts.section.frontend')

    @section('meta')

         <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle9')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription9')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle9')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription9')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle9')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription9')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle9')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 
 

    @endSection

    @section('content')
        <br>


        <div id="education">
            <div class="row justify-content-center">
                <div class="col-11">
                    <br>

                    <div class="row justify-content-center text-center" >
                        <div class="col-sm-2">
                            <center>     
                                    <figure>
                                        <img class=" img-thumbnail" :src="'/images/front-end/education/carat/pageImage.jpg'" >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col">
                            <center>
                                <h3 class="title is-5">{{__('diamondPolish.WHAT IS DIAMOND POLISH ?')}}</h3>
                                {{__('diamondPolish.The diamond polish affects the ability of light coming out from the diamond. The integration of brilliant in the diamond is a very very important factor.')}}   
                            </center>
                        </div>
                    </div>

                    <br>

                    <div class="row justify-content-center text-center" >
                        <div class="col">

                        @include('layouts.education.anatony')


                        <div class="row justify-content-center text-center">
                            <div class="col-10">
                                <article class="message is-primary" >
                                    <div class="level is-centered">
                                    
                                    <div class="row justify-centent-center text-left">
                                          <div class="col-10">
                                        
                                                <div class="message-body">

                                                    <center><p class="title is-6">{{trans('diamondPolish.DIAMOND POLISH')}}</p>
                                                      <li>{{trans('diamondPolish.para1')}}</li>
                                                    </center>
                                                    <div class="level">
                                                    
                                                       
                                                    </div>
                                                
                                                

                                                <li>{{trans('diamondPolish.para2')}}</li>
                                                <li>{{trans('diamondPolish.para3')}}</li>
                                                <li>{{trans('diamondPolish.para4')}}</li>
                                                <li>{{trans('diamondPolish.para5')}}</li>
                                                <li>{{trans('diamondPolish.para6')}}</li>
                                                <li>{{trans('diamondPolish.para7')}}</li>
                                                <li>{{trans('diamondPolish.para8')}}</li>

                                                
                                              </div>
                                                 
                                          </div>

                                      <div class="col">

                                         <a class="">
                                            <center>  
                                                <figure class="image">
                                                  <p>{{trans('diamondPolish.DIAMOND POLISH')}}</p>
                                                    <img class="box img-fluid" src="/images/front-end/education/anatomy-polish/pageImage.jpg">
                                                </figure>
                                            </center>
                                        </a>
                                      </div>

                                </div>
                                </article>
                               </div>
                            </div>
                        </div>
                      @include('layouts.education.sideBar')
                    </div>



                </div>
                
            </div>
            
        </div>

    @endSection





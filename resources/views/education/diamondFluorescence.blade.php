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
            <div class="row justify-content-center">
                <div class="col-11">
                    <br>


                    <div class="row justify-content-center text-center" >
                        <div class="col-sm-2">
                            <center>     
                                    <figure>
                                        <img class=" img-thumbnail" :src="'/images/front-end/education/' + activedSubTab +'/pageImage.jpg'" >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col">
                            <center>
                                <h3 class="title is-5">{{__('education.metaTitle7')}}</h3>
                                 {{__('education.Diamond fluorescence response is a natural reaction. Different gems will also appear fluorescence. Some diamonds when they are exposed to ultraviolet light, visible light will be emitted, this is the diamond fluorescence.')}}  
                            </center>
                        </div>
                    </div>


                    <br>

                    
                    <br>
                    <div class="row justify-content-center text-center" >
                        <div class="col">
                            
                            @include('layouts.education.anatony')
                            
                            <article class="message is-primary" >
                                <div class="level is-centered">
                                
                                <div class="tile is-ancestor">
                                      <div class="tile is-10">
                                    
                                            <div class="message-body">
                                            <center>

                                                <center><p class="title is-6">{{trans('diamondFluorescence.DIAMOND FLUORESCENCE')}}</p>
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





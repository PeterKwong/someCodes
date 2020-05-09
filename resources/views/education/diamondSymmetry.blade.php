@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle12')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription12')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle12')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription12')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle12')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription12')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle12')}} - {{trans('home.webTitle')}}" /> 
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
                                <h3 class="title is-5">{{__('diamondSymmetry.WHAT IS DIAMOND SYMMETRY ?')}}</h3>
                                {{__('diamondSymmetry.In round diamond, the tip of main pavilion facets should be accurately aligned with the main facets. For examples: we can see the facets of a diamond their crown and pavilion should be asymmetry.')}}
                            </center>
                        </div>
                    </div>

                    <br>

                    <div class="row justify-content-center text-center" >
                        <div class="col">

                        @include('layouts.education.anatony')

                        <br>

                        <div class="row justify-content-center text-left">
                            <div class="col-10">
                                <article class="message is-primary" >
                                  <div class="level is-centered">
                                  
                                  <div class="row justify-content-center">
                                        <div class="col-10">
                                      
                                              <div class="message-body">
                                              <center>

                                                  <center><p class="title is-6">{{trans('diamondSymmetry.ASYMMETRIC OF CROWN AND PAVILION')}}</p>
                                                    <li>{{trans('diamondSymmetry.para1')}}</li>
                                                  </center>
                                               
                                              
                                              </center>
                                              
                                            </div>
                                               
                                        </div>

                                    <div class="col">

                                       <a class="">
                                          <center>  
                                              <figure class="image">
                                                <p>{{__('diamondSymmetry.ASYMMETRIC OF CROWN AND PAVILION')}}</p>
                                                  <img  src="/images/front-end/education/anatomy-symmetry/missalignment-1-98x98.jpg">
                                              </figure>
                                          </center>
                                      </a>
                                    </div>

                              </div>
                              </article>


                              <article class="message is-primary" >
                                  <div class="level is-centered">
                                  
                                  <div class="row justify-content-center">
                                        <div class="col-10">
                                      
                                              <div class="message-body">
                                              <center>

                                                  <center><p class="title is-6">{{trans('diamondSymmetry.EXTRA FACETS')}}</p>
                                                    <li>{{trans('diamondSymmetry.para2')}}</li>
                                                  </center>
                                               
                                              
                                              </center>
                                              
                                            </div>
                                               
                                        </div>

                                    <div class="col">

                                       <a class="">
                                          <center>  
                                              <figure class="image">
                                                <p>{{__('diamondSymmetry.EXTRA FACETS')}}</p>
                                                  <img  src="/images/front-end/education/anatomy-symmetry/facets-101x101.jpg">
                                              </figure>
                                          </center>
                                      </a>
                                    </div>

                              </div>
                              </article>


                              <article class="message is-primary" >
                                  <div class="level is-centered">
                                  
                                  <div class="row justify-content-center">
                                        <div class="col-10">
                                      
                                              <div class="message-body">
                                              <center>

                                                  <center><p class="title is-6">{{trans('diamondSymmetry.OFF CENTER CULET')}}</p>
                                                    <li>{{trans('diamondSymmetry.para3')}}</li>
                                                  </center>
                                               
                                              
                                              </center>
                                              
                                            </div>
                                               
                                        </div>

                                    <div class="col">

                                       <a class="">
                                          <center>  
                                              <figure class="image">
                                                <p>{{__('diamondSymmetry.OFF CENTER CULET')}}</p>
                                                  <img  src="/images/front-end/education/anatomy-symmetry/off_center_culet-1-148x148.jpg">
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





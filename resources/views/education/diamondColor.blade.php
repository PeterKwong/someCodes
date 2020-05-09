@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle5')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription5')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle5')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription5')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle5')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription5')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle5')}} - {{trans('home.webTitle')}}" /> 
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
                                        <img class=" img-thumbnail" :src="'/images/front-end/education/color/pageImage.jpg'" >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col">
                            <center>
                                <h3 class="title is-5">{{__('education.DIAMOND Color | EDUCATION')}}</h3>
                                {{__('education.When you buy a diamond, usually possible to choose the most transparent and colorless diamonds. Diamond rating by D-Z, and they will be divided into five categories.')}}    
                            </center>
                        </div>
                    </div>

                    <br>

                    <div class="row justify-content-center text-center" >
                      <div class="col">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat" role="tab" aria-controls="carat" aria-selected="true">{{__('education.Diamond Carat')}}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut" role="tab" aria-controls="cut" aria-selected="true">{{__('education.Diamond Cut')}}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active show"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color" role="tab" aria-controls="color" aria-selected="true">{{__('education.Diamond Color')}}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  id="contact-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity" role="tab" aria-controls="clarity" aria-selected="true">{{__('education.Diamond Clarity')}}</a>
                          </li>
                        </ul>

                          <div class="tab-pane fade active show "  id="color" role="tabpanel" aria-labelledby="contact-tab">
                            <center>

                            <br>

                            <div class="row justify-content-center text-center">
                              <div class="col-12">
                                  <h3>{{trans('education.colorTitle1')}}</h3>
                                  <li>{{trans('education.colorPara1')}}</li>
                                  <li>{{trans('education.colorPara2')}}</li>
                              </div>
                            </div>

                            <br>

                            <div class="row justify-content-center text-center">
                              <div class="col-12">
                                  <h3>{{trans('education.colorTitle2')}}</h3>
                                  <li>{{trans('education.colorPara3')}}</li>

                              </div>
                            </div>

                            <br>

                            <div class="row justify-content-center text-center">
                              <div class="col-4">
                                <p>D {{__('education.Color Diamond')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/d.jpg">
                              </div>
                              <div class="col-4">
                                <p>E {{__('education.Color Diamond')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/e.jpg">
                              </div>
                              <div class="col-4">
                                <p>F {{__('education.Color Diamond')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/f.jpg">
                              </div>
                            </div>

                            <div class="row justify-content-center text-center">
                              <div class="col-12">
                                  <h3>{{trans('education.colorTitle3')}}</h3>
                                  <li>{{trans('education.colorPara4')}}</li>
                              </div>
                            </div>

                            <br>

                            <div class="row justify-content-center text-center">
                              <div class="col-3">
                                <p>G {{__('education.Color Diamond')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/g.jpg">
                              </div>
                              <div class="col-3">
                                <p>H {{__('education.Color Diamond')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/h.jpg">
                              </div>
                              <div class="col-3">
                                <p>I {{__('education.Color Diamond')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/i.jpg">
                              </div>
                              <div class="col-3">
                                <p>J {{__('education.Color Diamond')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/j.jpg">
                              </div>
                            </div>

                            <br>

                            <div class="row justify-content-center text-center">
                              <div class="col-12">
                                  <h3>{{trans('education.colorTitle4')}}</h3>
                                  <li>{{trans('education.colorPara5')}}</li>
                                  <li>{{trans('education.colorPara6')}}</li>
                              </div>
                            </div>

                            <br>

                            <div class="row justify-content-center text-center">
                              <div class="col-4">
                                <p>K {{__('education.Color Diamond')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/k.jpg">
                              </div>
                              <div class="col-4">
                                <p>K {{__('education.Color Diamond（BROWN）')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/K_brown.jpg">
                              </div>
                              <div class="col-4">
                                <p>K {{__('education.Color Diamond（BROWN）')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/color/K_brown1.jpg">
                              </div>
                            </div>
                          </div>

                        <br>

                        <div class="row justify-content-center text-center">
                            <div class="col-10">
                                <h2 class="title is-5"><span>&nbsp;</span><strong><a>{{trans('home.Must Watch')}} : </a></strong><small>{{trans('home.GIA Teaches You 4Cs')}} - {{trans('home.How To Choose Giamond')}}</small></h2>
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




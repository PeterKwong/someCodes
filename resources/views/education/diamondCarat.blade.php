@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle2')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription2')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle2')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription2')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
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
                                        <img class=" img-thumbnail" :src="'/images/front-end/education/carat/pageImage.jpg'"  >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col">
                            <center>
                                <h3 class="title is-5">{{__('education.DIAMOND Carat | EDUCATION')}}</h3>
                                {{trans('education.It increases the weight of a diamond, and looking up from the diameter of the surface will also increase, but add a lot of weight, just add a little diameter.')}}   
                            </center>
                        </div>
                    </div>

                    <br>


                   
                   <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active show"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat" role="tab" aria-controls="carat" aria-selected="true">{{__('education.Diamond Carat')}}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut" role="tab" aria-controls="cut" aria-selected="true">{{__('education.Diamond Cut')}}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color" role="tab" aria-controls="color" aria-selected="true">{{__('education.Diamond Color')}}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link"  id="contact-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity" role="tab" aria-controls="clarity" aria-selected="true">{{__('education.Diamond Clarity')}}</a>
                      </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade active show" 
                          id="carat" role="tabpanel" aria-labelledby="carat-tab">

                          <br>

                          <div class="row justify-content-center text-center">
                            <div class="col-8">
                                <p class="title is-6">{{trans('education.caratTitle1')}}</p>
                                <li>{{trans('education.caratPara1')}}</li>
                            </div>
                            <div class="col-4">
                                <figure class="image is-128x128">
                                  <p>{{__('education.Diamond Carat & Size')}}</p>
                                    <img class="img-fluid"src="/images/front-end/education/carat/pod-150x150.png">
                                </figure>
                            </div>
                          </div>


                          <div class="row justify-content-center text-center">
                            <div class="col-8">
                                <p class="title is-6">{{trans('education.caratTitle2')}}</p>
                                <li>{{trans('education.caratPara2')}}</li>
                            </div>
                            <div class="col-4">
                                <figure class="image is-128x128">
                                  <p></p>
                                    <img class="img-fluid"src="/images/front-end/education/carat/Different-carat-sizes-150x150.jpg">
                                </figure>
                            </div>
                          </div>

                          <div class="row justify-content-center text-center">
                            <div class="col-12">
                                <li>{{trans('education.caratPara3')}}</li>
                                <img class="img-fluid"src="/images/front-end/education/carat/caratsizes.jpg">
                            </div>
                          </div>

                      </div>

                    <div class="row justify-content-center text-center">
                        <div class="col-10">
                            <h2 class="title is-5"><span>&nbsp;</span><strong><a>{{trans('home.Must Watch')}} : </a></strong><small>{{trans('home.GIA Teaches You 4Cs')}} - {{trans('home.How To Choose Giamond')}}</small></h2>
                            @include('layouts.components.giaVideo')
                        </div>
                    </div>



                </div>
                
            </div>
            
        </div>

    @endSection




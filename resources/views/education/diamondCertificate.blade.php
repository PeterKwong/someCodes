@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle3')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription3')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle3')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription3')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle3')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription3')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle3')}} - {{trans('home.webTitle')}}" /> 
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
                                        <img class=" img-thumbnail" :src="'/images/front-end/education/' + activedSubTab +'/pageImage.jpg'"  >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col">
                            <center>
                                <h3 class="title is-5">{{__('education.HOW TO INTERPRET GIA REPORT')}} ?</h3>
                                {{__('education.You know how to interpret GIA Report, basically to see other diamond certification reports, such as: IGI or HRD, will not have any difficulty, but the main is that they are called, respectively, or a little different.')}}' 
                            </center>
                        </div>
                    </div>

                    <br>


                    @include('layouts.subTabs.gradingCert')
                    
                    <br>

                    <div class="row justify-content-center">
                        <div class="col-sm-10">
                            <p class="title is-6">{{trans('education.certTitle1')}}</p>
                            <li>{{trans('education.certPara1')}}</li>                            
                        </div>
                        <div class="col">
                            <p>{{trans('education.Diamond Certficate')}}</p>
                                <img class="img-fluid" src="/images/front-end/education/grading-certficate/pageImage.jpg">
                        </div>
                    </div>

                        <li>{{trans('education.certPara1')}}</li>
                        <li>{{trans('education.certPara2')}}</li>




                </div>
                
            </div>
            
        </div>

    @endSection



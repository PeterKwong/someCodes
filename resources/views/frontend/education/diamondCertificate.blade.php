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
            <div class="p-4">
                <div class="">
                    <br>

                    <div class="grid grid-cols-12 text-center" >
                        <div class="col-span-6 sm:col-start-2 sm:col-span-2">
                            <center>     
                                    <figure>
                                        <img class=" img-thumbnail" :src="'/images/front-end/education/' + activedSubTab +'/pageImage.jpg'"  >
                                    </figure>
                            </center>
                            
                        </div>
                        <div class="col-span-6 sm:col-span-8">
                            <center>
                                <h3 class="sm:text-xl font-semibold">{{__('education.HOW TO INTERPRET GIA REPORT')}} ?</h3>
                                {{__('education.You know how to interpret GIA Report, basically to see other diamond certification reports, such as: IGI or HRD, will not have any difficulty, but the main is that they are called, respectively, or a little different.')}}' 
                            </center>
                        </div>
                    </div>

                    <br>

                    <div class="grid grid-cols-12">
                      <div class="col-span-12 sm:col-span-10">

                        <ul class="flex justify-center items-center border-b" id="myTab" role="tablist">
                          <li class="">
                            <a class="nav-link bg-blue-300 text-white"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-certficate" role="tab" aria-controls="carat" aria-selected="true">{{__('education.Diamond certficate')}}</a>
                          </li>
                          <li class="">
                            <a class="text-blue-600 text-center px-2"  id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report" role="tab" aria-controls="cut" aria-selected="true">{{__('education.Gia Report')}}</a>
                          </li>
                          <li class="">
                            <a class="text-blue-600 text-center px-2"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-eye-clean" role="tab" aria-controls="color" aria-selected="true">{{__('education.Eye Clean Diamond')}}</a>
                          </li>
                        </ul>


                        
                        <br>

                        <div class="grid grid-cols-12">
                            <div class="col-span-8 sm:col-span-10">
                                <p class="sm:text-xl font-semibold">{{trans('education.certTitle1')}}</p>
                                <li>{{trans('education.certPara1')}}</li>                            
                            </div>
                            <div class="col-span-4 sm:col-span-2">
                                <p>{{trans('education.Diamond Certficate')}}</p>
                                    <img class="img-fluid" src="/images/front-end/education/grading-certficate/pageImage.jpg">
                            </div>
                        </div>

                        <li>{{trans('education.certPara1')}}</li>
                        <li>{{trans('education.certPara2')}}</li>
                       </div>

                      
                      @include('layouts.components.sideBar')
                        

                    </div>


                </div>
                
            </div>
            
        </div>

    @endSection



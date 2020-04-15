@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('education.metaTitle13')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('education.metaDescription13')}}" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{trans('education.metaTitle13')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('education.metaDescription13')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('education.metaTitle13')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('education.metaDescription13')}}" /> 
        <meta property="og:site_name" content="{{trans('education.metaTitle13')}} - {{trans('home.webTitle')}}" /> 
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
                                <h3 class="title is-5">{{__('education.metaTitle13')}}</h3>
                                {{__('education.You know how to interpret GIA Report, basically to see other diamond certification reports, such as: IGI or HRD, will not have any difficulty, but the main is that they are called, respectively, or a little different.')}} 
                            </center>
                        </div>
                    </div>

                    <br>


                    @include('layouts.subTabs.gradingCert')

                    <br>

                    <div class="row justify-content-center text-left">
                        <div class="col-10">
                            <article class="message is-primary" >
                              <div class="level is-centered">
                                <div class="message-body">
                                
                               
                                <center><p class="title is-6">{{trans('education.giaTitle1')}}</p></center>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <li>{{trans('education.giaPara1')}}</li>                                       
                                    </div>
                                    <div class="col">
                                        <a>
                                        <center>  
                                        <figure class="image">
                                          <p>GIA Diamond Report</p>
                                            <img src="/images/front-end/education/grading-certficate/pageImage.jpg">
                                        </figure>
                                        </center>
                                          </a>
                                    </div>
                                </div>

                                {{trans('education.giaPara2')}}
                                {{trans('education.giaPara3')}}

                                <hr>
                                <center><p class="title is-5">{{trans('education.giaTitle2')}}</p></center>
                                <center><p class="title is-6">{{trans('education.giaTitle3')}}</p></center>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <li>{{trans('education.giaPara4')}}</li>                                    
                                    </div>
                                    <div class="col">
                                        <a>
                                        <center>  
                                        <figure >
                                          <p>GIA REPORT (PART1)</p>
                                            <img class="img-thumbnail" src="/images/front-end/education/gia-report/gia1.jpg">
                                        </figure>
                                        </center>
                                          </a>
                                    </div>
                                </div>

                                {{trans('education.giaPara4.1')}}
                                {{trans('education.giaPara5')}}
                                {{trans('education.giaPara6')}}

                                <hr>
                                <center><p class="title is-6">{{trans('education.giaTitle4')}}</p></center>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <li>{{trans('education.giaPara7')}}</li>                                
                                    </div>
                                    <div class="col">
                                        <a>
                                        <center>  
                                        <figure >
                                          <p>GIA REPORT (PART2)</p>
                                            <img class="img-thumbnail" src="/images/front-end/education/gia-report/gia2.jpg">
                                        </figure>
                                        </center>
                                          </a>
                                    </div>

                                </div>
                                    
                                {{trans('education.giaPara7.1')}}

                                <hr>
                                <center><p class="title is-6">{{trans('education.giaTitle5')}}</p></center>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <li>{{trans('education.giaPara8')}}</li>                                
                                    </div>
                                    <div class="col">
                                        <a>
                                        <center>  
                                        <figure >
                                          <p>GIA REPORT (PART3)</p>
                                            <img class="img-thumbnail" src="/images/front-end/education/gia-report/gia3.jpg">
                                        </figure>
                                        </center>
                                          </a>
                                    </div>

                                </div>
                                    
                                {{trans('education.giaPara8.1')}}

                                <hr>
                                <center><p class="title is-6">{{trans('education.giaTitle6')}}</p></center>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <li>{{trans('education.giaPara9')}}</li>                                
                                    </div>
                                    <div class="col">
                                        <a>
                                        <center>  
                                        <figure >
                                          <p>GIA REPORT (PART3)</p>
                                            <img class="img-thumbnail" src="/images/front-end/education/gia-report/gia4.jpg">
                                        </figure>
                                        </center>
                                          </a>
                                    </div>

                                </div>
                                    
                                {{trans('education.giaPara9.1')}}
                                {{trans('education.giaPara10')}}

                                <hr>
                                <center><p class="title is-6">{{trans('education.giaTitle7')}}</p></center>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <li>{{trans('education.giaPara11')}}</li>                                
                                    </div>
                                    <div class="col">
                                        <a>
                                        <center>  
                                        <figure >
                                          <p>GIA REPORT (PART3)</p>
                                            <img class="img-thumbnail" src="/images/front-end/education/gia-report/gia5.jpg">
                                        </figure>
                                        </center>
                                          </a>
                                    </div>

                                </div>
                                    
                                {{trans('education.giaPara11.1')}}

                                <hr>
                                <center><p class="title is-6">{{trans('education.giaTitle8')}}</p></center>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <li>{{trans('education.giaPara12')}}</li>                                
                                    </div>
                                    <div class="col">
                                        <a>
                                        <center>  
                                        <figure >
                                          <p>GIA REPORT (PART3)</p>
                                            <img class="img-thumbnail" src="/images/front-end/education/gia-report/gia6.jpg">
                                        </figure>
                                        </center>
                                          </a>
                                    </div>
                                </div>
                                    
                                {{trans('education.giaPara12.1')}}
                                
                                
                                <br>
                                <br>
                                <br>
                                
                                <div class="row justify-content-center text-center">
                                    <div class="col-10">
                                        <h2 class="title is-5"><span>&nbsp;</span><strong><a>{{trans('home.Must Watch')}} : </a></strong><small>{{trans('home.GIA Teaches You 4Cs')}} - {{trans('home.How To Choose Giamond')}}</small></h2>
                                        @include('layouts.components.giaVideo')
                                    </div>
                                </div>
                                 
                              </div>
                              </div>

                              
                            </article>


                        </div>
                    </div>



                </div>
                
            </div>
            
        </div>

    @endSection





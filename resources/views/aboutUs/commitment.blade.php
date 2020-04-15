@extends('layouts.section.frontend')

    @section('meta')

       <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('aboutUs.metaTitle1')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('aboutUs.metaDescription1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('aboutUs.metaTitle1')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('aboutUs.metaDescription1')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('aboutUs.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('aboutUs.metaDescription1')}}" /> 
        <meta property="og:site_name" content="{{trans('aboutUs.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

 

    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-12">
                    <center><h3 class="title is-5">{{trans('aboutUs.About Us')}}</h3>                 {{trans('buyingProcedure.First to buy diamonds, then buy ring setting')}}     
                    </center>
                    
                </div>
            </div>


        <div id="aboutUs">
            <div class="row justify-content-center">
                <div class="col-11">

                <br>

                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url(app()->getLocale() . '/about-us' )}} " >{{trans('aboutUs.Contact Us')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{url(app()->getLocale() . '/about-us/guarantee' )}}" >{{trans('aboutUs.Quality Guarantee')}}</a>
                  </li> 
                  <li class="nav-item active show">
                    <a class="nav-link"  href="{{url(app()->getLocale() . '/about-us/commitment' )}}">{{trans('aboutUs.Satification Insurence')}}</a>
                  </li>                 
                </ul>

                <!-- <div class="tabs is-centered">
                  <ul>
                    <li :class="{'is-active': activedSubTab=='Contact Us' }" @click="activeSubTab('Contact Us')" ><a>{{trans('aboutUs.Contact Us')}}</a></li>
                    <li :class="{'is-active': activedSubTab=='Quality Guarantee' }" @click="activeSubTab('Quality Guarantee')" ><a>{{trans('aboutUs.Quality Guarantee')}} </a></li>
                    <li :class="{'is-active': activedSubTab=='Satification Insurence' }" @click="activeSubTab('Satification Insurence')"><a>{{trans('aboutUs.Satification Insurence')}}</a></li>
                  </ul>
                </div> -->

                <br>



              <div >

                <article class="message is-primary" >
                    
                    <div class="level is-centered">
                    <div class="message-body">

                    <div class="row justify-content-center">
                      
                          <div class="col-3">
                            <a class="">
                                <center>  
                                    <figure class="image">
                                      <p></p>
                                        <img class="img-fluid" src="/images/front-end/aboutUs/insurence/HS_EngagementGuide_RingSizer-539x303.jpg">
                                    </figure>
                                </center>
                            </a>
                                
                          </div>

                      <div class="col">

                          <center>

                                <center><p class="title is-6">{{trans('aboutUs.title6')}}</p>
                                </center>
                                <br>
                                <div class="level">
                                <li>
                                  {{trans('aboutUs.para8')}}
                                </li>
                                
                                   
                                </div>
                            
                            </center>

                     

                    </div>
                  </div>

                  <hr>
                  <div class="row justify-content-center">
                      
                          <div class="col-3">
                            <a class="">
                                <center>  
                                    <figure class="image">
                                      <p></p>
                                        <img class="img-fluid" src="/images/front-end/aboutUs/insurence/Sterling-Silver-My-Heart-is-Yours-Engraved-CZ-Heart-Promise-Ring-MLA14618486.jpg">
                                    </figure>
                                </center>
                            </a>
                                
                          </div>

                      <div class="col">

                          <center>

                                <center><p class="title is-6">{{trans('aboutUs.title7')}}</p>
                                </center>
                                <br>
                                <div class="level">
                                <li>{{trans('aboutUs.para9')}}</li>
                                   
                                </div>
                            
                            </center>

                     

                    </div>
                  </div>

                  <hr>
                  <div class="row justify-content-center">
                      
                          <div class="col-3">
                            <a class="">
                                <center>  
                                    <figure class="image">
                                      <p></p>
                                        <img class="img-fluid" src="/images/front-end/aboutUs/insurence/130218-hero_1356018657153.jpg">
                                    </figure>
                                </center>
                            </a>
                                
                          </div>

                      <div class="col">

                          <center>

                                <center><p class="title is-6">{{trans('aboutUs.title8')}}</p>
                                </center>
                                <br>
                                <div class="level">
                                <li>{{trans('aboutUs.para10')}}</li>
                                   
                                </div>
                            
                            </center>

                     

                    </div>
                  </div>

                  <hr>
                  <div class="row justify-content-center">
                      
                          <div class="col-3">
                            <a class="">
                                <center>  
                                    <figure class="image">
                                      <p></p>
                                        <img class="img-fluid" src="/images/front-end/aboutUs/insurence/diamondup-img.jpg">
                                    </figure>
                                </center>
                            </a>
                                
                          </div>

                      <div class="col">

                          <center>

                                <center><p class="title is-6">{{trans('aboutUs.title9')}}</p>
                                </center>
                                <br>
                                <div class="level">
                                <li>{{trans('aboutUs.para11')}}</li>
                                   
                                </div>
                            
                            </center>

                     

                    </div>
                  </div>

                  <hr>
                  <div class="row justify-content-center">
                      
                          <div class="col-3">
                            <a class="">
                                <center>  
                                    <figure class="image">
                                      <p></p>
                                        <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/Photo-11-9-2016-1-07-18-PM_1-1024x768.jpg">
                                    </figure>
                                </center>
                            </a>
                                
                          </div>

                      <div class="col">

                          <center>

                                <center><p class="title is-6">{{trans('aboutUs.title10')}}</p>
                                </center>
                                <br>
                                <div class="level">
                                <li>{{trans('aboutUs.para12')}}</li>
                                   
                                </div>
                            
                            </center>

                     

                    </div>
                  </div>


                  <center>
                      <br>
                      {{trans('aboutUs.para8.1')}}
                  </center>    


                      
                  </div>

                  </div>
                </article>

                        </div>
                      </div>
                      
                    </article>
                    
                </div>
                
            </div>
            
        </div>

    @endSection




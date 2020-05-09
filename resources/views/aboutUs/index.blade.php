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
                <div class="row justify-content-center">
                  <div class="col">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active show" href="{{url(app()->getLocale() . '/about-us' )}} " >{{trans('aboutUs.Contact Us')}}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="{{url(app()->getLocale() . '/about-us/guarantee' )}}" >{{trans('aboutUs.Quality Guarantee')}}</a>
                      </li> 
                      <li class="nav-item">
                        <a class="nav-link"  href="{{url(app()->getLocale() . '/about-us/commitment' )}}">{{trans('aboutUs.Satification Insurence')}}</a>
                      </li>                 
                    </ul>

                    <br>
                    <div class="row justify-content-center">  
                      <div class="col-8">   
                        <center>

                            <center><p class="title is-6">{{trans('aboutUs.title1')}}</p>
                            </center>
                            <br>
                            <div class="level">
                            <li>{{trans('aboutUs.para1')}}</li>
                               
                            </div>
                        
                        </center>
                      </div>

                      <div class="col">

                       <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/aboutUs/address/IMG_7397.jpg">
                              </figure>
                          </center>
                      </a>

                      </div>
                    </div>

                    <hr>
                    
                    @include('layouts.components.contacts')

                      
                     <hr>
                     <div class="row justify-content-center">
                      <div class="col-5">
                        <center>
                          <figure class="image">
                                  <p></p>
                                    <img class="img-fluid" src="/images/front-end/aboutUs/CCI15122016-343x240.jpg">
                                </figure>
                         
                        </center>
                      </div>
                      <div class="col">
                         <center>
                          <br>
                              <center><p class="title is-6">{{trans('aboutUs.British qualifier professional qualifications')}}</p>
                              </center>
                              <br>
                              <div class="">
                              <li>{{trans('aboutUs.para2')}}</li>
                              <a href="https://gem-a.com/">{{trans('aboutUs.para3')}}</a>
                                 
                              </div>
                        </center>
                      </div>
                    </div>

                    <hr>
                      <div class="row justify-content-center">
                        <div class="col-8">
                          <center>
                            <figure class="image">
                              <p></p>
                                <img class="img-fluid" src="/images/front-end/aboutUs/address/map.jpg">
                            </figure>
                           
                          </center>  
                        </div>
                        <div class="col">
                           <center>
                            <center>
                              <p class="title is-6">{{trans('aboutUs.address1')}}</p>
                              <p class="title is-6">{{trans('aboutUs.address2')}}</p>
                              <p class="title is-6">{{trans('aboutUs.address3')}}</p>
                              <p class="title is-6">{{trans('aboutUs.address')}}</p>

                              </center>
                                <br>
                                <div class="">
                                <li>{{trans('aboutUs.Office Hours')}}</li>
                                <a>{{trans('aboutUs.Monday to Friday')}}</a>
                                   
                                </div>
                            </center>
                        </div>
                      </div>
                      <figure >
                        <center>
                          @if( app()->getLocale() != 'cn' )

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1845.70976546845!2d114.17391399378062!3d22.29996796946113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400ec2103aa27%3A0x28d16963f4a64e96!2z5p2x5riv5ZWG5qWt5aSn5buI!5e0!3m2!1szh-TW!2shk!4v1567429885678!5m2!1szh-TW!2shk" width="90%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

                          @endif

                          @if( app()->getLocale() == 'cn' )

                           <img class="img-fluid" src="/images/front-end/aboutUs/address/baiduMap.png">

                          @endif

                        </center>
                      </figure>
                    
              </div>
            @include('layouts.components.sideBar')
          </div>   

        </div>
      </div>
    </div>

    @endSection




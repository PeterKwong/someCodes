@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('home.meta1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('home.webTitle')}}"> 
        <meta name="keywords" content="{{trans('home.keywords')}}"> 
        <meta itemprop="description" content="{{trans('home.meta1')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('home.webTitle')}}" /> 
        <meta property="og:type" content="article" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('home.meta1')}}" /> 
        <meta property="og:site_name" content="{{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" /> 
        <meta property="article:section" content="Article Section" /> 
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 
        <meta property="fb:admins" content="https://www.facebook.com/tingdiamonds/" />

        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
<!--         <link href="https://vjs.zencdn.net/7.8.3/video-js.css" rel="stylesheet" />
 -->
    @endSection


    @section('content')

      <div id="home">

          <!-- Slider -->
          <div class="">
            <img class="object-cover object-center w-full" src="{{ url('/images/front-end/home/slider/slider-1.jpg') }}" alt="...">
          </div>



        <div class="">
          <div class="flex justify-around pt-2 relative">
            <div class="flex-1 hidden sm:block hover:bg-gray-100 hover:opacity-50 w-full h-full ">
              <div class="px-10">
                  <h1 class="text-gray-700 font-semibold label mylead text-4xl hover:opacity-75">愛情是美麗的</h1> 
                  <p class="pt-4">愛情凈化人的心靈<br>
                   Life is richer because of LOVE<br>
                  <p class="">Eternal Love </p>  
              </div>

            </div>
            <div class="flex-1">
              <img class="" src="images/front-end/home/img2.jpg" alt="Lights">
            </div>
            <div class="flex-1 absolute sm:relative hover:bg-gray-100 hover:opacity-50 w-full h-full " >
              <div class="px-10">
                <h1 class="text-gray-700 font-semibold label mylead text-4xl hover:opacity-75">永恆の愛</h1> 
                <p class="pt-4">生命因為愛情而更為豐盛<br>
                  LOVE is beautiful<br>
                  </p>
                <p class="">LOVE purifies the soul</p>
              </div>
            </div>

          </div>

          <div class="flex justify-around relative ">
            <div class="flex-1">
              <img class="" width="100%" src="images/front-end/home/img4.jpg" alt="Lights"> 
              <img class="absolute bottom-0 w-4/6 hidden sm:block" src="images/front-end/home/img5.jpg" alt="Lights">
           
            </div>
            <div class="flex-1 absolute sm:relative hover:bg-gray-100 hover:opacity-50 w-full h-full ">
               <div class="border-4 border-gray-800 p-8 m-4 text-center">
                  <h1>訂製你的幸福</h1>  
                  <p>Customize happiness</p>                            
                </div>
            </div>
            <div class="flex-1 hidden sm:block">
                <img src="images/front-end/home/img7.jpg" alt="Lights" >
            </div>
          </div>
        </div>



        <div class="flex justify-center p-4">
          <div class="text-center">
              <h1 class="sm:text-4xl">{{trans('home.Design Your Own Ring')}}</h1>
              <h5>{{trans('home.para4')}}</h5>
          </div>
        </div>

        <div class="flex justify-center items-center px-4 sm:px-12">
          <div class="flex-1">
             <div class="img-grid" style="max-width: 480px;">
                <a href="{{url(app()->getLocale())}}/gia-loose-diamonds">
                  <figure class="effect-honey">
                    <img src="images/front-end/home/diamond.jpg" width="100%">
                    <figcaption class="">
                      <h3 class="text-yellow-600 sm:text-3xl">{{trans('home.Start With Diamonds')}}<span> </span><i> {{__('home.Check Now')}}</i>
                      </h3>
                    </figcaption> 
                  </figure>                          
                </a>
            </div>
          </div>
          <div class="flex-1">
            <div class="img-grid text-gray-800" style="max-width: 480px;">
                <a href="{{url(app()->getLocale())}}/engagement-rings">
                  <figure class="effect-honey">
                    <img src="images/front-end/home/Ring_425_StandUp_Side_Without_Diamond.png" width="100%">
                    <figcaption class="">
                      <h3 class="text-gray-800 sm:text-3xl">{{trans('home.Start With Engagement Rings')}}<span> </span><i> {{__('home.Check Now')}}</i>
                      </h3>
                    </figcaption> 
                  </figure>
                </a>
            </div>
          </div>
        </div>

        <div class="flex justify-center items-center text-center relative">
          <div class="flex-1">
              <img src="images/front-end/home/banner2.jpg" class="">
          </div>
          <div class="flex-1 absolute">
                <div class=" text-gray-800" >
                  <h2 class="sm:text-3xl">{{__('home.Diamond Price')}}</h2>
                  <span class="fa fa-chevron-down" ></span>
                  <h5>{{__('home.para4')}}<span>  {{__('home.para4.1')}} </span>
                  </h5>
                  <h5>{{trans('home.para1.2')}}
                  </h5>
                </div> 
          </div>
        </div>


        <div class="">
          <div id="carousel-loop-diamond-shape" class="owl-carousel owl-theme ">

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut">
                            <img  src="images/front-end/education/shape/round-brilliant-cut-2-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Round')}}</h5>
                            </figcaption>  
                          </a>         
                        </figure>
                    </div>
                </div>

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/princess-cut">
                            <img  src="images/front-end/education/shape/princess-brilliant-cut-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Princess')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div> 

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/heart-shaped">
                            <img  src="images/front-end/education/shape/heart-glam-e1461491201975-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Heart')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div> 

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/cushion-cut">
                            <img  src="images/front-end/education/shape/cushion-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Cushion')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div> 

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/pear-cut">
                            <img  src="images/front-end/education/shape/pear-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Pear')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/marquise-cut">
                            <img  src="images/front-end/education/shape/marquise-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Marquise')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  
   
                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/emerald-cut">
                            <img  src="images/front-end/education/shape/emerald-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Emerald')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  
   
                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/radiant-cut">
                            <img  src="images/front-end/education/shape/radiant-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Radiant')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/oval-cut">
                            <img  src="images/front-end/education/shape/oval-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Oval')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  
   
            </div>  
        </div>

        <section id="diamond-shape" >
            <div id="carousel-loop-diamond-shape" class="owl-carousel owl-theme ">

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut">
                            <img  src="images/front-end/education/shape/round-brilliant-cut-2-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Round')}}</h5>
                            </figcaption>  
                          </a>         
                        </figure>
                    </div>
                </div>

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/princess-cut">
                            <img  src="images/front-end/education/shape/princess-brilliant-cut-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Princess')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div> 

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/heart-shaped">
                            <img  src="images/front-end/education/shape/heart-glam-e1461491201975-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Heart')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div> 

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/cushion-cut">
                            <img  src="images/front-end/education/shape/cushion-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Cushion')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div> 

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/pear-cut">
                            <img  src="images/front-end/education/shape/pear-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Pear')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/marquise-cut">
                            <img  src="images/front-end/education/shape/marquise-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Marquise')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  
   
                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/emerald-cut">
                            <img  src="images/front-end/education/shape/emerald-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Emerald')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  
   
                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/radiant-cut">
                            <img  src="images/front-end/education/shape/radiant-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Radiant')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  

                <div class="item">
                    <div class="img-grid">
                        <figure class="effect-zoe" style="min-width: 130px;">
                          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/oval-cut">
                            <img  src="images/front-end/education/shape/oval-glam-1-150x150.jpg"  alt="img02"/>
                            <figcaption>
                                <h5 class="text-gray-900" >{{trans('home.Oval')}}</h5>
                            </figcaption>
                            </a>           
                        </figure>
                    </div>
                </div>  
   
            </div>        
        </section>

        <div class="flex relative  items-center">
          <div class="flex-1">
             <img src="images/front-end/home/couple.jpg" class="">            
          </div>
          <div class="flex-1 absolute w-2/6 text-white">
            <center>
             <h1 class="sm:text-3xl">{{trans('home.Engagment Rings')}}</h1>
              <img src="images/front-end/home/heart-line.png" width="50%">
              <h2 class="sm:text-2xl">{{trans('tag.Diamond Ring')}}
              </h2>
              </center>                        
          </div>
        </div>


        <div class="flex justify-center items-center text-center">
          <div class="flex-1">
            <a href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting">
              <figure class="box-shadow" style="min-width: 90px;">
                  <img src="images/front-end/home/Ring_504_No_Background.png" width="100%">
                      <h2 class="sm:text-2xl">{{trans('home.Solitaire')}}</h2>
                      <div class="line-b-w15"></div>
                      <p>{{__('home.Check Now')}}</p>
              </figure>
            </a>
          </div>
          <div class="flex-1">
             <a href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting">
                        <figure class="box-shadow" style="min-width: 90px;">
                            <img src="images/front-end/home/Ring_425_No_Background.png" width="100%">
                                <h2 class="sm:text-2xl">{{trans('home.Side Stone')}}</h2>
                                <div class="line-b-w15"></div>
                                <p>{{__('home.Check Now')}}</p>
                        </figure>
                      </a>
          </div>
          <div class="flex-1">
             <a href="{{url(app()->getLocale())}}/engagement-rings/halo-setting">
                        <figure class="box-shadow" style="min-width: 90px;">
                            <img src="images/front-end/home/Perspective_01.png" width="100%">
                                <h2 class="sm:text-2xl">{{trans('home.Halo')}}</h2>
                                <div class="line-b-w15"></div>
                                <p>{{__('home.Check Now')}}</p>
                        </figure>
                      </a>
          </div>
        </div>



        <div class="grid grid-cols-3 gap-4 relative smalldot items-center text-center p-4">
          <div class="col-span-2 ">
            <x-gia-video/>
          </div>
          <div class="col-span-1 ">
            <span>
                <div class="">
                    <h2>{{trans('home.Diamond Education | Diamond Grade')}}</h2>
                </div>
                <h5 class="text-red-700">
                  <span>&nbsp;</span><strong><a>{{trans('home.Must Watch')}} : </a></strong><small>{{trans('home.GIA Teaches You 4Cs')}} - {{trans('home.How To Choose Giamond')}}</small>
                </h5>
            </span>
          </div>
        </div>

        <div class="flex justify-around relative text-center px-4 sm:px-12">
          <div class="flex-1">
            <div class="img-grid">
              <a href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">
                <figure class="effect-sadie" style="min-width: 150px;">
                    <img src="images/front-end/home/gia-diamond.jpg"  alt="img02"/>
                    <figcaption class="color-brown shadow-black">
                        <h2 class="text-base sm:text-2xl">{{trans('home.title2')}}</h2>
                        <h5 class="text-yellow-600 text-sm truncate">{{trans('home.para5')}}
                        </h5>
                    </figcaption>           
                </figure>
              </a>
            </div>
          </div>
          <div class="flex-1">
            <div class="img-grid">
              <a href="{{url(app()->getLocale())}}/education-diamond-grading">
                  <figure class="effect-sadie" style="min-width: 150px;">
                      <img  src="images/front-end/home/gia-cert.jpg"  alt="img02"/>
                      <figcaption class="color-brown shadow-black">
                          <h2 class="text-base sm:text-2xl">{{trans('home.Diamond Education | Diamond Grade')}}</h2>
                          <h5 class="text-yellow-600 text-sm truncate">{{trans('home.para3')}}
                          </h5>
                      </figcaption>           
                  </figure> 
              </a>
            </div>
          </div>
        </div>


        <div class="flex pt-12 text-center">
          <div class="flex-1">
            <h2 class="sm:text-2xl">{{trans('home.Customer Jewellery')}}</h2>
          </div>
        </div>

            <div id="carousel-loop-customer-jewellery" class="owl-carousel owl-theme ">

              @foreach($customer_post as $post)

              <div class="item">
                  <div class="img-grid">
                    <a href="{{url(app()->getLocale())}}/customer-jewellery">
                      <figure class="effect-bubba" style="min-width: 280px;">
                         <img src="{{config('global.cache.' . config('global.cache.live') ) }}public/images/{{count($post['images'])?$post['images'][0]['image']:'something_special.jpg'}}">
                          <figcaption>
                              <p class="truncate">{{ !empty($post['texts']['content'])?$post['texts']['content'] : '' }}</p>
                          </figcaption>           
                      </figure>
                    </a>
                  </div>
              </div>

              @endforeach
              
            </div>                



        <div class="flex relative justify-around items-center">
          <div class="flex-1">
            <img src="images/front-end/home/customer-moment.jpg" class="">
          </div>
          <div class="flex-1 absolute text-white">
            <h2 class="sm:text-2xl">{{trans('home.Customer Moments')}}</h2>
            <h1 class="text-yellow-600 sm:text-3xl">{{trans('home.Every moment worth sharing')}}</h1>
            <div class="line-b-w30"></div>
            <h3>{{trans('home.Discover together')}}</h3>

          </div>
        </div>

        <div class="grid grid-rows-2 grid-flow-col gap-4 justify-center px-4 sm:px-12">
          @foreach($customerMoments as $customerMoment)
              <div class="row-span-1">
                  <a href="{{url(app()->getLocale())}}/customer-moments">
                      <div class="img-grid">
                          <figure class="effect-chico" style="min-width: 150px;">
                             <img src="{{config('global.cache.' . config('global.cache.live') ) }}public/images/sq-{{count($customerMoment->images)?$customerMoment->images[0]->image:'something_special.jpg'}}">
                              <figcaption>
                                  <h2></h2>
                                  <p>{{ count($customerMoment->texts)?$customerMoment->texts[config('global.locale.' . app()->getLocale())]->content : ''}}</p>
                              </figcaption>   
                          </figure>
                      </div>
                  </a>
              </div>
          @endforeach
        </div>



      </div>

    @livewire('notification.contact')

    @endSection



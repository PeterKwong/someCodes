@extends('layouts.section.frontend')

    @section('meta')

       <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('customerMoment.title1')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('customerMoment.para1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('customerMoment.title1')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('customerMoment.para1')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('customerMoment.title1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('customerMoment.para1')}}" /> 
        <meta property="og:site_name" content="{{trans('customerMoment.title1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 
   

    @endSection

    @section('content')
    <br>


    <div id="customerJewelleryIndex" class="p-4">
      <div class="grid grid-cols-12">
        <div class="col-span-12">


          <br>
          <center><p class="sm:text-2xl font-semibold">{{trans('customerMoment.title1')}}</p></center>
          <br>
          <div class="grid grid-cols-12 text-center" >
              <div class="col-span-12 sm:col-span-10">                               
              <div class="grid grid-cols-12">
                
                    <div class="col-span-12 sm:col-span-4">
                      <center>

                          <center><p class="sm:text-xl font-semibold">{{trans('customerMoment.title2')}}</p>
                          </center>
                          <br>
                          <div class="level">
                          <li>{{trans('customerMoment.para1')}}</li>
                             
                          </div>
                      
                      </center>
                          
                    </div>

                <div class="col-span-6 sm:col-span-4">

                    <center>

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/Photo-11-9-2016-1-07-18-PM_1-1024x768.jpg">
                              </figure>
                          </center>
                      </a>
                      
                      </center>

                  </div>

                  <div class="col-span-6 sm:col-span-4">

                    <center>

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/flowershavep.jpg">
                              </figure>
                          </center>
                      </a>
                      
                      </center>

                  </div>
            </div>
            <br>
            
            <div class="grid grid-cols-12">
                
                    <div class="col-span-12 sm:col-span-8">

                      <center>

                          <center><p class="sm:text-xl font-semibold">{{trans('customerMoment.title3')}}</p>
                          </center>
                          <br>
                          <div class="level">
                          <li>{{trans('customerMoment.para2')}}</li>
                             
                          </div>
                      
                      </center>
                      
                          
                    </div>

                <div class="col-span-12 sm:col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/Special-day-by-Strawberry-Mood.jpg">
                              </figure>
                          </center>
                      </a>
   

              </div>
            </div>
            <br>

            <div class="grid grid-cols-12">
                
                    <div class="col-span-12 sm:col-span-8">

                      <center>

                          <center><p class="sm:text-xl font-semibold">{{trans('customerMoment.title4')}}</p>
                          </center>
                          <br>
                          <div class="level">
                          <li>{{trans('customerMoment.para3')}}</li>
                             
                          </div>
                      
                      </center>
                      
                          
                    </div>

                <div class="col-span-12 sm:col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/Romantic-Wedding-Proposals-1.jpg">
                              </figure>
                          </center>
                      </a>
   

              </div>
            </div>
            <br>

            <div class="grid grid-cols-12">
                
                    <div class="col-span-12 sm:col-span-8">

                      <center>

                          <center><p class="sm:text-xl font-semibold">{{trans('customerMoment.title5')}}</p>
                          </center>
                          <br>
                          <div class="level">
                          <li>{{trans('customerMoment.para4')}}</li>
                             
                          </div>
                      
                      </center>
                      
                          
                    </div>

                <div class="col-span-12 sm:col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/DSC_6607-1024x681.jpg">
                              </figure>
                          </center>
                      </a>
   

              </div>
            </div>
            <br>

          <center>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.title6')}}</p>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.title7')}}</p>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.para5')}}</p>
          </center>
          <br>

          <div class="grid grid-cols-12">
                
                    <div class="col-span-6">

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/happy-couple.jpg">
                              </figure>
                          </center>
                      </a>
                      
                          
                    </div>

                <div class="col-span-6">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/travel-1024x558.jpg">
                              </figure>
                          </center>
                      </a>
   

              </div>
            </div>
          

          <center>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.title8')}}</p>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.para6')}}</p>
          </center>
          <br>
          <div class="grid grid-cols-12">
                
                    <div class="col-span-4">

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/miami-restaurant-cafe-sambal-couple-dining-1024x670.jpeg">
                              </figure>
                          </center>
                      </a>
                      
                          
                    </div>

                  <div class="col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/3bf629532aac0d1d1b7d351ef3739e7a.jpg">
                              </figure>
                          </center>
                      </a>
   

                  </div>

                  <div class="col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/five-star-restaurant-date.jpeg">
                              </figure>
                          </center>
                      </a>
   

                  </div>
            </div>
            
          <center>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.title9')}}</p>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.para7')}}</p>
          </center>
          <br>

          <div class="grid grid-cols-12">
                
                    <div class="col-span-6">

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/9258ca1509e20f44503573618d8cc659.jpg">
                              </figure>
                          </center>
                      </a>
                      
                          
                    </div>

                <div class="col-span-6">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/3a8970e5-ea76-4bef-a5da-97e86e90e823-rs_768.jpeg">
                              </figure>
                          </center>
                      </a>
   

              </div>
            </div>

          <center>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.title10')}}</p>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.para8')}}</p>
          </center>
          <br>

          <div class="grid grid-cols-12">
                
                    <div class="col-span-6">

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/Watermarked-Photo-37-2015-11-25-1628-1024x683.jpg">
                              </figure>
                          </center>
                      </a>
                      
                          
                    </div>

                <div class="col-span-6">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/slide6.jpg">
                              </figure>
                          </center>
                      </a>
   

              </div>
            </div>

          <center>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.title11')}}</p>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.para9')}}</p>
          </center>
          <br>
          <div class="grid grid-cols-12">
                
                    <div class="col-span-4">

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/Romantic-Wedding-Proposals-11.jpg">
                              </figure>
                          </center>
                      </a>
                      
                          
                    </div>

                  <div class="col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/Lauren-and-Chriss-Texas-Marriage-Proposal_8-800x534.jpg">
                              </figure>
                          </center>
                      </a>
   

                  </div>

                  <div class="col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/Lauren-and-Chriss-Texas-Marriage-Proposal_3-800x534-702x469.jpg">
                              </figure>
                          </center>
                      </a>
   

                  </div>
          </div>

          <center>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.title12')}}</p>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.para10')}}</p>
          </center>
          <br>
          <div class="grid grid-cols-12">
                
                    <div class="col-span-4">

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/A-Sweet-Couple-a-Frenchie_0002.jpg">
                              </figure>
                          </center>
                      </a>
                      
                          
                    </div>

                  <div class="col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/Ideas-de-citas-divertidas-4-1024x683.jpg">
                              </figure>
                          </center>
                      </a>
   

                  </div>

                  <div class="col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/maxresdefault-1024x576.jpg">
                              </figure>
                          </center>
                      </a>
   

                  </div>
          </div>

          <center>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.title13')}}</p>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.para11')}}</p>
          </center>
          <br>
          <div class="grid grid-cols-12">
                
                    <div class="col-span-4">

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/DSC_6584-1024x681.jpg">
                              </figure>
                          </center>
                      </a>
                      
                          
                    </div>

                  <div class="col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/il_570xN.809748827_q5ku.jpg">
                              </figure>
                          </center>
                      </a>
   

                  </div>

                  <div class="col-span-4">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/inder_proposal_2_-3262-1024x683.jpg">
                              </figure>
                          </center>
                      </a>
   

                  </div>
          </div>

          <center>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.title14')}}</p>
              <p class="sm:text-xl font-semibold">{{trans('customerMoment.para12')}}</p>
          </center>
          <br>
          <div class="grid grid-cols-12">
                
                    <div class="col-span-6 sm:col-span-3">

                      <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/59618230_proposal_getty.jpg">
                              </figure>
                          </center>
                      </a>
                      
                          
                    </div>

                  <div class="col-span-6 sm:col-span-3">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/article-2441433-18758A9D00000578-358_638x418.jpg">
                              </figure>
                          </center>
                      </a>
   

                  </div>

                  <div class="col-span-6 sm:col-span-3">
                  <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/2B7648E000000578-3202186-Jo_Stubbs_and_Alex_Burrows_with_their_son_Finn_pose_in_front_of_-a-1_1439908004024.jpg">
                              </figure>
                          </center>
                      </a>
   
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <a class="">
                          <center>  
                              <figure class="image">
                                <p></p>
                                  <img class="img-fluid" src="/images/front-end/customerMoments/engagementTips/20130410-214655pp_w600_h400.jpg">
                              </figure>
                          </center>
                      </a>
                  </div>
                </div>


                        
                </div>
                
              <x-side-bar/>

            </div>      

        </div>
      </div>
    </div>


    @endSection





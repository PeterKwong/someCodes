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

    @section('hero')
      <div class="relative z-10 hero-image about-us flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
          <h2 class="text-lg xl:text-2xl font-medium font-suranna tracking-widest uppercase">
              {{trans('customerMoment.title1')}}
          </h2>
      </div>
    @endsection

    @section('content')



    <!-- Shop Section  -->
    <div class="relative z-10 flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">

        <!-- Quaility Gurantee -->
        <div class="flex flex-col items-center space-y-1 lg:space-y-3 lg:px-20 py-10 lg:py-20">
            <h1 class="text-brown text-center lg:text-left font-suranna text-xl">Elements of  Marriage Proposal</h1>
            <p class="font-lato text-lg font-bold">Flower + Ring</p>
            <p class="font-lato pt-2 max-w-2xl">
                Marriage is not a simple matter today, not only girlfriends want surprises, boyfriends also want to make unforgettable memories for their girlfriend. Therefore, the proposal requires planning, strategy, and in-depth understanding of each other's ideas and spotted the opportunity to attack a process. The key to the success or failure of a marriage depends on the timing, venue, and time.
            </p>
        </div>
        <!-- Satisfaction Insurance -->
        <div class="flex flex-col items-center pb-10 lg:pb-20 lg:py-20">
            <!-- Steps  -->
            <div class="flex flex-col space-y-7 py-10 md:mb-16 mx-auto max-w-3xl">
                <nav class="" aria-label="Progress">
                    <ol class="flex items-center py-2">
                        <li class="relative pl-16 lg:pl-1">
                            <!-- Current Step -->
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="h-1.5 w-full bg-gold"></div>
                            </div>
                            <a href="#" class="relative w-8 h-8 z-10 bg-gold border-2 border-white transform rotate-45 flex items-center justify-center">
                                <span class="text-xl font-suranna text-white transform -rotate-45">1</span>
                            </a>
                            <h2 class="whitespace-normal lg:whitespace-nowrap w-20 lg:w-auto text-center md:text-left  text-black absolute top-10 lg:top-14 left-10 lg:-left-12 text-base lg:text-xl font-suranna">Choose the Timing</h2>
                        </li>
                    
                        <li class="relative pl-16 lg:pl-64 xl:pl-80">
                            <!-- Next Step -->
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="h-0.5 w-full bg-gold bg-opacity-80"></div>
                            </div>
                            <a href="#" class="relative w-8 h-8 z-10 bg-white border-2 border-gold transform rotate-45 flex items-center justify-center">
                                <span class="text-xl font-suranna text-gold transform -rotate-45">2</span>
                            </a>
                            <h2 class="whitespace-normal lg:whitespace-nowrap w-20 lg:w-auto text-center md:text-left  text-black absolute top-10 lg:top-14 -right-6 lg:-right-10 text-base lg:text-xl font-suranna">Choose a Scene</h2>
                        </li>
                    
                        <li class="relative pl-16 lg:pl-64 xl:pl-80 pr-14 lg:pr-1.5">
                            <!-- Next Step -->
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="h-0.5 w-full bg-gold bg-opacity-80"></div>
                            </div>
                            <a href="#" class="relative w-8 h-8 z-10 bg-white border-2 border-gold transform rotate-45 flex items-center justify-center">
                                <span class="text-xl font-suranna text-gold transform -rotate-45">3</span>
                            </a>
                            <h2 class="whitespace-normal lg:whitespace-nowrap w-20 lg:w-auto text-center md:text-left  text-black absolute top-10 lg:top-14 right-7 lg:-right-12 text-base lg:text-xl font-suranna">Preparation Time</h2>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="grid grid-cols-2 gap-4 lg:gap-8 lg:px-20 pt-5 lg:pt-0">
                <div class="col-span-2 lg:col-span-1">
                    <img class="w-full lg:h-96" src="/assets/images/engagement-tips-1.jpg" alt="" />
                </div>
                <!-- Know More about your diamond -->
                <div class="col-span-2 lg:col-span-1 flex flex-col w-full font-lato">
                    <p>
                        The best time to propose marriage proposal is based on the fact that both parties have already reached a certain degree of consensus and their feelings are relatively stable. As for the specific date, a special anniversary is certainly the first choice. Madam President has always had a special emotional connection to "day," making Anniversary a "double anniversary day" to make Ms. Madrasa more touching. Such as how many days left and right, how many months, girlfriend can not guess the day, will be more surprises. If the birthday, holiday, these special days, maybe girlfriend are mentally prepared, have long been speculated that the day, the girls will be nervous and have expectations. If a man fails to meet his girlfriend's expectations, her girlfriend will instead feel disappointed, so I can choose a meaningful day to better effect.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Recommend Customer Jewellery -->
    <div class="lg:grid overflow-x-auto lg:grid-cols-3 w-full gap-3 font-lato lg:gap-x-20 pt-10 pb-20 2xl:py-20 px-5 lg:px-0 lg:pl-32">
        <div class="lg:col-span-3 flex items-center justify-between lg:pr-32 py-4 lg:py-16">
            <h2 class="text-xl font-suranna font-medium text-brown">Mariage Proposal</h2>
            <div class="flex items-center space-x-2">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex flex-col space-y-3">
            <div class="relative">
                <img class="relative z-10" src="/assets/images/engagement-tips-slide-1.jpg" alt="" />
                <img class="h-80 z-0 absolute pt-10 -bottom-11 -left-16" src="/assets/images/engagement-tips-slide-lines-pattern.png" alt="" />
            </div>
            <p class="font-bold pt-7">Travel Proposal</p>
            <p>
                Arrange a weekend weekend on the 2nd line, or departure from Hong Kong, in exotic or well-known attractions,For example, the Tokyo Tower, Switzerland, the Eiffel Tower, the night, sunset ... propose to her.Booked in advance as the hotel so that the hotel will be the layout of the room into a romantic look, open the door for a moment, surprise her surprise.
            </p>
        </div>
        <div class="flex flex-col space-y-3">
            <div class="relative">
                <img class="relative z-10" src="/assets/images/engagement-tips-slide-2.jpg" alt="" />
                <img class="h-80 z-0 absolute pt-10 -bottom-11 -left-16" src="/assets/images/engagement-tips-slide-lines-pattern.png" alt="" />
            </div>
            <p class="font-bold pt-7">Restaurant Proposal</p>
            <p>
                Easier to collect flowers and control the timing of the place.
            </p>
        </div>
        <div class="flex flex-col space-y-3">
            <div class="relative">
                <img class="relative z-10" src="/assets/images/engagement-tips-slide-1.jpg" alt="" />
                <img class="h-80 z-0 absolute pt-10 -bottom-11 -left-16" src="/assets/images/engagement-tips-slide-lines-pattern.png" alt="" />
            </div>
            <p class="font-bold pt-7">Theme Park proposal</p>
            <p>
                The theme park offers on-court courting services, such as Disneyland.
            </p>
        </div>
    </div>




    <!-- Right Side patterns  -->
    <span class="absolute z-0 top-16 lg:-top-48 right-0">
        <img class="hidden md:inline-block w-32 md:w-auto" src="/assets/images/engagement-tips-lines-pattern-1.png" alt="">
        <img class="hidden md:inline-block absolute bottom-28 right-0" src="/assets/images/engagement-tips-flower-1.png" alt="">
        <img class="inline-block md:hidden relative -top-7 left-10" src="/assets/images/engagement-tips-lines-pattern-1-mobile.png" alt="">
        <img class="inline-block md:hidden relative -top-3 right-1" src="/assets/images/engagement-tips-flower-1-mobile.png" alt="">
    </span>
    <span class="hidden lg:inline-block absolute z-10 bottom-1/3 lg:bottom-1/3 -mt-131 lg:mb-131 right-0">
        <img class="hidden md:inline-block h-56" src="/assets/images/engagement-tips-flower-3.png" alt="">
    </span>
    <!-- Left Side patterns  -->
    <span class="absolute z-0 top-131 lg:top-1/4 mt-0 lg:-mt-44 left-0">
        <img class="hidden md:inline-block" src="/assets/images/engagement-tips-flower-2.png" alt="">
        <img class="inline-block md:hidden" src="/assets/images/engagement-tips-flower-2-mobile.png" alt="">
    </span>




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

                          <center>
                            <p class="sm:text-xl font-semibold">{{trans('customerMoment.title2')}}
                              <a class="text-blue-600" href="/{{app()->getLocale()}}/engagement-rings">{{trans('engagementRing.Engagement Ring')}}
                              </a>
                            </p>
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





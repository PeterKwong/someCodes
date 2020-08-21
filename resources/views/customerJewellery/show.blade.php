@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{$meta->texts[0]->content}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{$meta->texts[0]->content}} - {{trans('customerMoment.metaDescription1')}}" />
        <meta itemprop="keywords" content="{{$meta->texts[0]->content}}"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{$meta->texts[0]->content}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('customerMoment.metaDescription1')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{$meta->texts[0]->content}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{$meta->texts[0]->content}} - {{trans('customerMoment.metaDescription1')}}" /> 
        <meta property="og:site_name" content="{{$meta->texts[0]->content}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{$meta->texts[0]->content}}" /> 
 

    @endSection

    @section('content')

        <br>

        <div id="customerJewelleryShow" class="p-8">

            <div class="grid grid-cols-12">
                <div class="col-span-12">

                    <article class="is-primary">
                        <div class="grid grid-cols-12" v-for="image in post.images" v-if="image.type == 'cover' ">
                            <div class="col-span-12 box" >
                                <figure class="image text-center" ><img width="100%" width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${image.image}`"></figure>
                            </div>
                        </div>
                    </article>


                <div class="grid grid-cols-12 text-center">
                    <div class="col-span-12">
                        <h4 class="p-12 text-blue-600 sm:text-xl">{{$meta->texts[0]->content}}</h4>
                    </div>       
                </div>

                <div class="grid grid-cols-12 " v-if="post.invoice.invoice_diamonds[0]">
                    <div class="col-span-12 sm:col-span-4">
                        <div class="box">

                            <div class="tile is-chill">
                            <article v-if="post.invoice.invoice_diamonds[0].lab == 'GIA'" class="px-2">
                                <p>
                                {{trans('diamondSearch.For more detailed information, can reach GIA website query')}}：
                                </p>
                                <a :href="`https://www.gia.edu/report-check?reportno=${post.invoice.invoice_diamonds[0].certificate}`">
                                    <div class="level">
                                    <figure class="image">
                                        <img width="100%" src="https://www.gia.edu/onlineopinionV5/GIA-Logo.png">
                                    </figure>
                                    <p class="button is-primary">@{{post.invoice.invoice_diamonds[0].lab}} {{trans('diamondSearch.Certificate Download')}}</p>
                                    </div>
                                </a>
                            </article>

                            <article v-if="post.invoice.invoice_diamonds[0].lab == 'IGI'" class="px-2">
                                <p>
                                {{trans('diamondSearch.For more detailed information, can reach IGI website query')}}：
                                </p>
                                <a :href="`https://www.igiworldwide.com/verify.php?r=${post.invoice.invoice_diamonds[0].certificate}`">
                                    <div class="level">
                                    <figure class="image">
                                        <img width="100%" src="https://www.igiworldwide.com/igi/images/logo-retina1.png">
                                    </figure>
                                    <p class="button is-primary">@{{post.invoice.invoice_diamonds[0].lab}} {{trans('diamondSearch.Certificate Download')}}</p>
                                    </div>
                                </a>
                            </article>

                            </div>
                            <article>
                                <div class="">
                                <div>
                                    <div>
                                        <div class="text-xl px-2 font-semibold">{{trans('diamondSearch.Diamond Info')}} ( @{{post.invoice.invoice_diamonds[0].shape}} )</div>
                                    </div>
                                </div>
                                    
                                <div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{trans('diamondSearch.Carat Weight')}}</div>
                                        <div class="col-span-6">@{{post.invoice.invoice_diamonds[0].weight}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{trans('diamondSearch.Color Grade')}}</div>
                                        <div class="col-span-6">@{{post.invoice.invoice_diamonds[0].color}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{trans('diamondSearch.Clarity Grade')}}</div>
                                        <div class="col-span-6">@{{post.invoice.invoice_diamonds[0].clarity}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{trans('diamondSearch.Cut Grade')}}</div>
                                        <div class="col-span-6">@{{post.invoice.invoice_diamonds[0].cut}}</div>
                                    </div>
                                </div>

                                    
                                <div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{trans('diamondSearch.Polish')}}</div>
                                        <div class="col-span-6">@{{post.invoice.invoice_diamonds[0].polish}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{trans('diamondSearch.Symmetry')}}</div>
                                        <div class="col-span-6">@{{post.invoice.invoice_diamonds[0].symmetry}}</div>
                                    </div>
                                </div>

                                    
                                <div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{trans('diamondSearch.Fluorescence')}}</div>
                                        <div class="col-span-6">@{{post.invoice.invoice_diamonds[0].fluorescence}}</div>
                                    </div>
                                </div>
                                
                                    
                                <div>
                                    <a :href="`https://www.gia.edu/report-check?reportno=${post.invoice.invoice_diamonds[0].certificate}`">
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{trans('diamondSearch.Certificate')}}</div>
                                        <div class="col-span-6">@{{post.invoice.invoice_diamonds[0].certificate}}</div>
                                    </div>
                                    </a>
                                </div>

                                </div>
                            </article>

                            
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-8" v-for="image in post.images" v-if="image.type == 'cert'">
                            <div class="box">
                                <a href="{{url(app()->getLocale() . '/gia-loose-diamonds')}}">
                                    <figure class="image">
                                    <img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${image.image}`">
                                    </figure>
                                </a>
                            </div>
                        </div>
                </div>


                <div class="grid grid-cols-12 text-center p-8" v-for="image in post.images" v-if="image.type == 'gia_no'">

                    <div class="col-span-7">
                        <article>
                            <figure><img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${image.image}`"></figure>
                        </article>
                        
                    </div>
                    <div class="col-span-5">
                        <article>
                            <figure>
                                <img width="100%" src="/images/front-end/diamond/GIA-Laser-Inscription-girdle.jpg">
                            </figure>
                            <p class="subtitle">
                            {{__('diamondSearch.Diamond waist number is like a person ID card, used to confirm the diamond 4Cs, what exactly those levels.')}}
                            </p>
                        </article>
                        
                    </div>
                        
                    
                </div>


                <div class="grid grid-cols-12" v-if="published.engagementRings">
                    <div class="col-span-6">
                            <div class="box">
                                <a :href=" langHref +'/engagement-rings/' + post.invoice.engagement_rings[0].id">
                                    <figure class="image" v-if="post.invoice.engagement_rings[0].images[0]">
                                    <img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${post.invoice.engagement_rings[0].images[0].image}`">
                                    </figure>
                                </a>
                                <a :href=" langHref +'/engagement-rings/' + post.invoice.engagement_rings[0].id">
                                    <figure class="image" v-if="post.invoice.engagement_rings[0].images[1]">
                                    <img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${post.invoice.engagement_rings[0].images[1].image}`">
                                    </figure>
                                </a>
                            </div>
                        </div>

                    <div class="col-span-6" >
                        <div class="box">
                            <article>
                                <div>
                                  <p>
                                    <video-player :options="videoOpts[0].videoEng" v-if="post.invoice.engagement_rings[0].video"></video-player> 
                                  </p>
                                 </div>
                                <div class="">
                                <div>
                                    <div>
                                        <div class="text-xl px-2 font-semibold">{{__('engagementRing.Engagement Ring Info')}}</div>
                                    </div>
                                </div>
                                    
                                <div> 
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('engagementRing.Shoulder')}}</div>
                                        <div class="col-span-6">@{{post.invoice.engagement_rings[0].shoulder | transJs(langs,locale)}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('engagementRing.Prong')}}</div>
                                        <div class="col-span-6">@{{post.invoice.engagement_rings[0].prong | transJs(langs,locale)}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('engagementRing.Side stone')}}</div>
                                        <div class="col-span-6">{{__('engagementRing.Around')}} @{{post.invoice.engagement_rings[0].ct}}ct</div>
                                    </div>

                                    <div>
                                    <div>
                                        <div class="text-xl px-2 font-semibold">{{__('engagementRing.Engagement Ring Info')}}</div>
                                    </div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Stock No.')}}</div>
                                        <div class="col-span-6">@{{post.invoice.engagement_rings[0].stock}}</div>
                                    </div> 
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Title')}}</div>
                                        <div class="col-span-6">@{{post.invoice.engagement_rings[0].texts[locale].content}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Description')}}</div>
                                        <div class="col-span-6">@{{post.invoice.engagement_rings[0].style | transJs(langs,locale)}},@{{post.invoice.engagement_rings[0].prong | transJs(langs,locale)}},@{{post.invoice.engagement_rings[0].shoulder | transJs(langs,locale)}},{{trans('engagementRing.setting')}}</div>
                                    </div>
                                    
                                </div>

                                </div>
                            </article>                            
                        </div>
                    </div>   
                </div>

                <div class="grid grid-cols-12 " v-if="published.jewellries">
                    <div class="col-span-6">
                            <div class="box">
                                <a :href=" langHref +'/jewellries/' + post.invoice.jewellries[0].id">
                                    <figure class="image" v-if="post.invoice.jewellries[0].images[0]">
                                    <img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${post.invoice.jewellries[0].images[0].image}`">
                                    </figure>
                                </a>
                                <a :href=" langHref +'/jewellries/' + post.invoice.jewellries[0].id">
                                    <figure class="image" v-if="post.invoice.jewellries[0].images[1]">
                                    <img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${post.invoice.jewellries[0].images[1].image}`">
                                    </figure>
                                </a>
                            </div>
                        </div>

                    <div class="col-span-6" >
                        <div class="box">
                            <article>
                                <div>
                                  <p>
                                    <video-player :options="videoOpts[2].videoJew" v-if="post.invoice.jewellries[0].video"></video-player> 
                                  </p>
                                 </div>
                                <div class="">
                                <div>
                                    <div>
                                        <div class="text-xl px-2 font-semibold">{{__('customerMoment.Jewellry Info')}}</div>
                                    </div>
                                </div>
                                    
                                <div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Stock No.')}}</div>
                                        <div class="col-span-6">@{{post.invoice.jewellries[0].stock}}</div>
                                    </div>  
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Title')}}</div>
                                        <div class="col-span-6">@{{post.invoice.jewellries[0].texts[locale].content}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Side stone')}}</div>
                                        <div class="col-span-6">{{__('engagementRing.Around')}} @{{post.invoice.jewellries[0].ct}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.metal')}}</div>
                                        <div class="col-span-6">@{{post.invoice.jewellries[0].metal}}</div>
                                    </div>
                                </div>

                                </div>
                            </article>                            
                        </div>
                    </div>   
                </div>



                <div class="grid grid-cols-12 " v-if="published.weddingRings" v-for="wedding_ring in post.invoice.wedding_rings">
                    <div class="col-span-6">
                            <div class="box">
                                <a :href=" langHref +'/wedding-rings/' + wedding_ring.wedding_ring_pair_id">
                                    <figure class="image" v-if="wedding_ring.images[0]">
                                    <img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${wedding_ring.images[0].image}`">
                                    </figure>
                                </a>
                                <div class="col">
                                    <a :href=" langHref +'/wedding-rings/' + wedding_ring.wedding_ring_pair_id">
                                        <figure class="image" v-if="wedding_ring.images[1]">
                                        <img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${wedding_ring.images[1].image}`">
                                        </figure>
                                    </a>
                                    <a :href=" langHref +'/wedding-rings/' + wedding_ring.wedding_ring_pair_id">
                                        <figure class="image" v-if="wedding_ring.images[2]">
                                        <img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${wedding_ring.images[2].image}`">
                                        </figure>
                                    </a>
                                </div>
                                
                            </div>
                        </div>

                    <div class="col-span-6" >
                        <div class="box">
                            <article>
                                <div>
                                    <video-player :options="videoOpts[1].videoWed" v-if="wedding_ring.video"></video-player> 
                                  <p>
                                    
                                  </p>
                                 </div>
                                <div class="">
                                <div>
                                    <div>
                                        <div class="text-xl px-2 font-semibold">{{__('customerMoment.Wedding Ring Info')}} - @{{wedding_ring.gender | transJs(langs,locale)}}</div>
                                    </div>
                                </div>
                                    
                                <div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Metal')}}</div>
                                        <div class="col-span-6">@{{wedding_ring.metal | transJs(langs,locale)}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Side stone')}}</div>
                                        <div class="col-span-6">{{__('engagementRing.Around')}} @{{wedding_ring.ct}}ct</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Stock No.')}}</div>
                                        <div class="col-span-6">@{{wedding_ring.stock}}</div>
                                    </div>  
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Title')}}</div>
                                        <div class="col-span-6">@{{wedding_ring.texts[locale].content}}</div>
                                    </div>
                                    <div class="grid grid-cols-12 p-2 text-light border-b">
                                        <div class="col-span-6">{{__('customerMoment.Description')}}</div>
                                        <div class="col-span-6">@{{wedding_ring.style | transJs(langs,locale)}},@{{wedding_ring.metal | transJs(langs,locale)}},@{{wedding_ring.sideStone? transJsMet('ct',langs,locale):''}}
                                    {{trans('weddingRing.Wedding Ring')}}</div>
                                </div>
                              
                                </div>

                                </div>
                            </article>                            
                        </div>
                    </div> 


                </div>




                <div class="grid grid-cols-12" v-if="post.video">

                    <div class="col-span-10 col-start-2">
                        <div class="box">
                            <article>
                                <div>
                                  <center><p class="title is-5">{{__('customerMoment.Product Video')}}</p></center>
                                    <video-player :options="videoOpts[3].videoPost" v-if="post.video"></video-player> 
                                  
                                 </div>
                              
                            </article>                            
                        </div>
                    </div>

                </div>



                </div>
            </div>
        </div>

    @endSection




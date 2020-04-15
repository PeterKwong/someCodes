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

        <div id="customerJewelleryShow">

            <div class="row justify-content-center">
                <div class="col-11">

                    <article class="tile is-child box is-primary">
                        <div class="row justify-content-center" v-for="image in post.images" v-if="image.type == 'cover' ">
                            <div class="col" >
                                <figure class="image text-center" ><img width="100%" width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${image.image}`"></figure>
                            </div>
                        </div>
                    </article>


                <div class="row">
                    <div class="col">
                        <h4 class="text-center p-30 color-blue">{{$meta->texts[0]->content}}</h4>
                    </div>       
                </div>

                <div class="row " v-if="post.invoice.inv_diamonds[0]">
                    <div class="col-4">
                        <div class="tile is-child box">

                            <div class="tile is-chill">
                            <article v-if="post.invoice.inv_diamonds[0].lab == 'GIA'">
                                <p>
                                {{trans('diamondSearch.For more detailed information, can reach GIA website query')}}：
                                </p>
                                <a :href="`https://www.gia.edu/report-check?reportno=${post.invoice.inv_diamonds[0].certificate}`">
                                    <div class="level">
                                    <figure class="image">
                                        <img width="100%" src="https://www.gia.edu/onlineopinionV5/GIA-Logo.png">
                                    </figure>
                                    <p class="button is-primary">@{{post.invoice.inv_diamonds[0].lab}} {{trans('diamondSearch.Certificate Download')}}</p>
                                    </div>
                                </a>
                            </article>

                            <article v-if="post.invoice.inv_diamonds[0].lab == 'IGI'">
                                <p>
                                {{trans('diamondSearch.For more detailed information, can reach IGI website query')}}：
                                </p>
                                <a :href="`https://www.igiworldwide.com/verify.php?r=${post.invoice.inv_diamonds[0].certificate}`">
                                    <div class="level">
                                    <figure class="image">
                                        <img width="100%" src="https://www.igiworldwide.com/igi/images/logo-retina1.png">
                                    </figure>
                                    <p class="button is-primary">@{{post.invoice.inv_diamonds[0].lab}} {{trans('diamondSearch.Certificate Download')}}</p>
                                    </div>
                                </a>
                            </article>

                            </div>
                            <article>
                                <table class="table is-striped is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>{{trans('diamondSearch.Diamond Info')}} ( @{{post.invoice.inv_diamonds[0].shape}} )</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr><td>{{trans('diamondSearch.Carat Weight')}}</td><td>@{{post.invoice.inv_diamonds[0].weight}}</td></tr>
                                    <tr><td>{{trans('diamondSearch.Color Grade')}}</td><td>@{{post.invoice.inv_diamonds[0].color}}</td></tr>
                                    <tr><td>{{trans('diamondSearch.Clarity Grade')}}</td><td>@{{post.invoice.inv_diamonds[0].clarity}}</td></tr>
                                    <tr><td>{{trans('diamondSearch.Cut Grade')}}</td><td>@{{post.invoice.inv_diamonds[0].cut}}</td></tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th>{{trans('diamondSearch.Finish')}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr><td>{{trans('diamondSearch.Polish')}}</td><td>@{{post.invoice.inv_diamonds[0].polish}}</td></tr>
                                    <tr><td>{{trans('diamondSearch.Symmetry')}}</td><td>@{{post.invoice.inv_diamonds[0].symmetry}}</td></tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th>{{trans('diamondSearch.Fluorescence')}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr><td>{{trans('diamondSearch.Fluorescence')}}</td><td>@{{post.invoice.inv_diamonds[0].fluorescence}}</td></tr>
                                </tbody>
                                
                                <thead>
                                    <tr>
                                        <th>{{trans('diamondSearch.Certificate')}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <a :href="`https://www.gia.edu/report-check?reportno=${post.invoice.inv_diamonds[0].certificate}`">
                                    <tr><td>{{trans('diamondSearch.Certificate')}}</td><td>@{{post.invoice.inv_diamonds[0].certificate}}</td></tr>
                                    </a>
                                </tbody>

                                </table>
                            </article>

                            
                        </div>
                    </div>

                    <div class="col-8 " v-for="image in post.images" v-if="image.type == 'cert'">
                            <div class="tile is-child box">
                                <a href="{{url(app()->getLocale() . '/gia-loose-diamonds')}}">
                                    <figure class="image">
                                    <img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${image.image}`">
                                    </figure>
                                </a>
                            </div>
                        </div>
                </div>


                <div class="row" v-for="image in post.images" v-if="image.type == 'gia_no'">

                    <div class="col-7">
                        <article>
                            <figure><img width="100%" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${image.image}`"></figure>
                        </article>
                        
                    </div>
                    <div class="col">
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


                <div class="row" v-if="published.engagementRings">
                    <div class="col-6">
                            <div class="tile is-child box">
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

                    <div class="col" >
                        <div class="tile is-child box">
                            <article>
                                <div>
                                  <p>
                                    <video-player :options="videoOpts[0].videoEng" v-if="post.invoice.engagement_rings[0].video"></video-player> 
                                  </p>
                                 </div>
                                <table class="table is-striped is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>{{__('engagementRing.Engagement Ring Info')}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody> 
                                    <tr><td>{{__('engagementRing.Shoulder')}}</td><td>@{{post.invoice.engagement_rings[0].shoulder | transJs(langs,locale)}}</td></tr>
                                    <tr><td>{{__('engagementRing.Prong')}}</td><td>@{{post.invoice.engagement_rings[0].prong | transJs(langs,locale)}}</td></tr>
                                    <tr><td>{{__('engagementRing.Side stone')}}</td><td>{{__('engagementRing.Around')}} @{{post.invoice.engagement_rings[0].ct}}ct</td></tr>

                                    <thead>
                                    <tr>
                                        <th>{{__('engagementRing.Engagement Ring Info')}}</th>
                                    </tr>
                                    </thead>
                                    <tr><td>{{__('customerMoment.Stock No.')}}</td><td>@{{post.invoice.engagement_rings[0].stock}}</td></tr> 
                                    <tr><td>{{__('customerMoment.Title')}}</td><td>@{{post.invoice.engagement_rings[0].texts[locale].content}}</td></tr>
                                    <tr><td>{{__('customerMoment.Description')}}</td><td>@{{post.invoice.engagement_rings[0].style | transJs(langs,locale)}},@{{post.invoice.engagement_rings[0].prong | transJs(langs,locale)}},@{{post.invoice.engagement_rings[0].shoulder | transJs(langs,locale)}},{{trans('engagementRing.setting')}}</td></tr>
                                    
                                </tbody>

                                </table>
                            </article>                            
                        </div>
                    </div>   
                </div>

                <div class="row" v-if="published.jewellries">
                    <div class="col-6">
                            <div class="tile is-child box">
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

                    <div class="col" >
                        <div class="tile is-child box">
                            <article>
                                <div>
                                  <p>
                                    <video-player :options="videoOpts[2].videoJew" v-if="post.invoice.jewellries[0].video"></video-player> 
                                  </p>
                                 </div>
                                <table class="table is-striped is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>{{__('customerMoment.Jewellry Info')}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr><td>{{__('customerMoment.Stock No.')}}</td><td>@{{post.invoice.jewellries[0].stock}}</td></tr>  
                                    <tr><td>{{__('customerMoment.Title')}}</td><td>@{{post.invoice.jewellries[0].texts[locale].content}}</td></tr>
                                    <tr><td>{{__('customerMoment.Side stone')}}</td><td>{{__('engagementRing.Around')}} @{{post.invoice.jewellries[0].ct}}</td></tr>
                                    <tr><td>{{__('customerMoment.metal')}}</td><td>@{{post.invoice.jewellries[0].metal}}</td></tr>
                                </tbody>

                                </table>
                            </article>                            
                        </div>
                    </div>   
                </div>



                <div class="row" v-if="published.weddingRings" v-for="wedding_ring in post.invoice.wedding_rings">
                    <div class="col-6">
                            <div class="tile is-child box">
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

                    <div class="col" >
                        <div class="tile is-child box">
                            <article>
                                <div>
                                    <video-player :options="videoOpts[1].videoWed" v-if="wedding_ring.video"></video-player> 
                                  <p>
                                    
                                  </p>
                                 </div>
                                <table class="table is-striped is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>{{__('customerMoment.Wedding Ring Info')}} - @{{wedding_ring.gender | transJs(langs,locale)}}</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr><td>{{__('customerMoment.Metal')}}</td><td>@{{wedding_ring.metal | transJs(langs,locale)}}</td></tr>
                                    <tr><td>{{__('customerMoment.Side stone')}}</td><td>{{__('engagementRing.Around')}} @{{wedding_ring.ct}}ct</td></tr>
                                    <tr><td>{{__('customerMoment.Stock No.')}}</td><td>@{{wedding_ring.stock}}</td></tr>  
                                    <tr><td>{{__('customerMoment.Title')}}</td><td>@{{wedding_ring.texts[locale].content}}</td></tr>
                                    <tr><td>{{__('customerMoment.Description')}}</td><td>@{{wedding_ring.style | transJs(langs,locale)}},@{{wedding_ring.metal | transJs(langs,locale)}},@{{wedding_ring.sideStone? transJsMet('ct',langs,locale):''}}
                                    {{trans('weddingRing.Wedding Ring')}}</td></tr>
                              
                                </tbody>

                                </table>
                            </article>                            
                        </div>
                    </div> 


                </div>




                <div class="row justify-content-center" v-if="post.video">

                    <div class="col-10 ">
                        <div class="tile is-child box">
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




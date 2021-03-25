<div class="p-8">
    <div class="grid grid-cols-12">
        <div class="col-span-12">

            <article class="is-primary">

            	@foreach( $meta->images as $image )
            		@if($image['type'] == 'cover')
		            	<div class="grid grid-cols-12">
		                    <div class="col-span-12 box" >
		                    	<figure class="image text-center" ><img class="w-full" class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $image->image}} "></figure>
		                    </div>
		                </div>
	                @endif
	            @endforeach

            </article>


        <div class="grid grid-cols-12 text-center">
            <div class="col-span-12">
                <h4 class="p-12 text-blue-600 sm:text-xl">{{$meta->invoice->title}}</h4>
            </div>       
        </div>

        @foreach($meta->invoice->invoiceDiamonds as $key => $diamond )

        <div class="grid grid-cols-12 " >
            <div class="col-span-12 sm:col-span-4">
                <div class="box">

                    <div class="tile is-chill">

                    	@if($diamond['lab'] == 'GIA')
		                    <article class="px-2">
		                        <p>
		                        {{trans('diamondSearch.For more detailed information, can reach GIA website query')}}：
		                        </p>
		                        <a href="https://www.gia.edu/report-check?reportno={{$diamond['certificate']}}">
		                            <div class="level">
		                            <figure class="image">
		                                <img class="w-full" src="https://www.gia.edu/onlineopinionV5/GIA-Logo.png">
		                            </figure>
		                            <p class="button is-primary">{{$diamond['certificate']}} {{trans('diamondSearch.Certificate Download')}}</p>
		                            </div>
		                        </a>
		                    </article>
		                @endif

	                    @if($diamond['lab'] == 'IGI')
		                    <article class="px-2">
		                        <p>
		                        {{trans('diamondSearch.For more detailed information, can reach IGI website query')}}：
		                        </p>
		                        <a href="https://www.igiworldwide.com/verify.php?r={{$diamond['certificate']}}">
		                            <div class="level">
		                            <figure class="image">
		                                <img class="w-full" src="https://www.igiworldwide.com/igi/images/logo-retina1.png">
		                            </figure>
		                            <p class="button is-primary">{{$diamond['certificate']}} {{trans('diamondSearch.Certificate Download')}}</p>
		                            </div>
		                        </a>
		                    </article>
		                @endif


                    </div>
                    <article>
                        <div class="">
                        <div>
                            <div>
                                <div class="text-xl px-2 font-semibold">{{trans('diamondSearch.Diamond Info')}} (
                                	<a class="text-blue-600" href="/{{app()->getLocale() . '/gia-loose-diamonds?shape=' . strtolower($diamond['shape']) }}" target="_blank">
                                		 {{$diamond['shape']}} 
                                	</a>
                                    )
                                </div>
                            </div>
                        </div>
                            
                        <div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{trans('diamondSearch.Carat Weight')}}</div>
                                <div class="col-span-6">
                                	<a class="text-blue-600" href="/{{app()->getLocale() . '/gia-loose-diamonds/round-cut' . $diamondUrl[$key] }}" target="_blank">
                                		{{$diamond['weight']}}
                                	</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{trans('diamondSearch.Color Grade')}}</div>
                                <div class="col-span-6">
                                	<a class="text-blue-600" href="/{{app()->getLocale() . '/gia-loose-diamonds?color=' . $diamond['color'] }}" target="_blank">
                                		{{$diamond['color']}}</div>
                                	</a>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{trans('diamondSearch.Clarity Grade')}}</div>
                                <div class="col-span-6">
                                	<a class="text-blue-600" href="/{{app()->getLocale() . '/gia-loose-diamonds?clarity=' . $diamond['clarity'] }}" target="_blank">
                                		{{$diamond['clarity']}}</div>
                                	</a>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{trans('diamondSearch.Cut Grade')}}</div>
                                <div class="col-span-6">
                                	<a class="text-blue-600" href="/{{app()->getLocale() . '/gia-loose-diamonds?cut=' . $diamond['cut'] }}" target="_blank">
                                		{{$diamond['cut']}}</div>
                                	</a>
                            </div>
                        </div>

                            
                        <div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{trans('diamondSearch.Polish')}}</div>
                                <div class="col-span-6">
                                	<a class="text-blue-600" href="/{{app()->getLocale() . '/gia-loose-diamonds?polish=' . $diamond['polish'] }}" target="_blank">
                                		{{$diamond['polish']}}</div>
                                	</a>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{trans('diamondSearch.Symmetry')}}</div>
                                <div class="col-span-6">
                                	<a class="text-blue-600" href="/{{app()->getLocale() . '/gia-loose-diamonds?symmetry=' . $diamond['symmetry'] }}" target="_blank">
                                		{{$diamond['symmetry']}}</div>
                                	</a>
                            </div>
                        </div>

                            
                        <div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{trans('diamondSearch.Fluorescence')}}</div>
                                <div class="col-span-6">
                                	<a class="text-blue-600" href="/{{app()->getLocale() . '/gia-loose-diamonds?fluorescence=' . $diamond['fluorescence'] }}" target="_blank">
                                		{{$diamond['fluorescence']}}</div>
                                	</a>
                            </div>
                        </div>
                        
                            
                        <div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{trans('diamondSearch.Certificate')}}</div>
                                <div class="col-span-6">
                                    <a href="https://www.gia.edu/report-check?reportno={{$diamond['certificate'] }}" target="_blank" class="text-blue-600">
                                        {{$diamond['certificate']}}
                                    </a>
                                </div>
                            </div>
                        </div>

                        </div>
                    </article>

                    
                </div>
            </div>

            @foreach( $meta->images as $image )
            	@if($image['type'] == 'cert')
		            <div class="col-span-12 sm:col-span-8">
		                <div class="box">
		                    <a href="{{url(app()->getLocale() . '/gia-loose-diamonds')}}" target="_blank">
		                        <figure class="image">
		                        <img class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $image->image}} ">
		                        </figure>
		                    </a>
		                </div>
		            </div>
		        @endif
		    @endforeach


        </div>

        @foreach( $meta->images as $image )
            @if($image['type'] == 'gia_no')
                <div class="grid grid-cols-12 text-center pt-8" >

                    <div class="col-span-7">
                        <article>
                            <figure>
                            	<img class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $image->image}} ">
                            </figure>
                        </article>
                        
                    </div>
                    <div class="col-span-5">
                        <article>
                            <figure>
                                <img class="w-full" src="/images/front-end/diamond/laser.jpg">
                            </figure>
                        </article>
                        
                    </div>            
                </div>
            @endif
        @endforeach

        @foreach( $meta->images as $image )
            @if($image['type'] == 'gia_no')
            <div class="grid grid-cols-12 text-center" >

                <div class="col-span-12">
                    
                        <p class="subtitle">
                        {{__('diamondSearch.Diamond waist number is like a person ID card, used to confirm the diamond 4Cs, what exactly those levels.')}}
                        </p>
                    
                </div>            
            </div>
            @endif
        @endforeach

       @endforeach


        @foreach($meta->invoice->engagementRings as $key => $engagementRing )
        @if($engagementRing->published)
        <div class="grid grid-cols-12 pt-2">
            <div class="col-span-6">
                    <div class="box">
                        @foreach($engagementRing->images as $image)
                            <a href="/{{ app()->getLocale() . '/engagement-rings/' . $engagementRing->id }}">
                                <figure class="image" >
                                <img class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $image->image }}">
                                </figure>
                            </a>
                        @endforeach
                   
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
                                <div class="col-span-6">{{__('customerJewellery.' .$engagementRing->shoulder )}}</div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('engagementRing.Prong')}}</div>
                                <div class="col-span-6">{{__('customerJewellery.' . $engagementRing->prong )}}</div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('engagementRing.Side stone')}}</div>
                                <div class="col-span-6">{{__('engagementRing.Around')}} {{ $engagementRing->ct }}ct</div>
                            </div>

                            <div>
                            <div>
                                <div class="text-xl px-2 font-semibold">{{__('engagementRing.Engagement Ring Info')}}</div>
                            </div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Stock No.')}}</div>
                                <div class="col-span-6">{{ $engagementRing->stock }}</div>
                            </div> 
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Title')}}</div>
                                <div class="col-span-6">{{ $engagementRing->texts[config('global.locale.' . app()->getLocale())]->content}}</div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Description')}}</div>
                                <div class="col-span-6">{{__('customerJewellery.' . $engagementRing->style )}},{{__('customerJewellery.' . $engagementRing->prong )}},{{__('customerJewellery.' . $engagementRing->shoulder )}},{{trans('engagementRing.setting')}}</div>
                            </div>
                            
                        </div>

                        </div>
                    </article>                            
                </div>
            </div>   
        </div>
        @endif
        @endforeach

        @foreach($meta->invoice->jewelleries as $key => $jewellery )
        @if($jewellery->published)

        <div class="grid grid-cols-12 ">
            <div class="col-span-6">
                    <div class="box">
                        @foreach($jewellery->images as $image)
                            <a href="/{{ app()->getLocale() . '/jewellery/' . $jewellery->id }}">
                                <figure class="image" >
                                <img class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $image->image }}">
                                </figure>
                            </a>
                        @endforeach

                    </div>
                </div>

            <div class="col-span-6" >
                <div class="box">
                    <article>
                        <div v-if="published.jewelleries">
                          <p>
                            <video-player :options="videoOpts[2].videoJew" v-if="post.invoice.jewelleries[0].video"></video-player> 
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
                                <div class="col-span-6">{{ $jewellery->stock }}</div>
                            </div>  
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Title')}}</div>
                                <div class="col-span-6">{{ $jewellery->title() }}</div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Side stone')}}</div>
                                <div class="col-span-6">{{__('engagementRing.Around')}} {{ $jewellery->ct }}</div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.metal')}}</div>
                                <div class="col-span-6">{{ $jewellery->metal }}</div>
                            </div>
                        </div>

                        </div>
                    </article>                            
                </div>
            </div>   
        </div>
        @endif
        @endforeach

        <!-- 

        <div class="grid grid-cols-12 " v-if="published.jewellries">
            <div class="col-span-6">
                    <div class="box">
                        <a :href=" langHref +'/jewellries/' + post.invoice.jewellries[0].id">
                            <figure class="image" v-if="post.invoice.jewellries[0].images[0]">
                            <img class="w-full" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${post.invoice.jewellries[0].images[0].image}`">
                            </figure>
                        </a>
                        <a :href=" langHref +'/jewellries/' + post.invoice.jewellries[0].id">
                            <figure class="image" v-if="post.invoice.jewellries[0].images[1]">
                            <img class="w-full" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${post.invoice.jewellries[0].images[1].image}`">
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
 -->

        @if( isset($meta->invoice->weddingRings[0]) )
        @if( $meta->invoice->weddingRings[0]->published )
        @foreach($meta->invoice->weddingRings as $key => $weddingRing )

        <div class="grid grid-cols-12 ">
            <div class="col-span-6">
                <div class="box">
                     @foreach($weddingRing->images as $image)
                        <a href="/{{ app()->getLocale() . '/wedding-rings/' . $weddingRing->wedding_ring_pair_id }}">
                            <figure class="image" >
                            <img class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $image->image }}">
                            </figure>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-span-6" >
                <div class="box">
                    <article>
                        <div v-if="published.weddingRings">
                            <video-player :options="videoOpts[1].videoWed" v-if="wedding_ring.video"></video-player> 
                          <p>
                            
                          </p>
                         </div>
                        <div class="">
                        <div>
                            <div>
                                <div class="text-xl px-2 font-semibold">{{__('customerMoment.Wedding Ring Info')}} - {{ __('weddingRing.' .$weddingRing->gender) }}</div>
                            </div>
                        </div>
                            
                        <div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Metal')}}</div>
                                <div class="col-span-6">{{ __('weddingRing.' . $weddingRing->metal) }}</div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Side stone')}}</div>
                                <div class="col-span-6">{{__('engagementRing.Around')}} {{ $weddingRing->ct }}ct</div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Stock No.')}}</div>
                                <div class="col-span-6">{{ $weddingRing->stock }}</div>
                            </div>  
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Title')}}</div>
                                <div class="col-span-6">{{ $weddingRing->title() }}</div>
                            </div>
                            <div class="grid grid-cols-12 p-2 text-light border-b">
                                <div class="col-span-6">{{__('customerMoment.Description')}}</div>
                                <div class="col-span-6">
                                    {{ __('weddingRing.' . $weddingRing->shape) }},
                                    {{ __('weddingRing.' . $weddingRing->metal) }},
                                    {{ $weddingRing->sideStone? __('weddingRing.ct'):''}}
                                    {{ $weddingRing->style? __('weddingRing.' . $weddingRing->style):''}}
                                    {{trans('weddingRing.Wedding Ring')}}
                                </div>
                        </div>
                      
                        </div>

                        </div>
                    </article>                            
                </div>
            </div> 
        </div>

        @endforeach
        @endif
        @endif


<!-- 

        <div class="grid grid-cols-12 " v-if="published.weddingRings" v-for="wedding_ring in post.invoice.wedding_rings">
            <div class="col-span-6">
                    <div class="box">
                        <a :href=" langHref +'/wedding-rings/' + wedding_ring.wedding_ring_pair_id">
                            <figure class="image" v-if="wedding_ring.images[0]">
                            <img class="w-full" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${wedding_ring.images[0].image}`">
                            </figure>
                        </a>
                        <div class="col">
                            <a :href=" langHref +'/wedding-rings/' + wedding_ring.wedding_ring_pair_id">
                                <figure class="image" v-if="wedding_ring.images[1]">
                                <img class="w-full" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${wedding_ring.images[1].image}`">
                                </figure>
                            </a>
                            <a :href=" langHref +'/wedding-rings/' + wedding_ring.wedding_ring_pair_id">
                                <figure class="image" v-if="wedding_ring.images[2]">
                                <img class="w-full" :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${wedding_ring.images[2].image}`">
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
 -->


        <div id="customerJewelleryShow">
            <div class="grid grid-cols-12" v-if="post.video">

                <div class="col-span-10 col-start-2">
                    <div class="box">
                        <article>
                            <div>
                              <center><p class="title is-5">{{__('customerMoment.Product Video')}}</p></center>
                                <video-player :options="videoOpts[3].videoPost" v-if="post.video"></video-player> 
                              
                                <product-viewer v-if="video360" 
                                :folder=" mutualVar.storage[mutualVar.storage.live] + 'public/video360/' + video360.src +'/'" 
                                filename="" :size="video360.size" :rotate="video360.rotate"></product-viewer>

                             </div>
                          
                        </article>                            
                    </div>
                </div>

            </div>            
        </div>






        </div>
    </div>
</div>

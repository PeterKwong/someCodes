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

        <script type="text/javascript">
              document.addEventListener("DOMContentLoaded", () => {
                    @if(isset($posts['weddingRings']))
                        window.mutualVar.lw.customerJewellery.weddingRings = @json(isset($posts['weddingRings'])?$posts['weddingRings']:'')
                    @endif
                    @if(isset($posts['engagementRings']))
                        window.mutualVar.lw.customerJewellery.engagementRings = @json(isset($posts['engagementRings'])?$posts['engagementRings']:'')
                    @endif
                    @if(isset($posts['jewelleries']))
                        window.mutualVar.lw.customerJewellery.jewelleries = @json(isset($posts['jewelleries'])?$posts['jewelleries']:'')
                    @endif
              });
        </script>


        <span id="customerJewelleryShow">
            <div class="grid grid-cols-12 text-center">
                <div class="col-span-12">
                    @if($videoSelecting == 'video360')
                        <video-360-exchange src="{{$meta->video}}" img="{{$meta->images[0]->image}}" :vid360="video360.src"/>

                    @else
                        <div class="flex">
                            <div class="w-full h-full videoPlayer">  
                                <video
                                id="invoice-post-1"
                                class="video-js vjs-fluid vjs-big-play-centered"
                                controls
                                preload="auto"
                                poster="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $meta->images[0]->image}}"
                                data-setup='{"fluid": true}'
                                >
                                <source src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/videos/' . $meta->video}}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


        @if($meta->postable_type == 'App\Models\WeddingRing')
            @if( isset($posts['weddingRings']) )

                <div class="grid grid-cols-12 ">
                    <div class="col-span-12 sm:col-span-6" v-if="mutualVar.lw.customerJewellery.weddingRings.invoicePosts">
                        <div class="box">
                            <carousel :height="'500'" :width="'100%'" 
                            :upperitems="mutualVar.lw.customerJewellery.weddingRings.model" 
                            :items="mutualVar.lw.customerJewellery.weddingRings.invoicePosts" 
                            title="customer jewellries" />                           
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6" >
                        <div class="box p-2">
                            <x-customer-jewellery.wedding-ring :weddingRings="$meta->invoice" :tags="$tags['weddingRings']"/>
                        </div>
                    </div> 

                </div>

            @endif
        @endif

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
                                <a target="_blank" href="https://www.gia.edu/report-check?reportno={{$diamond['certificate']}}">
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
                                <a target="_blank" href="https://www.igiworldwide.com/verify.php?r={{$diamond['certificate']}}">
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

        @if($meta->postable_type == 'App\Models\EngagementRing')
            @if( isset($posts['engagementRings']) )

                <div class="grid grid-cols-12 ">
                    <div class="col-span-12 sm:col-span-7">
                        <div class="box">
                            <carousel :height="'500'" :width="'100%'" 
                            v-if="mutualVar.lw.customerJewellery.engagementRings.invoicePosts"
                            :upperitems="mutualVar.lw.customerJewellery.engagementRings.model" 
                            :items="mutualVar.lw.customerJewellery.engagementRings.invoicePosts" 
                            title="customer jewellries" />                           
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-5" >
                        <div class="box p-2">
                            <x-customer-jewellery.engagement-ring :engagementRings="$meta->invoice" :tags="$tags['engagementRings']"/>
                        </div>
                    </div> 

                </div>

            @endif
        @endif


        @if($meta->postable_type == 'App\Models\Jewellery')
            @if( isset($posts['jewelleries']) )
                <div class="grid grid-cols-12 ">
                    <div class="col-span-12 sm:col-span-7">
                        <div class="box">
                            <carousel :height="'500'" :width="'100%'" 
                            v-if="mutualVar.lw.customerJewellery.jewelleries.invoicePosts"
                            :upperitems="mutualVar.lw.customerJewellery.jewelleries.model" 
                            :items="mutualVar.lw.customerJewellery.jewelleries.invoicePosts" 
                            title="customer jewellries" />                           
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-5" >
                        <div class="box p-2">
                            <x-customer-jewellery.jewellery :jewelleries="$meta->invoice" :tags="$tags['jewelleries']"/>
                        </div>
                    </div> 

                </div>

            @endif
        @endif

        </span>


        

        
       
<!--         @if($meta->postable_type == 'App\Models\EngagementRing')
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

                    @if( count($engagementRing->images) )
                        <div class="flex">
                            <div class="w-full h-full">  
                                <video
                                id="invoice-post-2"
                                class="video-js vjs-fluid vjs-big-play-centered"
                                controls
                                preload="auto"
                                poster="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $engagementRing->images[0]->image}}"
                                data-setup='{"fluid": true}'
                                >
                                <source src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/videos/' . $engagementRing->video}}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    @endif

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
                                    <div class="col-span-6">{{ __('customerJewellery.' . $engagementRing->style )}} {{__('customerJewellery.' . $engagementRing->prong )}} {{__('customerJewellery.' . $engagementRing->shoulder )}} {{trans('engagementRing.Diamond Ring') }} | {{trans('engagementRing.Engagement Ring Setting') }}</div>
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
        @endif
 -->

<!--         @if($meta->postable_type == 'App\Models\Jewellery')
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
                              <p>

                                @if( count($jewellery->images) )
                                    <div class="flex">
                                        <div class="w-full h-full">  
                                            <video
                                            id="invoice-post-2"
                                            class="video-js vjs-fluid vjs-big-play-centered"
                                            controls
                                            preload="auto"
                                            poster="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $jewellery->images[0]->image}}"
                                            data-setup='{"fluid": true}'
                                            >
                                            <source src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/videos/' . $jewellery->video}}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                @endif
                            </p>
                            <div class="">
                            <div>
                                <div>
                                    <div class="text-xl px-2 font-semibold">{{__('jewellery.Jewellery Info')}}</div>
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
        @endif -->


   <!--      @if($meta->postable_type == 'App\Models\WeddingRing')
            @if( isset($meta->invoice->weddingRings[0]) )
            @if( $meta->invoice->weddingRings[0]->published )
            @foreach($meta->invoice->weddingRings as $key => $weddingRing )

            <div class="grid grid-cols-12 ">
                <div class="col-span-6">
                    <div class="box">
                        <a href="/{{ app()->getLocale() . '/wedding-rings/' . $weddingRing->wedding_ring_pair_id }}">
                            @foreach($weddingRing->weddingRingPair->images as $image)
                                @if( $image->type == $weddingRing->gender)
                                    <figure class="image" >
                                        <img class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $image->image }}">
                                    </figure>
                                @endif
                            @endforeach
                        </a>
                    </div>
                </div>

                <div class="col-span-6" >
                    <div class="box">
                        <article>
                                @if( count($weddingRing->weddingRingPair->images) )
                                    <div class="flex">
                                        <div class="w-full h-full">  
                                            <video
                                            id="invoice-post-2"
                                            class="video-js vjs-fluid vjs-big-play-centered"
                                            controls
                                            preload="auto"
                                            poster="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $weddingRing->weddingRingPair->images[0]->image}}"
                                            data-setup='{"fluid": true}'
                                            >
                                            <source src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/videos/' . $weddingRing->weddingRingPair->video}}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                @endif
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
        @endif -->







        </div>
    </div>
</div>

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

        <div class="relative p-2">
        <span id="customerJewelleryShow">

            @if($videoSelecting == 'video360')
            <div class="absolute z-10" style="top:5%; left:5% ; opacity:50% ;" >
                <div v-if="mutualVar.livewire.customerJewellery.show.videoSelecting == 'video360' " @click="video360Reload('{{ config('global.cache.' . config('global.cache.live') ) . 'public/videos/' . $meta->video}}', '{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $meta->images[0]->image}}')" class=" border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700 text-center"  >
                    <p class="text-white">{{__('customerJewellery.Video')}}
                    <i class="hidden sm:block fa fa-play text-white fa-2x" aria-hidden="true" ></i>
                    <i class="sm:hidden fa fa-play text-white " aria-hidden="true" ></i></p>
                    
                </div>
                <div v-if="mutualVar.livewire.customerJewellery.show.videoSelecting == 'video' "@click="videoReload()" class=" border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700" >
                    <svg class="w-12 fill-current text-white " version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 65.79" style="enable-background:new 0 0 122.88 65.79" xml:space="preserve">
                        <g>
                            <path d="M13.37,31.32c-22.23,12.2,37.65,19.61,51.14,19.49v-7.44l11.21,11.2L64.51,65.79v-6.97 C37.4,59.85-26.41,42.4,11.97,27.92c0.36,1.13,0.8,2.2,1.3,3.2L13.37,31.32L13.37,31.32z M108.36,8.31c0-2.61,0.47-4.44,1.41-5.48 c0.94-1.04,2.37-1.56,4.3-1.56c0.92,0,1.69,0.12,2.28,0.34c0.59,0.23,1.08,0.52,1.45,0.89c0.38,0.36,0.67,0.75,0.89,1.15 c0.22,0.4,0.39,0.87,0.52,1.41c0.26,1.02,0.38,2.09,0.38,3.21c0,2.49-0.42,4.32-1.27,5.47c-0.84,1.15-2.29,1.73-4.36,1.73 c-1.15,0-2.09-0.19-2.8-0.55c-0.71-0.37-1.3-0.91-1.75-1.62c-0.33-0.51-0.59-1.2-0.77-2.07C108.45,10.34,108.36,9.38,108.36,8.31 L108.36,8.31z M26.47,10.49l-9-1.6c0.75-2.86,2.18-5.06,4.31-6.59C23.9,0.77,26.91,0,30.8,0c4.47,0,7.69,0.83,9.69,2.5 c1.99,1.67,2.98,3.77,2.98,6.29c0,1.48-0.41,2.82-1.21,4.01c-0.81,1.2-2.02,2.25-3.65,3.15c1.32,0.33,2.34,0.71,3.03,1.15 c1.14,0.7,2.02,1.63,2.65,2.77c0.63,1.15,0.95,2.51,0.95,4.1c0,2-0.52,3.91-1.56,5.75c-1.05,1.83-2.55,3.24-4.51,4.23 c-1.96,0.99-4.54,1.48-7.74,1.48c-3.11,0-5.57-0.37-7.36-1.1c-1.8-0.73-3.28-1.8-4.44-3.22c-1.16-1.41-2.05-3.19-2.67-5.33 l9.53-1.27c0.38,1.92,0.95,3.26,1.74,4.01c0.78,0.74,1.78,1.12,3,1.12c1.27,0,2.33-0.47,3.18-1.4c0.85-0.93,1.27-2.18,1.27-3.74 c0-1.59-0.41-2.82-1.22-3.69c-0.81-0.87-1.92-1.31-3.32-1.31c-0.74,0-1.77,0.18-3.07,0.56l0.49-6.81c0.52,0.08,0.93,0.12,1.22,0.12 c1.23,0,2.26-0.4,3.08-1.19c0.82-0.79,1.24-1.72,1.24-2.81c0-1.05-0.31-1.88-0.93-2.49c-0.62-0.62-1.48-0.93-2.55-0.93 c-1.12,0-2.02,0.34-2.72,1.01C27.19,7.62,26.72,8.8,26.47,10.49L26.47,10.49z M75.15,8.27l-9.48,1.16 c-0.25-1.32-0.66-2.24-1.24-2.78c-0.59-0.54-1.31-0.81-2.16-0.81c-1.54,0-2.74,0.77-3.59,2.33c-0.62,1.13-1.09,3.52-1.38,7.19 c1.14-1.16,2.31-2.01,3.5-2.56c1.2-0.55,2.59-0.83,4.16-0.83c3.06,0,5.64,1.09,7.75,3.27c2.11,2.19,3.17,4.96,3.17,8.31 c0,2.26-0.53,4.32-1.6,6.2c-1.07,1.87-2.55,3.29-4.44,4.25c-1.9,0.96-4.27,1.44-7.13,1.44c-3.43,0-6.18-0.58-8.25-1.76 c-2.07-1.17-3.73-3.03-4.97-5.59c-1.24-2.56-1.86-5.95-1.86-10.18c0-6.18,1.3-10.71,3.91-13.59C54.13,1.44,57.74,0,62.36,0 c2.73,0,4.88,0.31,6.46,0.94c1.58,0.63,2.9,1.56,3.94,2.76C73.81,4.92,74.61,6.44,75.15,8.27L75.15,8.27z M57.62,23.55 c0,1.86,0.47,3.31,1.4,4.36c0.94,1.05,2.08,1.58,3.44,1.58c1.25,0,2.3-0.48,3.14-1.43c0.84-0.95,1.26-2.37,1.26-4.26 c0-1.93-0.44-3.41-1.31-4.42c-0.88-1.01-1.96-1.52-3.26-1.52c-1.32,0-2.44,0.49-3.34,1.48C58.06,20.32,57.62,21.72,57.62,23.55 L57.62,23.55z M77.91,17.57c0-6.51,1.17-11.07,3.52-13.67C83.77,1.3,87.35,0,92.14,0c2.31,0,4.2,0.29,5.68,0.85 c1.48,0.57,2.69,1.31,3.62,2.22c0.94,0.91,1.68,1.87,2.21,2.87c0.54,1.01,0.97,2.18,1.3,3.52c0.64,2.55,0.96,5.22,0.96,8 c0,6.22-1.05,10.76-3.16,13.64c-2.1,2.88-5.72,4.32-10.87,4.32c-2.88,0-5.21-0.46-6.99-1.38c-1.78-0.92-3.23-2.27-4.37-4.05 c-0.82-1.26-1.47-2.98-1.93-5.17C78.14,22.64,77.91,20.22,77.91,17.57L77.91,17.57z M87.34,17.59c0,4.36,0.38,7.34,1.16,8.94 c0.77,1.6,1.89,2.39,3.36,2.39c0.97,0,1.8-0.34,2.51-1.01c0.71-0.68,1.23-1.76,1.56-3.22c0.34-1.47,0.5-3.75,0.5-6.85 c0-4.55-0.38-7.6-1.16-9.18c-0.77-1.56-1.93-2.35-3.47-2.35c-1.58,0-2.71,0.8-3.42,2.39C87.69,10.31,87.34,13.27,87.34,17.59 L87.34,17.59z M112.14,8.32c0,1.75,0.15,2.94,0.46,3.58c0.31,0.64,0.76,0.96,1.35,0.96c0.39,0,0.72-0.13,1.01-0.41 c0.28-0.27,0.49-0.7,0.63-1.29c0.13-0.59,0.2-1.5,0.2-2.74c0-1.82-0.15-3.05-0.46-3.68c-0.31-0.63-0.77-0.94-1.39-0.94 c-0.63,0-1.09,0.32-1.37,0.96C112.28,5.4,112.14,6.59,112.14,8.32L112.14,8.32z M109.3,30.23c10.56,5.37,8.04,12.99-10.66,17.62 c-5.3,1.31-11.29,2.5-17.86,2.99v6.05c7.31-0.51,14.11-2.19,20.06-3.63c28.12-6.81,27.14-18.97,9.36-25.83 C109.95,28.42,109.65,29.35,109.3,30.23L109.3,30.23z"/>
                        </g>
                    </svg>
                </div>
            </div>
            @endif



                <div class="grid grid-cols-12 p-1">
                    <div class="col-span-12">
                        <div class="box">
                            <article>
                                <div>
                                  <center>
                                        <p class="title is-5">{{__('customerMoment.Product Video')}}</p>     

                                         <div v-if="mutualVar.livewire.customerJewellery.show.videoSelecting == 'video360' " class=" p-1">
                                            <product-viewer 
                                            :folder=" mutualVar.storage[mutualVar.storage.live] + 'public/video360/' + video360.src +'/'" 
                                            :filename="video360.fileName" :size="video360.size" :rotate="video360.rotate"></product-viewer>
                                         </div>

                                        @if( count($meta->images) )
                                            <div  v-if="mutualVar.livewire.customerJewellery.show.videoSelecting == 'video' && videoOptions.poster ">
                                                <video-player :options="videoOptions" autoplay="false"></video-player>             
                                            </div>
                                            <div v-if=" mutualVar.livewire.customerJewellery.show.videoSelecting != 'video360' ">
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
                                            </div>
                                           
                                        @endif
                                       
                                    </center>
                                    </div>
                                      
                            </article>                            
                        </div>
                    </div>
                </div> 

        </span>
        </div>
        

        <script>
              document.addEventListener("DOMContentLoaded", () => {
                    window.mutualVar.livewire.customerJewellery.show.videoSelecting = '{{$videoSelecting}}'
              });

        </script>


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


        @if($meta->postable_type == 'App\Models\Jewellery')
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
                             </div>
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
        @endif


        @if($meta->postable_type == 'App\Models\WeddingRing')
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
                            <div v-if="published.weddingRings">

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
        @endif







        </div>
    </div>
</div>

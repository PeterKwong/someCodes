<!-- Filter Results  -->
<div class="flex flex-col space-y-5 items-center pb-0 md:pb-7 py-7 border-t mt-5">
    <div class="flex w-full justify-between">
        <div class="flex flex-wrap items-center gap-3">
        @foreach($tags as  $k => $conditions)

                    @php($tagShowMore['count']=$tagShowMore['count']+1)
                    @if($tagShowMore['count'] < 3 || $tagShowMore['show'] )
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button x-on:click="clearQuery('diamond','{{strtolower($k)}}');location.reload()">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                    <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="20" height="20" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                        <span>{{__('diamondSearch.' . $k)}}:
                            @foreach($conditions as  $key => $data)
                              {{$data}}
                              {{count($conditions)-1 == $key?'':', '}}
                            @endforeach
                        </span>
                    </div>
                    @endif
             
               
        @endforeach


        </div>
        <div class="flex flex-shrink-0">
            <button class="text-brown underline" wire:click="resetAll()">{{__('engagementRing.Clear')}}</button>
        </div>
    </div>

    @if($tagShowMore['count']>2)
        <button @click="tagShowMore.show = !tagShowMore.show;@this.toggleShowMoreTags()" 
            class="flex items-center font-bold text-brown space-x-2">
             <span x-show="!tagShowMore.show">{{$tagShowMore['count']>2?'('.($tagShowMore['count']-2).')':''}}</span>
            <svg :class="{'rotate-0': tagShowMore.show, ' rotate-180': !tagShowMore.show}" class="transform" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41 7.41L6 2.83L10.59 7.41L12 6L6 0L0 6L1.41 7.41Z" fill="#9A7474" />
            </svg>
        </button>
    @endif
    <div class="flex space-y-2 md:space-y-0 flex-row w-full items-center justify-between pt-10">
        <span class="text-sm">{{trans('diamondSearch.Total')}}: {{ $model->total()?$model->total():''}} {{trans('diamondSearch.diamond')}}</span>
    </div>
</div>


<div class="grid md:grid-cols-2 w-full gap-3 md:gap-7 md:items-center">
@if($model)     
    @foreach($model as $index => $post)
    @if(count($post->images))
        <div x-data="{details: false}" @mouseover="details = true" @mouseleave="details = false" class="bg-white grid grid-cols-2 space-x-0 md:space-x-3 relative items-center product-card p-0 md:p-5 cursor-pointer" :class="{'horizontal': details == false}" >
            @if($post->invoice->engagementRings->count())
            @php($engagementRing = $post->invoice->engagementRings->first())
                 <a class="" href="/{{ app()->getLocale() . '/customer-jewellery/' . $post->id }}" target="_blank" >
                    <img class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' .  $post->images->first()->image }}" alt="customer jewellery 1">
                </a>
                <a class="" href="/{{ app()->getLocale() . '/customer-jewellery/' . $post->id }}" target="_blank" >
                    <div class="flex flex-col space-y-1 md:space-y-2 pl-2 pd:ml-0">
                        <div class="flex flex-col mt-2 md:mt-0">
                            <p class="text-sm md:text-xl font-bold md:font-normal font-suranna">{{__('engagementRing.' .$engagementRing->metal)}} {{__('engagementRing.Diamond Ring')}}</p>
                            <p class="text-sm font-lato">{{__('engagementRing.Engagement Ring Setting')}}</p>
                        </div>
                        <div class="flex flex-col items-center justify-center divide-y divide-gold divide-opacity-50 mr-2 md:mr-0">
                            <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('engagementRing.Style')}}</p>
                                <p class="text-xs md:text-sm">{{__('engagementRing.' .$engagementRing->style)}} </p>
                            </div>
                            <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('engagementRing.Shoulder')}}</p>
                                <p class="text-xs md:text-sm">{{__('engagementRing.' .$engagementRing->shoulder)}} </p>
                            </div>
                            <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('engagementRing.prong')}}</p>
                                <p class="text-xs md:text-sm text-right">{{__('engagementRing.' .$engagementRing->prong)}} </p>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-span-2 bg-white py-1 pr-2 w-full flex md:hidden justify-end">
                    <button class="focus:outline-none" @click="details = true">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="14" cy="14.74" r="13.5" fill="white" stroke="#ADADAD" />
                            <path d="M11.325 18.565L15.1417 14.74L11.325 10.915L12.5 9.73999L17.5 14.74L12.5 19.74L11.325 18.565Z" fill="#666666" />
                        </svg>
                    </button>
                </div>
            @endif

            @if($post->invoice->invoiceDiamonds->count())
            @php($diamond = $post->invoice->invoiceDiamonds->first())
            <div x-show="details == true" class="bg-white absolute top-0 bg-white z-20 flex flex-col w-full h-full">                     
                <a href="/{{ app()->getLocale() . '/customer-jewellery/' . $post->id }}" target="_blank" >

                <div class="flex flex-col space-y-0.5 md:space-y-3 p-2">
                    <p class="text-sm md:text-xl font-bold md:font-normal font-suranna">GIA {{__('diamondSearch.Diamond Info')}}</p>
                    <div class="flex flex-row items-center justify-center divide-x vertical divide-gold divide-opacity-50 mx-3 md:mx-0">
                        <div class="relative flex w-full justify-between flex-col items-center space-y-1 py-1 md:px-3 2xl:px-4">
                            <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('diamondSearch.Carat')}}</p>
                            <p class="text-xs md:text-sm text-center">{{$diamond->weight}}</p>
                        </div>
                        <div class="relative flex w-full justify-between flex-col items-center space-y-1 py-1 md:px-3 2xl:px-4">
                            <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('diamondSearch.Color')}}</p>
                            <p class="text-xs md:text-sm text-center">{{$diamond->color}}</p>
                        </div>
                        <div class="relative flex w-full justify-between flex-col items-center space-y-1 py-1 md:px-3 2xl:px-4">
                            <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('diamondSearch.Clarity')}}</p>
                            <p class="text-xs md:text-sm text-center">{{$diamond->clarity}}</p>
                        </div>
                        <div class="relative flex w-full justify-between flex-col items-center space-y-1 py-1 md:px-3 2xl:px-4">
                            <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('diamondSearch.Cut')}}</p>
                            <p class="text-xs md:text-sm text-center">{{$diamond->cut}}</p>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-0.5">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.Polish')}}</p>
                            <p class="text-xs md:text-sm">{{$diamond->polish}}</p>
                        </div>
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-0.5">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.Symmetry')}}</p>
                            <p class="text-xs md:text-sm">{{$diamond->symmetry}}</p>
                        </div>
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-0.5">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.Fluorescence')}}</p>
                            <p class="text-xs md:text-sm">{{$diamond->fluorescence}}</p>
                        </div>
                    </div>
                </div>
            </a>
                <div class="bg-white pl-2 w-full flex md:hidden justify-start">
                    <button class="focus:outline-none transform rotate-180" @click="details = false">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="14" cy="14.74" r="13.5" fill="white" stroke="#ADADAD" />
                            <path d="M11.325 18.565L15.1417 14.74L11.325 10.915L12.5 9.73999L17.5 14.74L12.5 19.74L11.325 18.565Z" fill="#666666" />
                        </svg>
                    </button>
                </div>
            </div>
            @endif

            @if($post->invoice->weddingRings->count())
            @php($weddingRing = $post->invoice->weddingRings->first())
                <a href="/{{ app()->getLocale() . '/customer-jewellery/' . $post->id }}" target="_blank" class="col-span-2">
                    <div class="relative grid grid-cols-2 space-x-2 md:space-x-3 items-center product-card horizontal p-0 md:p-5 cursor-pointer">
                        <img class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' .  $post->images->first()->image }}" alt="customer jewellery 2">
                        <div class="flex flex-col space-y-1 md:space-y-2">
                            <div class="flex flex-col mt-2 md:mt-0">
                                <p class="text-sm md:text-xl font-bold md:font-normal font-suranna">{{__('weddingRing.' . $weddingRing->metal)}} {{__('weddingRing.Wedding Rings')}}</p>
                                <p class="text-sm font-lato">{{__('weddingRing.Couple Rings')}}{{$weddingRing->brand}}</p>
                            </div>
                            <div class="flex flex-col items-center justify-center divide-y divide-gold divide-opacity-50 mr-2 md:mr-0">
                                <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                    <p class="text-xs md:text-sm text-black opacity-50">{{__('weddingRing.shape')}}</p>
                                    <p class="text-xs md:text-sm">{{__('weddingRing.' . $weddingRing->shape)}}</p>
                                </div>
                                <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                    <p class="text-xs md:text-sm text-black opacity-50">{{__('weddingRing.finish')}}</p>
                                    <p class="text-xs md:text-sm">{{__('weddingRing.' . $weddingRing->finish)}}</p>
                                </div>
                                <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                    <p class="text-xs md:text-sm text-black opacity-50">{{__('weddingRing.metal')}}</p>
                                    <p class="text-xs md:text-sm text-right"> {{__('weddingRing.' . $weddingRing->metal)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif

            @foreach($post->invoice->jewelleries as $jewellery)
                @if($jewellery->type != 'Misc' )
                    <a href="/{{ app()->getLocale() . '/customer-jewellery/' . $post->id }}" target="_blank" class="col-span-2">
                        <div class="relative col-span-1 grid grid-cols-2 space-x-2 md:space-x-3 items-center product-card horizontal p-0 md:p-5">
                            <img class="w-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' .  $post->images->first()->image }}" alt="customer jewellery 1">
                            <div class="flex flex-col space-y-1 md:space-y-2">
                                <p class="text-sm md:text-xl font-bold md:font-normal font-suranna">{{__('jewellery.' .$jewellery->metal)}} {{__('jewellery.' .$jewellery->type)}} {{__('jewellery.' .$jewellery->setting==1?'setting':'')}}</p>
                                <div class="flex flex-col items-center justify-center divide-y divide-gold divide-opacity-50 mr-2 md:mr-0">
                                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                        <p class="text-xs md:text-sm text-black opacity-50">{{__('jewellery.Gemstone')}}</p>
                                        <p class="text-xs md:text-sm">{{__('jewellery.'.$jewellery->gemstone)}}</p>
                                    </div>
                                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                        <p class="text-xs md:text-sm text-black opacity-50">{{__('jewellery.Metal')}}</p>
                                        <p class="text-xs md:text-sm">{{__('jewellery.' .$jewellery->metal)}}</p>
                                    </div>
                                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                        <p class="text-xs md:text-sm text-black opacity-50">{{__('jewellery.Side stone')}}</p>
                                        <p class="text-xs md:text-sm text-right">{{__('engagementRing.Around')}} {{$jewellery->ct}}ct</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach

        </div>

    @endif
    @endforeach
@endif
</div>
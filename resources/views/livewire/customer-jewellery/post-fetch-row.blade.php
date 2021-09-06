<div >
   <div class="grid md:grid-cols-2 w-full gap-3 md:gap-7 md:items-center pt-10 pb-20 2xl:py-20">
        <div class="md:col-span-2 flex items-center justify-between">
            <h2 class="text-xl font-medium text-brown">
            {{__('customerJewellery.Cusomter Jewellery')}} {{$title}}</h2>
            <div class="flex items-center space-x-2">
                @if($model->onFirstPage())
                   <a class="opacity-50">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="#666666">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                       </svg>
                   </a>
                @else   
                   <button wire:click="previousPage()">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                       </svg>
                   </button>
                @endif
                @if($model->hasMorePages())
                    <button wire:click="nextPage()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
        <!-- Product 1  -->
        @if($model)     
        @foreach($model as $index => $post)
        @if(count($post->images))
            <div x-data="{details: false}" @mouseover="details = true" @mouseleave="details = false" class="grid grid-cols-2 space-x-0 md:space-x-3 relative product-card p-0 md:p-5 cursor-pointer" :class="{'horizontal': details == false}" >
                @if($post->invoice->engagementRings->count())
                @php($engagementRing = $post->invoice->engagementRings->first())
                     <a class="" href="/{{ app()->getLocale() . '/customer-jewellery/' . $post->id }}" target="_blank" >
                        <img class="w-full h-full md:w-auto md:h-auto" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' .  $post->images->first()->image }}" alt="customer jewellery 1">
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
                <div x-show="details == true" class="absolute top-0 bg-white z-40 flex flex-col w-full h-full">                     
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
                        <div class="relative grid grid-cols-2 space-x-2 md:space-x-3 product-card horizontal p-0 md:p-5 cursor-pointer">
                            <img class="w-full h-full md:w-auto md:h-auto" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' .  $post->images->first()->image }}" alt="customer jewellery 2">
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

                @if($post->invoice->jewelleries->count())
                @php($jewellery = $post->invoice->jewelleries->first())
                    <a href="/{{ app()->getLocale() . '/customer-jewellery/' . $post->id }}" target="_blank" class="col-span-2">
                        <div class="relative col-span-1 grid grid-cols-2 space-x-2 md:space-x-3 product-card horizontal p-0 md:p-5">
                            <img class="w-full h-full md:w-auto md:h-auto" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' .  $post->images->first()->image }}" alt="customer jewellery 1">
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

            </div>

        @endif
        @endforeach
        @endif
        
        <!-- More Products .... -->
    </div>


</div>
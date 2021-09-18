<div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 w-full gap-3 md:gap-7 md:items-center py-10 2xl:py-20 2xl:pb-10">
    <div class="col-span-2 md:col-span-2 lg:col-span-4 flex items-center justify-between">
        <h2 class="text-xl font-medium text-brown">{{__('engagementRing.Recommended')}} {{__('weddingRing.Wedding Rings')}}</h2>
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
    @foreach($model as $data)
        <div @click="showModal = true" class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a href="{{ '/' . app()->getlocale() . '/engagement-rings/' . $data->id }}" target="_blank">
                <img class="mt-5 md:mt-0 w-full" src="{{ config('global.cache.' . config('global.cache.live') ) 
                                              . 'public/images/' . $data->images->first()->image }}" alt="p1">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <div class="flex flex-col md:flex-row items-center w-full md:w-auto px-2 md:px-0 md:justify-center md:space-x-3">
                        <div class="flex flex-row justify-between md:justify-start w-full md:w-auto md:flex-col space-y-0 items-center">
                            <span class="text-grey-04 text-sm">{{__('weddingRing.'.$data->weddingRings[0]->gender)}}</span>
                            <p class="flex items-center space-x-1 font-suranna text-gold-light">
                                <span class="text-base md:text-xl">HKD</span>
                                <span class="text-xl md:text-2xl">${{$data->weddingRings[0]->unit_price}}</span>
                            </p>
                        </div>
                        <div class="flex flex-row justify-between md:justify-start w-full md:w-auto md:flex-col space-y-0 items-center">
                            <span class="text-grey-04 text-sm">{{__('weddingRing.'.$data->weddingRings[1]->gender)}}</span>
                            <p class="flex items-center space-x-1 font-suranna text-gold-light">
                                <span class="text-base md:text-xl">HKD</span>
                                <span class="text-xl md:text-2xl">${{$data->weddingRings[1]->unit_price}}</span>
                            </p>
                        </div>
                    </div>
                    <h1 class="text-center text-lg md:text-xl font-suranna">
                        <a href="#">{{__('weddingRing.'.$data->weddingRings[0]->metal)}} {{__('weddingRing.Wedding Rings')}}</a>
                        <p class="text-xs font-lato">{{__('weddingRing.Couple Rings')}} {{$data->weddingRings[0]->brand?'｜'.__('weddingRing.'.$data->weddingRings[0]->brand):''}}</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    @if($data->weddingRings[0]->invoices_count>0)
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                        </svg>
                        <span class="text-sm font-lato">{{$data->weddingRings[0]->invoices_count}}</span>
                    @endif
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('weddingRing.Shape')}}</p>
                        <p class="text-xs md:text-sm text-center">{{__('weddingRing.'.$data->weddingRings[0]->shape)}}</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('weddingRing.Finish')}}</p>
                        <p class="text-xs md:text-sm text-center">{{__('weddingRing.'.$data->weddingRings[0]->finish)}}</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('weddingRing.Metal')}}</p>
                        <p class="text-xs md:text-sm text-center">{{__('weddingRing.'.$data->weddingRings[0]->metal)}}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    <!-- More Products .... -->
</div>
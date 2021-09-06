<div>
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 w-full gap-3 md:gap-7 md:items-center py-10 2xl:py-20 2xl:pb-10">
        <div class="col-span-2 md:col-span-2 lg:col-span-3 2xl:col-span-4 flex items-center justify-between">
            <h2 class="text-xl font-medium text-brown">{{__('engagementRing.Recommended')}} {{__('engagementRing.Settings')}}</h2>
            <div class="flex items-center space-x-2">

                @if($model->onFirstPage())
                    <button class="opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="#666666">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </button>
                @else   
                    <button wire:click="previousPage">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </button>
                @endif

                @if($model->hasMorePages())
                    <button wire:click="nextPage">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                @endif

            </div>
        </div>
        @foreach($model as $data)   
            <div @click="showModal = true" class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
                <img class="mt-5 md:mt-0" src="{{ config('global.cache.' . config('global.cache.live') ) 
                                          . 'public/images/' . $data->images->first()->image }}" alt="Recommend-Settings-2">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">${{$data->unit_price}}</span>
                    </p>
                    <h1 class="text-sm md:text-xl font-suranna">
                        <a href="#">{{__('engagementRing.' . $data->metal) }} {{__('engagementRing.' . $data->style)}}</a>
                    </h1>
                    <p class="text-xs md:text-base">{{__('engagementRing.Engagement Ring Setting')}}</p>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A" />
                    </svg>
                    <span class="text-sm font-lato">52</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">{{__('engagementRing.Style')}}</p>
                        <p class="text-xs md:text-sm">{{__('engagementRing.' . $data->style)}}</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">{{__('engagementRing.Shoulder')}}</p>
                        <p class="text-xs md:text-sm">{{__('engagementRing.' . $data->shoulder)}}</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">{{__('engagementRing.prong')}}</p>
                        <p class="text-xs md:text-sm">{{__('engagementRing.' . $data->prong)}}</p>
                    </div>
                </div>
            </div>
        @endforeach    

        <!-- More Products .... -->
    </div>
</div>

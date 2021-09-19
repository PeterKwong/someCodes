 <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 w-full gap-3 md:gap-7 md:items-center py-10 2xl:py-20 2xl:pb-10">
    <div class="col-span-2 md:col-span-2 lg:col-span-4 flex items-center justify-between">
        <h2 class="text-xl font-medium text-brown">{{__('engagementRing.Recommended')}} {{__('jewellery.Jewellery')}}</h2>
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
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a href="{{ '/' . app()->getlocale() . '/jewellery/' . $data->id }}" target="_blank">
                <img class="flex justify-center mt-5 md:mt-0" src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $data->images->first()->image }}" alt="p1">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base">HKD</span>
                        <span class="text-xl md:text-3xl">${{ $data->unit_price }}</span>
                    </p>
                    <h1 class="text-center text-lg md:text-xl font-suranna">
                        <a href="#">{{ __('jewellery.'.$data->metal) }} {{ $data->gemstone!=0?__('jewellery.'.$data->gemstone):'' }} {{ __('jewellery.'.$data->type) }}</a>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                    @if($data->invoices_count>0)
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A" />
                        </svg>
                        <span class="text-xs md:text-sm font-lato">{{$data->invoices_count}}</span>
                    @endif
                </div>
                <!-- if no catergory, add this p down here  -->
                <p class="opacity-0 text-xs md:text-sm font-lato">{{ $data->gemstone!=0?__('jewellery.'.$data->gemstone):'' }} {{ $data->type }}</p>
            </a>
        </div>
    @endforeach
    <!-- More Products .... -->
</div>
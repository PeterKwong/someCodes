<!-- Products -->
<div wire:init="loadDiamonds"  class="relative grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 w-full xl:grid-cols-4 gap-3 md:gap-7 md:items-center py-10 2xl:pb-10">
    @if( isset($diamonds['data']) )
        @foreach($diamonds['data'] as $id => $row)
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500" :class="{ ' bg-gray-200':clickedRows.includes( {{$row['id']}} )}" x-on:click.prevent="goto( {{$row['id']}}, {{$id}} )">
                <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}">
                    <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                        @if($row['image_cache'])  
                            <img class="h-36 md:h-64" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/diamond/' .'images/thm-' . $row['id'] . '.jpg'  }}" alt="Diamond 1">
                        @else
                            <img class="h-36 md:h-64" src="/assets/images/diamond-dummy.png" alt="Diamond dummy">
                        @endif

                        <div class="absolute top-1.5 left-4 tags flex flex-wrap items-center gap-1.5">
                            @if($row['starred'] != 0)
                            <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                                {{__('diamondSearch.starred')}}
                            </p>
                            @endif
                      
                            @if($row['location'] == '1Hong Kong')
                                <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                                     {{__('diamondSearch.1-2 Days')}}
                                </p>
                            @else
                                <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">                            
                                 {{__('diamondSearch.Order')}}
                                </p>
                            @endif

                        </div>
                    </div>
                    <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                        <p class="flex items-center space-x-1 font-suranna text-gold-light">
                            <span class="text-base md:text-xl">HKD</span>
                            <span class="text-xl md:text-4xl">${{ $row['price'] }}</span>
                        </p>
                        <div class="flex items-center justify-center space-x-2">
                            <span class="text-sm font-lato">{{trans('diamondSearch.' . $row['shape']) }}</span>
                        </div>
                        <div class="flex items-center justify-center">
                            @if($row['plot'])   
                                <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/diamond/' .'plots/' . $row['id'] . '.jpg'  }}" class="h-16" alt="">
                            @else
                                <img src="{{ '/images/front-end/diamond_shapes/' . strtolower($row['shape']) . '.png'}}"  class="h-16 w-auto"> 
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                        <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                            <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('diamondSearch.Carat')}}</p>
                            <p class="text-xs md:text-sm text-center">{{$row['weight']}}</p>
                        </div>
                        <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                            <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('diamondSearch.Color')}}</p>
                            <p class="text-xs md:text-sm text-center">{{$row['color']}}</p>
                        </div>
                        <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                            <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('diamondSearch.Clarity')}}</p>
                            <p class="text-xs md:text-sm text-center">{{$row['clarity']}}</p>
                        </div>
                        <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                            <p class="text-xs md:text-sm text-black opacity-50 text-center">{{__('diamondSearch.Cut')}}</p>
                            <p class="text-xs md:text-sm text-center">{{ $row['cut'] == '0' ? '' : $row['cut'] }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col px-2 md:px-0">
                         @if(array_search('fancy_color',$columns) > -1)
                            <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.fancy_intensity')}}</p>
                                <p class="text-xs md:text-sm">{{ $row['fancy_intensity'] }}</p>
                            </div>
                            <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.fancy_color')}}</p>
                                <p class="text-xs md:text-sm">{{ $row['fancy_color'] }}</p>
                            </div>
                        @endif
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.Polish')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['polish'] }}</p>
                        </div>
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.Symmetry')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['symmetry'] }}</p>
                        </div>
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.Fluorescence')}}</p>
                            <p class="text-xs md:text-sm">{{__('diamondSearch.' . $row['fluorescence'] )}}</p>
                        </div>
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{ $row['lab'] }}{{__('diamondSearch.Certificate')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['certificate'] }}</p>
                        </div>

                        @if($fetchData['table_percent'][1] != 0 )
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.table_percent')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['table_percent'] }}°</p>
                        </div>
                        @endif
                        @if($fetchData['depth_percent'][1] != 0 )
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.depth_percent')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['depth_percent'] }}°</p>
                        </div>
                        @endif
                        @if($fetchData['crown_angle'][1] != 0 )
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.crown_angle')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['crown_angle'] }}°</p>
                        </div>
                        @endif
                        @if($fetchData['parvilion_angle'][1] != 0 )
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.parvilion_angle')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['parvilion_angle'] }}°</p>
                        </div>
                        @endif
                        @if($fetchData['length'][1] != 0 )
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.length')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['length'] }} mm</p>
                        </div>
                        @endif
                        @if($fetchData['width'][1] != 0 )
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.width')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['width'] }} mm</p>
                        </div>
                        @endif
                        @if($fetchData['depth'][1] != 0 )
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">{{__('diamondSearch.depth')}}</p>
                            <p class="text-xs md:text-sm">{{ $row['depth'] }} mm</p>
                        </div>
                        @endif
                       
                    </div>
                </a>
            </div>
        @endforeach

    @endif
    <!-- More Products .... -->
</div>

<!-- Inquiry popedup Block -->
<span class="hidden-item-hover">
    <div id="inquiry" class="flex fixed md:flex z-50 bottom-2 md:bottom-4 left-2 md:left-8">
        <div class="bg-grey-04 p-2 md:px-5 md:py-3 max-w-2xl flex md:items-center space-x-7 rounded-xl">
            <svg class="w-8 h-8 md:w-12 md:h-12" viewBox="0 0 40 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M32.2802 0.213135C31.0074 0.213135 9.12507 0.213135 7.72203 0.213135L0 10.7431L20.0829 37.2122L40 10.7401L32.2802 0.213135ZM10.979 11.9L16.6371 28.8038L3.81162 11.9H10.979ZM13.4439 11.9H26.5652L20.0496 31.6349L13.4439 11.9ZM29.0268 11.9H36.2023L23.4158 28.8947L29.0268 11.9ZM31.0956 2.5505L36.2378 9.56259H29.0283L26.7275 2.5505H31.0956ZM24.2675 2.5505L26.5683 9.56259H13.4338L15.7346 2.5505H24.2675ZM8.90645 2.5505H13.2745L10.9737 9.56259H3.76425L8.90645 2.5505Z" fill="white"/>
            </svg>
            @if(config('global.locale.' . app()->getLocale())  != '2')
                <a href="{{ '/links/whatsapp/852' . config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') }}" class="hidden-item text-xs md:text-base font-lato text-white" >
                    <p>{{trans('diamondSearch.If you could not find diamonds as your inquiry')}} , 
                        <span class="font-semibold">
                            {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}
                                ( {{ config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.name') }} :  {{ config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') }} ) 
                        </span>
                        <br>
                    {{trans('diamondSearch.price below $80000 diamond, pay by cash would have 1.7~2% discount')}} 
                    </p>
                </a>
              @endif

              @if(config('global.locale.' . app()->getLocale())  == '2')

                <p class="hidden-item flex-col text-xs md:text-base font-lato text-white" >
                    {{trans('diamondSearch.If you could not find diamonds as your inquiry')}} ,   {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}             
                     <img width="100" src="/images/front-end/aboutUs/wechat.jpg">
                    <br>
                    {{trans('diamondSearch.price below $80000 diamond, pay by cash would have 1.7~2% discount')}} 
                </p>

              @endif
        </div>
    </div>
</span>

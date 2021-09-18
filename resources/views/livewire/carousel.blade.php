<div x-data="lwJsD()" x-init="init()">
    <div  class="flex md:space-x-4 overflow-hidden">
        <div class="hidden md:flex w-1/4 h-auto"></div>
        <div class="relative w-full md:w-3/4 pb-0.5 overflow-y-hidden flex space-x-3">
            <div class="absolute top-1/3 flex w-full items-center">
                <div class="flex w-full items-center justify-between space-x-2">
                     @if($posts->onFirstPage())
                        <a class="opacity-50 z-10 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="#666666">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </a>
                    @else
                        <span x-on:click="selectingItem=null">
                            <button class="z-10 cursor-pointer" wire:click="previousPage()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </button>
                        </span>
                    @endif

                    @if($posts->hasMorePages())
                        <span x-on:click="selectingItem=null">
                            <button class="z-10 cursor-pointer" wire:click="nextPage()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </div>
            </div>
            @foreach($posts as $index => $post)
                @if($post->video360 != '')
                    <div class="relative flex items-center justify-center border hover:border-gold-light min-w-max h-20 cursor-pointer select-none" :class="{' border-gold-light':selectingItem == {{$index}} }">
                        <div class="w-32"  x-on:click="setPostData('{{$index}}');
                                                        @this.selectingItemPost({{$post->id}},{{$post->invoice->invoiceDiamonds}},{{$post->invoice->engagementRings}},{{$post->invoice->weddingRings}},{{$post->invoice->jewelleries}})">
                            <img class="opacity-50" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/'. $post->images->first()->image }}"  alt="">
                            <div class="absolute bottom-1 w-full">
                                <p class="flex items-center space-x-1">
                                    <svg width="24" height="24" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5987 5.09811C14.8234 4.96838 15.0999 4.96721 15.3257 5.09518L21.3455 8.50637L15.0035 12.1851L8.66356 8.52473L14.5987 5.09811ZM10.5967 20.7044C10.19 20.2906 9.48326 20.4928 9.35914 21.0613L9.03555 22.5431C4.18829 21.2384 1.86104 18.4324 6.46729 16.1307V14.5189C0.42305 17.1264 1.37154 22.0238 8.72266 23.9757L8.43169 25.3079C8.30694 25.8791 8.873 26.3623 9.41895 26.1439L13.0798 24.6795C13.5641 24.4859 13.6968 23.8598 13.3302 23.4866L10.5967 20.7044ZM23.5414 14.5189V16.1307C25.119 16.9189 26.0356 17.8947 26.0356 18.8626C26.0356 21.0811 21.5722 22.8239 17.1564 23.1912C16.7532 23.2244 16.4535 23.5783 16.4872 23.981C16.5188 24.3683 16.8528 24.681 17.2769 24.6506C21.1208 24.3342 27.5 22.6755 27.5 18.8626C27.5 16.7802 25.4624 15.3476 23.5414 14.5189ZM7.93144 16.6461C7.93144 16.9077 8.07099 17.1494 8.29751 17.2802L14.2722 20.7296V13.4537L7.93139 9.79282V16.6461H7.93144ZM22.0773 9.77474V16.6461C22.0773 16.9077 21.9378 17.1494 21.7113 17.2802L15.7366 20.7297V13.4527L22.0773 9.77474Z" fill="#666666"></path>
                                    </svg>
                                    <span class="text-sm">360°</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                @if($post->video != '' && $post->video360 == '')
                    <div class="flex items-center justify-center border hover:border-gold-light min-w-max h-20 cursor-pointer select-none" :class="{' border-gold-light':selectingItem == {{$index}} }">
                         <div  class="relative w-32 overflow-hidden" 
                            x-on:click="setPostData('{{$index}}');
                                        @this.selectingItemPost({{$post->id}},{{$post->invoice->invoiceDiamonds}},{{$post->invoice->engagementRings}},{{$post->invoice->weddingRings}},{{$post->invoice->jewelleries}})">
                            <img class="md:w-32" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/'. $post->images->first()->image }}" alt="">
                            <div class="absolute top-0 h-20 w-full flex items-center justify-center overflow-hidden">
                                <img class="h-20 w-full pr-0.5 md:pr-0" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/'. $post->images->first()->image }}" alt="">
                                <svg class="absolute" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.8335 20C3.8335 11.0714 11.0715 3.83337 20.0002 3.83337C28.9288 3.83337 36.1668 11.0714 36.1668 20C36.1668 28.9287 28.9288 36.1667 20.0002 36.1667C11.0715 36.1667 3.8335 28.9287 3.8335 20Z" fill="white" stroke="#CCCCCC" />
                                    <path d="M15.499 13.108V26.8919L27.4313 20L15.499 13.108Z" fill="#666666" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
            

        </div>
    </div>
    <!-- Row 3 -->
    <div class="flex md:space-x-4">
        <div class="hidden md:flex w-1/4 h-auto"></div>
        <div class="w-full md:w-3/4 flex items-center justify-center space-x-2">
            <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.26311 3.99339L2.9265 1.85536C2.83972 1.71607 2.82097 1.54464 2.87668 1.39036C2.9324 1.23554 3.05561 1.115 3.2115 1.06304L4.81865 0.527321C4.87329 0.509107 4.93061 0.5 4.98793 0.5H7.13079C7.18811 0.5 7.24543 0.509107 7.30008 0.527321L8.90722 1.06304C9.06311 1.115 9.18633 1.23554 9.24204 1.39036C9.29775 1.54464 9.279 1.71607 9.19222 1.85536L7.85561 3.99339C10.231 4.75411 11.9522 6.98107 11.9522 9.60714C11.9522 12.8595 9.31168 15.5 6.05936 15.5C2.80704 15.5 0.166504 12.8595 0.166504 9.60714C0.166504 6.98107 1.88775 4.75411 4.26311 3.99339ZM6.05936 4.78571C8.72025 4.78571 10.8808 6.94625 10.8808 9.60714C10.8808 12.268 8.72025 14.4286 6.05936 14.4286C3.39847 14.4286 1.23793 12.268 1.23793 9.60714C1.23793 6.94625 3.39847 4.78571 6.05936 4.78571ZM5.07472 1.57143L4.19561 1.86446L5.01686 3.17857H7.10186L7.92311 1.86446L7.044 1.57143H5.07472Z" fill="black" />
            </svg>
            <span class="text-3xl font-suranna">{{ $posts->total() }} 
            </span>
            <span class="text-sm font-lato">{{__('customerJewellery.Customer Jewellery')}}</span>
            <span class="text-sm text-gray-600">({{ $jsPosts['from'] }}-{{ $jsPosts['to'] }})</span>
        </div>
    </div>

    @if(count($selectingItem))
    <!-- Row 4 -->
        <div class="flex md:space-x-4">
            <div class="hidden md:flex w-1/4 h-auto"></div>
            <div class="w-full md:w-3/4 flex border border-gold-light space-x-3 relative product-card diamond p-2 md:p-5">
                <div class="flex flex-col w-full font-lato space-y-1 md:space-y-2">
                    @if(count($selectingItem['engagement_rings']))
                        <div class="flex items-center justify-between w-full mt-2 md:mt-0">
                            <p class="text-sm md:text-xl font-bold md:font-normal font-suranna">{{__('engagementRing.'. $selectingItem['engagement_rings'][0]['metal'])}} {{__('engagementRing.Diamond Ring')}} </p>
                            <a href="{{ '/' . app()->getlocale() . '/customer-jewellery/' . $selectingItem['id'] }}" target="_blank" >
                                <button class="flex items-center space-x-3 text-brown">
                                    <span class="font-bold">{{__('customerJewellery.View Details')}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#9A7474">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <p class="text-sm">{{__('engagementRing.Engagement Ring Setting')}}</p>
                        <div class="flex flex-col md:flex-row items-center justify-center md:justify-start divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mr-2 md:mr-0 border-b pb-3">
                            <div class="relative flex w-full md:w-auto justify-between md:justify-start md:max-w-max md:pl-0 md:px-5 flex-row md:space-x-5 items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('engagementRing.Style')}}</p>
                                <p class="text-xs md:text-sm">{{__('engagementRing.'. $selectingItem['engagement_rings'][0]['style'])}}</p>
                            </div>
                            <div class="relative flex w-full md:w-auto justify-between md:justify-start md:max-w-max md:px-5 flex-row md:space-x-5 items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('engagementRing.Shoulder')}}</p>
                                <p class="text-xs md:text-sm">{{__('engagementRing.'. $selectingItem['engagement_rings'][0]['shoulder'])}}</p>
                            </div>
                            <div class="relative flex w-full md:w-auto justify-between md:justify-start md:max-w-max md:pr-0 md:px-5 flex-row md:space-x-5 items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('engagementRing.prong')}}</p>
                                <p class="text-xs md:text-sm text-right"> {{__('engagementRing.'. $selectingItem['engagement_rings'][0]['prong'])}}</p>
                            </div>
                        </div>
                    @endif

                    @if(count($selectingItem['invoice_diamonds']))
                        <p class="text-sm">{{$selectingItem['invoice_diamonds'][0]['weight']}} {{__('diamondSearch.'.$selectingItem['invoice_diamonds'][0]['shape'])}} {{__('diamondSearch.diamond')}}</p>
                        <p class="text-sm">
                            {{__('diamondSearch.Carat')}}: {{$selectingItem['invoice_diamonds'][0]['weight']}}
                            ｜{{__('diamondSearch.Color')}}: {{$selectingItem['invoice_diamonds'][0]['color']}}
                            ｜{{__('diamondSearch.Clarity')}}: {{$selectingItem['invoice_diamonds'][0]['clarity']}}
                            ｜{{__('diamondSearch.Cut')}}: {{$selectingItem['invoice_diamonds'][0]['cut']}} <br>
                            {{__('diamondSearch.Polish')}}: {{$selectingItem['invoice_diamonds'][0]['polish']}}
                            ｜{{__('diamondSearch.Symmetry')}}: {{$selectingItem['invoice_diamonds'][0]['symmetry']}}
                            ｜{{__('diamondSearch.Fluorescence')}}: {{__('diamondSearch.'.$selectingItem['invoice_diamonds'][0]['fluorescence'])}}
                        </p>
                    @endif

                    @if(count($selectingItem['wedding_rings']))
                        @if(isset($selectingItem['wedding_rings'][0]))
                        <div class="flex items-center justify-between w-full mt-2 md:mt-0">
                            <p class="text-sm md:text-xl font-bold md:font-normal font-suranna">{{__('weddingRing.'. $selectingItem['wedding_rings'][0]['metal'])}} {{__('weddingRing.Wedding Ring')}} </p>
                            <a href="{{ '/' . app()->getlocale() . '/customer-jewellery/' . $selectingItem['id'] }}" target="_blank" >
                                <button class="flex items-center space-x-3 text-brown">
                                    <span class="font-bold">{{__('customerJewellery.View Details')}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#9A7474">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <p class="text-sm">{{__('weddingRing.'.$selectingItem['wedding_rings'][0]['gender'])}}{{__('weddingRing.Wedding Ring')}}</p>
                        <div class="flex flex-col md:flex-row items-center justify-center md:justify-start divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mr-2 md:mr-0 border-b pb-3">
                            <div class="relative flex w-full md:w-auto justify-between md:justify-start md:max-w-max md:pl-0 md:px-5 flex-row md:space-x-5 items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('weddingRing.shape')}}</p>
                                <p class="text-xs md:text-sm">{{__('weddingRing.'. $selectingItem['wedding_rings'][0]['shape'])}}</p>
                            </div>
                            <div class="relative flex w-full md:w-auto justify-between md:justify-start md:max-w-max md:px-5 flex-row md:space-x-5 items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('weddingRing.finish')}}</p>
                                <p class="text-xs md:text-sm">{{__('weddingRing.'. $selectingItem['wedding_rings'][0]['finish'])}}</p>
                            </div>
                            <div class="relative flex w-full md:w-auto justify-between md:justify-start md:max-w-max md:pr-0 md:px-5 flex-row md:space-x-5 items-center py-2">
                                <p class="text-xs md:text-sm text-black opacity-50">{{__('weddingRing.metal')}}</p>
                                <p class="text-xs md:text-sm text-right"> {{__('weddingRing.'. $selectingItem['wedding_rings'][0]['metal'])}}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if(isset($selectingItem['wedding_rings'][1]))
                            <p class="text-sm">{{__('weddingRing.'.$selectingItem['wedding_rings'][1]['gender'])}}{{__('weddingRing.Wedding Ring')}}</p>
                            <div class="flex flex-col md:flex-row items-center justify-center md:justify-start divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mr-2 md:mr-0 border-b pb-3">
                                <div class="relative flex w-full md:w-auto justify-between md:justify-start md:max-w-max md:pl-0 md:px-5 flex-row md:space-x-5 items-center py-2">
                                    <p class="text-xs md:text-sm text-black opacity-50">{{__('weddingRing.shape')}}</p>
                                    <p class="text-xs md:text-sm">{{__('weddingRing.'. $selectingItem['wedding_rings'][1]['shape'])}}</p>
                                </div>
                                <div class="relative flex w-full md:w-auto justify-between md:justify-start md:max-w-max md:px-5 flex-row md:space-x-5 items-center py-2">
                                    <p class="text-xs md:text-sm text-black opacity-50">{{__('weddingRing.finish')}}</p>
                                    <p class="text-xs md:text-sm">{{__('weddingRing.'. $selectingItem['wedding_rings'][1]['finish'])}}</p>
                                </div>
                                <div class="relative flex w-full md:w-auto justify-between md:justify-start md:max-w-max md:pr-0 md:px-5 flex-row md:space-x-5 items-center py-2">
                                    <p class="text-xs md:text-sm text-black opacity-50">{{__('weddingRing.metal')}}</p>
                                    <p class="text-xs md:text-sm text-right"> {{__('weddingRing.'. $selectingItem['wedding_rings'][1]['metal'])}}</p>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>


<script type="text/javascript">
    function lwJsD(){
        return{
            jsData:@entangle('jsData'),
            posts:@entangle('jsPosts'),
            selectingItem:null,
            init(){
                // this.setClickData()
            },
            setClickData(){
                var js = this.jsData
               // console.log('js',js)
               var d = window.mutualVar.lw.carousel
               d.type = js.type
               d.src = js.src
               d.thumb = js.thumb
               d.video360 = js.video360
               // console.log(d)
            },
            setPostData(i=0){
                this.selectingItem = i
                var p = this.posts.data[i]
                var d = window.mutualVar.lw.carousel

                if (p.video360) {
                    d.type = 'video360'
                    d.thumb =  p.images[0].image
                    d.src =  p.video
                    d.video360 = p.video360
                }
               // console.log('post',p.video360)
               // console.log('post',p.video)

                if (!p.video360 && p.video) {
               // console.log('post',p.video)
                    d.type = 'video'
                    d.thumb = p.images[0].image
                    d.src =  p.video
                    d.video360 = null
                }
            },

        }
    }
</script>

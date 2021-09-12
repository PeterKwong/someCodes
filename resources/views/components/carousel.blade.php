<div  x-data="jsD()" x-init="init()" class="md:col-span-4 flex flex-col space-y-4">

    <!-- Row 1 -->
    <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4 overflow-hidden">
        <div class="w-full md:w-1/4 md:h-80 md:overflow-y-auto scroll-gallery vertical overflow-x-auto md:overflow-x-hidden flex flex-row space-x-3 md:space-x-0 md:flex-col items-center md:space-y-3">
            @if($model->video360)
                <div class="relative flex items-center justify-center border hover:border-gold-light min-w-max h-20 cursor-pointer select-none" 
                    x-on:click="setClickData('video360',
                                            '{{config('global.cache.' . config('global.cache.live') ) . 'public/video360/' . $model->video360 . '/thm-0.jpg' }}')">
                    <div class="w-32">
                        <img class="opacity-50" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/video360/' . $model->video360 . '/thm-0.jpg' }}" alt="">
                        <div class="absolute bottom-1 w-full">
                            <p class="flex items-center space-x-1">
                                <svg width="24" height="24" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5987 5.09811C14.8234 4.96838 15.0999 4.96721 15.3257 5.09518L21.3455 8.50637L15.0035 12.1851L8.66356 8.52473L14.5987 5.09811ZM10.5967 20.7044C10.19 20.2906 9.48326 20.4928 9.35914 21.0613L9.03555 22.5431C4.18829 21.2384 1.86104 18.4324 6.46729 16.1307V14.5189C0.42305 17.1264 1.37154 22.0238 8.72266 23.9757L8.43169 25.3079C8.30694 25.8791 8.873 26.3623 9.41895 26.1439L13.0798 24.6795C13.5641 24.4859 13.6968 23.8598 13.3302 23.4866L10.5967 20.7044ZM23.5414 14.5189V16.1307C25.119 16.9189 26.0356 17.8947 26.0356 18.8626C26.0356 21.0811 21.5722 22.8239 17.1564 23.1912C16.7532 23.2244 16.4535 23.5783 16.4872 23.981C16.5188 24.3683 16.8528 24.681 17.2769 24.6506C21.1208 24.3342 27.5 22.6755 27.5 18.8626C27.5 16.7802 25.4624 15.3476 23.5414 14.5189ZM7.93144 16.6461C7.93144 16.9077 8.07099 17.1494 8.29751 17.2802L14.2722 20.7296V13.4537L7.93139 9.79282V16.6461H7.93144ZM22.0773 9.77474V16.6461C22.0773 16.9077 21.9378 17.1494 21.7113 17.2802L15.7366 20.7297V13.4527L22.0773 9.77474Z" fill="#666666"></path>
                                </svg>
                                <span class="text-sm">360° view</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            @if($model->video)            
                <div class="relative flex items-center justify-center border hover:border-gold-light cursor-pointer">
                    <div  class="relative w-32 h-20  overflow-hidden" 
                           x-on:click="setClickData('video','{{ $model->video }}', '{{ $model->images->first()->image }}' )">
                        <img class="md:w-32 h-16" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/'. $model->images->first()->image }}" alt="">
                        <div class="absolute top-0 h-20 w-full flex items-center justify-center overflow-hidden">
                            <img class="h-20 w-full pr-0.5 md:pr-0" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/'. $model->images->first()->image }}" alt="">
                            <svg @click="video2 = true" class="absolute" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.8335 20C3.8335 11.0714 11.0715 3.83337 20.0002 3.83337C28.9288 3.83337 36.1668 11.0714 36.1668 20C36.1668 28.9287 28.9288 36.1667 20.0002 36.1667C11.0715 36.1667 3.8335 28.9287 3.8335 20Z" fill="white" stroke="#CCCCCC" />
                                <path d="M15.499 13.108V26.8919L27.4313 20L15.499 13.108Z" fill="#666666" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endif
            @foreach($model->images as $image)
                <div class="flex items-center justify-center border hover:border-gold-light w-32 md:w-auto min-w-max h-20 cursor-pointer"
                  x-on:click="setClickData('image','{{ $image->image }}' )">
                    <img class="md:w-32 h-16" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/'. $image->image }}" alt="">
                </div>
            @endforeach
        </div>
            <div class="w-full md:w-3/4 h-auto relative border">
                <div id="carousel-center" class="transform scale-100">
                    <carousel-center ></carousel-center>
                </div>
                <script defer type="text/javascript">
                    mutualVar.vComponents.push({'carouselCenter':true})
                </script>
            </div>
    </div>
    <!-- Row 2 -->
    @livewire('carousel',
            ['type'=>$type,
                'typeId'=>$typeId,

             ])


    <script type="text/javascript">
        function jsD(){
            return{
                jsData:@json($jsData),
                init(){
                   // console.log('init',this.jsData.src)
                    this.setData()
                },
                setData(){
                    var js = this.jsData
                   // console.log('js',js.type)
                   var d = window.mutualVar.lw.carousel
                   d.type = js.type
                   d.src = js.src
                   d.thumb = js.thumb
                   d.video360 = js.video360
                   console.log('final',js.type)
                },
                setClickData(type,src,thumb='',video360=false){
                   // console.log('js',this.jsData)
                   var d = window.mutualVar.lw.carousel
                   d.type = type
                   d.src = src
                   d.thumb = thumb
                   d.video360 = video360
                },

            }
        }
    </script>

</div>
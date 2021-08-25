

<div id="diamondHeight">


  <div class="section-3 hidden sm:block">

    @include('frontend.diamond.searchDesktop')


  </div>

  <div class="sm:hidden">

     @include('frontend.diamond.searchMobile')
   

  </div>


  <div class="flex justify-center text-center items-center border border-gray-400 p-2 pt-4 m-4" >

    <div class="flex-1">
      <center>

      @if(config('global.locale.' . app()->getLocale())  != '2')
        <a href="{{ '/links/whatsapp/852' . config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') }}" >
            <p>{{trans('diamondSearch.If you could not find diamonds as your inquiry')}} , <img class="h-4 " src="/images/front-end/diamond/search/whatsapp.png" alt="">    {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}
                    ( {{ config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.name') }} :  {{ config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') }} ) 

            </p>
        </a>
      @endif

      @if(config('global.locale.' . app()->getLocale())  == '2')

      <p >{{trans('diamondSearch.If you could not find diamonds as your inquiry')}} ,   {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}             
          <img width="100" src="/images/front-end/aboutUs/wechat.jpg">
      </p>

      @endif

       <p class="text-red-500">{{trans('diamondSearch.price below $80000 diamond, pay by cash would have 1.7~2% discount')}}        
       </p>

      </center>
    </div>
  </div>

  <div class="flex flex-col space-y-5 items-center pb-0 md:pb-7 p-7 border-t mt-5">
      <div class="flex w-full md:items-center justify-between">
          <div class="flex flex-wrap items-center gap-3">
            @foreach($tags as  $k => $conditions)
              @if(in_array($k,['price','weight']))
                @if($k == 'price')
                  @if( $conditions[0] != 1000 || $conditions[1] != 50000000  )
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button wire:click="clearTags('{{$k}}')">
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
                                ${{$data}}
                                {{count($conditions)-1 == $key?'':'-'}}
                              @endforeach
                        </span>
                    </div>
                  @endif
                @endif
                @if($k == 'weight')
                  @if( $conditions[0] != 0.3 || $conditions[1] != 20  )
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button wire:click="clearTags('{{$k}}')">
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
                                {{count($conditions)-1 == $key?'':'-'}}
                              @endforeach
                        </span>
                    </div>
                  @endif
                @endif
              @endif

              @if(!in_array($k,['price','weight']))
                @if(is_object($conditions))
                  @php($conditions = (array)$conditions)
                @endif

                @if(is_array($conditions))
                  @if(count($conditions))
                  @php($conditions = array_values($conditions))
                    @if(current($conditions) != 0)
                      <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                          <button wire:click="clearTags('{{$k}}')">
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
                  @endif
                @endif
              @endif  

            @endforeach
          </div>
          <div class="flex flex-shrink-0">
              <a class="text-brown underline" href="#" wire:click="resetAll()">{{__('engagementRing.Clear')}}</a>
          </div>
      </div>
  </div>


  <div class="flex justify-between p-4">
    <div class="">
      <a class="text-blue-600"><strong>{{trans('diamondSearch.Total')}}: </strong>
              {{isset($diamonds['total'])?$diamonds['total']:''}} {{trans('diamondSearch.diamond')}}
          </a>
    </div>

    <div x-data="{ search_conditions: @entangle('search_conditions'), advance_search_conditions: @entangle('advance_search_conditions')}">
      <div>
        <span x-on:click="advance_search_conditions.starred.clicked = ! advance_search_conditions.starred.clicked">
          <button wire:click="selectStarred" :class=" `btn btn-outline ${advance_search_conditions.starred.clicked?'btn-primary':''}` " 
          type="button"  >{{__('diamondSearch.starred')}}
          </button> 
        </span>
        <span x-on:click="search_conditions.location['1Hong Kong'].clicked = ! search_conditions.location['1Hong Kong'].clicked">
          <button wire:click="setLocationToHK" :class=" `btn btn-outline ${search_conditions.location['1Hong Kong'].clicked?'btn-primary':''}` " 
          type="button"  >{{__('diamondSearch.Only On Stock')}}
          </button> 
        </span>

      </div>
    </div>
  </div>

  <div class=" sm:hidden">

      <div class="flex justify-between px-4">
          <div class="">
              <div class="flex items-center">
                  <div class="inline-block relative w-24">
                        <select wire:model="fetchData.column" class="select hover:border-gray-500 focus:outline-none focus:shadow-outline">
                          @foreach($columns as $column)
                            <option value="{{$column}}" wire:click="toggleOrder('{{$column}}')">
                            <a >{{ __('diamondSearch.'.$column)}}</a>
                          @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                  </div>
                  <div class="w-8">
                    @if($fetchData['direction'] == 'desc')
                      <button class="btn btn-outline"  wire:click="toggleOrder('{{$fetchData['column']}}')" >
                                  <span >&#x25B2;</span>
                      </button>
                    @else
                      <button class="btn btn-outline"  wire:click="toggleOrder('{{$fetchData['column']}}')" >
                                  <span >&#x25BC;</span>
                      </button>
                    @endif
                  </div>
              </div>

          </div>
          <div class="">
              <button class="btn btn-outline {{ $showInGrid ? 'btn-primary' : '' }}" wire:click="toggleShowGrid"><i class="fas fa-list-alt">{{ __('diamondSearch.List')}}</i></button>
              <button class="btn btn-outline {{ $showInGrid ? '' : 'btn-primary' }}" wire:click="toggleShowGrid"><i class="fas fa-grip-vertical">{{ __('diamondSearch.Grid')}}</i></button>
          </div>
      </div>

  </div>


  <div wire:init="loadDiamonds"  x-data="result()" x-init="init()">

    <div class="overflow-x-auto {{ $showInGrid ? 'sm:hidden' : 'hidden sm:block' }}" >
      @include('frontend.diamond.resultDesktop')   
    </div>

    <div class="{{ $showInGrid ? 'hidden sm:block' : 'sm:hidden'}}" >
      @include('frontend.diamond.resultMobile')
    </div>    

  </div>



  <div class="flex justify-center m-2 {{ isset($diamonds['total']) && $diamonds['total'] == 0 ? '' : 'hidden'}}">

      
      <button class="btn btn-primary" wire:click="resetAll">
          {{ __('diamondSearch.No Result')}} ！ {{__('diamondSearch.reset')}} <i class="fas fa-undo"></i>
      </button>
    
  </div>


</div>


  <div class="flex justify-center">
      <a class="border border-gray-400 px-4 "  
      href="{{ isset($diamonds['first_page_url'])?$diamonds['first_page_url']:'' }}" >
        {{trans('pagination.First Page')}} 1</a>
      <a class="border border-gray-400 px-4 "  
      href="{{ isset($diamonds['prev_page_url'])?$diamonds['prev_page_url']:'' }}" >
        {{trans('diamondSearch.Previous')}}</a>
      <a class="border border-gray-400 px-4 text-white bg-blue-600" >
        {{isset($diamonds['current_page'])?$diamonds['current_page']:''}}</a>
      <a class="border border-gray-400 px-4 "  
      href="{{ isset($diamonds['next_page_url'])?$diamonds['next_page_url']:'' }}" >
        {{trans('diamondSearch.Next')}}</a>
      <a class="border border-gray-400 px-4 " 
      href="{{ isset($diamonds['last_page_url'])?$diamonds['last_page_url']:'' }}" >
        {{trans('pagination.Last Page')}} {{ isset($diamonds['last_page'])?$diamonds['last_page']:'' }}</a>

  </div>

<div id="loading" wire:loading.class="loading">
</div>

<script >
  function mobileSearch(){

    return {
      displayColumn:'', 
      showAdvance : @entangle('showAdvance'),
      search_conditions: @entangle('search_conditions'),
      advance_search_conditions: @entangle('advance_search_conditions'), 
      selectDisplayColumn(column){
        if (this.displayColumn != column) {
          this.displayColumn = column 
        }else{
          this.displayColumn = ''  
        }
      },
      priceMin: @entangle('fetchData.price.0'), 
      priceMax: @entangle('fetchData.price.1'),
      weightMin: @entangle('fetchData.weight.0'), 
      weightMax: @entangle('fetchData.weight.1'),
      sliders: @entangle('sliders').defer,
      init(){
        this.sliders.price.mininputjs = this.priceMin
        this.sliders.price.maxinputjs = this.priceMax
        this.expUpdateMinThumb('price')
        this.expUpdateMaxThumb('price')
        this.sliders.weight.mininputjs = this.weightMin
        this.sliders.weight.maxinputjs = this.weightMax
        this.mintrigger('weight')
        this.maxtrigger('weight')            
        console.log('vars',this.sliders.price.mininputjs)

      },
      expMintrigger(type) {
        this.expCheckMin(type)
        var t = this.sliders[type]
        t.minthumb = ((t.minvalue - t.min) / (t.max - t.min)) * 100;
        if (t.minthumb<0) {
          t.minthumb = 0
        }
        t.mininputjs = Math.round(Math.exp(t.minv + t.scale*(t.minthumb-t.minr))/100)*100;            
      },
      expUpdateMinThumb(type){
        if (this.expCheckMin(type) == 0) {
          return
        }
        var t = this.sliders[type]
        t.minthumb = (Math.log(t.mininputjs)-t.minv)/t.scale + t.minr
        if (t.minthumb<0) {
          t.minthumb = 0
        }
        t.minvalue = (t.minthumb/100)*(t.max - t.min)+t.min
      },
      expMaxtrigger(type) {
        this.expCheckMax(type) 
        var t = this.sliders[type]
        t.maxthumb = 100 - (((t.maxvalue - t.min) / (t.max - t.min)) * 100);
        t.maxinputjs = Math.round(Math.exp(t.maxv + t.scale*(100 - t.maxthumb-t.maxr))/100)*100;
      }, 
      expUpdateMaxThumb(type){
        if (this.expCheckMax(type) == 0) {
          return
        }
        var t = this.sliders[type]
        t.maxthumb =  100 - t.maxr - (Math.log(t.maxinputjs) - t.maxv)/t.scale
        if (t.maxthumb<0) {
          t.maxthumb = 0
        }            
        t.maxvalue = ((100-t.maxthumb)/100)*(t.max - t.min)+t.min
      },
      updateInput(m,mjs,type){
        console.log(type)
        console.log('min',m)
        console.log('min',mjs)
        var t = this.sliders[type]
        console.log('min',t)
        t[m] = t[mjs]            
        console.log('min',t[m])
      },
      expCheckMin(type){
        var t = this.sliders[type]
        if (t.maxinputjs < t.mininputjs) {
          return 0
        }
          t.minvalue = Math.min(t.minvalue, t.maxvalue - 100);
          t.mininputjs = Math.min(t.mininputjs, t.maxinputjs - 1000);
      },
      expCheckMax(type){
        var t = this.sliders[type]
        if (t.maxinputjs < t.mininputjs) {
          return 0
        }
        t.maxvalue = Math.max(t.maxvalue, t.minvalue + 100);
        t.maxinputjs = Math.max(t.maxinputjs, t.mininputjs + 1000);
      },
      mintrigger(type) {
        var t = this.sliders[type]
        this.checkMin(type)

        t.minthumb = ((t.mininputjs - t.min) / (t.max - t.min)) * 100;
      },
      updateMinThumb(type){
        if (this.checkMin(type) == 0) {
          return
        }
        this.mintrigger(type)
      },
      checkMin(type){
        var t = this.sliders[type]
        console.log('check')
        if (t.maxinputjs < t.mininputjs) {
          return 0
        console.log('check')
        }
        t.mininputjs = Math.min(t.mininputjs, t.maxinputjs - 0.01); 
      },
      maxtrigger(type) {
        var t = this.sliders[type]
        this.checkMax(type)
        t.maxthumb = 100 - (((t.maxinputjs - t.min) / (t.max - t.min)) * 100);    
      },
      updateMaxThumb(type){
        if (this.checkMax(type) == 0) {
          return
        }
        var t = this.sliders[type]
        this.maxtrigger(type)
        if (t.maxthumb<0) {
          t.maxthumb = 0
        }
      },
      checkMax(type){
        var t = this.sliders[type]
        if (t.maxinputjs < t.mininputjs) {
          return 0
        }
        t.maxinputjs = Math.max(t.maxinputjs, t.mininputjs + 0.01); 
      },



      fancy_color: @entangle('fancy_color'),
      selectedColor: @entangle('selectedColor'),
      assignSelectColor(){
        var items = Object.entries(this.fancy_color.fancy_color)
        for (var [key, value] of Object.entries(items)) {
          if (this.fancy_color.fancy_color[items[key][0]].clicked) {
            if (items[key][0]!='Brown') {
              this.selectedColor = items[key][0].toLowerCase()
              }else{
              this.selectedColor = 'red'
            }
          }
        }
      },
      resetFancyColor(){
        var items = Object.entries(this.fancy_color.fancy_color)
        for (var [key, value] of Object.entries(items)) {
          this.fancy_color.fancy_color[items[key][0]].clicked = false
        }          
      },
      resetColor(){
        var fancyClicked = this.search_conditions.color['Fancy'].clicked
        var items = Object.entries(this.search_conditions.color)
        for (var [key, value] of Object.entries(items)) {
          this.search_conditions.color[items[key][0]].clicked = false
        }          
        console.log(fancyClicked)
           this.search_conditions.color['Fancy'].clicked = fancyClicked
      },
      resetIntensity(){
        var items = Object.entries(this.fancy_color.fancy_intensity)
        for (var [key, value] of Object.entries(items)) {
          this.fancy_color.fancy_intensity[items[key][0]].clicked = false
        }          
      },
      resetCut(){
        var items = Object.entries(this.search_conditions.cut)
        for (var [key, value] of Object.entries(items)) {
          this.search_conditions.cut[items[key][0]].clicked = false
        }         
      },
      resetFancyData(){
        this.resetFancyColor()
        this.resetIntensity()
        this.resetColor()
        this.resetCut()
      },

    }
  }
</script>

<script>
    function desktopSliders() {
        return {
          applyFilter:false,
          tagShowMore:@entangle('tagShowMore'),
          search_conditions: @entangle('search_conditions'),
          priceMin: @entangle('fetchData.price.0'), 
          priceMax: @entangle('fetchData.price.1'),
          weightMin: @entangle('fetchData.weight.0'), 
          weightMax: @entangle('fetchData.weight.1'),
          sliders: @entangle('sliders').defer,
          init(){
            this.sliders.price.mininputjs = this.priceMin
            this.sliders.price.maxinputjs = this.priceMax
            this.expUpdateMinThumb('price')
            this.expUpdateMaxThumb('price')
            this.sliders.weight.mininputjs = this.weightMin
            this.sliders.weight.maxinputjs = this.weightMax
            this.mintrigger('weight')
            this.maxtrigger('weight')            
            console.log('vars',this.sliders.price.mininputjs)

          },
          expMintrigger(type) {
            this.expCheckMin(type)
            var t = this.sliders[type]
            t.minthumb = ((t.minvalue - t.min) / (t.max - t.min)) * 100;
            if (t.minthumb<0) {
              t.minthumb = 0
            }
            t.mininputjs = Math.round(Math.exp(t.minv + t.scale*(t.minthumb-t.minr))/100)*100;            
          },
          expUpdateMinThumb(type){
            if (this.expCheckMin(type) == 0) {
              return
            }
            var t = this.sliders[type]
            t.minthumb = (Math.log(t.mininputjs)-t.minv)/t.scale + t.minr
            if (t.minthumb<0) {
              t.minthumb = 0
            }
            t.minvalue = (t.minthumb/100)*(t.max - t.min)+t.min
          },
          expMaxtrigger(type) {
            this.expCheckMax(type) 
            var t = this.sliders[type]
            t.maxthumb = 100 - (((t.maxvalue - t.min) / (t.max - t.min)) * 100);
            t.maxinputjs = Math.round(Math.exp(t.maxv + t.scale*(100 - t.maxthumb-t.maxr))/100)*100;
          }, 
          expUpdateMaxThumb(type){
            if (this.expCheckMax(type) == 0) {
              return
            }
            var t = this.sliders[type]
            t.maxthumb =  100 - t.maxr - (Math.log(t.maxinputjs) - t.maxv)/t.scale
            if (t.maxthumb<0) {
              t.maxthumb = 0
            }            
            t.maxvalue = ((100-t.maxthumb)/100)*(t.max - t.min)+t.min
          },
          updateInput(m,mjs,type){
            // console.log(type)
            // console.log('min',m)
            // console.log('min',mjs)
            var t = this.sliders[type]
            // console.log('min',t)
            t[m] = t[mjs]            
            // console.log('min',t[m])
          },
          expCheckMin(type){
            var t = this.sliders[type]
            if (t.maxinputjs < t.mininputjs) {
              return 0
            }
              t.minvalue = Math.min(t.minvalue, t.maxvalue - 100);
              t.mininputjs = Math.min(t.mininputjs, t.maxinputjs - 1000);
          },
          expCheckMax(type){
            var t = this.sliders[type]
            if (t.maxinputjs < t.mininputjs) {
              return 0
            }
            t.maxvalue = Math.max(t.maxvalue, t.minvalue + 100);
            t.maxinputjs = Math.max(t.maxinputjs, t.mininputjs + 1000);
          },
          mintrigger(type) {
            var t = this.sliders[type]
            this.checkMin(type)

            t.minthumb = ((t.mininputjs - t.min) / (t.max - t.min)) * 100;
          },
          updateMinThumb(type){
            if (this.checkMin(type) == 0) {
              return
            }
            this.mintrigger(type)
          },
          checkMin(type){
            var t = this.sliders[type]
            // console.log('check')
            if (t.maxinputjs < t.mininputjs) {
              return 0
            // console.log('check')
            }
            t.mininputjs = Math.min(t.mininputjs, t.maxinputjs - 0.01); 
          },
          maxtrigger(type) {
            var t = this.sliders[type]
            this.checkMax(type)
            t.maxthumb = 100 - (((t.maxinputjs - t.min) / (t.max - t.min)) * 100);    
          },
          updateMaxThumb(type){
            if (this.checkMax(type) == 0) {
              return
            }
            var t = this.sliders[type]
            this.maxtrigger(type)
            if (t.maxthumb<0) {
              t.maxthumb = 0
            }
          },
          checkMax(type){
            var t = this.sliders[type]
            if (t.maxinputjs < t.mininputjs) {
              return 0
            }
            t.maxinputjs = Math.max(t.maxinputjs, t.mininputjs + 0.01); 
          },

        }
    }


</script>



<script>
  function advanceSearch(){

    return {
        showAdvance: @entangle('showAdvance'),
        advance_search_conditions: @entangle('advance_search_conditions'), 
        addAdvanceSearch(column){
            // history.pushState('page2', 'Title', '/page2.php');
            // console.log('adv')
            this.advance_search_conditions[column].clicked = !this.advance_search_conditions[column].clicked
        }

    }
  }
</script>

<script>
  function fancyColor(){

    return {
        search_conditions: @entangle('search_conditions'), 
        fancy_color: @entangle('fancy_color'),
        selectedColor: @entangle('selectedColor'),
        assignSelectColor(){
          var items = Object.entries(this.fancy_color.fancy_color)
          for (var [key, value] of Object.entries(items)) {
            if (this.fancy_color.fancy_color[items[key][0]].clicked) {
              if (items[key][0]!='Brown') {
                this.selectedColor = items[key][0].toLowerCase()
                }else{
                this.selectedColor = 'red'
              }
            }
          }
        },
        resetFancyColor(){
          var items = Object.entries(this.fancy_color.fancy_color)
          for (var [key, value] of Object.entries(items)) {
            this.fancy_color.fancy_color[items[key][0]].clicked = false
          }          
        },
        resetColor(){
          var fancyClicked = this.search_conditions.color['Fancy'].clicked
          var items = Object.entries(this.search_conditions.color)
          for (var [key, value] of Object.entries(items)) {
            this.search_conditions.color[items[key][0]].clicked = false
          }          
          console.log(fancyClicked)
             this.search_conditions.color['Fancy'].clicked = fancyClicked
        },
        resetIntensity(){
          var items = Object.entries(this.fancy_color.fancy_intensity)
          for (var [key, value] of Object.entries(items)) {
            this.fancy_color.fancy_intensity[items[key][0]].clicked = false
          }          
        },
        resetCut(){
          var items = Object.entries(this.search_conditions.cut)
          for (var [key, value] of Object.entries(items)) {
            this.search_conditions.cut[items[key][0]].clicked = false
          }         
        },
        resetFancyData(){
          this.resetFancyColor()
          this.resetIntensity()
          this.resetColor()
          this.resetCut()
        },

    }
  }
</script>


<script >
  function result(){

    return {
        diamonds:@entangle('diamonds'), 
        clickedRows:[],
        init(){
            if (localStorage.getItem('clickedRows')) {
                this.clickedRows = JSON.parse(decodeURIComponent(localStorage.getItem('clickedRows')))
            }
          // console.log('init')
        },
        sendCookies(){
            localStorage.setItem('clickedRows', encodeURIComponent(JSON.stringify(this.clickedRows)))
        },
        goto(id,i){
          row = this.diamonds.data[i].id
          this.clickedRows.push(row)
          console.log(row)
          window.open('/' + '{{app()->getLocale()}}' + '/gia-loose-diamonds/' + row , '')
          this.sendCookies()
        }
    }
    
  }
</script>


@include('layouts.js.infinityAddPage')


</div>

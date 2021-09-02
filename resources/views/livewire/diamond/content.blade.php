<div id="diamondHeight"  x-data="desktopSliders()" x-init="init()" class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">
    
    <!-- Choose/Filter -->
    <div :class="{'absolute -top-0 left-0 z-50 w-full h-full bg-black bg-opacity-30 pt-5 md:pt-0 px-4 md:px-0' : applyFilter,}" class="flex flex-col space-y-3">
        <div x-show="applyFilter == false" class="flex items-center justify-between">
            <a @click="applyFilter = !applyFilter" class="flex items-center space-x-3 text-brown lg:hidden focus:outline-none fixed top-1/3 -top-10 z-10 bg-white px-4 py-2 rounded-lg filter-shadow" id="filter-icon">
                <svg class="fill-current" width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.2176 1.67592H7.30206C6.97447 0.702955 6.05418 0 4.97216 0C3.89014 0 2.96985 0.702955 2.64226 1.67592H0.782336C0.350278 1.67592 0 2.0262 0 2.45825C0 2.89031 0.350278 3.24059 0.782336 3.24059H2.64231C2.9699 4.21355 3.89019 4.91651 4.97221 4.91651C6.05423 4.91651 6.97452 4.21355 7.30211 3.24059H19.2177C19.6497 3.24059 20 2.89031 20 2.45825C20 2.0262 19.6497 1.67592 19.2176 1.67592ZM4.97216 3.35184C4.47944 3.35184 4.07858 2.95097 4.07858 2.45825C4.07858 1.96554 4.47944 1.56467 4.97216 1.56467C5.46487 1.56467 5.86574 1.96554 5.86574 2.45825C5.86574 2.95097 5.46487 3.35184 4.97216 3.35184ZM19.2176 8.37964H17.3576C17.03 7.40667 16.1097 6.70372 15.0277 6.70372C13.9458 6.70372 13.0255 7.40667 12.6979 8.37964H0.782336C0.350278 8.37964 0 8.72992 0 9.16197C0 9.59403 0.350278 9.94431 0.782336 9.94431H12.6979C13.0255 10.9173 13.9458 11.6202 15.0278 11.6202C16.1097 11.6202 17.0301 10.9173 17.3577 9.94431H19.2177C19.6497 9.94431 20 9.59403 20 9.16197C20 8.72992 19.6497 8.37964 19.2176 8.37964ZM15.0278 10.0556C14.5351 10.0556 14.1342 9.65469 14.1342 9.16197C14.1342 8.66926 14.5351 8.26839 15.0278 8.26839C15.5205 8.26839 15.9214 8.66926 15.9214 9.16197C15.9214 9.65469 15.5205 10.0556 15.0278 10.0556ZM10.6539 15.0833H19.2176C19.6497 15.0833 20 15.4336 20 15.8657C20 16.2977 19.6497 16.648 19.2177 16.648H10.6539C10.3264 17.621 9.40607 18.3239 8.32405 18.3239C7.24203 18.3239 6.32174 17.621 5.99415 16.648H0.782336C0.350278 16.648 0 16.2977 0 15.8657C0 15.4336 0.350278 15.0833 0.782336 15.0833H5.99415C6.32174 14.1104 7.24203 13.4074 8.32405 13.4074C9.40607 13.4074 10.3264 14.1104 10.6539 15.0833ZM7.43047 15.8657C7.43047 16.3584 7.83134 16.7593 8.32405 16.7593C8.81676 16.7593 9.21763 16.3584 9.21763 15.8657C9.21763 15.3729 8.81676 14.9721 8.32405 14.9721C7.83134 14.9721 7.43047 15.373 7.43047 15.8657Z" />
                </svg>
                <span class="font-bold">{{__('weddingRing.Filter')}}</span>
            </a>
            <div class="flex items-center space-x-5">
                <div class="md:hidden flex items-center space-x-2"
                        x-on:click="advance_search_conditions.starred.clicked = ! advance_search_conditions.starred.clicked; @this.selectStarred()">
                    <input type="checkbox" name="Starred" id="Starred" x-model="advance_search_conditions.starred.clicked">
                    <label for="Starred" class="font-bold">
                        {{__('diamondSearch.starred')}}
                    </label>
                </div>
                <div class="md:hidden flex items-center space-x-2"
                        x-on:click="search_conditions.location['1Hong Kong'].clicked = ! search_conditions.location['1Hong Kong'].clicked;@this.setLocationToHK()">
                    <input type="checkbox" name="HK_Stock" id="HK_Stock" x-model="search_conditions.location['1Hong Kong'].clicked">
                    <label for="HK_Stock" class="font-bold">
                        {{__('diamondSearch.Only On Stock')}}
                    </label>
                </div>
            </div>
        </div>
        @include('frontend.diamond.search')
    </div>   

    @include('frontend.diamond.tag')
    @include('frontend.diamond.result')

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
            if (localStorage.getItem('clickedRows')) {
                this.clickedRows = JSON.parse(decodeURIComponent(localStorage.getItem('clickedRows')))
            }

          },
          mobileUpdateInputs(){
            this.updateInput('priceMin','mininputjs','price')
            this.updateInput('priceMax','maxinputjs','price')
            this.updateInput('weightMin','mininputjs','weight')
            this.updateInput('weightMax','maxinputjs','weight')
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

          //Results
          diamonds:@entangle('diamonds'), 
          clickedRows:[],
          sendCookies(){
              localStorage.setItem('clickedRows', encodeURIComponent(JSON.stringify(this.clickedRows)))
          },
          goto(id,i){
            row = this.diamonds.data[i].id
            this.clickedRows.push(row)
            window.open('/' + '{{app()->getLocale()}}' + '/gia-loose-diamonds/' + row , '')
            this.sendCookies()
          },
          //fancy Color
          fancy_color: @entangle('fancy_color'),
          //advance
          showAdvance: @entangle('showAdvance'),
          advance_search_conditions: @entangle('advance_search_conditions'), 



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

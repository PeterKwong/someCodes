<div>   

<div id="diamondHeight">

<!--     @include('layouts.components.loading')
 -->   
  <div class="section-3 hidden sm:block">

    @include('diamond.searchDesktopLW')


  </div>

  <div class="sm:hidden">

     @include('diamond.searchMobileLW')
   

  </div>



  <div class="flex justify-center text-center items-center border border-gray-400 p-2 pt-4 m-4" wire:init="loadDiamonds">

    <div class="flex-1">
      <center>

      @if(config('global.locale.' . app()->getLocale())  != '2')
        <a href="{{ '/links/whatsapp/852' . config( 'global.company.staffs.0.number' ) }}" >
            <p>{{trans('diamondSearch.If you could not find diamonds as your inquiry')}} , <img class="h-4 " src="/images/front-end/diamond/search/whatsapp.png" alt="">    {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}</p>
        </a>
      @endif

      @if(config('global.locale.' . app()->getLocale())  == '2')

      <p >{{trans('diamondSearch.If you could not find diamonds as your inquiry')}} ,   {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}             
          <img width="100" src="/images/front-end/aboutUs/wechat.jpg">
      </p>

      @endif

      </center>
    </div>
  </div>

  <div class="flex justify-between p-4">
    <div class="">
      <a class="text-blue-600"><strong>{{trans('diamondSearch.Total')}}: </strong>
              {{isset($diamonds['total'])?$diamonds['total']:''}} {{trans('diamondSearch.diamond')}}
          </a>
    </div>

    <div x-data="{ search_conditions: @entangle('search_conditions')}">
      <div x-on:click="search_conditions.location['1Hong Kong'].clicked = ! search_conditions.location['1Hong Kong'].clicked" >
        <button wire:click="setLocationToHK" :class=" `btn btn-outline ${search_conditions.location['1Hong Kong'].clicked?'btn-primary':''}` " 
        type="button"  >{{__('diamondSearch.Only On Stock')}}
        </button> 
        <button class="btn btn-primary" wire:click="resetAll">
            {{__('diamondSearch.reset')}} <i class="fas fa-undo"></i>
        </button>
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


  <div class="overflow-x-auto {{ $showInGrid ? 'sm:hidden' : 'hidden sm:block' }}">

    @include('diamond.resultDesktop')
         
  </div>




  <div class="{{ $showInGrid ? 'hidden sm:block' : 'sm:hidden'}}">

    @include('diamond.resultMobile')

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

    }
  }
</script>

<script>
  function advanceSearch(){

    return {
        showAdvance: @entangle('showAdvance'),
        advance_search_conditions: @entangle('advance_search_conditions'), 
        addAdvanceSearch(column){
            this.advance_search_conditions[column].clicked = !this.advance_search_conditions[column].clicked
        }

    }
  }
</script>
<!-- <script>

    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (message, component) => {

          var w = '' 
          var i = 0 
          var total = parseInt(document.getElementById('diamondsTotal').className);

          for (var h = total-1; h >= 0; h--) {
            var maxW = 0
            console.log(h)

            for (var i = 21 ; i >= 0; i--) {

                console.log(document.getElementById("row1-"+ i ).clientWidth)
                
                w = document.getElementById("row" + h + "-"+ i ).clientWidth

                if (w > maxW) {
                  console.log(maxW)
                  document.getElementById("row" + h + "-"+ i).style.width = w + 'px'; 
                }

                i += 1
            };

          };


        })
    });


</script> -->

<style type="text/css">
  .css-table{
    display: table;
  }
  .css-table .thead{
    display:table-header-group;
  }
  .css-table .tbody{
    display:table-row-group;
  }
  .css-table .tr{
    display:table-row;
  }
  .css-table .th, .css-table .td{
    display:table-cell;
  }
  .table-outter { 
    overflow-x: scroll; 
  }

</style>


<script>


window.addEventListener('new-tab', event => {
    window.open(event.detail.link , '');
})


  document.addEventListener("DOMContentLoaded", () => {
      Livewire.hook('message.processed', (message, component) => {

      window.addEventListener("scroll", function(event) {

          if (window.mutualVar.screen.y == 0) {
            window.mutualVar.screen.y = document.getElementById('diamondHeight').clientHeight * 0.98
          }

          var top = this.scrollY,
          y = window.mutualVar.screen.y,
          loading = document.getElementById('loading').className,
          height = document.getElementById('diamondHeight').clientHeight * 0.98;


          if (top > y ) {
          console.log(height)

            if (!loading) {
              window.mutualVar.screen.y = height;
              console.log(height)
              console.log(window.mutualVar.screen.y)
              console.log(top)
              Livewire.emit('addPage')
            } 


          }
        
      }, false);


      })
  });







</script>

</div>

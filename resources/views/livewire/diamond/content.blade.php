<div>   

<div id="diamondHeight">

    @include('layouts.components.loading')
   
  <div class="section-3 hidden sm:block">

    @include('diamond.searchDesktop')


  </div>


  <div class="sm:hidden">

     @include('diamond.searchMobile')
   

  </div>




  <div class="flex justify-center text-center items-center border border-gray-400 p-2 pt-4 m-4">
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
              {{$diamonds['total']}} {{trans('diamondSearch.diamond')}}
          </a>
    </div>

    <div class="">
      <button wire:click="setLocationToHK" class="btn btn-outline {{ count($fetchData['location']) == 1 ? 'btn-primary' : ''}}" 
      type="button"  >{{__('diamondSearch.Only On Stock')}}
      </button> 
      <button class="btn btn-primary" wire:click="resetAll">
          {{__('diamondSearch.reset')}} <i class="fas fa-undo"></i>
      </button>
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




  <div class="  {{ $showInGrid ? 'hidden sm:block' : 'sm:hidden'}}">

    @include('diamond.resultMobile')

  </div>

</div>


  <div class="flex justify-center">
      <a class="border border-gray-400 px-4 "  href="{{ $diamonds['first_page_url'] }}" >{{trans('pagination.First Page')}} 1</a>
      <a class="border border-gray-400 px-4 "  href="{{ $diamonds['prev_page_url'] }}" >{{trans('diamondSearch.Previous')}}</a>
      <a class="border border-gray-400 px-4 text-white bg-blue-600" >{{$diamonds['current_page']}}</a>
      <a class="border border-gray-400 px-4 "  href="{{ $diamonds['next_page_url'] }}" >{{trans('diamondSearch.Next')}}</a>
      <a class="border border-gray-400 px-4 " href="{{ $diamonds['last_page_url'] }}" >{{trans('pagination.Last Page')}} {{ $diamonds['last_page'] }}</a>

  </div>

<div id="loading" wire:loading.class="loading">
</div>

<script>



window.addEventListener('new-tab', event => {
    window.open(event.detail.link, '_blank');
})


window.addEventListener("scroll", function(event) {

    if (window.mutualVar.screen.y == 0) {
      window.mutualVar.screen.y = document.getElementById('diamondHeight').clientHeight * 0.98
    }

    var top = this.scrollY,
    y = window.mutualVar.screen.y,
    loading = document.getElementById('loading').className,
    height = document.getElementById('diamondHeight').clientHeight * 0.98;


    if (top > y ) {

      window.mutualVar.screen.y = height;
      if (!loading) {
        Livewire.emit('addPage')
      } 


    }
  
}, false);




</script>

</div>

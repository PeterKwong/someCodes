<div class="grid grid-cols-12 p-2 pt-4">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Price')}}</p>        
      </div>
      <div class="col-span-5 mx-8">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" wire:model.debounce.800ms="fetchData.price.0" placeholder="HKD$">
      </div>
      <div class="col-span-5">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" wire:model.debounce.800ms="fetchData.price.1" placeholder="HKD$">
      </div>
    </div>

  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Weight')}}</p>
      </div>         
      <div class="col-span-5 mx-8">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" wire:model.debounce.800ms="fetchData.weight.0" placeholder="ct">
      </div>
      <div class="col-span-5">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" wire:model.debounce.800ms="fetchData.weight.1" placeholder="ct">
      </div>
    </div>
  </div>
</div>


<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Shape')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap">

          @foreach($search_conditions['shapes'] as $shape)
          <div class="p-2" wire:click="toggleValue('shape', '{{$shape}}' )">
            <img class="h-8" src=" {{'/images/front-end/diamond_shapes/' . $shape . '.png' }}" alt="">
            <div class="border-2 mt-2
                        {{ in_array($shape,$fetchData['shape'])?
                          'border-yellow-600':'border-gray-600'}}"  >
              </div>

          </div>
          @endforeach
 
        </div>
      </div>
    </div>
  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap">
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-30-0-49-carat-weight">0.3-0.49</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-50-0-79-carat-weight">0.5-0.79</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-80-0-99-carat-weight">0.8-0.99</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-00-1-19-carat-weight">1.0-1.19</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-20-1-49-carat-weight">1.2-1.49</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-50-1-99-carat-weight">1.5-1.99</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/2-00-2-99-carat-weight">2.0-2.99</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/3-00-up-carat-weight">
            3.0 up</a>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Color')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">

          @foreach($search_conditions['colors'] as $color)
          <div class="p-2" wire:click="toggleValue('color', '{{$color}}' )">
                {{$color}}
              <div class="border-2 mt-2 px-4
                        {{ in_array($color,$fetchData['color'])?
                          'border-yellow-600':'border-gray-600'}}"  >
              </div>

          </div>
          @endforeach


        </div>
      </div>
    </div>
  </div>

  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Cut')}}</p>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">

          @foreach($search_conditions['cuts'] as $cut)
          <div class="p-2" wire:click="toggleValue('cut', '{{$cut}}' )">
                {{$cut}}
              <div class="border-2 mt-2 px-12
                        {{ in_array($cut,$fetchData['cut'])?
                          'border-yellow-600':'border-gray-600'}}"  >
              </div>

          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>



<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Clarity')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">
          
          @foreach($search_conditions['clarities'] as $clarity)
          <div class="p-2" wire:click="toggleValue('clarity', '{{$clarity}}' )">
                {{$clarity}}
              <div class="border-2 mt-2 px-4
                        {{ in_array($clarity,$fetchData['clarity'])?
                          'border-yellow-600':'border-gray-600'}}"  >
              </div>

          </div>
          @endforeach


        </div>
      </div>
    </div>
  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Polish')}}</p>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">

          @foreach($search_conditions['polishes'] as $polish)
          <div class="p-2" wire:click="toggleValue('polish', '{{$polish}}' )">
                {{$polish}}
              <div class="border-2 mt-2 px-12
                        {{ in_array($polish,$fetchData['polish'])?
                          'border-yellow-600':'border-gray-600'}}"  >
              </div>

          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>



<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Fluorescence')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">
          
          @foreach($search_conditions['fluorescences'] as $fluorescence)
          <div class="p-2" wire:click="toggleValue('fluorescence', '{{$fluorescence}}' )">
                {{$fluorescence}}
              <div class="border-2 mt-2 px-12
                        {{ in_array($fluorescence,$fetchData['fluorescence'])?
                          'border-yellow-600':'border-gray-600'}}"  >
              </div>

          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Symmetry')}}</p>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">

          @foreach($search_conditions['symmetries'] as $symmetry)
          <div class="p-2" wire:click="toggleValue('symmetry', '{{$symmetry}}' )">
                {{$symmetry}}
              <div class="border-2 mt-2 px-12
                        {{ in_array($symmetry,$fetchData['symmetry'])?
                          'border-yellow-600':'border-gray-600'}}"  >
              </div>

          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>


<ul class="flex border-b justify-center mt-2">
   <li class="-mb-px mr-1">
    <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700 font-semibold"  wire:click="toggleShowAdvance" >{{ __('diamondSearch.More Advance') }}</a>
  </li>
</ul>

@if($showAdvance)

  <div class="grid grid-cols-12 text-center p-2">

    @foreach($fetchAdvance as $key => $value)

    <div class="col-span-6 border border-gray-400 mx-1">
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2" wire:click="setAdvanceToZero( '{{$key}}' )">
          <p class="{{ $fetchData[$key][1] != 0 ?'btn btn-yellow ':'btn' }}">{{trans('diamondSearch.' . $value)}}</p>
        </div>   
        <div class="col-span-10 mx-8">
          
          <div class="grid grid-cols-12 items-center"  wire:click="addAdvanceSearch( '{{$key}}' )">
            <div class="col-span-6">
              {{trans('diamondSearch.Min')}}
              <input class="input" type="text" wire:model.debounce.800ms="{{ 'fetchData.' . $key . '.0' }}" placeholder=""> 
            </div>
            <div class="col-span-6">
              {{trans('diamondSearch.Max')}}
              <input class="input" type="text" wire:model.debounce.800ms="{{ 'fetchData.' . $key . '.1' }}" placeholder="">
            </div>
          </div>

        </div>
      </div>
    </div>

    @endforeach

  </div>


@endif




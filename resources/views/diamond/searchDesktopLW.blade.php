
<div class="grid grid-cols-12 p-2 pt-4">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Price')}}</p>        
      </div>
      <div class="col-span-5 mx-8">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" wire:model.debounce.500ms="fetchData.price.0" placeholder="HKD$">
      </div>
      <div class="col-span-5">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" wire:model.debounce.500ms="fetchData.price.1" placeholder="HKD$">
      </div>
    </div>

  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Weight')}}</p>
      </div>         
      <div class="col-span-5 mx-8">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" wire:model.debounce.500ms="fetchData.weight.0" placeholder="ct">
      </div>
      <div class="col-span-5">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" wire:model.debounce.500ms="fetchData.weight.1" placeholder="ct">
      </div>
    </div>
  </div>
</div>


<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div x-data="{ search_conditions: @entangle('search_conditions')}">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Shape')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap">


          @foreach($search_conditions['shape'] as  $key => $shape)
          <div x-on:click="search_conditions.shape['{{$key}}'].clicked = ! search_conditions.shape['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('shape', '{{$key}}' )">
              <img class="h-8" src=" {{'/images/front-end/diamond_shapes/' . $key . '.png' }}" alt="">
              <div :class=" `border-2 mt-2 ${search_conditions.shape['{{$key}}'].clicked?
                              'border-yellow-600':'border-gray-600'}` "   >
                </div>

            </div>
          </div>
          @endforeach
          

        </div>
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
    <div x-data="{ search_conditions: @entangle('search_conditions')}">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Color')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">

          @foreach($search_conditions['color'] as $key => $color)

          <div x-on:click="search_conditions.color['{{$key}}'].clicked = ! search_conditions.color['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('color', '{{$key}}' )">
                  {{$key}}
                <div :class=" `border-2 mt-2 px-4 ${search_conditions.color['{{$key}}'].clicked?
                                'border-yellow-600':'border-gray-600'}` " >
                </div>

            </div>
          </div>
          @endforeach


        </div>
      </div>
    </div>
    </div>
  </div>

  <div class="col-span-6">
    <div x-data="{ search_conditions: @entangle('search_conditions')}">
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2 mx-8 font-light text-lg">
          <p>{{trans('diamondSearch.Cut')}}</p>
        </div>         
        <div class="col-span-10 mx-8">
          <div class="flex justify-between text-center flex-wrap">

            @foreach($search_conditions['cut'] as $key => $cut)


            <div x-on:click="search_conditions.cut['{{$key}}'].clicked = ! search_conditions.cut['{{$key}}'].clicked" >
              <div class="p-2" wire:click="toggleValue('cut', '{{$key}}' )">
                    {{$key}}
                  <div :class=" `border-2 mt-2 px-12 ${search_conditions.cut['{{$key}}'].clicked?
                              'border-yellow-600':'border-gray-600'}` "  >
                  </div>
              </div>
            </div>
            
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div x-data="{ search_conditions: @entangle('search_conditions')}">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Clarity')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">
          
          @foreach($search_conditions['clarity'] as $key => $clarity)
          <div x-on:click="search_conditions.clarity['{{$key}}'].clicked = ! search_conditions.clarity['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('clarity', '{{$key}}' )">
                  {{$key}}
                <div :class=" `border-2 mt-2 px-4 ${search_conditions.clarity['{{$key}}'].clicked?
                              'border-yellow-600':'border-gray-600'}` "  >
                </div>

            </div>
          </div>
          @endforeach


        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="col-span-6">
    <div x-data="{ search_conditions: @entangle('search_conditions')}">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Polish')}}</p>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">

          @foreach($search_conditions['polish'] as $key => $polish)
          <div x-on:click="search_conditions.polish['{{$key}}'].clicked = ! search_conditions.polish['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('polish', '{{$key}}' )">
                  {{$key}}
                <div :class=" `border-2 mt-2 px-12 ${search_conditions.polish['{{$key}}'].clicked?
                              'border-yellow-600':'border-gray-600'}` " >
                </div>

            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
    </div>
  </div>
</div>



<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div x-data="{ search_conditions: @entangle('search_conditions')}">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Fluorescence')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">
          
          @foreach($search_conditions['fluorescence'] as $key => $fluorescence)
          <div x-on:click="search_conditions.fluorescence['{{$key}}'].clicked = ! search_conditions.fluorescence['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('fluorescence', '{{$key}}' )">
                  {{$key}}
                <div :class=" `border-2 mt-2 px-12 ${search_conditions.fluorescence['{{$key}}'].clicked?
                              'border-yellow-600':'border-gray-600'}` " >
                </div>

            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="col-span-6">
    <div x-data="{ search_conditions: @entangle('search_conditions')}">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Symmetry')}}</p>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">

          @foreach($search_conditions['symmetry'] as $key => $symmetry)
          <div x-on:click="search_conditions.symmetry['{{$key}}'].clicked = ! search_conditions.symmetry['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('symmetry', '{{$key}}' )">
                  {{$key}}
                <div :class=" `border-2 mt-2 px-12 ${search_conditions.symmetry['{{$key}}'].clicked?
                              'border-yellow-600':'border-gray-600'}` " >
                </div>

            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
    </div>
  </div>
</div>


<span x-data="{ showAdvance: @entangle('showAdvance')}">
  <ul class="flex border-b justify-center mt-2">
    <div x-on:click="showAdvance = ! showAdvance" >
       <li class="-mb-px mr-1">
        <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700 font-semibold"  wire:click="toggleShowAdvance" >{{ __('diamondSearch.More Advance') }}</a>
      </li>
    </div>
  </ul>

    <div :class=" `grid grid-cols-12 text-center p-2 ${showAdvance?'':'hidden'}` ">

      @foreach($fetchAdvance as $key => $value)

      <div class="col-span-6 border border-gray-400 mx-1" >
        <div class="grid grid-cols-12 items-center">
          <div class="col-span-2" wire:click="setAdvanceToZero( '{{$key}}' )">
            <p class="{{ $fetchData[$key][1] != 0 ?'btn btn-yellow ':'btn' }}">{{trans('diamondSearch.' . $value)}}</p>
          </div>   
          <div class="col-span-10 mx-8">
            
            <div class="grid grid-cols-12 items-center"  wire:click="addAdvanceSearch( '{{$key}}' )">
              <div class="col-span-6">
                {{trans('diamondSearch.Min')}}
                <input class="input" type="text" wire:model.debounce.500ms="{{ 'fetchData.' . $key . '.0' }}" placeholder=""> 
              </div>
              <div class="col-span-6">
                {{trans('diamondSearch.Max')}}
                <input class="input" type="text" wire:model.debounce.500ms="{{ 'fetchData.' . $key . '.1' }}" placeholder="">
              </div>
            </div>

          </div>
        </div>
      </div>

      @endforeach

    </div>

</span>



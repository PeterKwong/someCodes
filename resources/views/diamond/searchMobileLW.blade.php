
<div class="text-center text-gray-700">
        <div class="border border-gray-300 p-2 mx-1">
           <div  class="hover:text-blue-600 w-full" wire:click="selectDisplayColumn('shape')">
              <a class="is-primary">{{trans('diamondSearch.Shape')}}</a>

 
              <a  class="hover:text-blue-600" wire:click="selectDisplayColumn('shape')">
                  @foreach($fetchData['shape'] as $shape)

                    <button  class="btn btn-outline"  wire:click="toggleValue('shape', '{{$shape}}' )">
                            <img src=" {{'/images/front-end/diamond_shapes/' . $shape . '.png' }} " class="w-6">
                    </button>

                  @endforeach

              </a>
              <i class="fas fa-chevron-down"></i>
          </div>

          @if($displayColumn == 'shape')
            <a >
              @foreach($search_conditions['shapes'] as $shape)              
                <button  class="btn btn-outline {{ in_array($shape,$fetchData['shape'])?
                          'active':''}}"  wire:click="toggleValue('shape', '{{$shape}}' )">
                  <img src="{{'/images/front-end/diamond_shapes/' . $shape . '.png' }}" class="w-6">
                </button>
              @endforeach
            </a>
          @endif
        </div>

        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" wire:click="selectDisplayColumn('price')">
              <a class="is-primary">{{trans('diamondSearch.Price')}} </a>
               <button class="btn btn-outline"> HK$ {{$fetchData['price'][0]}} - {{$fetchData['price'][1]}} </button> 
              <i class="fas fa-chevron-down"></i> 
          </div>

          @if($displayColumn == 'price')
            <div class="level" >
                <input class="input" type="text" wire:model.debounce.800ms="fetchData.price.0">

                <input class="input" type="text" wire:model.debounce.800ms="fetchData.price.1">
            </div> 
          @endif
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" wire:click="selectDisplayColumn('weight')">
              <a class="is-primary">{{trans('diamondSearch.Weight')}}</a>
               <button class="btn btn-outline"> {{$fetchData['weight'][0]}} - {{$fetchData['weight'][1]}} ct</button>
              <i class="fas fa-chevron-down"></i>
          </div>

          @if($displayColumn == 'weight')
            <div class="level"  v-if="displayColumn == 'weight' ">
                <input class="input" type="text" wire:model.debounce.800ms="fetchData.weight.0">

                <input class="input" type="text" wire:model.debounce.800ms="fetchData.weight.1">       
            </div>
          @endif
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" wire:click="selectDisplayColumn('color')">
            <a class="is-primary">{{trans('diamondSearch.Color')}}</a>
              <a  class="hover:text-blue-600" wire:click="selectDisplayColumn('color')">
                @foreach($fetchData['color'] as $color)
                   <button class="btn btn-outline" type="button" wire:click="toggleValue('color', '{{$color}}' )" > 
                      {{$color}}
                   </button>
                @endforeach
             </a>
            <i class="fas fa-chevron-down"></i>
          </div>

          @if($displayColumn == 'color')
            <div class="level">
                @foreach($search_conditions['colors'] as $color)              
                    <button  class="btn btn-outline {{ in_array($color,$fetchData['color'])?
                            'active':''}}" type="button" wire:click="toggleValue('color', '{{$color}}' )"> 
                        {{$color}}
                    </button>
                @endforeach
            </div>
          @endif
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" wire:click="selectDisplayColumn('clarity')">
            <a class="is-primary">{{trans('diamondSearch.Clarity')}}</a>
              @foreach($fetchData['clarity'] as $clarity)
                 <button class="btn btn-outline" type="button" wire:click="toggleValue('clarity', '{{$clarity}}' )" > 
                  {{$clarity}}
                </button>
              @endforeach
              <i class="fas fa-chevron-down"></i>
          </div>

          @if($displayColumn == 'clarity')
            <div class="level" >
              @foreach($search_conditions['clarities'] as $clarity)              
                <button class="btn btn-outline {{ in_array($clarity,$fetchData['clarity'])?
                              'active':''}} " type="button" wire:click="toggleValue('clarity', '{{$clarity}}' )" > 
                    {{$clarity}}
                </button>
              @endforeach
            </div>
          @endif
        </div>

        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" wire:click="selectDisplayColumn('cut')">
              <a class="is-primary">{{trans('diamondSearch.Cut')}}</a>
              @foreach($fetchData['cut'] as $cut)
                 <button class="btn btn-outline" type="button" wire:click="toggleValue('cut', '{{$cut}}' )" > 
                  {{$cut}}
                </button>
              @endforeach
              <i class="fas fa-chevron-down"></i>
          </div>

          @if($displayColumn == 'cut')
            <div class="level" >
              @foreach($search_conditions['cuts'] as $cut)              

                <button class="btn btn-outline {{ in_array($cut,$fetchData['cut'])?
                                'active':''}} " type="button"  wire:click="toggleValue('cut', '{{$cut}}' )" > 
                  {{$cut}}
                </button>
              @endforeach
            </div>
          @endif
        </div>

        <div class="border border-gray-300 p-2 mx-1">
           <div class="hover:text-blue-600" wire:click="selectDisplayColumn('polish')">
              <a class="is-primary">{{trans('diamondSearch.Polish')}}</a>
              @foreach($fetchData['polish'] as $polish)
                 <button class="btn btn-outline" type="button" wire:click="toggleValue('polish', '{{$polish}}' )"  > 
                  {{$polish}}
                </button>
              @endforeach
              <i class="fas fa-chevron-down"></i>
          </div>

          @if($displayColumn == 'polish')
            <div class="level" >
                @foreach($search_conditions['polishes'] as $polish)              
                  <button class="btn btn-outline {{ in_array($polish,$fetchData['polish'])?
                                'active':''}} " type="button" wire:click="toggleValue('polish', '{{$polish}}' )"  > 
                    {{$polish}}
                  </button>
                @endforeach
            </div>
          @endif  
        </div>

        <div class="border border-gray-300 p-2 mx-1">
           <div class="hover:text-blue-600" wire:click="selectDisplayColumn('symmetry')">
              <a class="is-primary">{{trans('diamondSearch.Symmetry')}}</a>
              @foreach($fetchData['symmetry'] as $symmetry)
                 <button class="btn btn-outline" type="button"  wire:click="toggleValue('symmetry', '{{$symmetry}}' )"> 
                {{$symmetry}}
                </button>
              @endforeach

              <i class="fas fa-chevron-down"></i>
          </div>

          @if($displayColumn == 'symmetry')
            <div class="level" >
                @foreach($search_conditions['symmetries'] as $symmetry)              
                  <button class="btn btn-outline {{ in_array($symmetry,$fetchData['symmetry'])?
                                'active':''}} "  type="button" wire:click="toggleValue('symmetry', '{{$symmetry}}' )" > 
                  {{$symmetry}}
                  </button>
                @endforeach
            </div>   
          @endif
        </div>

        <div class="border border-gray-300 p-2 mx-1">
           <div class="hover:text-blue-600" wire:click="selectDisplayColumn('fluorescence')">
              <a class="is-primary">{{trans('diamondSearch.Fluorescence')}}</a>
              @foreach($fetchData['fluorescence'] as $fluorescence)
                 <button class="btn btn-outline" type="button"  wire:click="toggleValue('fluorescence', '{{$fluorescence}}' )"> 
                {{trans('diamondSearch.' . $fluorescence)}}
                </button>
              @endforeach

              <i class="fas fa-chevron-down"></i>
          </div>

          @if($displayColumn == 'fluorescence')
            <div class="level" >
                @foreach($search_conditions['fluorescences'] as $fluorescence)              
                  <button class="btn btn-outline {{ in_array($fluorescence,$fetchData['fluorescence'])?
                                'active':''}} "  type="button" wire:click="toggleValue('fluorescence', '{{$fluorescence}}' )" > 
                  {{trans('diamondSearch.' . $fluorescence)}}
                  </button>
                @endforeach
            </div>   
          @endif
        </div>


      <ul class="flex border-b justify-center mt-2">
         <li class="-mb-px mr-1">
          <a class="bg-white hover:text-blue-600 inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700 font-semibold"  wire:click="toggleShowAdvance" >{{ __('diamondSearch.More Advance') }}</a>
        </li>
      </ul>


      @if($showAdvance)
      <div >
        @foreach($fetchAdvance as $key => $value)

        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" wire:click="selectDisplayColumn('{{$key}}')">
              <p  class="btn " class=" {{ $fetchData[$key][1] != 0 ?'btn btn-yellow ':'btn' }}" >{{trans('diamondSearch.' . $value)}}</p>
              @if($fetchData[$key][1] != 0 )
               <button wire:click="setAdvanceToZero( '{{$key}}' )" class="btn btn-outline"> {{ $fetchData[$key][0] }} - {{ $fetchData[$key][1] }}</button>
               @endif
              <i class="fas fa-chevron-down"></i>
          </div>

          @if($displayColumn == $key)
          <div class="level" wire:click="addAdvanceSearch( '{{$key}}' )">
              <input class="input" type="text" wire:model.debounce.800ms="{{ 'fetchData.' . $key . '.0' }}" placeholder="{{trans('diamondSearch.Min')}}">

              <input class="input" type="text" wire:model.debounce.800ms="{{ 'fetchData.' . $key . '.1' }}" placeholder="{{trans('diamondSearch.Max')}}">       
          </div> 
          @endif
        </div>

        @endforeach


      </div>  
      @endif


</div>  








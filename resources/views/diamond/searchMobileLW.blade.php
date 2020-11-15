
<div class="text-center text-gray-700" >
  <span x-data="mobileSearch()">
        <div class="border border-gray-300 p-2 mx-1">
           <div  class="hover:text-blue-600 w-full" x-on:click="selectDisplayColumn('shape')">
              <a class="is-primary">{{trans('diamondSearch.Shape')}}</a>
                <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('shape')">
                    <template x-for="(iItem, iIndex) in Object.entries(search_conditions.shape)" >
                      <span x-on:click="iItem[1].clicked = ! iItem[1].clicked" >
                        <button :class=" `btn btn-outline ${iItem[1].clicked?
                              '':'hidden'}`"   x-on:click="@this.toggleValue('shape', iItem[0])" >
                                <img :src=" `/images/front-end/diamond_shapes/${iItem[0]}.png` " class="w-6">
                        </button>
                      </span>
                    </template>
                </a>
              <i class="fas fa-chevron-down"></i>
          </div>

            <a x-show="displayColumn == 'shape' ">

                @foreach($search_conditions['shape'] as  $key => $shape)
                <span x-on:click="search_conditions.shape['{{$key}}'].clicked = ! search_conditions.shape['{{$key}}'].clicked" >
                  <button :class=" `btn btn-outline ${search_conditions.shape['{{$key}}'].clicked?
                                'bg-gray-300':''}` "  wire:click="toggleValue('shape', '{{$key}}' )">
                    <img src="{{'/images/front-end/diamond_shapes/' . $key . '.png' }}" class="w-6">
                  </button>
                </span>
                @endforeach

            </a>
        </div>

        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" x-on:click="selectDisplayColumn('price')">
              <a class="is-primary">{{trans('diamondSearch.Price')}} </a>
               <button class="btn btn-outline"> HK$ {{$fetchData['price'][0]}} - {{$fetchData['price'][1]}} </button> 
              <i class="fas fa-chevron-down"></i> 
          </div>

          <a x-show="displayColumn == 'price' ">
            <div class="level" >
                <input class="input" type="text" wire:model.debounce.800ms="fetchData.price.0">

                <input class="input" type="text" wire:model.debounce.800ms="fetchData.price.1">
            </div> 
          </a>
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" x-on:click="selectDisplayColumn('weight')">
              <a class="is-primary">{{trans('diamondSearch.Weight')}}</a>
               <button class="btn btn-outline"> {{$fetchData['weight'][0]}} - {{$fetchData['weight'][1]}} ct</button>
              <i class="fas fa-chevron-down"></i>
          </div>

          <a x-show="displayColumn == 'weight' ">
            <div class="level"  v-if="displayColumn == 'weight' ">
                <input class="input" type="text" wire:model.debounce.800ms="fetchData.weight.0">

                <input class="input" type="text" wire:model.debounce.800ms="fetchData.weight.1">       
            </div>
          </a>
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" x-on:click="selectDisplayColumn('color')">
            <a class="is-primary">{{trans('diamondSearch.Color')}}</a>
              <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('color')">
                <template x-for="(iItem, iIndex) in Object.entries(search_conditions.color)" >
                  <span x-on:click="iItem[1].clicked = ! iItem[1].clicked" >
                    <button :class=" `btn btn-outline ${iItem[1].clicked?
                          '':'hidden'}`"   x-on:click="@this.toggleValue('color', iItem[0])" type="button" x-text="iItem[0]">
                    </button>
                  </span>
                </template>
             </a>
            <i class="fas fa-chevron-down"></i>
          </div>

          <a x-show="displayColumn == 'color' ">
            <div class="level">
                @foreach($search_conditions['color'] as $key => $color)
                  <span x-on:click="search_conditions.color['{{$key}}'].clicked = ! search_conditions.color['{{$key}}'].clicked" >        
                    <button  :class=" `btn btn-outline ${search_conditions.color['{{$key}}'].clicked?
                                'bg-gray-300':''}` " type="button" wire:click="toggleValue('color', '{{$key}}' )"> 
                        {{$key}}
                    </button>
                  </span>
                @endforeach
            </div>
          </a>
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" x-on:click="selectDisplayColumn('clarity')">
            <a class="is-primary">{{trans('diamondSearch.Clarity')}}</a>
             <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('clarity')">
                <template x-for="(iItem, iIndex) in Object.entries(search_conditions.clarity)" >
                  <span x-on:click="iItem[1].clicked = ! iItem[1].clicked" >
                    <button :class=" `btn btn-outline ${iItem[1].clicked?
                          '':'hidden'}`"   x-on:click="@this.toggleValue('clarity', iItem[0])" type="button" x-text="iItem[0]">
                    </button>
                  </span>
                </template>
             </a>
              <i class="fas fa-chevron-down"></i>
          </div>

          <a x-show="displayColumn == 'clarity' ">
            <div class="level" >
              @foreach($search_conditions['clarity'] as $key => $key)
              <span x-on:click="search_conditions.clarity['{{$key}}'].clicked = ! search_conditions.clarity['{{$key}}'].clicked" >                 
                <button :class=" `btn btn-outline ${search_conditions.clarity['{{$key}}'].clicked?
                                'bg-gray-300':''}` " type="button" wire:click="toggleValue('clarity', '{{$key}}' )" > 
                    {{$key}}
                </button>
              </span>
              @endforeach
            </div>
          </a>
        </div>

        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" x-on:click="selectDisplayColumn('cut')">
              <a class="is-primary">{{trans('diamondSearch.Cut')}}</a>
               <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('cut')">
                  <template x-for="(iItem, iIndex) in Object.entries(search_conditions.cut)" >
                    <span x-on:click="iItem[1].clicked = ! iItem[1].clicked" >
                      <button :class=" `btn btn-outline ${iItem[1].clicked?
                            '':'hidden'}`"   x-on:click="@this.toggleValue('cut', iItem[0])" type="button" x-text="iItem[0]">
                      </button>
                    </span>
                  </template>
               </a>
              <i class="fas fa-chevron-down"></i>
          </div>

          <a x-show="displayColumn == 'cut' ">
            <div class="level" >
              @foreach($search_conditions['cut'] as $key => $cut)              
              <span x-on:click="search_conditions.cut['{{$key}}'].clicked = ! search_conditions.cut['{{$key}}'].clicked" >    
                <button :class=" `btn btn-outline ${search_conditions.cut['{{$key}}'].clicked?
                                'bg-gray-300':''}` " type="button"  wire:click="toggleValue('cut', '{{$key}}' )" > 
                  {{$key}}
                </button>
              </span>
              @endforeach
            </div>
          </a>
        </div>

        <div class="border border-gray-300 p-2 mx-1">
           <div class="hover:text-blue-600" x-on:click="selectDisplayColumn('polish')">
              <a class="is-primary">{{trans('diamondSearch.Polish')}}</a>
               <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('polish')">
                  <template x-for="(iItem, iIndex) in Object.entries(search_conditions.polish)" >
                    <span x-on:click="iItem[1].clicked = ! iItem[1].clicked" >
                      <button :class=" `btn btn-outline ${iItem[1].clicked?
                            '':'hidden'}`"   x-on:click="@this.toggleValue('polish', iItem[0])" type="button" x-text="iItem[0]">
                      </button>
                    </span>
                  </template>
               </a>
              <i class="fas fa-chevron-down"></i>
          </div>

          <a x-show="displayColumn == 'polish' ">
            <div class="level" >
                @foreach($search_conditions['polish'] as $key => $key)
                <span x-on:click="search_conditions.polish['{{$key}}'].clicked = ! search_conditions.polish['{{$key}}'].clicked" >    
                  <button :class=" `btn btn-outline ${search_conditions.polish['{{$key}}'].clicked?
                                'bg-gray-300':''}` " type="button" wire:click="toggleValue('polish', '{{$key}}' )"  > 
                    {{$key}}
                  </button>
                </span>
                @endforeach
            </div>
          </a>  
        </div>

        <div class="border border-gray-300 p-2 mx-1">
           <div class="hover:text-blue-600" x-on:click="selectDisplayColumn('symmetry')">
              <a class="is-primary">{{trans('diamondSearch.Symmetry')}}</a>
                <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('symmetry')">
                  <template x-for="(iItem, iIndex) in Object.entries(search_conditions.symmetry)" >
                    <span x-on:click="iItem[1].clicked = ! iItem[1].clicked" >
                      <button :class=" `btn btn-outline ${iItem[1].clicked?
                            '':'hidden'}`"   x-on:click="@this.toggleValue('symmetry', iItem[0])" type="button" x-text="iItem[0]">
                      </button>
                    </span>
                  </template>
               </a>
              <i class="fas fa-chevron-down"></i>
          </div>

          <a x-show="displayColumn == 'symmetry' ">
            <div class="level" >
                @foreach($search_conditions['symmetry'] as $key => $key)
                <span x-on:click="search_conditions.symmetry['{{$key}}'].clicked = ! search_conditions.symmetry['{{$key}}'].clicked" >
                  <button :class=" `btn btn-outline ${search_conditions.symmetry['{{$key}}'].clicked?
                                'bg-gray-300':''}` "  type="button" wire:click="toggleValue('symmetry', '{{$key}}' )" > 
                  {{$key}}
                  </button>
                </span>
                @endforeach
            </div>   
          </a>
        </div>

        <div class="border border-gray-300 p-2 mx-1">
           <div class="hover:text-blue-600" x-on:click="selectDisplayColumn('fluorescence')">
              <a class="is-primary">{{trans('diamondSearch.Fluorescence')}}</a>
                <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('fluorescence')">
                  <template x-for="(iItem, iIndex) in Object.entries(search_conditions.fluorescence)" >
                    <span x-on:click="iItem[1].clicked = ! iItem[1].clicked" >
                      <button :class=" `btn btn-outline ${iItem[1].clicked?
                            '':'hidden'}`"   x-on:click="@this.toggleValue('fluorescence', iItem[0])" type="button" x-text="iItem[0]">
                      </button>
                    </span>
                  </template>
               </a>
              <i class="fas fa-chevron-down"></i>
          </div>

          <a x-show="displayColumn == 'fluorescence' ">
            <div class="level" >
                @foreach($search_conditions['fluorescence'] as $key => $key)
                <span x-on:click="search_conditions.fluorescence['{{$key}}'].clicked = ! search_conditions.fluorescence['{{$key}}'].clicked" >
                  <button :class=" `btn btn-outline ${search_conditions.fluorescence['{{$key}}'].clicked?
                                'bg-gray-300':''}` "  type="button" wire:click="toggleValue('fluorescence', '{{$key}}' )" > 
                  {{trans('diamondSearch.' . $key)}}
                  </button>
                </span>
                @endforeach
            </div>   
          </a>
        </div>


      <ul class="flex border-b justify-center mt-2">
         <li class="-mb-px mr-1" x-on:click="showAdvance = !showAdvance">
          <a class="bg-white hover:text-blue-600 inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700 font-semibold"  wire:click="toggleShowAdvance">{{ __('diamondSearch.More Advance') }}</a>
        </li>
      </ul>


      <div x-show="showAdvance">
        @foreach($fetchAdvance as $key => $value)

        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" x-on:click="selectDisplayColumn('{{$key}}')">
              <p>{{trans('diamondSearch.' . $value)}}</p>
              <span x-show="advance_search_conditions['{{$key}}'].clicked" 
                    x-on:click=" advance_search_conditions[['{{$key}}'][0]].clicked = false ">
                <button wire:click="setAdvanceToZero( '{{$key}}' )" :class=" `${advance_search_conditions['{{$key}}'].clicked?'btn btn-yellow':''}` "> {{ $fetchData[$key][0] }} - {{ $fetchData[$key][1] }}</button>
              </span>
              <i class="fas fa-chevron-down"></i>
          </div>

          <a x-show="displayColumn == '{{$key}}' " x-on:click=" advance_search_conditions[['{{$key}}'][0]].clicked = true  ">
          <div class="level" wire:click="addAdvanceSearch( '{{$key}}' )">
              <input class="input" type="text" wire:model.debounce.800ms="{{ 'fetchData.' . $key . '.0' }}" placeholder="{{trans('diamondSearch.Min')}}">

              <input class="input" type="text" wire:model.debounce.800ms="{{ 'fetchData.' . $key . '.1' }}" placeholder="{{trans('diamondSearch.Max')}}">       
          </div> 
          </a>
        </div>

        @endforeach


      </div>  


  </span>
</div>









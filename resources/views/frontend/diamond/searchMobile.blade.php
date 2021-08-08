
<div class="text-center text-gray-700" >
  <span x-data="mobileSearch()" x-init="init()">
        <div class="border border-gray-300 p-2 mx-1">
           <div  class="hover:text-blue-600 w-full flex justify-center" x-on:click="selectDisplayColumn('shape')">
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
              <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/shape' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a>
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
          <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('price')">
              <a class="is-primary">{{trans('diamondSearch.Price')}} </a>
               <button class="btn btn-outline"> HK$ {{$fetchData['price'][0]}} - {{$fetchData['price'][1]}} </button> 
              <i class="fas fa-chevron-down"></i> 
          </div>

          <span x-show="displayColumn == 'price' " class="flex flex-col">
            <a>
              <div class="level" >
                  <input class="input" type="text" 
                  @input="updateMinThumb"
                  @click.away="updateMininput"
                  x-model="mininputjs"
                  placeholder="HKD$"
                  >

                  <input class="input" type="text" 
                  @input="updateMaxThumb" 
                  @click.away="updateMaxinput"
                  x-model="maxinputjs" 
                  placeholder="HKD$"
                  >
              </div>
            </a>
<!--             <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full m-2">
                <input 
                    type="range"
                    step="100"
                    x-bind:min="min" x-bind:max="max"
                    @input="mintrigger"
                    @click="updateMininput"
                    x-model="minprice"
                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                >
                <input 
                    type="range" 
                    step="100"
                    x-bind:min="min" x-bind:max="max"
                    @input="maxtrigger"
                    @click="updateMaxinput"
                    x-model="maxprice"
                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                >
                <div class="relative z-10 h-2">
                    <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                    <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
                    <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 left-0 bg-white border border-brown transform rotate-45 -mt-1 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>
                    <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
                </div>
              </div> -->
          </span>
          
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('weight')">
              <a class="is-primary">{{trans('diamondSearch.Weight')}}</a>
               <button class="btn btn-outline"> {{$fetchData['weight'][0]}} - {{$fetchData['weight'][1]}} ct</button>
              <i class="fas fa-chevron-down"></i>
              <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/carat' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a>
          </div>

          <a x-show="displayColumn == 'weight' ">
            <div class="level"  v-if="displayColumn == 'weight' ">
                <input class="input" type="text" wire:model.debounce.800ms="fetchData.weight.0">

                <input class="input" type="text" wire:model.debounce.800ms="fetchData.weight.1">       
            </div>
          </a>
        </div>

        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('color')">
              <div class="font-light text-lg">
                <p class="flex justify-center ">
                  <span class="btn" :class=" `${search_conditions.color.Fancy.clicked?'text-blue-400 bg-white box':' btn-primary'}` "  x-on:click="search_conditions.color.Fancy.clicked = !search_conditions.color.Fancy.clicked ; resetFancyData(); displayColumn = '' ; @this.toggleValue('color', 'Fancy' )">
                    <span>{{trans('diamondSearch.White')}}</span>
                  </span>
                  <span class="btn" :class=" `${search_conditions.color.Fancy.clicked?' btn-primary':'text-blue-400 bg-white box'}` "  x-on:click="search_conditions.color.Fancy.clicked = !search_conditions.color.Fancy.clicked; resetFancyData(); displayColumn = '' ; @this.toggleValue('color', 'Fancy' )">
                    <span >{{trans('diamondSearch.Fancy')}}</span>
                  </span>
                </p>
              </div>

              <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('color')" 
              x-show="!search_conditions.color.Fancy.clicked">
                <template x-for="(iItem, iIndex) in Object.entries(search_conditions.color)" >
                  <span x-on:click="iItem[1].clicked = ! iItem[1].clicked">
                    <button :class=" `btn btn-outline ${iItem[1].clicked?
                          '':'hidden'}`"   x-on:click="@this.toggleValue('color', iItem[0])" type="button" x-text="iItem[0]">
                    </button>
                  </span>
                </template>
             </a>

              <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('color')" 
              x-show="search_conditions.color.Fancy.clicked">
                <template x-for="(iItem, iIndex) in Object.entries(fancy_color.fancy_color)" >
                  <span x-on:click="iItem[1].clicked = ! iItem[1].clicked">
                    <button :class=" `btn btn-outline ${iItem[1].clicked?
                          '':'hidden'}`"   x-on:click="@this.toggleFancyValue('fancy_color', iItem[0])" type="button">

                        <svg x-show="iItem[0] != 'Brown' " :class=" `fill-current w-6 text-${ iItem[0].toLowerCase() }-300`" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 295.82 295.82" style="enable-background:new 0 0 295.82 295.82;" xml:space="preserve">
                              <g>
                                <path d="M85.06,140.048c-0.905-2.492-3.389-4.138-6.041-4.138H10.706c-2.251,0-4.195,1.121-5.072,3.078
                                  c-0.878,1.957-0.494,4.169,1.003,5.851L123.963,276.58c1.424,1.602,3.002,1.926,4.075,1.927l2.649-0.03l1.494-2.132
                                  c0.58-0.828,1.423-2.532,0.544-4.959L85.06,140.048z"/>
                                <path d="M186.238,138.141c-1.082-1.479-2.778-2.231-4.652-2.231h-67.35c-1.872,0-3.567,0.751-4.65,2.227
                                  c-1.082,1.476-1.381,3.299-0.818,5.088l34.074,107.961c0.746,2.361,2.735,3.876,5.068,3.876c2.337,0,4.327-1.535,5.069-3.896
                                  l34.072-107.934C187.617,141.446,187.321,139.619,186.238,138.141z"/>
                                <path d="M113.72,111.413c1.006,1.691,2.824,2.497,4.863,2.497h62.546c2.037,0,3.854-0.804,4.861-2.494
                                  c1.007-1.69,1.029-3.666,0.058-5.461l-31.321-57.697c-0.998-1.835-2.863-2.949-4.87-2.949c-2.011,0-3.878,1.155-4.872,2.991
                                  l-31.317,57.644C112.694,107.737,112.713,109.721,113.72,111.413z"/>
                                <path d="M58.275,113.91c2.315,0,4.276-1.058,5.118-3.089c0.842-2.032,0.348-4.209-1.29-5.846L29.576,72.499
                                  c-1.108-1.108-2.566-1.692-4.104-1.692c-2.017,0-3.857,1.057-4.926,2.807L0.861,105.86c-1.087,1.785-1.148,3.697-0.162,5.451
                                  c0.985,1.754,2.821,2.6,4.912,2.6H58.275z"/>
                                <path d="M203.513,93.376c1.017,1.87,2.944,3.031,5.03,3.032c1.526,0,2.975-0.606,4.083-1.713l43.4-43.4
                                  c2.021-2.025,2.402-5.266,0.913-7.697L242.583,20.12c-1.188-1.941-3.513-3.21-5.788-3.21h-65.394c-2.039,0-3.858,0.975-4.864,2.667
                                  c-1.007,1.691-1.026,3.753-0.055,5.542L203.513,93.376z"/>
                                <path d="M85.289,97.999c1.104,1.107,2.556,1.717,4.087,1.717c2.086,0,4.014-1.162,5.032-3.036l38.824-71.582
                                  c0.971-1.792,0.948-3.834-0.059-5.524c-1.007-1.69-2.824-2.663-4.861-2.663H59.024c-2.278,0-4.605,1.271-5.788,3.212L38.418,44.37
                                  c-1.488,2.443-1.099,5.674,0.922,7.688L85.289,97.999z"/>
                                <path d="M285.115,135.91h-68.313c-2.652,0-5.136,1.646-6.041,4.139l-47.667,131.337c-0.878,2.424-0.035,4.359,0.545,5.186
                                  l1.541,2.337h2.397v-0.207c1,0,2.754-0.441,4.174-2.038l117.382-131.822c1.497-1.682,1.906-3.872,1.028-5.829
                                  C289.284,137.057,287.366,135.91,285.115,135.91z"/>
                                <path d="M294.956,105.861l-20.14-32.986c-1.069-1.749-2.91-2.793-4.926-2.793c-1.539,0-2.997,0.61-4.104,1.719l-33.273,33.272
                                  c-1.64,1.636-2.137,3.711-1.296,5.744c0.841,2.034,2.803,3.093,5.12,3.093h53.873c2.092,0,3.93-0.844,4.914-2.6
                                  C296.109,109.554,296.045,107.644,294.956,105.861z"/>
                              </g>
                            </svg> 

                            <svg x-show="iItem[0] == 'Brown' " class="fill-current w-6 text-red-700" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 295.82 295.82" style="enable-background:new 0 0 295.82 295.82;" xml:space="preserve">
                              <g>
                                <path d="M85.06,140.048c-0.905-2.492-3.389-4.138-6.041-4.138H10.706c-2.251,0-4.195,1.121-5.072,3.078
                                  c-0.878,1.957-0.494,4.169,1.003,5.851L123.963,276.58c1.424,1.602,3.002,1.926,4.075,1.927l2.649-0.03l1.494-2.132
                                  c0.58-0.828,1.423-2.532,0.544-4.959L85.06,140.048z"/>
                                <path d="M186.238,138.141c-1.082-1.479-2.778-2.231-4.652-2.231h-67.35c-1.872,0-3.567,0.751-4.65,2.227
                                  c-1.082,1.476-1.381,3.299-0.818,5.088l34.074,107.961c0.746,2.361,2.735,3.876,5.068,3.876c2.337,0,4.327-1.535,5.069-3.896
                                  l34.072-107.934C187.617,141.446,187.321,139.619,186.238,138.141z"/>
                                <path d="M113.72,111.413c1.006,1.691,2.824,2.497,4.863,2.497h62.546c2.037,0,3.854-0.804,4.861-2.494
                                  c1.007-1.69,1.029-3.666,0.058-5.461l-31.321-57.697c-0.998-1.835-2.863-2.949-4.87-2.949c-2.011,0-3.878,1.155-4.872,2.991
                                  l-31.317,57.644C112.694,107.737,112.713,109.721,113.72,111.413z"/>
                                <path d="M58.275,113.91c2.315,0,4.276-1.058,5.118-3.089c0.842-2.032,0.348-4.209-1.29-5.846L29.576,72.499
                                  c-1.108-1.108-2.566-1.692-4.104-1.692c-2.017,0-3.857,1.057-4.926,2.807L0.861,105.86c-1.087,1.785-1.148,3.697-0.162,5.451
                                  c0.985,1.754,2.821,2.6,4.912,2.6H58.275z"/>
                                <path d="M203.513,93.376c1.017,1.87,2.944,3.031,5.03,3.032c1.526,0,2.975-0.606,4.083-1.713l43.4-43.4
                                  c2.021-2.025,2.402-5.266,0.913-7.697L242.583,20.12c-1.188-1.941-3.513-3.21-5.788-3.21h-65.394c-2.039,0-3.858,0.975-4.864,2.667
                                  c-1.007,1.691-1.026,3.753-0.055,5.542L203.513,93.376z"/>
                                <path d="M85.289,97.999c1.104,1.107,2.556,1.717,4.087,1.717c2.086,0,4.014-1.162,5.032-3.036l38.824-71.582
                                  c0.971-1.792,0.948-3.834-0.059-5.524c-1.007-1.69-2.824-2.663-4.861-2.663H59.024c-2.278,0-4.605,1.271-5.788,3.212L38.418,44.37
                                  c-1.488,2.443-1.099,5.674,0.922,7.688L85.289,97.999z"/>
                                <path d="M285.115,135.91h-68.313c-2.652,0-5.136,1.646-6.041,4.139l-47.667,131.337c-0.878,2.424-0.035,4.359,0.545,5.186
                                  l1.541,2.337h2.397v-0.207c1,0,2.754-0.441,4.174-2.038l117.382-131.822c1.497-1.682,1.906-3.872,1.028-5.829
                                  C289.284,137.057,287.366,135.91,285.115,135.91z"/>
                                <path d="M294.956,105.861l-20.14-32.986c-1.069-1.749-2.91-2.793-4.926-2.793c-1.539,0-2.997,0.61-4.104,1.719l-33.273,33.272
                                  c-1.64,1.636-2.137,3.711-1.296,5.744c0.841,2.034,2.803,3.093,5.12,3.093h53.873c2.092,0,3.93-0.844,4.914-2.6
                                  C296.109,109.554,296.045,107.644,294.956,105.861z"/>
                              </g>
                            </svg> 
                    </button>
                  </span>
                </template>
             </a>

            <i class="fas fa-chevron-down"></i>
            <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/color' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a>
          </div>

          <a x-show="displayColumn == 'color' && !search_conditions.color.Fancy.clicked">
            <div class="level">
                @foreach($search_conditions['color'] as $key => $color)
                  @if($key != "Fancy")
                    <span x-on:click="search_conditions.color['{{$key}}'].clicked = ! search_conditions.color['{{$key}}'].clicked" >        
                      <button  :class=" `btn btn-outline ${search_conditions.color['{{$key}}'].clicked?
                                  'bg-gray-300':''}` " type="button" wire:click="toggleValue('color', '{{$key}}' )"> 
                          {{$key}}
                      </button>
                    </span>
                  @endif
                @endforeach
            </div>
          </a>
          <a x-show="displayColumn == 'color' &&  search_conditions.color.Fancy.clicked">
            <div class="level">
              @foreach($fancy_color['fancy_color'] as $key => $color)
                <span x-on:click="resetFancyColor();fancy_color.fancy_color['{{$key}}'].clicked = ! fancy_color.fancy_color['{{$key}}'].clicked ; assignSelectColor()" >

                  <button  :class=" `btn btn-outline text-center ${fancy_color.fancy_color['{{$key}}'].clicked?
                              'bg-gray-300':''}` " type="button" wire:click="toggleFancyValue('fancy_color', '{{$key}}' )"> 
                      <center>
                      @if($key != 'Brown')
                        <svg class="fill-current w-6 text-{{strtolower($key)}}-300" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 295.82 295.82" style="enable-background:new 0 0 295.82 295.82;" xml:space="preserve">
                              <g>
                                <path d="M85.06,140.048c-0.905-2.492-3.389-4.138-6.041-4.138H10.706c-2.251,0-4.195,1.121-5.072,3.078
                                  c-0.878,1.957-0.494,4.169,1.003,5.851L123.963,276.58c1.424,1.602,3.002,1.926,4.075,1.927l2.649-0.03l1.494-2.132
                                  c0.58-0.828,1.423-2.532,0.544-4.959L85.06,140.048z"/>
                                <path d="M186.238,138.141c-1.082-1.479-2.778-2.231-4.652-2.231h-67.35c-1.872,0-3.567,0.751-4.65,2.227
                                  c-1.082,1.476-1.381,3.299-0.818,5.088l34.074,107.961c0.746,2.361,2.735,3.876,5.068,3.876c2.337,0,4.327-1.535,5.069-3.896
                                  l34.072-107.934C187.617,141.446,187.321,139.619,186.238,138.141z"/>
                                <path d="M113.72,111.413c1.006,1.691,2.824,2.497,4.863,2.497h62.546c2.037,0,3.854-0.804,4.861-2.494
                                  c1.007-1.69,1.029-3.666,0.058-5.461l-31.321-57.697c-0.998-1.835-2.863-2.949-4.87-2.949c-2.011,0-3.878,1.155-4.872,2.991
                                  l-31.317,57.644C112.694,107.737,112.713,109.721,113.72,111.413z"/>
                                <path d="M58.275,113.91c2.315,0,4.276-1.058,5.118-3.089c0.842-2.032,0.348-4.209-1.29-5.846L29.576,72.499
                                  c-1.108-1.108-2.566-1.692-4.104-1.692c-2.017,0-3.857,1.057-4.926,2.807L0.861,105.86c-1.087,1.785-1.148,3.697-0.162,5.451
                                  c0.985,1.754,2.821,2.6,4.912,2.6H58.275z"/>
                                <path d="M203.513,93.376c1.017,1.87,2.944,3.031,5.03,3.032c1.526,0,2.975-0.606,4.083-1.713l43.4-43.4
                                  c2.021-2.025,2.402-5.266,0.913-7.697L242.583,20.12c-1.188-1.941-3.513-3.21-5.788-3.21h-65.394c-2.039,0-3.858,0.975-4.864,2.667
                                  c-1.007,1.691-1.026,3.753-0.055,5.542L203.513,93.376z"/>
                                <path d="M85.289,97.999c1.104,1.107,2.556,1.717,4.087,1.717c2.086,0,4.014-1.162,5.032-3.036l38.824-71.582
                                  c0.971-1.792,0.948-3.834-0.059-5.524c-1.007-1.69-2.824-2.663-4.861-2.663H59.024c-2.278,0-4.605,1.271-5.788,3.212L38.418,44.37
                                  c-1.488,2.443-1.099,5.674,0.922,7.688L85.289,97.999z"/>
                                <path d="M285.115,135.91h-68.313c-2.652,0-5.136,1.646-6.041,4.139l-47.667,131.337c-0.878,2.424-0.035,4.359,0.545,5.186
                                  l1.541,2.337h2.397v-0.207c1,0,2.754-0.441,4.174-2.038l117.382-131.822c1.497-1.682,1.906-3.872,1.028-5.829
                                  C289.284,137.057,287.366,135.91,285.115,135.91z"/>
                                <path d="M294.956,105.861l-20.14-32.986c-1.069-1.749-2.91-2.793-4.926-2.793c-1.539,0-2.997,0.61-4.104,1.719l-33.273,33.272
                                  c-1.64,1.636-2.137,3.711-1.296,5.744c0.841,2.034,2.803,3.093,5.12,3.093h53.873c2.092,0,3.93-0.844,4.914-2.6
                                  C296.109,109.554,296.045,107.644,294.956,105.861z"/>
                              </g>
                            </svg> 
                          @else
                            <svg class="fill-current w-6 text-red-700" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 295.82 295.82" style="enable-background:new 0 0 295.82 295.82;" xml:space="preserve">
                              <g>
                                <path d="M85.06,140.048c-0.905-2.492-3.389-4.138-6.041-4.138H10.706c-2.251,0-4.195,1.121-5.072,3.078
                                  c-0.878,1.957-0.494,4.169,1.003,5.851L123.963,276.58c1.424,1.602,3.002,1.926,4.075,1.927l2.649-0.03l1.494-2.132
                                  c0.58-0.828,1.423-2.532,0.544-4.959L85.06,140.048z"/>
                                <path d="M186.238,138.141c-1.082-1.479-2.778-2.231-4.652-2.231h-67.35c-1.872,0-3.567,0.751-4.65,2.227
                                  c-1.082,1.476-1.381,3.299-0.818,5.088l34.074,107.961c0.746,2.361,2.735,3.876,5.068,3.876c2.337,0,4.327-1.535,5.069-3.896
                                  l34.072-107.934C187.617,141.446,187.321,139.619,186.238,138.141z"/>
                                <path d="M113.72,111.413c1.006,1.691,2.824,2.497,4.863,2.497h62.546c2.037,0,3.854-0.804,4.861-2.494
                                  c1.007-1.69,1.029-3.666,0.058-5.461l-31.321-57.697c-0.998-1.835-2.863-2.949-4.87-2.949c-2.011,0-3.878,1.155-4.872,2.991
                                  l-31.317,57.644C112.694,107.737,112.713,109.721,113.72,111.413z"/>
                                <path d="M58.275,113.91c2.315,0,4.276-1.058,5.118-3.089c0.842-2.032,0.348-4.209-1.29-5.846L29.576,72.499
                                  c-1.108-1.108-2.566-1.692-4.104-1.692c-2.017,0-3.857,1.057-4.926,2.807L0.861,105.86c-1.087,1.785-1.148,3.697-0.162,5.451
                                  c0.985,1.754,2.821,2.6,4.912,2.6H58.275z"/>
                                <path d="M203.513,93.376c1.017,1.87,2.944,3.031,5.03,3.032c1.526,0,2.975-0.606,4.083-1.713l43.4-43.4
                                  c2.021-2.025,2.402-5.266,0.913-7.697L242.583,20.12c-1.188-1.941-3.513-3.21-5.788-3.21h-65.394c-2.039,0-3.858,0.975-4.864,2.667
                                  c-1.007,1.691-1.026,3.753-0.055,5.542L203.513,93.376z"/>
                                <path d="M85.289,97.999c1.104,1.107,2.556,1.717,4.087,1.717c2.086,0,4.014-1.162,5.032-3.036l38.824-71.582
                                  c0.971-1.792,0.948-3.834-0.059-5.524c-1.007-1.69-2.824-2.663-4.861-2.663H59.024c-2.278,0-4.605,1.271-5.788,3.212L38.418,44.37
                                  c-1.488,2.443-1.099,5.674,0.922,7.688L85.289,97.999z"/>
                                <path d="M285.115,135.91h-68.313c-2.652,0-5.136,1.646-6.041,4.139l-47.667,131.337c-0.878,2.424-0.035,4.359,0.545,5.186
                                  l1.541,2.337h2.397v-0.207c1,0,2.754-0.441,4.174-2.038l117.382-131.822c1.497-1.682,1.906-3.872,1.028-5.829
                                  C289.284,137.057,287.366,135.91,285.115,135.91z"/>
                                <path d="M294.956,105.861l-20.14-32.986c-1.069-1.749-2.91-2.793-4.926-2.793c-1.539,0-2.997,0.61-4.104,1.719l-33.273,33.272
                                  c-1.64,1.636-2.137,3.711-1.296,5.744c0.841,2.034,2.803,3.093,5.12,3.093h53.873c2.092,0,3.93-0.844,4.914-2.6
                                  C296.109,109.554,296.045,107.644,294.956,105.861z"/>
                              </g>
                            </svg> 
                          @endif
                      {{__('diamondSearch.' . $key ) }}
                      </center>
                  </button>
                </span>
                @endforeach
            </div>
          </a>
        </div>

        <div class="border border-gray-300 p-2 mx-1" x-show="search_conditions.color.Fancy.clicked">
          <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('fancy_intensity')">
            <a class="is-primary">{{trans('diamondSearch.Intensity')}}</a>
              <a  class="hover:text-blue-600" x-on:click="selectDisplayColumn('fancy_intensity')">
                <template x-for="(iItem, iIndex) in Object.entries(fancy_color.fancy_intensity)" >
                  <span x-on:click="iItem[1].clicked = ! iItem[1].clicked">
                    <button :class=" `btn btn-outline ${iItem[1].clicked?
                          '':'hidden'}`"   x-on:click="@this.toggleFancyValue('fancy_intensity', iItem[0])" type="button" x-text="iItem[0]">
                    </button>
                  </span>
                </template>
             </a>
            <i class="fas fa-chevron-down"></i>
            <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/color' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a>
          </div>

          <a x-show="displayColumn == 'fancy_intensity' ">
            <div class="level">
                @php($counter=100)
                @foreach($fancy_color['fancy_intensity'] as $key => $fancy_intensity)
                  @if($key != "Fancy")
                    <span x-on:click="fancy_color.fancy_intensity['{{$key}}'].clicked = ! fancy_color.fancy_intensity['{{$key}}'].clicked" >        
                      <button  :class=" `btn btn-outline ${fancy_color.fancy_intensity['{{$key}}'].clicked?
                                  'bg-gray-300':''}` " type="button" wire:click="toggleFancyValue('fancy_intensity', '{{$key}}' )"> 
                            <center>
                              <svg :class=" `fill-current w-6 text-${selectedColor}-{{$counter +=100}}`" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                              viewBox="0 0 295.82 295.82" style="enable-background:new 0 0 295.82 295.82;" xml:space="preserve">
                              <g>
                                <path d="M85.06,140.048c-0.905-2.492-3.389-4.138-6.041-4.138H10.706c-2.251,0-4.195,1.121-5.072,3.078
                                  c-0.878,1.957-0.494,4.169,1.003,5.851L123.963,276.58c1.424,1.602,3.002,1.926,4.075,1.927l2.649-0.03l1.494-2.132
                                  c0.58-0.828,1.423-2.532,0.544-4.959L85.06,140.048z"/>
                                <path d="M186.238,138.141c-1.082-1.479-2.778-2.231-4.652-2.231h-67.35c-1.872,0-3.567,0.751-4.65,2.227
                                  c-1.082,1.476-1.381,3.299-0.818,5.088l34.074,107.961c0.746,2.361,2.735,3.876,5.068,3.876c2.337,0,4.327-1.535,5.069-3.896
                                  l34.072-107.934C187.617,141.446,187.321,139.619,186.238,138.141z"/>
                                <path d="M113.72,111.413c1.006,1.691,2.824,2.497,4.863,2.497h62.546c2.037,0,3.854-0.804,4.861-2.494
                                  c1.007-1.69,1.029-3.666,0.058-5.461l-31.321-57.697c-0.998-1.835-2.863-2.949-4.87-2.949c-2.011,0-3.878,1.155-4.872,2.991
                                  l-31.317,57.644C112.694,107.737,112.713,109.721,113.72,111.413z"/>
                                <path d="M58.275,113.91c2.315,0,4.276-1.058,5.118-3.089c0.842-2.032,0.348-4.209-1.29-5.846L29.576,72.499
                                  c-1.108-1.108-2.566-1.692-4.104-1.692c-2.017,0-3.857,1.057-4.926,2.807L0.861,105.86c-1.087,1.785-1.148,3.697-0.162,5.451
                                  c0.985,1.754,2.821,2.6,4.912,2.6H58.275z"/>
                                <path d="M203.513,93.376c1.017,1.87,2.944,3.031,5.03,3.032c1.526,0,2.975-0.606,4.083-1.713l43.4-43.4
                                  c2.021-2.025,2.402-5.266,0.913-7.697L242.583,20.12c-1.188-1.941-3.513-3.21-5.788-3.21h-65.394c-2.039,0-3.858,0.975-4.864,2.667
                                  c-1.007,1.691-1.026,3.753-0.055,5.542L203.513,93.376z"/>
                                <path d="M85.289,97.999c1.104,1.107,2.556,1.717,4.087,1.717c2.086,0,4.014-1.162,5.032-3.036l38.824-71.582
                                  c0.971-1.792,0.948-3.834-0.059-5.524c-1.007-1.69-2.824-2.663-4.861-2.663H59.024c-2.278,0-4.605,1.271-5.788,3.212L38.418,44.37
                                  c-1.488,2.443-1.099,5.674,0.922,7.688L85.289,97.999z"/>
                                <path d="M285.115,135.91h-68.313c-2.652,0-5.136,1.646-6.041,4.139l-47.667,131.337c-0.878,2.424-0.035,4.359,0.545,5.186
                                  l1.541,2.337h2.397v-0.207c1,0,2.754-0.441,4.174-2.038l117.382-131.822c1.497-1.682,1.906-3.872,1.028-5.829
                                  C289.284,137.057,287.366,135.91,285.115,135.91z"/>
                                <path d="M294.956,105.861l-20.14-32.986c-1.069-1.749-2.91-2.793-4.926-2.793c-1.539,0-2.997,0.61-4.104,1.719l-33.273,33.272
                                  c-1.64,1.636-2.137,3.711-1.296,5.744c0.841,2.034,2.803,3.093,5.12,3.093h53.873c2.092,0,3.93-0.844,4.914-2.6
                                  C296.109,109.554,296.045,107.644,294.956,105.861z"/>
                              </g>
                            </svg> 
                          </center>
                          {{$key}}
                      </button>
                    </span>
                  @endif
                @endforeach
            </div>
          </a>
        </div>

       


        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('clarity')">
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
              <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/clarity' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a>
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

        <div class="border border-gray-300 p-2 mx-1" x-show="!search_conditions.color.Fancy.clicked">
          <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('cut')">
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
              <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/cut' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a>
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
           <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('polish')">
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
              <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/polish' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a>
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
           <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('symmetry')">
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
              <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/symmetry' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a>
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
           <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('fluorescence')">
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
              <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/fluorescence' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a>
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
          <div class="hover:text-blue-600 flex justify-center" x-on:click="selectDisplayColumn('{{$key}}')">
              <p>{{trans('diamondSearch.' . $value)}}</p>
              <span x-show="advance_search_conditions['{{$key}}'].clicked" 
                    x-on:click=" advance_search_conditions[['{{$key}}'][0]].clicked = false ">
                <button wire:click="setAdvanceToZero( '{{$key}}' )" :class=" `${advance_search_conditions['{{$key}}'].clicked?'btn btn-yellow':''}` "> {{ $fetchData[$key][0] }} - {{ $fetchData[$key][1] }}</button>
              </span>
              <i class="fas fa-chevron-down"></i>
<!--               <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/carat' }}" target="_blank">
                <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                  <g>
                    <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                    <rect x="241" y="353.5" width="30" height="30"/>
                    <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                  </g>
                </svg>
              </a> -->
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









<span x-data="desktopSliders()" x-init="init()">
<div class="grid grid-cols-12 p-2 pt-4">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center px-2">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Price')}}</p>        
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex flex-col">
          <div class="flex flex-row">
            <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg m-2 px-4 block w-full appearance-none leading-normal" type="text" 
              @input="expUpdateMinThumb('price')"
              @keyup.debounce.500ms="updateInput('priceMin','mininputjs','price')"
              x-model="sliders.price.mininputjs"
              placeholder="HKD$"
              >
            <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg m-2 px-4 block w-full appearance-none leading-normal" type="text" 
             @input="expUpdateMaxThumb('price')" 
             @keyup.debounce.500ms="updateInput('priceMax','maxinputjs','price')"
             x-model="sliders.price.maxinputjs" 
             placeholder="HKD$"
             >
          </div>
          <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full p-2 px-2">
                <input 
                    type="range"
                    step="100"
                    x-bind:min="sliders.price.min" x-bind:max="sliders.price.max"
                    @input="expMintrigger('price')"
                    @click="updateInput('priceMin','mininputjs','price')"
                    x-model="sliders.price.minvalue"
                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                >
                <input 
                    type="range" 
                    step="100"
                    x-bind:min="sliders.price.min" x-bind:max="sliders.price.max"
                    @input="expMaxtrigger('price')"
                    @click="updateInput('priceMax','maxinputjs','price')"
                    x-model="sliders.price.maxvalue"
                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                >
                <div class="relative z-10 h-2">
                    <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                    <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+sliders.price.maxthumb+'%; left:'+sliders.price.minthumb+'%'"></div>
                    <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 left-0 bg-white border border-brown transform rotate-45 -mt-1 -ml-1" x-bind:style="'left: '+sliders.price.minthumb+'%'"></div>
                    <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+sliders.price.maxthumb+'%'"></div>
                </div>
            </div>
          </div>
        </div>
    </div>
              
  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center px-2">
      <div class="col-span-2 mx-8 font-light text-lg">
        <span class="flex">
          <p>{{trans('diamondSearch.Weight')}}</p>
          <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/carat' }}" target="_blank">
            <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
              <g>
                <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                <rect x="241" y="353.5" width="30" height="30"/>
                <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
              </g>
            </svg>
          </a>
        </span>
      </div>         
      <div class="col-span-10">
        <div class="flex flex-col">
          <div class="flex flex-row">
            <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg m-2 px-4 block w-full appearance-none leading-normal" 
            type="number" 
            step="0.01"
            @input.debounce.1000ms="updateMinThumb('weight')" 
            @keyup.debounce.1000ms="updateInput('weightMin','mininputjs','weight')"
            x-model="sliders.weight.mininputjs" 
            placeholder="ct">
            <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg m-2 px-4 block w-full appearance-none leading-normal" 
            type="number" 
            step="0.01"
            @input.debounce.1000ms="updateMaxThumb('weight')" 
            @keyup.debounce.1000ms="updateInput('weightMax','maxinputjs','weight')"
            x-model="sliders.weight.maxinputjs" 
            placeholder="ct">
          </div>
          <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full p-2 px-2">
              <input 
                  type="range"
                  step="0.01"
                  x-bind:min="sliders.weight.min" x-bind:max="sliders.weight.max"
                  @input="mintrigger('weight')"
                  @click="updateInput('weightMin','mininputjs','weight')"
                  x-model="sliders.weight.mininputjs"
                  class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
              >
              <input 
                  type="range" 
                  step="0.01"
                  x-bind:min="sliders.weight.min" x-bind:max="sliders.weight.max"
                  @input="maxtrigger('weight')"
                  @click="updateInput('weightMax','maxinputjs','weight')"
                  x-model="sliders.weight.maxinputjs"
                  class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
              >
              <div class="relative z-10 h-2">
                  <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                  <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+sliders.weight.maxthumb+'%; left:'+sliders.weight.minthumb+'%'"></div>
                  <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 left-0 bg-white border border-brown transform rotate-45 -mt-1 -ml-1" x-bind:style="'left: '+sliders.weight.minthumb+'%'"></div>
                  <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+sliders.weight.maxthumb+'%'"></div>
              </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</div>
</span>


<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div x-data="{ search_conditions: @entangle('search_conditions')}">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <span class="flex">
          <p>{{trans('diamondSearch.Shape')}}</p>
          <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/shape' }}" target="_blank">
            <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
              <g>
                <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                <rect x="241" y="353.5" width="30" height="30"/>
                <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
              </g>
            </svg>
          </a>
        </span>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap">


          @foreach($search_conditions['shape'] as  $key => $shape)
          <div x-on:click="search_conditions.shape['{{$key}}'].clicked = ! search_conditions.shape['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('shape', '{{$key}}' )">
              <img class="h-8" src=" {{'/images/front-end/diamond_shapes/' . $key . '.png' }}" alt="">
              <div :class=" `border-2 mt-2 ${search_conditions.shape['{{$key}}'].clicked?
                              'border-yellow-500':'border-gray-600'}` "   >
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
          <div class="m-2 bg-yellow-500 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-30-0-49-carat-weight">0.3-0.49</a>
          </div>
          <div class="m-2 bg-yellow-500 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-50-0-79-carat-weight">0.5-0.79</a>
          </div>
          <div class="m-2 bg-yellow-500 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-80-0-99-carat-weight">0.8-0.99</a>
          </div>
          <div class="m-2 bg-yellow-500 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-00-1-19-carat-weight">1.0-1.19</a>
          </div>
          <div class="m-2 bg-yellow-500 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-20-1-49-carat-weight">1.2-1.49</a>
          </div>
          <div class="m-2 bg-yellow-500 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-50-1-99-carat-weight">1.5-1.99</a>
          </div>
          <div class="m-2 bg-yellow-500 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/2-00-2-99-carat-weight">2.0-2.99</a>
          </div>
          <div class="m-2 bg-yellow-500 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/3-00-up-carat-weight">
            3.0 up</a>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="grid grid-cols-12 p-2" x-data="fancyColor()">
  <div class="col-span-6">
    <div>
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 font-light text-lg" x-on:click="search_conditions.color.Fancy.clicked = !search_conditions.color.Fancy.clicked; resetFancyData(); @this.toggleValue('color', 'Fancy' )" >
        <span class="flex">
          <p class="flex justify-center " >
            <span class="btn p-2" :class=" `${search_conditions.color.Fancy.clicked?'text-blue-400 bg-white box':' btn-primary'}` ">
              {{trans('diamondSearch.White')}}
            </span>
            <span class="btn p-2" :class=" `${search_conditions.color.Fancy.clicked?' btn-primary':'text-blue-400 bg-white box'}` ">{{trans('diamondSearch.Fancy')}}
            </span>
          </p>
          <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/color' }}" target="_blank">
            <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
              <g>
                <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                <rect x="241" y="353.5" width="30" height="30"/>
                <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
              </g>
            </svg>
          </a>
        </span>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center" x-show="!search_conditions.color.Fancy.clicked">

          @foreach($search_conditions['color'] as $key => $color)
            @if($key != "Fancy")
            <div x-on:click="search_conditions.color['{{$key}}'].clicked = ! search_conditions.color['{{$key}}'].clicked" >
              <div class="p-2" wire:click="toggleValue('color', '{{$key}}' )">
                    {{$key}}
                  <div :class=" `border-2 mt-2 px-4 ${search_conditions.color['{{$key}}'].clicked?
                                  'border-yellow-500':'border-gray-600'}` " >
                  </div>

              </div>
            </div>
            @endif
          @endforeach


        </div>

        <div class="flex justify-between flex-wrap text-center" x-show="search_conditions.color.Fancy.clicked">

          @foreach($fancy_color['fancy_color'] as $key => $color)

          <div x-on:click="resetFancyColor();fancy_color.fancy_color['{{$key}}'].clicked = ! fancy_color.fancy_color['{{$key}}'].clicked ; assignSelectColor()" >
            <div class="p-2" wire:click="toggleFancyValue('fancy_color', '{{$key}}' )">
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

                    <span class="text-xs">{{__('diamondSearch.' . $key )}}</span>
                <div :class=" `border-2 mt-2 px-4 ${fancy_color.fancy_color['{{$key}}'].clicked?
                                'border-yellow-500':'border-gray-600'}` " >
                </div>
              </center>

            </div>
          </div>
          @endforeach


        </div>

      </div>
    </div>
    </div>
  </div>

  <div class="col-span-6" x-show="search_conditions.color.Fancy.clicked">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <span class="flex">
          <p x-on:click="search_conditions.color.Fancy.clicked = !search_conditions.color.Fancy.clicked" >
           {{trans('diamondSearch.Intensity')}}
          </p>
          <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/color' }}" target="_blank">
            <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
              <g>
                <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                <rect x="241" y="353.5" width="30" height="30"/>
                <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
              </g>
            </svg>
          </a>
        </span>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center" x-show="!search_conditions.color.Fancy.clicked">

          @foreach($search_conditions['color'] as $key => $color)
            @if($key != "Fancy")
            <div x-on:click="search_conditions.color['{{$key}}'].clicked = ! search_conditions.color['{{$key}}'].clicked" >
              <div class="p-2" wire:click="toggleValue('color', '{{$key}}' )">
                    {{$key}}
                  <div :class=" `border-2 mt-2 px-4 ${search_conditions.color['{{$key}}'].clicked?
                                  'border-yellow-500':'border-gray-600'}` " >
                  </div>

              </div>
            </div>
            @endif
          @endforeach


        </div>

        <div class="flex justify-between flex-wrap text-center" x-show="search_conditions.color.Fancy.clicked">
          @php($counter=100)
          @foreach($fancy_color['fancy_intensity'] as $key => $color)

          <div x-on:click="fancy_color.fancy_intensity['{{$key}}'].clicked = ! fancy_color.fancy_intensity['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleFancyValue('fancy_intensity', '{{$key}}' )">
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

                    <span class="text-xs">{{$key}}</span>
                <div :class=" `border-2 mt-2 px-4 ${fancy_color.fancy_intensity['{{$key}}'].clicked?
                                'border-yellow-500':'border-gray-600'}` " >
                </div>
              </center>

            </div>
          </div>
          @endforeach


        </div>

      </div>
    </div>
  </div>

  <div class="col-span-6" x-show="!search_conditions.color.Fancy.clicked">
    <div >
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2 mx-8 font-light text-lg">
          <span class="flex">
            <p>{{trans('diamondSearch.Cut')}}</p>
            <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/cut' }}" target="_blank">
              <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                <g>
                  <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                  <rect x="241" y="353.5" width="30" height="30"/>
                  <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
                </g>
              </svg>
            </a>
          </span>
        </div>         
        <div class="col-span-10 mx-8">
          <div class="flex justify-between text-center flex-wrap">

            @foreach($search_conditions['cut'] as $key => $cut)


            <div x-on:click="search_conditions.cut['{{$key}}'].clicked = ! search_conditions.cut['{{$key}}'].clicked" >
              <div class="p-2" wire:click="toggleValue('cut', '{{$key}}' )">
                    {{$key}}
                  <div :class=" `border-2 mt-2 px-12 ${search_conditions.cut['{{$key}}'].clicked?
                              'border-yellow-500':'border-gray-600'}` "  >
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
        <span class="flex">
          <p>{{trans('diamondSearch.Clarity')}}</p>
          <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/clarity' }}" target="_blank">
            <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
              <g>
                <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                <rect x="241" y="353.5" width="30" height="30"/>
                <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
              </g>
            </svg>
          </a>
        </span>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">
          
         <!--  <div x-data="clarity()" x-init="mintrigger(); maxtrigger()" class="flex flex-col space-y-5">
            
            <div class="flex flex-wrap  md:justify-around items-center gap-3">
                <div class="px-1 md:px-2 text-center">
                    <span class="font-lato">FL</span>
                </div>
                <div class="px-1 md:px-2 text-center">
                    <span class="font-lato">IF</span>
                </div>
                <div class="px-1 md:px-2 text-center">
                    <span class="font-lato">VVS1</span>
                </div>
                <div class="px-1 md:px-2 text-center">
                    <span class="font-lato">VVS2</span>
                </div>
                <div class="px-1 md:px-2 text-center">
                    <span class="font-lato">VS1</span>
                </div>
                <div class="px-1 md:px-2 text-center">
                    <span class="font-lato">VS2</span>
                </div>
                <div class="px-1 md:px-2 text-center">
                    <span class="font-lato">SI1</span>
                </div>
                <div class="px-1 md:px-2 text-center">
                    <span class="font-lato">SI2</span>
                </div>
                <div class="px-1 md:px-2 text-center">
                    <span class="font-lato">I1</span>
                </div>
            </div>
            <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full px-2">
                <div>
                    <input 
                        type="range"
                        step="100"
                        x-bind:min="min" x-bind:max="max"
                        x-on:input="mintrigger"
                        x-model="minprice"
                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                    >
                    <input 
                        type="range" 
                        step="100"
                        x-bind:min="min" x-bind:max="max"
                        x-on:input="maxtrigger"
                        x-model="maxprice"
                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                    >
                    <div class="relative z-10 h-2">
                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 left-0 bg-white border border-brown transform rotate-45 -mt-1 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>
                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
                        <div class="flex items-center space-x-6 md:space-x-10 2xl:space-x-16 absolute top-0 z-40 left-11 w-full h-2">
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                            <div class="w-0.5 h-2 bg-white"></div>
                        </div>
                    </div>
                </div>    
            </div>
            
        </div> -->

          
          @foreach($search_conditions['clarity'] as $key => $clarity)
          <div x-on:click="search_conditions.clarity['{{$key}}'].clicked = ! search_conditions.clarity['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('clarity', '{{$key}}' )">
                  {{$key}}
                <div :class=" `border-2 mt-2 px-4 ${search_conditions.clarity['{{$key}}'].clicked?
                              'border-yellow-500':'border-gray-600'}` "  >
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
        <span class="flex">
          <p>{{trans('diamondSearch.Polish')}}</p>
          <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/polish' }}" target="_blank">
            <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
              <g>
                <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                <rect x="241" y="353.5" width="30" height="30"/>
                <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
              </g>
            </svg>
          </a>
        </span>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">

          @foreach($search_conditions['polish'] as $key => $polish)
          <div x-on:click="search_conditions.polish['{{$key}}'].clicked = ! search_conditions.polish['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('polish', '{{$key}}' )">
                  {{$key}}
                <div :class=" `border-2 mt-2 px-12 ${search_conditions.polish['{{$key}}'].clicked?
                              'border-yellow-500':'border-gray-600'}` " >
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
        <span class="flex">
          <p>{{trans('diamondSearch.Fluorescence')}}</p>
          <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/fluorescence' }}" target="_blank">
            <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
              <g>
                <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                <rect x="241" y="353.5" width="30" height="30"/>
                <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
              </g>
            </svg>
          </a>
        </span>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">
          
          @foreach($search_conditions['fluorescence'] as $key => $fluorescence)
          <div x-on:click="search_conditions.fluorescence['{{$key}}'].clicked = ! search_conditions.fluorescence['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('fluorescence', '{{$key}}' )">
                  {{trans('diamondSearch.'.$key)}}
                <div :class=" `border-2 mt-2 px-12 ${search_conditions.fluorescence['{{$key}}'].clicked?
                              'border-yellow-500':'border-gray-600'}` " >
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
        <span class="flex">
          <p>{{trans('diamondSearch.Symmetry')}}</p>
          <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/symmetry' }}" target="_blank">
            <svg class="w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
              <g>
                <path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256   c0,45.105,11.836,89.231,34.286,128.041L0,512l127.959-34.286C166.769,500.164,210.895,512,256,512   c68.38,0,132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,482   c-41.755,0-82.547-11.48-117.965-33.201l-5.496-3.37l-90.113,24.146l24.146-90.113l-3.37-5.496C41.48,338.547,30,297.755,30,256   C30,131.383,131.383,30,256,30s226,101.383,226,226S380.617,482,256,482z"/>
                <rect x="241" y="353.5" width="30" height="30"/>
                <path d="M256,128.5c-41.355,0-75,33.645-75,75h30c0-24.813,20.187-45,45-45s45,20.187,45,45c0,11.081-4.07,21.732-11.467,29.995   L241,287.771V323.5h30v-24.271l40.892-45.73C324.214,239.73,331,221.975,331,203.5C331,162.145,297.355,128.5,256,128.5z"/>
              </g>
            </svg>
          </a>
        </span>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">

          @foreach($search_conditions['symmetry'] as $key => $symmetry)
          <div x-on:click="search_conditions.symmetry['{{$key}}'].clicked = ! search_conditions.symmetry['{{$key}}'].clicked" >
            <div class="p-2" wire:click="toggleValue('symmetry', '{{$key}}' )">
                  {{$key}}
                <div :class=" `border-2 mt-2 px-12 ${search_conditions.symmetry['{{$key}}'].clicked?
                              'border-yellow-500':'border-gray-600'}` " >
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


<span x-data="advanceSearch()">
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

          <div class="col-span-2" x-on:click=" advance_search_conditions[['{{$key}}'][0]].clicked = false ">
            <span  wire:click="setAdvanceToZero( '{{$key}}' )">
              <p :class=" `${advance_search_conditions['{{$key}}'].clicked?'btn btn-yellow':''}` ">{{trans('diamondSearch.' . $value)}}</p>
            </span>
          </div>

          <div class="col-span-10 mx-8">

            <span x-on:click=" advance_search_conditions[['{{$key}}'][0]].clicked = true  ">
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
            </span>

          </div>

        </div>
      </div>

      @endforeach

    </div>

</span>



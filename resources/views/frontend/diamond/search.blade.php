<form action="#" :class="{'hidden lg:flex' : !applyFilter, 'flex lg:hidden fixed overflow-y-scroll h-5/6 w-full top-10 left-0 z-50 bg-white pt-5 md:pt-0 md:pb-0 px-4 md:px-0 border border-2' : applyFilter,}" class="flex-col space-y-5 font-lato" x-on:click.away="applyFilter = false; mobileUpdateInputs()">
    <div :class="{'hidden lg:grid' : !applyFilter, 'grid lg:hidden' : applyFilter,}" class="grid grid-cols-1 md:grid-cols-2 md:gap-x-20">
        <div class="flex md:hidden items-center space-x-5 justify-between">
            <a @click="applyFilter = false; mobileUpdateInputs()" class="flex-shrink-0 focus:outline-none">
                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666" />
                </svg>
            </a>
            <span class="text-lg font-suranna text-center">
                {{trans('diamondSearch.Diamond')}}  {{__('weddingRing.Filter')}}
            </span>
            <a class="text-brown underline" wire:click="resetAll()">{{__('weddingRing.Clear')}}</a>
        </div>
        <!-- 1 -->
        <div class="flex flex-col space-y-5">
            <label class="flex flex-wrap flex-row items-center justify-between space-x-1">
                <p class="flex items-center space-x-1">
                    <span class="font-bold font-lato">{{trans('diamondSearch.Price')}}</span>
                </p>
                <div class="flex w-60 md:w-auto md:max-w-max items-center justify-between md:justify-start md:space-x-5">
                    <div>
                        <div class="relative text-xs md:text-base">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50">
                                    HK$
                                </span>
                            </div>
                            <input type="text" 
                                  class="text-xs md:text-base focus:border-brown block w-28 md:w-36 py-1.5 pl-12 border border-gray-300" 
                                  aria-describedby="min-price-currency"
                                  @input="expUpdateMinThumb('price')"
                                  @keyup.debounce.500ms="updateInput('priceMin','mininputjs','price')"
                                  x-model="sliders.price.mininputjs"
                                  >
                        </div>
                    </div>
                    <span class="font-bold font-lato">-</span>
                    <div>
                        <div class="relative text-xs md:text-base">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50">
                                    HK$
                                </span>
                            </div>
                            <input type="text" 
                                  class="text-xs md:text-base focus:border-brown block w-32 md:w-36 py-1.5 pl-12 border border-gray-300" 
                                  aria-describedby="max-price-currency"
                                  @input="expUpdateMaxThumb('price')" 
                                   @keyup.debounce.500ms="updateInput('priceMax','maxinputjs','price')"
                                   x-model="sliders.price.maxinputjs" 
                                  >
                        </div>
                    </div>
                </div>
            </label>
            <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full px-2">
                <div>
                    <input type="range" 
                          class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                          step="100"
                          x-bind:min="sliders.price.min" x-bind:max="sliders.price.max"
                          @input="expMintrigger('price')"
                          @click="updateInput('priceMin','mininputjs','price')"
                          x-model="sliders.price.minvalue"
                          >
                    <input type="range" 
                          class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                          step="100"
                          x-bind:min="sliders.price.min" x-bind:max="sliders.price.max"
                          @input="expMaxtrigger('price')"
                          @click="updateInput('priceMax','maxinputjs','price')"
                          x-model="sliders.price.maxvalue"
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
        <!-- 2 -->
        <div class="flex flex-col space-y-5 mt-6 md:mt-0">
            <label class="flex flex-row items-center justify-between space-x-1">
                <p class="flex items-center space-x-2">
                    <span class="font-bold font-lato">{{trans('diamondSearch.Weight')}}</span>
                    <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/carat' }}" target="_blank">
                      <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                      </svg>
                    </a>
                </p>
                <div class="flex max-w-max items-center justify-between md:justify-start space-x-3 md:space-x-5">
                    <div>
                        <div class="relative">
                            <input class="focus:border-brown block w-18 py-1.5 text-center border border-gray-300" 
                                  aria-describedby="min-price-currency"
                                  type="number" 
                                  step="0.01"
                                  @input.debounce.1000ms="updateMinThumb('weight')" 
                                  @keyup.debounce.1000ms="updateInput('weightMin','mininputjs','weight')"
                                  x-model="sliders.weight.mininputjs" 
                                  >
                        </div>
                    </div>
                    <span class="font-bold font-lato">-</span>
                    <div>
                        <div class="relative">
                            <input class="focus:border-brown block w-18 py-1.5 text-center border border-gray-300" 
                            aria-describedby="max-price-currency"
                            type="number" 
                            step="0.01"
                            @input.debounce.1000ms="updateMaxThumb('weight')" 
                            @keyup.debounce.1000ms="updateInput('weightMax','maxinputjs','weight')"
                            x-model="sliders.weight.maxinputjs" 
                            >
                        </div>
                    </div>
                </div>
            </label>
            <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full px-2">
                <div>
                    <input class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                          type="range"
                          step="0.01"
                          x-bind:min="sliders.weight.min" x-bind:max="sliders.weight.max"
                          @input="mintrigger('weight')"
                          @click="updateInput('weightMin','mininputjs','weight')"
                          x-model="sliders.weight.mininputjs"
                          >
                    <input class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                          type="range" 
                          step="0.01"
                          x-bind:min="sliders.weight.min" x-bind:max="sliders.weight.max"
                          @input="maxtrigger('weight')"
                          @click="updateInput('weightMax','maxinputjs','weight')"
                          x-model="sliders.weight.maxinputjs"
                          >
                    <div class="relative z-10 h-2">
                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+sliders.weight.maxthumb+'%; left:'+sliders.weight.minthumb+'%'"></div>
                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 left-0 bg-white border border-brown transform rotate-45 -mt-1 -ml-1" x-bind:style="'left: '+sliders.weight.minthumb+'%'"></div>
                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+sliders.weight.maxthumb+'%'"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-1.5 md:gap-3">
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center">
                  <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-30-0-49-carat-weight">
                    <span class="font-lato text-sm md:text-base">0.3 - 0.49</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center">
                  <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-50-0-79-carat-weight">
                    <span class="font-lato text-sm md:text-base">0.5 - 0.79</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center">
                  <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-80-0-99-carat-weight">
                    <span class="font-lato text-sm md:text-base">0.8 - 0.99</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center">
                  <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-00-1-19-carat-weight">
                    <span class="font-lato text-sm md:text-base">1.0-1.19</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center">
                  <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-20-1-49-carat-weight">
                    <span class="font-lato text-sm md:text-base">1.2 - 1.49</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center">
                  <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-50-1-99-carat-weight">
                    <span class="font-lato text-sm md:text-base">1.5 - 1.99</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center">
                  <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/2-00-2-99-carat-weight">
                    <span class="font-lato text-sm md:text-base">2.0 - 2.99</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center">
                  <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/3-00-up-carat-weight">
                    <span class="font-lato text-sm md:text-base">3.0 Up</span>
                  </a>
                </div>
            </div>
        </div>
        <!-- 3 -->
        <div class="flex flex-col space-y-2 mt-6 md:-mt-14">
            <label class="flex items-center space-x-2">
                <span class="font-bold font-lato">{{trans('diamondSearch.Shape')}}</span>
                <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/shape' }}" target="_blank">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                    </svg>
                </a>
            </label>
            <fieldset class="flex flex-wrap items-center gap-1.5 md:gap-3">
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.round.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.round.clicked = ! search_conditions.shape.round.clicked; @this.toggleValue('shape', 'round' )">
                    <div>
                        <img src="/assets/images/image 22.png" alt="shape image">
                    </div>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.pear.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.pear.clicked = ! search_conditions.shape.pear.clicked; @this.toggleValue('shape', 'pear' )">
                    <div>
                        <img src="/assets/images/image 22-1.png" alt="shape image-1">
                    </div>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.emerald.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.emerald.clicked = ! search_conditions.shape.emerald.clicked; @this.toggleValue('shape', 'emerald' )">
                    <div>
                        <img src="/assets/images/image 22-2.png" alt="shape image-2">
                    </div>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.princess.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.princess.clicked = ! search_conditions.shape.princess.clicked; @this.toggleValue('shape', 'princess' )">
                    <div>
                        <img src="/assets/images/image 22-3.png" alt="shape image-3">
                    </div>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.cushion.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.cushion.clicked = ! search_conditions.shape.cushion.clicked; @this.toggleValue('shape', 'cushion' )">
                    <div>
                        <img src="/assets/images/image 22-4.png" alt="shape image-4">
                    </div>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.asscher.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.asscher.clicked = ! search_conditions.shape.asscher.clicked; @this.toggleValue('shape', 'asscher' )">
                    <div>
                        <img src="/assets/images/image 22-5.png" alt="shape image-5">
                    </div>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.heart.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.heart.clicked = ! search_conditions.shape.heart.clicked; @this.toggleValue('shape', 'heart' )">
                    <div>
                        <img src="/assets/images/image 22-6.png" alt="shape image-6">
                    </div>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.radiant.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.radiant.clicked = ! search_conditions.shape.radiant.clicked; @this.toggleValue('shape', 'radiant' )">
                    <div>
                        <img src="/assets/images/image 22-7.png" alt="shape image-7">
                    </div>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.oval.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.oval.clicked = ! search_conditions.shape.oval.clicked; @this.toggleValue('shape', 'oval' )">
                    <div>
                        <img src="/assets/images/image 23.png" alt="shape image-8">
                    </div>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.shape.marquise.clicked?' bg-brown-light border-brown':''}`" >
                    <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.marquise.clicked = ! search_conditions.shape.marquise.clicked; @this.toggleValue('shape', 'marquise' )">
                    <div>
                        <img src="/assets/images/image 23-1.png" alt="shape image-9">
                    </div>
                </label>
            </fieldset>
        </div>
        <!-- 4 -->
        <div class="flex flex-col space-y-2 mt-6 md:mt-4">
            <label class="flex items-center space-x-2">
                <span :class="{'text-brown font-bold border-b-2 border-brown' : !search_conditions.color.Fancy.clicked}" x-on:click="@this.toggleValue('color', 'Fancy' );search_conditions.color.Fancy.clicked = false" class="text-grey font-lato cursor-pointer">{{__('diamondSearch.White')}}</span>
                <span :class="{'text-brown font-bold border-b-2 border-brown' : search_conditions.color.Fancy.clicked}" x-on:click="@this.toggleValue('color', 'Fancy' );search_conditions.color.Fancy.clicked = true" class="text-grey font-lato cursor-pointer">{{__('diamondSearch.Fancy')}}</span>
                <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/color' }}" target="_blank">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                    </svg>
                </a>
            </label>
            <fieldset x-show="!search_conditions.color.Fancy.clicked" class="flex flex-wrap items-center gap-1.5 md:gap-3">
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light "
                :class=" `${search_conditions.color.D.clicked?' bg-brown-light border-brown':''}`"
                >
                <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.D.clicked = ! search_conditions.color.D.clicked; @this.toggleValue('color', 'D' )">
                    <span>D</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.E.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.E.clicked = ! search_conditions.color.E.clicked; @this.toggleValue('color', 'E' )">
                    <span>E</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.F.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.F.clicked = ! search_conditions.color.F.clicked; @this.toggleValue('color', 'F' )">
                    <span>F</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.G.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.G.clicked = ! search_conditions.color.G.clicked; @this.toggleValue('color', 'G' )">
                    <span>G</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.H.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.H.clicked = ! search_conditions.color.H.clicked; @this.toggleValue('color', 'H' )">
                    <span>H</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.I.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.I.clicked = ! search_conditions.color.I.clicked; @this.toggleValue('color', 'I' )">
                    <span>I</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.J.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.J.clicked = ! search_conditions.color.J.clicked; @this.toggleValue('color', 'J' )">
                    <span>J</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.K.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.K.clicked = ! search_conditions.color.K.clicked; @this.toggleValue('color', 'K' )">
                    <span>K</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.L.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.L.clicked = ! search_conditions.color.L.clicked; @this.toggleValue('color', 'L' )">
                    <span>L</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.M.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.M.clicked = ! search_conditions.color.M.clicked; @this.toggleValue('color', 'M' )">
                    <span>M</span>
                </label>
                <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light"
                :class=" `${search_conditions.color.N.clicked?' bg-brown-light border-brown':''}`">
                    <input type="checkbox" name="white" value="1" class="sr-only"
                    x-on:click="search_conditions.color.N.clicked = ! search_conditions.color.N.clicked; @this.toggleValue('color', 'N' )">
                    <span>N</span>
                </label>
            </fieldset>
            
            <fieldset x-show="search_conditions.color.Fancy.clicked" class="flex flex-wrap gap-1.5 md:gap-3">
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_color.Yellow.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="white" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_color.Yellow.clicked = ! fancy_color.fancy_color.Yellow.clicked; @this.toggleFancyValue('fancy_color', 'Yellow' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#F3E073" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">{{__('diamondSearch.Yellow')}}</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_color.Pink.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="white" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_color.Pink.clicked = ! fancy_color.fancy_color.Pink.clicked; @this.toggleFancyValue('fancy_color', 'Pink' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#F1B9CD" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">{{__('diamondSearch.Pink')}}</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_color.Orange.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="white" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_color.Orange.clicked = ! fancy_color.fancy_color.Orange.clicked; @this.toggleFancyValue('fancy_color', 'Orange' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#FBBD55" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">{{__('diamondSearch.Orange')}}</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_color.Purple.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="white" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_color.Purple.clicked = ! fancy_color.fancy_color.Purple.clicked; @this.toggleFancyValue('fancy_color', 'Purple' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#C0A0FA" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">{{__('diamondSearch.Purple')}}</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_color.Brown.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="white" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_color.Brown.clicked = ! fancy_color.fancy_color.Brown.clicked; @this.toggleFancyValue('fancy_color', 'Brown' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#976634" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">{{__('diamondSearch.Brown')}}</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_color.Green.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="white" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_color.Green.clicked = ! fancy_color.fancy_color.Green.clicked; @this.toggleFancyValue('fancy_color', 'Green' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#8ADD9D" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">{{__('diamondSearch.Green')}}</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_color.Gray.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="white" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_color.Gray.clicked = ! fancy_color.fancy_color.Gray.clicked; @this.toggleFancyValue('fancy_color', 'Gray' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#DCE1E7" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">{{__('diamondSearch.Gray')}}</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_color.Blue.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="white" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_color.Blue.clicked = ! fancy_color.fancy_color.Blue.clicked; @this.toggleFancyValue('fancy_color', 'Blue' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#68B4E9" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">{{__('diamondSearch.Blue')}}</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_color.Black.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="white" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_color.Black.clicked = ! fancy_color.fancy_color.Black.clicked; @this.toggleFancyValue('fancy_color', 'Black' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#000000" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">{{__('diamondSearch.Black')}}</span>
                </div>
            </fieldset>
        </div>
        <!-- 5 -->
        <div class="flex flex-col space-y-5 mt-6 md:mt-8">
            <label class="flex items-center mt-0.5">
                <p class="flex items-center space-x-2">
                    <span class="font-bold font-lato">{{trans('diamondSearch.Clarity')}}</span>
                    <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/clarity' }}" target="_blank">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                        </svg>
                    </a>
                </p>
            </label>
            <div class="flex flex-wrap md:justify-between items-center gap-0.5 md:gap-3">
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.FL.clicked = ! search_conditions.clarity.FL.clicked; @this.toggleValue('clarity', 'FL' )">
                    <span class="font-lato">FL</span>
                  <span class="border-2 mt-2 px-6 border-gray-300"
                        :class=" `${search_conditions.clarity.FL.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.IF.clicked = ! search_conditions.clarity.IF.clicked; @this.toggleValue('clarity', 'IF' )">
                  <span class="font-lato">IF</span>
                  <span class="border-2 mt-2 px-6 border-gray-300"
                        :class=" `${search_conditions.clarity.IF.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.VVS1.clicked = ! search_conditions.clarity.VVS1.clicked; @this.toggleValue('clarity', 'VVS1' )">
                  <span class="font-lato">VVS1</span>
                  <span class="border-2 mt-2 px-6 border-gray-300"
                        :class=" `${search_conditions.clarity.VVS1.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.VVS2.clicked = ! search_conditions.clarity.VVS2.clicked; @this.toggleValue('clarity', 'VVS2' )">
                  <span class="font-lato">VVS2</span>
                  <span class="border-2 mt-2 px-6 border-gray-300"
                        :class=" `${search_conditions.clarity.VVS2.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.VS1.clicked = ! search_conditions.clarity.VS1.clicked; @this.toggleValue('clarity', 'VS1' )">
                  <span class="font-lato">VS1</span>
                  <span class="border-2 mt-2 px-6 border-gray-300"
                        :class=" `${search_conditions.clarity.VS1.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.VS2.clicked = ! search_conditions.clarity.VS2.clicked; @this.toggleValue('clarity', 'VS2' )">
                  <span class="font-lato">VS2</span>
                  <span class="border-2 mt-2 px-6 border-gray-300"
                        :class=" `${search_conditions.clarity.VS2.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.SI1.clicked = ! search_conditions.clarity.SI1.clicked; @this.toggleValue('clarity', 'SI1' )">
                  <span class="font-lato">SI1</span>
                  <span class="border-2 mt-2 px-6 border-gray-300"
                        :class=" `${search_conditions.clarity.SI1.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.SI2.clicked = ! search_conditions.clarity.SI2.clicked; @this.toggleValue('clarity', 'SI2' )">
                  <span class="font-lato">SI2</span>
                  <span class="border-2 mt-2 px-6 border-gray-300"
                        :class=" `${search_conditions.clarity.SI2.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.I1.clicked = ! search_conditions.clarity.I1.clicked; @this.toggleValue('clarity', 'I1' )">
                  <span class="font-lato">I1</span>
                  <span class="border-2 mt-2 px-6 border-gray-300"
                        :class=" `${search_conditions.clarity.I1.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
            </div>
        </div>

        <!-- 6 -->
        <div x-show="search_conditions.color.Fancy.clicked" class="flex flex-col space-y-2 mt-6 md:mt-4">
            <label class="flex items-center mt-0.5 pt-4">
                <p class="flex items-center space-x-2">
                    <span class="font-bold font-lato">Intensity</span>
                    <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/color' }}" target="_blank">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                        </svg>
                    </a>
                </p>
            </label>
            <fieldset class="flex flex-wrap gap-1.5 md:gap-3">
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_intensity.Faint.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="intensity" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_intensity.Faint.clicked = ! fancy_color.fancy_intensity.Faint.clicked; @this.toggleFancyValue('fancy_intensity', 'Faint' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#FEFBC6" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">Faint</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_intensity['Very Light'].clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="intensity" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_intensity['Very Light'].clicked = ! fancy_color.fancy_intensity['Very Light'].clicked; @this.toggleFancyValue('fancy_intensity', 'Very Light' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#F9EF96" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">Very Light</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_intensity.Light.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="intensity" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_intensity.Light.clicked = ! fancy_color.fancy_intensity.Light.clicked; @this.toggleFancyValue('fancy_intensity', 'Light' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#F3E073" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">Light</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_intensity['Fancy Light'].clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="intensity" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_intensity['Fancy Light'].clicked = ! fancy_color.fancy_intensity['Fancy Light'].clicked; @this.toggleFancyValue('fancy_intensity', 'Fancy Light' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#ECD483" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">Fancy Light</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_intensity.Fancy.clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="intensity" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_intensity.Fancy.clicked = ! fancy_color.fancy_intensity.Fancy.clicked; @this.toggleFancyValue('fancy_intensity', 'Fancy' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#CE9F46" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">Fancy</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_intensity['Fancy Dark'].clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="intensity" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_intensity['Fancy Dark'].clicked = ! fancy_color.fancy_intensity['Fancy Dark'].clicked; @this.toggleFancyValue('fancy_intensity', 'Fancy Dark' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#B27F3B" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">Fancy Dark</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_intensity['Fancy Intense'].clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="intensity" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_intensity['Fancy Intense'].clicked = ! fancy_color.fancy_intensity['Fancy Intense'].clicked; @this.toggleFancyValue('fancy_intensity', 'Fancy Intense' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#976634" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">Fancy Intense</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_intensity['Fancy Vivid'].clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="intensity" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_intensity['Fancy Vivid'].clicked = ! fancy_color.fancy_intensity['Fancy Vivid'].clicked; @this.toggleFancyValue('fancy_intensity', 'Fancy Vivid' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#6D431C" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">Fancy Vivid</span>
                </div>
                <div class="flex flex-col items-center space-y-1">
                    <label class="relative border bg-white flex items-center justify-center h-11 w-11 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${fancy_color.fancy_intensity['Fancy Deep'].clicked?' bg-brown-light border-brown':''}`">
                        <input type="checkbox" name="intensity" value="1" class="sr-only"
                        x-on:click="fancy_color.fancy_intensity['Fancy Deep'].clicked = ! fancy_color.fancy_intensity['Fancy Deep'].clicked; @this.toggleFancyValue('fancy_intensity', 'Fancy Deep' )">
                        <svg width="37" height="37" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9855 4.5009C13.8442 4.5009 15.7028 4.50448 17.5619 4.49733C17.8582 4.49599 18.087 4.59115 18.2948 4.80114C19.4308 5.9467 20.5744 7.08466 21.7149 8.22575C22.0795 8.59077 22.0947 8.95758 21.7587 9.34539C18.7167 12.8571 15.6746 16.3684 12.6317 19.8792C12.2456 20.3247 11.7929 20.3229 11.4005 19.8707C9.20316 17.3388 7.00757 14.8055 4.81153 12.2723C3.96422 11.2952 3.11691 10.318 2.27004 9.34003C1.89555 8.90754 1.90985 8.56352 2.31742 8.15605C3.43689 7.03685 4.55904 5.91944 5.67449 4.79533C5.87648 4.5916 6.09859 4.49688 6.38728 4.49778C8.25307 4.50403 10.1193 4.5009 11.9855 4.5009ZM9.40695 9.504C10.2641 12.0761 11.1105 14.617 11.9569 17.1574C11.9739 17.1552 11.9909 17.1525 12.0079 17.1503C12.8547 14.6072 13.7016 12.0641 14.5538 9.504C12.8248 9.504 11.132 9.504 9.40695 9.504ZM15.1786 5.92838C15.4601 6.63028 15.7238 7.29822 16.0009 7.9608C16.0237 8.01576 16.1358 8.06312 16.2069 8.06357C17.262 8.07027 18.3167 8.06893 19.3718 8.06848C19.4111 8.06848 19.4504 8.0582 19.5291 8.04703C18.8226 7.34424 18.1442 6.66826 17.4631 5.99584C17.426 5.95921 17.3608 5.93151 17.3085 5.93151C16.6109 5.92704 15.9128 5.92838 15.1786 5.92838ZM4.42408 8.06893C5.59539 8.06893 6.70145 8.07071 7.80751 8.06312C7.86248 8.06267 7.94381 7.98672 7.9675 7.9273C8.22089 7.29375 8.46534 6.65709 8.71069 6.02042C8.71962 5.99674 8.71203 5.9668 8.71203 5.94089C8.68923 5.93598 8.67493 5.93017 8.66063 5.93017C8.20748 5.92927 7.75031 5.96591 7.30207 5.91855C6.76491 5.86181 6.38684 6.04142 6.03245 6.44442C5.54399 6.99977 4.99297 7.50017 4.42408 8.06893Z" fill="#000000" />
                        </svg>
                    </label>
                    <span class="text-xs w-11 text-center">Fnacy Deep</span>
                </div>
            </fieldset>
        </div>

        <!-- 7 -->
        <div x-show="!search_conditions.color.Fancy.clicked" class="flex flex-col space-y-5 mt-6 md:mt-8">
            <label class="flex items-center mt-0.5">
                <p class="flex items-center space-x-2">
                    <span class="font-bold font-lato">{{trans('diamondSearch.Cut')}}</span>
                    <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/cut' }}" target="_blank">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                        </svg>
                    </a>
                </p>
            </label>
            <div class="flex flex-wrap  md:justify-between items-center gap-0.5 md:gap-3">
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.cut.Excellent.clicked = ! search_conditions.cut.Excellent.clicked; @this.toggleValue('cut', 'Excellent' )">
                    <span class="font-lato">Excellent</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.cut.Excellent.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.cut['Very Good'].clicked = ! search_conditions.cut['Very Good'].clicked; @this.toggleValue('cut', 'Very Good' )">
                  <span class="font-lato">Very Good</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.cut['Very Good'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.cut.Good.clicked = ! search_conditions.cut.Good.clicked; @this.toggleValue('cut', 'Good' )">
                  <span class="font-lato">Good</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.cut.Good.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
            </div>
        </div>

        <!-- 8 -->
        <div class="flex flex-col space-y-5 mt-6 md:mt-8">
            <label class="flex items-center mt-0.5">
                <p class="flex items-center space-x-2">
                    <span class="font-bold font-lato">{{trans('diamondSearch.Fluorescence')}}</span>
                    <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/fluorescence' }}" target="_blank">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                        </svg>
                    </a>
                </p>
            </label>
            <div class="flex flex-wrap md:justify-between items-center gap-0.5 md:gap-3">
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence.None.clicked = ! search_conditions.fluorescence.None.clicked; @this.toggleValue('fluorescence', 'None' )">
                    <span class="font-lato">{{trans('diamondSearch.None')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence.None.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence.Faint.clicked = ! search_conditions.fluorescence.Faint.clicked; @this.toggleValue('fluorescence', 'Faint' )">
                  <span class="font-lato">{{trans('diamondSearch.Faint')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence.Faint.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence.Medium.clicked = ! search_conditions.fluorescence.Medium.clicked; @this.toggleValue('fluorescence', 'Medium' )">
                  <span class="font-lato">{{trans('diamondSearch.Medium')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence.Medium.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence.Strong.clicked = ! search_conditions.fluorescence.Strong.clicked; @this.toggleValue('fluorescence', 'Strong' )">
                  <span class="font-lato">{{trans('diamondSearch.Strong')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence.Strong.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence['Very Strong'].clicked = ! search_conditions.fluorescence['Very Strong'].clicked; @this.toggleValue('fluorescence', 'Very Strong' )">
                  <span class="font-lato">{{trans('diamondSearch.Very Strong')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence['Very Strong'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
            </div>
        </div>

        <!-- 9 -->
        <div class="flex flex-col space-y-5 mt-6 md:mt-8">
            <label class="flex items-center mt-0.5">
                <p class="flex items-center space-x-2">
                    <span class="font-bold font-lato">{{trans('diamondSearch.Polish')}}</span>
                    <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/polish' }}" target="_blank">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                        </svg>
                    </a>
                </p>
            </label>
            <div class="flex flex-wrap  md:justify-between items-center gap-0.5 md:gap-3">
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.polish.Excellent.clicked = ! search_conditions.polish.Excellent.clicked; @this.toggleValue('polish', 'Excellent' )">
                    <span class="font-lato">Excellent</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.polish.Excellent.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.polish['Very Good'].clicked = ! search_conditions.polish['Very Good'].clicked; @this.toggleValue('polish', 'Very Good' )">
                  <span class="font-lato">Very Good</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.polish['Very Good'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.polish.Good.clicked = ! search_conditions.polish.Good.clicked; @this.toggleValue('polish', 'Good' )">
                  <span class="font-lato">Good</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.polish.Good.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
            </div>
        </div>

        <!-- 9 -->
        <div class="hidden md:flex md:flex-col space-y-5 mt-6 md:mt-8">
            
        </div>

        <!-- 9 -->
        <div class="flex flex-col space-y-5 mt-6 md:mt-8">
            <label class="flex items-center mt-0.5">
                <p class="flex items-center space-x-2">
                    <span class="font-bold font-lato">{{trans('diamondSearch.Symmetry')}}</span>
                    <a href="/{{app()->getLocale() . '/education-diamond-grading/anatomy/symmetry' }}" target="_blank">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                        </svg>
                    </a>
                </p>
            </label>
            <div class="flex flex-wrap  md:justify-between items-center gap-0.5 md:gap-3">
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.symmetry.Excellent.clicked = ! search_conditions.symmetry.Excellent.clicked; @this.toggleValue('symmetry', 'Excellent' )">
                    <span class="font-lato">Excellent</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.symmetry.Excellent.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.symmetry['Very Good'].clicked = ! search_conditions.symmetry['Very Good'].clicked; @this.toggleValue('symmetry', 'Very Good' )">
                  <span class="font-lato">Very Good</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.symmetry['Very Good'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.symmetry.Good.clicked = ! search_conditions.symmetry.Good.clicked; @this.toggleValue('symmetry', 'Good' )">
                  <span class="font-lato">Good</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.symmetry.Good.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
            </div>
        </div>

    
    </div>




    
    <div class="pt-7">
        <a @click="showAdvance = !showAdvance" class="flex items-center gap-x-3 max-w-max focus:outline-none">
            <svg x-show="!showAdvance" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 0.9646C4.48 0.9646 0 5.4446 0 10.9646C0 16.4846 4.48 20.9646 10 20.9646C15.52 20.9646 20 16.4846 20 10.9646C20 5.4446 15.52 0.9646 10 0.9646ZM15 11.9646H11V15.9646H9V11.9646H5V9.9646H9V5.9646H11V9.9646H15V11.9646Z" fill="#9A7474" />
            </svg>
            <svg x-show="showAdvance" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5 0.869629C4.98 0.869629 0.5 5.34963 0.5 10.8696C0.5 16.3896 4.98 20.8696 10.5 20.8696C16.02 20.8696 20.5 16.3896 20.5 10.8696C20.5 5.34963 16.02 0.869629 10.5 0.869629ZM15.5 11.8696H11.5H9.5H5.5V9.86963H9.5H11.5H15.5V11.8696Z" fill="#9A7474" />
            </svg>
            <span class="text-brown font-bold">{{trans('diamondSearch.More Advance')}}</span>
        </a>
        <div x-show="showAdvance" class="flex md:flex-wrap flex-col space-y-3 xl:space-y-0 md:flex-row lg:space-x-10 bg-grey-03 px-2 md:px-7 py-5 md:py-7 mt-7">
            <div class="flex flex-col gap-3">
                <div class="flex flex-row items-center justify-between md:justify-start md:space-x-5">
                    <span class="text-sm md:text-base font-bold font-lato"
                            x-on:click="advance_search_conditions.crown_angle.clicked = false ;@this.setAdvanceToZero( 'crown_angle' )"
                            :class=" `${advance_search_conditions.crown_angle.clicked?'btn btn-yellow':''}` ">{{trans('diamondSearch.Crown Angle')}}</span>
                    <div class="flex max-w-max items-center justify-between md:justify-start space-x-3"
                        x-on:click="advance_search_conditions.crown_angle.clicked = true ;@this.addAdvanceSearch( 'crown_angle' )">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Min')}}
                                </span>
                            </div>
                            <input type="input" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.crown_angle.0">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Max')}}
                                </span>
                            </div>
                            <input type="input" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.crown_angle.1">
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-between md:justify-start md:space-x-5">
                    <span class="text-sm md:text-base font-bold font-lato"
                             x-on:click="advance_search_conditions.table_percent.clicked = false ;@this.setAdvanceToZero( 'table_percent' )"
                            :class=" `${advance_search_conditions.table_percent.clicked?'btn btn-yellow':''}` ">{{trans('diamondSearch.Table Percent')}}</span>
                    <div class="flex max-w-max items-center justify-between md:justify-start space-x-3"
                     x-on:click="advance_search_conditions.table_percent.clicked = true ;@this.addAdvanceSearch( 'table_percent' )">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Min')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.table_percent.0">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Max')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.table_percent.1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex flex-row items-center justify-between md:justify-start md:space-x-5">
                    <span class="text-sm md:text-base font-bold font-lato"
                            x-on:click="advance_search_conditions.parvilion_angle.clicked = false ;@this.setAdvanceToZero( 'parvilion_angle' )"
                            :class=" `${advance_search_conditions.parvilion_angle.clicked?'btn btn-yellow':''}` ">{{trans('diamondSearch.Parvilion Angle')}}</span>
                    <div class="flex max-w-max items-center justify-between md:justify-start space-x-3"
                            x-on:click="advance_search_conditions.parvilion_angle.clicked = true ;@this.addAdvanceSearch( 'parvilion_angle' )">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Min')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.parvilion_angle.0">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Max')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.parvilion_angle.1">
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-between md:justify-start md:space-x-5">
                    <span class="text-sm md:text-base font-bold font-lato"
                             x-on:click="advance_search_conditions.depth_percent.clicked = false ;@this.setAdvanceToZero( 'depth_percent' )"
                            :class=" `${advance_search_conditions.depth_percent.clicked?'btn btn-yellow':''}` ">{{trans('diamondSearch.Depth Percent')}}</span>
                    <div class="flex max-w-max items-center justify-between md:justify-start space-x-3"
                            x-on:click="advance_search_conditions.depth_percent.clicked = true ;@this.addAdvanceSearch( 'depth_percent' )">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Min')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.depth_percent.0">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Max')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.depth_percent.1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex flex-row items-center justify-between md:justify-start md:space-x-5">
                    <span class="text-sm md:text-base font-bold font-lato"
                             x-on:click="advance_search_conditions.length.clicked = false ;@this.setAdvanceToZero( 'length' )"
                            :class=" `${advance_search_conditions.length.clicked?'btn btn-yellow':''}` ">{{trans('diamondSearch.Length')}}</span>
                    <div class="flex max-w-max items-center justify-between md:justify-start space-x-3"
                            x-on:click="advance_search_conditions.length.clicked = true ;@this.addAdvanceSearch( 'length' )">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Min')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.length.0">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Max')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.length.1">
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-between md:justify-start md:space-x-5">
                    <span class="text-sm md:text-base font-bold font-lato"
                             x-on:click="advance_search_conditions.depth.clicked = false ;@this.setAdvanceToZero( 'depth' )"
                            :class=" `${advance_search_conditions.depth.clicked?'btn btn-yellow':''}` ">{{trans('diamondSearch.Depth')}}</span>
                    <div class="flex max-w-max items-center justify-between md:justify-start space-x-3"
                            x-on:click="advance_search_conditions.depth.clicked = true ;@this.addAdvanceSearch( 'depth' )">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Min')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.depth.0">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Max')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.depth.1">
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-between md:justify-start md:space-x-5">
                    <span class="text-sm md:text-base font-bold font-lato"
                             x-on:click="advance_search_conditions.width.clicked = false ;@this.setAdvanceToZero( 'width' )"
                            :class=" `${advance_search_conditions.width.clicked?'btn btn-yellow':''}` ">{{trans('diamondSearch.Width')}}</span>
                    <div class="flex max-w-max items-center justify-between md:justify-start space-x-3"
                            x-on:click="advance_search_conditions.width.clicked = true ;@this.addAdvanceSearch( 'width' )">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Min')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.width.0">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-black opacity-50 text-sm md:text-base">
                                    {{trans('diamondSearch.Max')}}
                                </span>
                            </div>
                            <input type="text" 
                                    class="focus:border-brown block w-24 md:w-28 py-1.5 pl-12 border border-gray-300" 
                                    aria-describedby="min-price-currency"
                                    wire:model.debounce.500ms="fetchData.width.1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Apply button for mobile  -->
    <a class="flex md:hidden items-center justify-center w-full mt-7 py-2 bg-brown hover:bg-white text-white hover:text-brown border border-brown transition ease-in-out duration-500" @click="applyFilter = false; mobileUpdateInputs()">
        <span class="text-white hover:text-brown font-bold font-lato tracking-widest uppercase"  >{{trans('weddingRing.Apply')}}</span>
    </a>
    <span class="pt-4 md:pt-0"></span>
</form>
    
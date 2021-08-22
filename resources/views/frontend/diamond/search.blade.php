<div id="diamondHeight" class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">
      <!-- Shop Section  -->
    <div >
  <!-- Choose/Filter -->
  <div x-data="desktopSliders()" x-init="init()"  :class="{'absolute -top-0 left-0 z-50 w-full h-full bg-black bg-opacity-30 pt-5 md:pt-0 px-4 md:px-0' : applyFilter,}" class="flex flex-col space-y-3">
          <div x-show="applyFilter == false" class="flex items-center justify-between">
              <button @click="applyFilter = !applyFilter" class="flex items-center space-x-3 text-brown lg:hidden focus:outline-none fixed top-1/3 -top-10 z-10 bg-white px-4 py-2 rounded-lg filter-shadow" id="filter-icon">
                  <svg class="fill-current" width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M19.2176 1.67592H7.30206C6.97447 0.702955 6.05418 0 4.97216 0C3.89014 0 2.96985 0.702955 2.64226 1.67592H0.782336C0.350278 1.67592 0 2.0262 0 2.45825C0 2.89031 0.350278 3.24059 0.782336 3.24059H2.64231C2.9699 4.21355 3.89019 4.91651 4.97221 4.91651C6.05423 4.91651 6.97452 4.21355 7.30211 3.24059H19.2177C19.6497 3.24059 20 2.89031 20 2.45825C20 2.0262 19.6497 1.67592 19.2176 1.67592ZM4.97216 3.35184C4.47944 3.35184 4.07858 2.95097 4.07858 2.45825C4.07858 1.96554 4.47944 1.56467 4.97216 1.56467C5.46487 1.56467 5.86574 1.96554 5.86574 2.45825C5.86574 2.95097 5.46487 3.35184 4.97216 3.35184ZM19.2176 8.37964H17.3576C17.03 7.40667 16.1097 6.70372 15.0277 6.70372C13.9458 6.70372 13.0255 7.40667 12.6979 8.37964H0.782336C0.350278 8.37964 0 8.72992 0 9.16197C0 9.59403 0.350278 9.94431 0.782336 9.94431H12.6979C13.0255 10.9173 13.9458 11.6202 15.0278 11.6202C16.1097 11.6202 17.0301 10.9173 17.3577 9.94431H19.2177C19.6497 9.94431 20 9.59403 20 9.16197C20 8.72992 19.6497 8.37964 19.2176 8.37964ZM15.0278 10.0556C14.5351 10.0556 14.1342 9.65469 14.1342 9.16197C14.1342 8.66926 14.5351 8.26839 15.0278 8.26839C15.5205 8.26839 15.9214 8.66926 15.9214 9.16197C15.9214 9.65469 15.5205 10.0556 15.0278 10.0556ZM10.6539 15.0833H19.2176C19.6497 15.0833 20 15.4336 20 15.8657C20 16.2977 19.6497 16.648 19.2177 16.648H10.6539C10.3264 17.621 9.40607 18.3239 8.32405 18.3239C7.24203 18.3239 6.32174 17.621 5.99415 16.648H0.782336C0.350278 16.648 0 16.2977 0 15.8657C0 15.4336 0.350278 15.0833 0.782336 15.0833H5.99415C6.32174 14.1104 7.24203 13.4074 8.32405 13.4074C9.40607 13.4074 10.3264 14.1104 10.6539 15.0833ZM7.43047 15.8657C7.43047 16.3584 7.83134 16.7593 8.32405 16.7593C8.81676 16.7593 9.21763 16.3584 9.21763 15.8657C9.21763 15.3729 8.81676 14.9721 8.32405 14.9721C7.83134 14.9721 7.43047 15.373 7.43047 15.8657Z"/>
                  </svg>
                  <span class="font-bold">{{__('weddingRing.Filter')}}</span>    
              </button>
              <div class="flex items-center space-x-5">
                  <div class="md:hidden flex items-center space-x-2">
                      <input type="checkbox" name="Starred" id="Starred">
                      <label for="Starred" class="font-bold">
                          Starred
                      </label>
                  </div>
                  <div class="md:hidden flex items-center space-x-2">
                      <input type="checkbox" name="HK_Stock" id="HK_Stock">
                      <label for="HK_Stock" class="font-bold">
                          HK Stock
                      </label>
                  </div>
              </div>
          </div>

          <form action="#" :class="{'hidden lg:flex' : !applyFilter, 'flex lg:hidden fixed overflow-y-scroll h-5/6 top-10 left-0 z-50 bg-white pt-5 md:pt-0 pb-10 md:pb-0 px-4 md:px-0' : applyFilter,}" class="flex-col space-y-7 font-lato" @click.away="applyFilter = false">
              <div :class="{'hidden lg:grid' : !applyFilter, 'grid lg:hidden' : applyFilter,}" class="grid md:grid-cols-2 space-y-5 md:space-y-0 md:space-x-16">
                  <div class="flex md:hidden items-center space-x-5 justify-between">
                      <button @click="applyFilter = false" class="flex-shrink-0 focus:outline-none">
                          <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                          </svg>                                            
                      </button>
                       <span class="text-lg font-suranna text-center">
                         {{__('diamondSearch.DIAMOND')}}{{__('weddingRing.Filter')}}
                        </span>
                        <a class="text-brown underline" wire:click="resetAll()">{{__('weddingRing.Clear')}}</a>
                  </div>
                  <!-- Column 1  -->
                  <div  class="flex-col lg:flex-row space-y-7">
                      <div class="flex flex-col space-y-5">
                          <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:justify-between space-x-1">
                              <p class="flex items-center space-x-1">
                                  <span class="font-bold font-lato">{{trans('diamondSearch.Price')}}</span>
                              </p>
                              <div class="flex max-w-max items-center justify-between md:justify-start space-x-3 md:space-x-5">
                                  <div>
                                      <div class="relative">
                                          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                              <span class="text-black opacity-50">
                                                  HK$
                                              </span>
                                          </div>
                                          <input type="text" 
                                                 class="focus:border-brown block w-36 py-1.5 pl-12 border border-gray-300" 
                                                 aria-describedby="min-price-currency"
                                                  @input="expUpdateMinThumb('price')"
                                                  @keyup.debounce.500ms="updateInput('priceMin','mininputjs','price')"
                                                  x-model="sliders.price.mininputjs"
                                                  placeholder="HKD$"
                                                 >
                                      </div>
                                  </div>
                                  <span class="font-bold font-lato">-</span>
                                  <div>
                                      <div class="relative">
                                          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                              <span class="text-black opacity-50">
                                                  HK$
                                              </span>
                                          </div>
                                          <input type="text"
                                                class="focus:border-brown block w-36 py-1.5 pl-12 border border-gray-300" 
                                                aria-describedby="max-price-currency"
                                                @input="expUpdateMaxThumb('price')" 
                                                 @keyup.debounce.500ms="updateInput('priceMax','maxinputjs','price')"
                                                 x-model="sliders.price.maxinputjs" 
                                                 placeholder="HKD$"
                                                >
                                      </div>
                                  </div>
                              </div>
                          </label>
                          <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full px-2">
                          <div>
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
  
                      <div class="flex flex-col space-y-2">
                          <label class="flex items-center space-x-2">
                              <span class="font-bold font-lato">{{__('diamondSearch.Shape')}}</span>
                              <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                              </svg>
                          </label>
                          <fieldset class="flex flex-wrap items-center gap-3">
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.round.clicked?'bg-brown-light border-brown':''}`"
                                     >
                                  <input type="checkbox" name="position" value="1" class="sr-only" 
                                          x-on:click="search_conditions.shape.round.clicked = ! search_conditions.shape.round.clicked; @this.toggleValue('shape', 'round' )" >
                                  <div>
                                      <img src="/assets/images/image 22.png" alt="shape image">
                                  </div>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.pear.clicked?'bg-brown-light border-brown':''}`"
                                      >
                                  <input type="checkbox" name="position" value="1" class="sr-only" 
                                         x-on:click="search_conditions.shape.pear.clicked = ! search_conditions.shape.pear.clicked; @this.toggleValue('shape', 'pear' )">
                                  <div>
                                      <img src="/assets/images/image 22-1.png" alt="shape image-1">
                                  </div>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.emerald.clicked?'bg-brown-light border-brown':''}`">
                                  <input type="checkbox" name="position" value="1" class="sr-only" 
                                         x-on:click="search_conditions.shape.emerald.clicked = ! search_conditions.shape.emerald.clicked; @this.toggleValue('shape', 'emerald' )" >
                                  <div>
                                      <img src="/assets/images/image 22-2.png" alt="shape image-2">
                                  </div>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.princess.clicked?'bg-brown-light border-brown':''}`">
                                  <input type="checkbox" name="position" value="1" class="sr-only"
                                        x-on:click="search_conditions.shape.princess.clicked = ! search_conditions.shape.princess.clicked; @this.toggleValue('shape', 'princess' )">
                                  <div>
                                      <img src="/assets/images/image 22-3.png" alt="shape image-3">
                                  </div>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.cushion.clicked?'bg-brown-light border-brown':''}`">
                                  <input type="checkbox" name="position" value="1" class="sr-only"
                                         x-on:click="search_conditions.shape.cushion.clicked = ! search_conditions.shape.cushion.clicked; @this.toggleValue('shape', 'cushion' )" >
                                  <div>
                                      <img src="/assets/images/image 22-4.png" alt="shape image-4">
                                  </div>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.asscher.clicked?'bg-brown-light border-brown':''}`">
                                  <input type="checkbox" name="position" value="1" class="sr-only" 
                                        x-on:click="search_conditions.shape.asscher.clicked = ! search_conditions.shape.asscher.clicked; @this.toggleValue('shape', 'asscher' )">
                                  <div>
                                      <img src="/assets/images/image 22-5.png" alt="shape image-5">
                                  </div>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.heart.clicked?'bg-brown-light border-brown':''}`">
                                  <input type="checkbox" name="position" value="1" class="sr-only" 
                                        x-on:click="search_conditions.shape.heart.clicked = ! search_conditions.shape.heart.clicked; @this.toggleValue('shape', 'heart' )" >
                                  <div>
                                      <img src="/assets/images/image 22-6.png" alt="shape image-6">
                                  </div>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.radiant.clicked?'bg-brown-light border-brown':''}`">
                                  <input type="checkbox" name="position" value="1" class="sr-only" 
                                         x-on:click="search_conditions.shape.radiant.clicked = ! search_conditions.shape.radiant.clicked; @this.toggleValue('shape', 'radiant' )" >
                                  <div>
                                      <img src="/assets/images/image 22-7.png" alt="shape image-7">
                                  </div>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.oval.clicked?'bg-brown-light border-brown':''}`">
                                  <input type="checkbox" name="position" value="1" class="sr-only" 
                                         x-on:click="search_conditions.shape.oval.clicked = ! search_conditions.shape.oval.clicked; @this.toggleValue('shape', 'oval' )">
                                  <div>
                                      <img src="/assets/images/image 23.png" alt="shape image-8">
                                  </div>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center w-12 md:h-20 md:w-20 cursor-pointer hover:border-brown hover:bg-brown-light" 
                                      :class=" `${search_conditions.shape.marquise.clicked?'bg-brown-light border-brown':''}`">
                                  <input type="checkbox" name="position" value="1" class="sr-only"
                                         x-on:click="search_conditions.shape.marquise.clicked = ! search_conditions.shape.marquise.clicked; @this.toggleValue('shape', 'marquise' )" >
                                  <div>
                                      <img src="/assets/images/image 23-1.png" alt="shape image-9">
                                  </div>
                              </label>
                          </fieldset>
                      </div>
  
                      <div class="flex flex-col space-y-5">
                          <label class="flex items-center">
                              <p class="flex items-center space-x-2">
                                  <span class="font-bold font-lato">{{trans('diamondSearch.Clarity')}}</span>
                                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                  </svg>
                              </p>
                          </label>
                          <div class="flex flex-wrap  md:justify-around items-center gap-0.5 md:gap-3">
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.FL.clicked = ! search_conditions.clarity.FL.clicked; @this.toggleValue('clarity', 'FL' )">
                                  <span class="font-lato">FL</span>
                                  <span class="border-2 mt-2 px-6 border-gray-300"
                                        :class=" `${search_conditions.clarity.FL.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.IF.clicked = ! search_conditions.clarity.IF.clicked; @this.toggleValue('clarity', 'IF' )">
                                  <span class="font-lato">IF</span>
                                  <span class="border-2 mt-2 px-6 border-gray-300"
                                        :class=" `${search_conditions.clarity.IF.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.VVS1.clicked = ! search_conditions.clarity.VVS1.clicked; @this.toggleValue('clarity', 'VVS1' )">
                                  <span class="font-lato">VVS1</span>
                                  <span class="border-2 mt-2 px-6 border-gray-300"
                                        :class=" `${search_conditions.clarity.VVS1.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.VVS2.clicked = ! search_conditions.clarity.VVS2.clicked; @this.toggleValue('clarity', 'VVS2' )">
                                  <span class="font-lato">VVS2</span>
                                  <span class="border-2 mt-2 px-6 border-gray-300"
                                        :class=" `${search_conditions.clarity.VVS2.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.VS1.clicked = ! search_conditions.clarity.VS1.clicked; @this.toggleValue('clarity', 'VS1' )">
                                  <span class="font-lato">VS1</span>
                                  <span class="border-2 mt-2 px-6 border-gray-300"
                                        :class=" `${search_conditions.clarity.VS1.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.VS2.clicked = ! search_conditions.clarity.VS2.clicked; @this.toggleValue('clarity', 'VS2' )">
                                  <span class="font-lato">VS2</span>
                                  <span class="border-2 mt-2 px-6 border-gray-300"
                                        :class=" `${search_conditions.clarity.VS2.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.SI1.clicked = ! search_conditions.clarity.SI1.clicked; @this.toggleValue('clarity', 'SI1' )">
                                  <span class="font-lato">SI1</span>
                                  <span class="border-2 mt-2 px-6 border-gray-300"
                                        :class=" `${search_conditions.clarity.SI1.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.SI2.clicked = ! search_conditions.clarity.SI2.clicked; @this.toggleValue('clarity', 'SI2' )">
                                  <span class="font-lato">SI2</span>
                                  <span class="border-2 mt-2 px-6 border-gray-300"
                                        :class=" `${search_conditions.clarity.SI2.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.I1.clicked = ! search_conditions.clarity.I1.clicked; @this.toggleValue('clarity', 'I1' )">
                                  <span class="font-lato">I1</span>
                                  <span class="border-2 mt-2 px-6 border-gray-300"
                                        :class=" `${search_conditions.clarity.I1.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                          </div>
                      </div>

                      <div class="flex flex-col space-y-5">
                          <label class="flex items-center">
                              <p class="flex items-center space-x-2">
                                  <span class="font-bold font-lato">{{trans('diamondSearch.Clarity')}}</span>
                                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                  </svg>
                              </p>
                          </label>
                          <div class="flex flex-wrap  md:justify-around items-center gap-0.5 md:gap-3">
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence.None.clicked = ! search_conditions.fluorescence.None.clicked; @this.toggleValue('fluorescence', 'None' )">
                                  <span class="font-lato">None</span>
                                  <span class="border-2 mt-2 px-12 border-gray-300"
                                        :class=" `${search_conditions.fluorescence.None.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence.Faint.clicked = ! search_conditions.fluorescence.Faint.clicked; @this.toggleValue('fluorescence', 'Faint' )">
                                  <span class="font-lato">Faint</span>
                                  <span class="border-2 mt-2 px-12 border-gray-300"
                                        :class=" `${search_conditions.fluorescence.Faint.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence.Medium.clicked = ! search_conditions.fluorescence.Medium.clicked; @this.toggleValue('fluorescence', 'Medium' )">
                                  <span class="font-lato">Medium</span>
                                  <span class="border-2 mt-2 px-12 border-gray-300"
                                        :class=" `${search_conditions.fluorescence.Medium.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence.Strong.clicked = ! search_conditions.fluorescence.Strong.clicked; @this.toggleValue('fluorescence', 'Strong' )">
                                  <span class="font-lato">Strong</span>
                                  <span class="border-2 mt-2 px-12 border-gray-300"
                                        :class=" `${search_conditions.fluorescence.Strong.clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                              <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence['Very Strong'].clicked = ! search_conditions.fluorescence['Very Strong'].clicked; @this.toggleValue('fluorescence', 'Very Strong' )">
                                  <span class="font-lato">Very Strong</span>
                                  <span class="border-2 mt-2 px-12 border-gray-300"
                                        :class=" `${search_conditions.fluorescence['Very Strong'].clicked?'bg-brown-light border-brown':''}`"
                                     ></span>
                              </div>
                          </div>
                      </div>

                      <div class="flex flex-row flex-wrap items-center divide-x gap-3 md:gap-0 md:space-x-3">
                          <div class="relative flex items-center space-x-3">
                              <select id="Polish" name="Polish" class="block bg-white w-28 py-3 px-2 text-black border border-opacity-20 focus:outline-none">
                                  <option>Polish</option>
                                  <option>Excellent</option>
                                  <option>Very Good</option>
                                  <option>Good</option>
                              </select>
                              <svg class="text-grey-dark" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                              </svg>
                          </div>
                          <div class="relative flex items-center space-x-3 md:pl-3">
                              <select id="Symmetry" name="Symmetry" class="block bg-white w-28 py-3 px-2 text-black border border-opacity-20 focus:outline-none">
                                  <option>Symmetry</option>
                                  <option>Excellent</option>
                                  <option>Very Good</option>
                                  <option>Good</option>
                              </select>
                              <svg class="text-grey-dark" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                              </svg>
                          </div>
                          <div class="relative flex items-center space-x-3 md:pl-3">
                              <select id="Symmetry" name="Symmetry" class="block bg-white w-36 py-3 px-2 text-black border border-opacity-20 focus:outline-none">
                                  <option>Fluorescence</option>
                                  <option>None</option>
                                  <option>Faint</option>
                                  <option>Medium</option>
                                  <option>Strong</option>
                                  <option>Very Strong</option>
                              </select>
                              <svg class="text-grey-dark" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                              </svg>
                          </div>
                      </div>
                  </div>
                  <!-- Column 2  -->
                  <div  class="flex-col lg:flex-row space-y-7">
                      <div x-data="caret()" x-init="mintrigger(); maxtrigger()" class="flex flex-col space-y-5">
                          <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:justify-between space-x-1">
                              <p class="flex items-center space-x-2">
                                  <span class="font-bold font-lato">Carat</span>
                                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                  </svg>
                              </p>
                              <div class="flex max-w-max items-center justify-between md:justify-start space-x-3 md:space-x-5">
                                  <div>
                                      <div class="relative">
                                          <input type="text" name="min-price" id="min-price" value="0.3" class="focus:border-brown block w-12 py-1.5 text-center border border-gray-300" aria-describedby="min-price-currency">
                                      </div>
                                  </div>
                                  <span class="font-bold font-lato">-</span>
                                  <div>
                                      <div class="relative">
                                          <input type="text" name="max-price" id="max-price" value="20" class="focus:border-brown block w-12 py-1.5 text-center border border-gray-300" aria-describedby="max-price-currency">
                                      </div>
                                  </div>
                              </div>
                          </label>
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
                              </div>
                          </div>    
                          </div>
                          <div class="flex flex-wrap items-center gap-3">
                              <div class="bg-grey-01 py-2 px-5 text-center">
                                  <span class="font-lato">0.3 - 0.49</span>
                              </div>
                              <div class="bg-grey-01 py-2 px-5 text-center">
                                  <span class="font-lato">0.5 - 0.79</span>
                              </div>
                              <div class="bg-grey-01 py-2 px-5 text-center">
                                  <span class="font-lato">0.8 - 0.99</span>
                              </div>
                              <div class="bg-grey-01 py-2 px-5 text-center">
                                  <span class="font-lato">1.0-1.19</span>
                              </div>
                              <div class="bg-grey-01 py-2 px-5 text-center">
                                  <span class="font-lato">1.2 - 1.49</span>
                              </div>
                              <div class="bg-grey-01 py-2 px-5 text-center">
                                  <span class="font-lato">1.5 - 1.99</span>
                              </div>
                              <div class="bg-grey-01 py-2 px-5 text-center">
                                  <span class="font-lato">2.0 - 2.99</span>
                              </div>
                              <div class="bg-grey-01 py-2 px-5 text-center">
                                  <span class="font-lato">3.0 Up</span>
                              </div>
                          </div>
                      </div>

                      <div x-data="{tab : 'white'}" class="flex flex-col space-y-2">
                          <label class="flex items-center space-x-2">
                              <span :class="{'text-brown font-bold border-b-2 border-brown' : tab == 'white'}" @click="tab = 'white'" class="text-grey font-lato cursor-pointer">White</span>
                              <span :class="{'text-brown font-bold border-b-2 border-brown' : tab == 'fancy'}" @click="tab = 'fancy'" class="text-grey font-lato cursor-pointer">Fancy</span>
                              <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                              </svg>
                          </label>
                          <fieldset x-show="tab == 'white'" class="flex flex-wrap items-center gap-3">
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>D</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>E</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>F</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>G</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>H</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>I</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>K</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>L</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>M</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>N</span>
                              </label>
                          </fieldset>
                          <fieldset x-show="tab == 'fancy'" class="flex flex-wrap items-center gap-3">
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>A</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>B</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>C</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>D</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>E</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>F</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>G</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>H</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>I</span>
                              </label>
                              <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                                  <input type="checkbox" name="white" value="1" class="sr-only">
                                  <span>J</span>
                              </label>
                          </fieldset>
                      </div>

                      <div x-data="cut()" x-init="mintrigger(); maxtrigger()" class="flex flex-col space-y-5">
                          <label class="flex items-center mt-0.5 pt-4">
                              <p class="flex items-center space-x-2">
                                  <span class="font-bold font-lato">Cut</span>
                                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                  </svg>
                              </p>
                          </label>
                          <div class="flex max-w-max md:max-w-full justify-around items-center gap-3">
                              <div class="px-5 text-center">
                                  <span class="font-lato">Very Good</span>
                              </div>
                              <div class="px-5 text-center">
                                  <span class="font-lato">Excellent</span>
                              </div>
                              <div class="px-5 text-center">
                                  <span class="font-lato">Good</span>
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
                                      <div class="flex items-center justify-around absolute top-0 z-40 left-11 w-full h-2">
                                          <div class="w-0.5 h-2 bg-white"></div>
                                          <div class="w-0.5 h-2 bg-white md:mr-20"></div>
                                      </div>
                                  </div>
                              </div>    
                          </div>
                          
                      </div>
                  </div>
                  <button class="flex md:hidden items-center justify-center w-full py-2 bg-brown hover:bg-white text-white hover:text-brown border border-brown transition ease-in-out duration-500">
                      <span class="text-white hover:text-brown font-bold font-lato tracking-widest uppercase">Apply</span>
                  </button>
              </div>
          </form>
          <div x-data="advanceSearch()" class="pt-7">
              <button @click="showAdvance = !showAdvance" class="flex items-center gap-x-3 max-w-max focus:outline-none">
                  <svg x-show="!showAdvance" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10 0.9646C4.48 0.9646 0 5.4446 0 10.9646C0 16.4846 4.48 20.9646 10 20.9646C15.52 20.9646 20 16.4846 20 10.9646C20 5.4446 15.52 0.9646 10 0.9646ZM15 11.9646H11V15.9646H9V11.9646H5V9.9646H9V5.9646H11V9.9646H15V11.9646Z" fill="#9A7474"/>
                  </svg>    
                  <svg x-show="showAdvance" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10.5 0.869629C4.98 0.869629 0.5 5.34963 0.5 10.8696C0.5 16.3896 4.98 20.8696 10.5 20.8696C16.02 20.8696 20.5 16.3896 20.5 10.8696C20.5 5.34963 16.02 0.869629 10.5 0.869629ZM15.5 11.8696H11.5H9.5H5.5V9.86963H9.5H11.5H15.5V11.8696Z" fill="#9A7474"/>
                  </svg>                          
                  <span class="text-brown font-bold">Advanced Option</span>
              </button>
              <div x-show="showAdvance" class="flex md:flex-wrap flex-col space-y-3 xl:space-y-0 md:flex-row lg:space-x-10 bg-grey-03 p-7 mt-7">
                  <div class="flex flex-col gap-3">
                      <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-5">
                          <span class="font-bold font-lato">Crown Angle</span>
                          <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Min
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="30" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Max
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="60" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                          </div>
                      </label>
                      <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-4">
                          <span class="font-bold font-lato">Table Percent</span>
                          <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Min
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Max
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                          </div>
                      </label>
                  </div>
                  <div class="flex flex-col gap-3">
                      <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-4">
                          <span class="font-bold font-lato">Parvilion Angle</span>
                          <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Min
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Max
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                          </div>
                      </label>
                      <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-5">
                          <span class="font-bold font-lato">Depth Percent</span>
                          <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Min
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Max
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                          </div>
                      </label>
                  </div>
                  <div class="flex flex-col gap-3">
                      <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-4">
                          <span class="font-bold font-lato">Length</span>
                          <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Min
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Max
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                          </div>
                      </label>
                      <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-5">
                          <span class="font-bold font-lato">Depth</span>
                          <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Min
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Max
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                          </div>
                      </label>
                      <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-5">
                          <span class="font-bold font-lato">Width</span>
                          <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Min
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-black opacity-50">
                                          Max
                                      </span>
                                  </div>
                                  <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                              </div>
                          </div>
                      </label>
                  </div>
              </div>
          </div>
      </div>

      <!-- Filter Results  -->
      <div class="flex flex-col space-y-5 items-center pb-0 md:pb-7 py-7 border-t mt-5">
        <div class="flex flex-col items-center ">
          <div class="flex w-full md:items-center justify-between">
              <div class="flex flex-wrap items-center gap-3">
                @foreach($tags as  $k => $conditions)
                  @if(in_array($k,['price','weight']))
                    @if($k == 'price')
                      @if( $conditions[0] != 1000 || $conditions[1] != 50000000  )
                        <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                            <button wire:click="clearTags('{{$k}}')">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                    <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                    <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0">
                                    <rect width="20" height="20" fill="white"></rect>
                                    </clipPath>
                                    </defs>
                                </svg>    
                            </button>
                            <span>{{__('diamondSearch.' . $k)}}:
                                  @foreach($conditions as  $key => $data)
                                    ${{$data}}
                                    {{count($conditions)-1 == $key?'':'-'}}
                                  @endforeach
                            </span>
                        </div>
                      @endif
                    @endif
                    @if($k == 'weight')
                      @if( $conditions[0] != 0.3 || $conditions[1] != 20  )
                        <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                            <button wire:click="clearTags('{{$k}}')">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                    <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                    <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0">
                                    <rect width="20" height="20" fill="white"></rect>
                                    </clipPath>
                                    </defs>
                                </svg>    
                            </button>
                            <span>{{__('diamondSearch.' . $k)}}:
                                  @foreach($conditions as  $key => $data)
                                    {{$data}}
                                    {{count($conditions)-1 == $key?'':'-'}}
                                  @endforeach
                            </span>
                        </div>
                      @endif
                    @endif
                  @endif

                  @if(!in_array($k,['price','weight']))
                    @if(is_object($conditions))
                      @php($conditions = (array)$conditions)
                    @endif

                    @if(is_array($conditions))
                      @if(count($conditions))
                      @php($conditions = array_values($conditions))
                        @if(current($conditions) != 0)
                          <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5" :class="{'flex md:hidden' : tagShowMore, 'hidden md:flex' : !tagShowMore}">
                              <button wire:click="clearTags('{{$k}}')">
                                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <g clip-path="url(#clip0)">
                                      <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                      <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                      </g>
                                      <defs>
                                      <clipPath id="clip0">
                                      <rect width="20" height="20" fill="white"></rect>
                                      </clipPath>
                                      </defs>
                                  </svg>    
                              </button>
                              <span>{{__('diamondSearch.' . $k)}}:
                                    @foreach($conditions as  $key => $data)
                                      {{$data}}
                                      {{count($conditions)-1 == $key?'':', '}}
                                    @endforeach
                              </span>
                          </div>
                        @endif
                      @endif
                    @endif
                  @endif  

                @endforeach
              </div>
              <div class="flex flex-shrink-0">
                  <a class="text-brown underline" href="#" wire:click="resetAll()">{{__('engagementRing.Clear')}}</a>
              </div>
            </div>
          </div>
          
              

          <a @click.prevent="tagShowMore = !tagShowMore" class="flex items-center font-bold text-brown space-x-2" href="#">
              <span x-show="tagShowMore">View less</span>
              <span x-show="!tagShowMore">View More</span>
              <svg :class="{'rotate-0': tagShowMore, ' rotate-180': !tagShowMore}" class="transform" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1.41 7.41L6 2.83L10.59 7.41L12 6L6 0L0 6L1.41 7.41Z" fill="#9A7474"/>
              </svg>                    
          </a>

          <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row w-full md:items-center md:justify-between pt-10">
              <span class="text-sm">Total: 179948 results</span>
              <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:items-center md:space-x-16">
                  <div class="hidden md:flex items-center space-x-2">
                      <input type="checkbox" name="Starred" id="Starred">
                      <label for="Starred" class="font-bold">
                          Starred
                      </label>
                  </div>
                  <div class="hidden md:flex items-center space-x-2">
                      <input type="checkbox" name="HK_Stock" id="HK_Stock">
                      <label for="HK_Stock" class="font-bold">
                          HK Stock
                      </label>
                  </div>
                  <div class="flex space-x-1 md:max-w-max border-b">
                      <label class="flex-shrink-0">
                          Sort By: 
                      </label>
                      <select id="Sort" name="Sort" class="block w-full md:w-52 pb-1 text-black focus:outline-none">
                          <option>Best match</option>
                          <option>Price - high to low</option>
                          <option>Price - low to high</option>
                          <option>Carat - high to low</option>
                          <option>Carat - low to high</option>
                          <option>Color - high to low</option>
                          <option>Color - low to high</option>
                          <option>Cut - high to low</option>
                          <option>Cut - low to high</option>
                          <option>Polish - high to low</option>
                          <option>Polish - low to high</option>
                          <option>Symmetry - high to low</option>
                          <option>Symmetry - low to high</option>
                          <option>Fluorescence - high to low</option>
                          <option>Fluorescence - low to high</option>
                      </select>
                  </div>
              </div>
          </div>
      </div>
      <!-- Products -->
      <div class="relative grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 w-full xl:grid-cols-4 gap-3 md:gap-7 md:items-center py-10 2xl:py-20 2xl:pb-10">
          <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
              <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                  <img class="" src="/assets/images/diamond.png" alt="Diamond 1">
                  <div class="absolute top-1.5 left-4 tags flex flex-wrap items-center gap-1.5">
                      <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                          Starred
                      </p>
                      <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                          HK Stock
                      </p>
                  </div>
              </div>
              <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                  <p class="flex items-center space-x-1 font-suranna text-gold-light">
                      <span class="text-base md:text-xl">HKD</span>
                      <span class="text-xl md:text-4xl">$3,600</span>
                  </p>
                  <div class="flex items-center justify-center space-x-2">
                      <div class="w-4 h-4">
                          <img src="/assets/images/shape-22.png" alt="">
                      </div>
                      <span class="text-sm font-lato">Round</span>
                  </div>
                  <div class="flex items-center justify-center">
                      <img src="/assets/images/big-card.png" alt="">
                  </div>
              </div>
              <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                  <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                      <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                      <p class="text-xs md:text-sm text-center">0.31</p>
                  </div>
                  <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                      <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                      <p class="text-xs md:text-sm text-center">J</p>
                  </div>
                  <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                      <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                      <p class="text-xs md:text-sm text-center">FL</p>
                  </div>
                  <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                      <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                      <p class="text-xs md:text-sm text-center">Ex</p>
                  </div>
              </div>
              <div class="flex flex-col px-2 md:px-0">
                  <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                      <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                      <p class="text-xs md:text-sm">Excellent</p>
                  </div>
                  <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                      <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                      <p class="text-xs md:text-sm">Excellent</p>
                  </div>
                  <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                      <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                      <p class="text-xs md:text-sm">None</p>
                  </div>
              </div>
          </div>
  </div>
</div>


<div>  
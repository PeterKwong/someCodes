<div >
	<div id="totalHeigh" class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">

	 <!-- Choose/Filter -->
    <div x-data="{ applyFilter : false }" :class="{'absolute -top-0 left-0 z-50 w-full h-full bg-black bg-opacity-30 pt-5 md:pt-0 px-4 md:px-0' : applyFilter,}" class="flex flex-col space-y-3">
          <div x-show="applyFilter == false" class="flex items-center justify-between">
              <button @click="applyFilter = !applyFilter" class="flex items-center space-x-3 text-brown lg:hidden focus:outline-none fixed top-1/3 -top-10 z-10 bg-white px-4 py-2 rounded-lg filter-shadow" id="filter-icon">
                  <svg class="fill-current" width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M19.2176 1.67592H7.30206C6.97447 0.702955 6.05418 0 4.97216 0C3.89014 0 2.96985 0.702955 2.64226 1.67592H0.782336C0.350278 1.67592 0 2.0262 0 2.45825C0 2.89031 0.350278 3.24059 0.782336 3.24059H2.64231C2.9699 4.21355 3.89019 4.91651 4.97221 4.91651C6.05423 4.91651 6.97452 4.21355 7.30211 3.24059H19.2177C19.6497 3.24059 20 2.89031 20 2.45825C20 2.0262 19.6497 1.67592 19.2176 1.67592ZM4.97216 3.35184C4.47944 3.35184 4.07858 2.95097 4.07858 2.45825C4.07858 1.96554 4.47944 1.56467 4.97216 1.56467C5.46487 1.56467 5.86574 1.96554 5.86574 2.45825C5.86574 2.95097 5.46487 3.35184 4.97216 3.35184ZM19.2176 8.37964H17.3576C17.03 7.40667 16.1097 6.70372 15.0277 6.70372C13.9458 6.70372 13.0255 7.40667 12.6979 8.37964H0.782336C0.350278 8.37964 0 8.72992 0 9.16197C0 9.59403 0.350278 9.94431 0.782336 9.94431H12.6979C13.0255 10.9173 13.9458 11.6202 15.0278 11.6202C16.1097 11.6202 17.0301 10.9173 17.3577 9.94431H19.2177C19.6497 9.94431 20 9.59403 20 9.16197C20 8.72992 19.6497 8.37964 19.2176 8.37964ZM15.0278 10.0556C14.5351 10.0556 14.1342 9.65469 14.1342 9.16197C14.1342 8.66926 14.5351 8.26839 15.0278 8.26839C15.5205 8.26839 15.9214 8.66926 15.9214 9.16197C15.9214 9.65469 15.5205 10.0556 15.0278 10.0556ZM10.6539 15.0833H19.2176C19.6497 15.0833 20 15.4336 20 15.8657C20 16.2977 19.6497 16.648 19.2177 16.648H10.6539C10.3264 17.621 9.40607 18.3239 8.32405 18.3239C7.24203 18.3239 6.32174 17.621 5.99415 16.648H0.782336C0.350278 16.648 0 16.2977 0 15.8657C0 15.4336 0.350278 15.0833 0.782336 15.0833H5.99415C6.32174 14.1104 7.24203 13.4074 8.32405 13.4074C9.40607 13.4074 10.3264 14.1104 10.6539 15.0833ZM7.43047 15.8657C7.43047 16.3584 7.83134 16.7593 8.32405 16.7593C8.81676 16.7593 9.21763 16.3584 9.21763 15.8657C9.21763 15.3729 8.81676 14.9721 8.32405 14.9721C7.83134 14.9721 7.43047 15.373 7.43047 15.8657Z"/>
                  </svg>
                  <span class="font-bold">{{__('weddingRing.Filter')}}</span>    
              </button>
          </div>
        <form :class="{'hidden lg:flex' : !applyFilter, 'flex lg:hidden fixed overflow-y-scroll h-5/6 w-full top-10 left-0 z-50 bg-white pt-5 md:pt-0 md:pb-0 px-4 md:px-0 border border-2' : applyFilter,}" class="flex-col space-y-7 font-lato" x-on:click.away="applyFilter = false">
            <div class="flex md:hidden items-center space-x-5 justify-between">
                <a @click="applyFilter = false" class="flex-shrink-0 focus:outline-none">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666" />
                    </svg>
                </a>
                <span class="font-surana text-center">
                    {{__('jewellery.Jewellery')}} {{__('weddingRing.Filter')}}
                </span>
                <a class="text-brown underline" wire:click="resetAll()">{{__('weddingRing.Clear')}}</a>
            </div>
            <div class="flex flex-col lg:flex-row space-y-5 lg:space-y-0 lg:space-x-10 font-lato">
                <div class="flex flex-col space-y-2">
                    <label class="flex items-center space-x-1">
                        <span class="font-bold">{{__('jewellery.Type')}}</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                        </svg>
                    </label>
                    <fieldset class="flex flex-wrap items-center gap-1.5 md:gap-0 md:space-x-5">
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light 
                        {{$search_conditions['type']['ring']['clicked']? 'border-brown bg-brown-light':'' }}">
                            <input type="checkbox" name="type" value="3" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0" wire:click="toggleValue('type','ring')">
                                <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/j-1.png" alt="">
                                <p id="server-size-1-label" class="text-sm md:text-base">{{__('jewellery.Rings')}}</p>
                            </div>
                        </label>
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light f
                        {{$search_conditions['type']['necklace']['clicked']? 'border-brown bg-brown-light':'' }}">
                            <input type="checkbox" name="style" value="3" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0" wire:click="toggleValue('type','necklace')">
                                <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/j-2.png" alt="">
                                <p id="server-size-2-label" class="text-sm md:text-base">{{__('jewellery.Necklaces')}}</p>
                            </div>
                        </label>
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light f
                        {{$search_conditions['type']['bracelet']['clicked']? 'border-brown bg-brown-light':'' }}">
                            <input type="checkbox" name="style" value="3" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0" wire:click="toggleValue('type','bracelet')">
                                <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/j-3.png" alt="">
                                <p id="server-size-3-label" class="text-sm md:text-base">{{__('jewellery.Bracelets')}}</p>
                            </div>
                        </label>
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light f
                        {{$search_conditions['type']['earring']['clicked']? 'border-brown bg-brown-light':'' }}">
                            <input type="checkbox" name="style" value="4" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0 md:space-y-2" wire:click="toggleValue('type','earring')">
                                <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/j-4.png" alt="">
                                <p id="server-size-4-label" class="text-sm md:text-base">{{__('jewellery.Earrings')}}</p>
                            </div>
                        </label>
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light f
                        {{$search_conditions['type']['pendant']['clicked']? 'border-brown bg-brown-light':'' }}">
                            <input type="checkbox" name="style" value="4" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0 md:space-y-2" wire:click="toggleValue('type','pendant')">
                                <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/j-5.png" alt="">
                                <p id="server-size-4-label" class="text-sm md:text-base">{{__('jewellery.Pendants')}}</p>
                            </div>
                        </label>
                    </fieldset>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-1">
                            <span class="font-bold">{{__('jewellery.Metal')}}</span>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                            </svg>
                        </label>
                        <div class="flex flex-col space-y-3">
                            <div class="flex flex-wrap items-center gap-3 md:gap-0 md:space-x-5">
                                <div>
                                    <label class="inline-flex space-x-2 items-center" wire:click="toggleValue('metal','18KW')">
                                        <span class="border w-6 h-6" >
	                                          @if($search_conditions['metal']['18KW']['clicked'])
	                                              <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
	                                                  <path d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z"/>
	                                              </svg>
	                                          @endif
	                                      </span>
                                        <img src="/assets/images/ellipse-silver.png" alt="">
                                        <span>{{__('jewellery.18KW')}}</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex space-x-2 items-center" wire:click="toggleValue('metal','18KR')">
                                        <span class="border w-6 h-6" >
	                                          @if($search_conditions['metal']['18KR']['clicked'])
	                                              <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
	                                                  <path d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z"/>
	                                              </svg>
	                                          @endif
	                                      </span>
                                        <img src="/assets/images/ellipse-rose-gold.png" alt="">
                                        <span>{{__('jewellery.18KR')}}</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex space-x-2 items-center" wire:click="toggleValue('metal','18KY')">
                                        <span class="border w-6 h-6" >
	                                          @if($search_conditions['metal']['18KY']['clicked'])
	                                              <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
	                                                  <path d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z"/>
	                                              </svg>
	                                          @endif
	                                      </span>
                                        <img src="/assets/images/ellipse-yellow.png" alt="">
                                        <span>{{__('jewellery.18KY')}}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-wrap items-center gap-3 md:gap-0 md:space-x-8">
                                <div>
                                    <label class="inline-flex space-x-2 items-center" wire:click="toggleValue('metal','PT')">
                                        <span class="border w-6 h-6" >
	                                          @if($search_conditions['metal']['PT']['clicked'])
	                                              <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
	                                                  <path d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z"/>
	                                              </svg>
	                                          @endif
	                                      </span>
                                        <img src="/assets/images/ellipse-silver.png" alt="">
                                        <span>{{__('jewellery.PT')}}</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex space-x-2 items-center" wire:click="toggleValue('metal','mixed')">
                                        <span class="border w-6 h-6" >
	                                          @if($search_conditions['metal']['mixed']['clicked'])
	                                              <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
	                                                  <path d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z"/>
	                                              </svg>
	                                          @endif
	                                      </span>
                                        <span>{{__('jewellery.Mixed')}}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row space-y-5 md:space-y-0 md:space-x-10 font-lato">
                <div class="flex flex-col space-y-2">
                    <label class="flex items-center space-x-1">
                        <span class="font-bold">{{__('jewellery.Gemstone')}}</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </label>
                    <fieldset class="flex flex-wrap gap-1.5 md:gap-0 md:space-x-5">
                        <label class="relative block border bg-white px-4 md:px-0 md:w-40 py-3 cursor-pointer hover:border-brown sm:flex sm:justify-center sm:items-center hover:bg-brown-light 
                        {{$search_conditions['gemstone']['diamond']['clicked']? 'border-brown bg-brown-light':'' }}" >
                            <input type="checkbox" name="gemstone" value="1" class="sr-only" wire:click="toggleValue('gemstone','diamond')">
                            <p id="server-size-1-label">{{__('jewellery.Diamond')}}</p>
                        </label>
                        <label class="relative block border bg-white px-4 md:px-0 md:w-40 py-3 cursor-pointer hover:border-brown sm:flex sm:justify-center sm:items-center hover:bg-brown-light 
                        {{$search_conditions['gemstone']['pearl']['clicked']? 'border-brown bg-brown-light':'' }}" >
                            <input type="checkbox" name="gemstone" value="1" class="sr-only" wire:click="toggleValue('gemstone','pearl')">
                            <p id="server-size-1-label">{{__('jewellery.Pearl')}}</p>
                        </label>
                        <label class="relative block border bg-white px-4 md:px-0 md:w-40 py-3 cursor-pointer hover:border-brown sm:flex sm:justify-center sm:items-center hover:bg-brown-light 
                        {{$search_conditions['gemstone']['fancy diamond']['clicked']? 'border-brown bg-brown-light':'' }}" >
                            <input type="checkbox" name="gemstone" value="1" class="sr-only" wire:click="toggleValue('gemstone','fancy diamond')">
                            <p id="server-size-1-label">{{__('jewellery.fancy diamond')}}</p>
                        </label>
                    </fieldset>
                </div>
                <div x-data="{toggle: false}" class="flex flex-row justify-between md:flex-col md:space-y-5">
                    <label class="flex items-center space-x-1">
                        <span class="font-bold">{{__('jewellery.Setting')}}</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </label>
                    <button @click="toggle = !toggle" type="button" role="switch" aria-checked="false">
                    		<span x-show="!toggle" wire:click="toggleValue('setting','1')">
                    			<svg width="50" height="30" viewBox="0 0 50 30" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M35.4168 0.449219H14.5832C6.54373 0.449219 0 6.99104 0 15.0324C0 23.0742 6.54373 29.616 14.5832 29.616H35.4168C43.4563 29.616 50 23.0742 50 15.0324C50 6.99104 43.4563 0.449219 35.4168 0.449219V0.449219ZM14.5832 23.366C9.98764 23.366 6.25 19.6284 6.25 15.0324C6.25 10.4369 9.98764 6.69922 14.5832 6.69922C19.1792 6.69922 22.9168 10.4369 22.9168 15.0324C22.9168 19.6284 19.1792 23.366 14.5832 23.366Z" fill="#CCCCCC"/>
													</svg>
                    		</span>
                    		<span x-show="toggle" wire:click="toggleValue('setting','1')">
													<svg width="50" height="30" viewBox="0 0 50 30" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M14.5832 0.449219H35.4168C43.4563 0.449219 50 6.99104 50 15.0324C50 23.0742 43.4563 29.616 35.4168 29.616H14.5832C6.54373 29.616 0 23.0742 0 15.0324C0 6.99104 6.54373 0.449219 14.5832 0.449219ZM35.4168 23.366C40.0124 23.366 43.75 19.6284 43.75 15.0324C43.75 10.4369 40.0124 6.69922 35.4168 6.69922C30.8208 6.69922 27.0832 10.4369 27.0832 15.0324C27.0832 19.6284 30.8208 23.366 35.4168 23.366Z" fill="#9A7474"/>
													</svg>
												</span>
                    </button>
                </div>
            </div>
            <a class="flex md:hidden items-center justify-center w-full mt-5 mb-24 py-2 bg-brown hover:bg-white text-white hover:text-brown border border-brown transition ease-in-out duration-500" @click="applyFilter = !applyFilter">
                <span class="text-white hover:text-brown font-bold font-lato tracking-widest uppercase">
                {{__('weddingRing.Apply')}}
              </span>
            </a>
            <span class="pt-4 md:pt-0"></span>

        </form>
    </div>
    <!-- Filter Results  -->
    <div class="flex flex-col space-y-5 items-center pb-0 md:pb-7 py-7 border-t mt-5">
      <div class="flex w-full md:items-center justify-between">
	      <div class="flex flex-wrap items-center gap-3">
		      @foreach($tags as  $k => $conditions)
				@foreach($conditions as  $key => $data)
		            @if($data != '')
							<div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
			                  <button wire:click="toggleValue('{{$k}}', '{{$data}}' )">
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
			                  <span>{{__('jewellery.' . $data)}}</span>
			              </div>
		              @endif
		  			@endforeach
				@endforeach
	          </div>
	          <div class="flex flex-shrink-0">
	              <button class="text-brown underline" wire:click="resetAll()">{{__('engagementRing.Clear')}}</button>
	          </div>
			      </div>
		          <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row w-full md:items-center md:justify-between">
		            <span class="text-sm">{{__('diamondSearch.Total')}}: {{ $model['total'] }} {{__('diamondSearch.Results')}}</span>
		            <div class="flex items-center space-x-1 max-w-max border-b">
		                <label>
		                    {{__('engagementRing.Sort By')}}: 
		                </label>
		                <select id="Sort" name="Sort" class="block w-32 md:w-52 pb-1 text-black focus:outline-none" wire:model="fetchData.column">
		                        <option value="popular">{{__('engagementRing.Popular')}}</option>
		                        <option value="unit_price">{{__('engagementRing.Unit Price')}}</option>
		                    @foreach($search_conditions as  $key => $data)
		                        <option value="{{$key}}">
		                          <div >{{__('jewellery.' . $key)}}</div>
		                        </option>
		                    @endforeach
		                </select>
		                @if($fetchData['direction'] == 'desc')
		                    <span class="border p-2" wire:click="upOrDown('asc')">&uarr;</span>
		                @else
		                    <span class="border p-2" wire:click="upOrDown('desc')">&darr;</span>
		                @endif
		            </div>
		         </div>
			  </div>
    <!-- Products -->
    <div class="relative grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 w-full xl:grid-cols-4 gap-3 md:gap-7 md:items-center py-5 2xl:py-10 2xl:pb-10">
        @foreach($model['data'] as $data)
			@if( count($data['images']) )
		        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
		        	<a class="flex justify-center" href="/{{app()->getLocale() . '/jewellery/' . $data['id'] }}" target="_blank">
		            	<img class="mt-5 md:mt-0" src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $data['images'][0]['image']}}" alt="p1">
		            <div class="flex flex-col items-center space-y-2 md:space-y-3">
		                <p class="flex items-center space-x-1 font-suranna text-gold-light">
		                    <span class="text-base">HKD</span>
		                    <span class="text-xl md:text-3xl">${{$data['unit_price']}}</span>
		                </p>
		                <h1 class="text-center text-lg md:text-xl font-suranna">
		                    <a href="#">{{__('jewellery.' .$data['type']) }}</a>
		                    <p class="text-xs md:text-sm font-lato">{{ $data['title'] }} </p>
		                </h1>
		            </div>
		                        		
		            @if($data['invoices_count'] != 0)
			            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
			                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A" />
			                </svg>
			                <span class="text-xs md:text-sm font-lato">
			                	{{$data['invoices_count']}}
			                </span>
			            </div>
			          @endif
				      </a>
		        </div>
		    @endif
	    @endforeach
        <!-- More Products .... -->

    </div>
	</div>

	                
	<div class="col-span-2 lg:col-span-3 xl:col-span-4 flex justify-center relative py-4 {{ isset($model['total']) && $model['total'] == 0 ? '' : ' hidden'}}">
	  <div class="px-4 flex items-center justify-between sm:px-0">
	       <button class="btn btn-outline" wire:click="resetAll()">
	            {{ __('diamondSearch.No Result')}} ！ {{__('diamondSearch.reset')}} <i class="fas fa-undo"></i>
	        </button>
	  </div>
	</div>

	<div id="loading" wire:loading.class="loading">
	</div>

</div>

<script >
  function mobileSearch(){
    return {
       displayColumn:'', 
       selectDisplayColumn(column){
          if (this.displayColumn != column) {
            this.displayColumn = column
            console.log(this.displayColumn)
          }else{
            this.displayColumn = ''  
          }
      },
    }
  }
</script>

@include('layouts.js.infinityAddPage')



</div>

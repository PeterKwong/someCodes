<form :class="{'hidden lg:flex' : !applyFilter, 'flex lg:hidden fixed overflow-y-scroll h-5/6 w-full top-10 left-0 z-50 bg-white pt-5 md:pt-0 md:pb-0 px-4 md:px-0 border border-2' : applyFilter,}" class="flex-col space-y-5 font-lato" x-on:click.away="applyFilter = false; ">
    <div :class="{'hidden lg:grid' : !applyFilter, 'grid lg:hidden' : applyFilter,}" class="grid grid-cols-1 md:grid-cols-2 md:gap-x-20">
        <div class="flex md:hidden items-center space-x-5 justify-between">
            <a @click="applyFilter = false; " class="flex-shrink-0 focus:outline-none">
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
        <!-- 2 -->
        <div class="flex flex-col space-y-5 mt-6 md:mt-0">
            <div class="flex flex-wrap items-center gap-1.5 md:gap-3">
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center cursor-pointer hover:bg-gray-300">
                  <a x-on:click="updateQuery('diamond','weight','0.3',true);location.reload();">
                    <span class="font-lato text-sm md:text-base">0.3 - 0.49</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center cursor-pointer hover:bg-gray-300">
                  <a x-on:click="updateQuery('diamond','weight','0.5',true);location.reload();">
                    <span class="font-lato text-sm md:text-base">0.5 - 0.79</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center cursor-pointer hover:bg-gray-300">
                  <a x-on:click="updateQuery('diamond','weight','0.8',true);location.reload();">
                    <span class="font-lato text-sm md:text-base">0.8 - 0.99</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center cursor-pointer hover:bg-gray-300">
                  <a x-on:click="updateQuery('diamond','weight','1',true);location.reload();">
                    <span class="font-lato text-sm md:text-base">1.0-1.19</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center cursor-pointer hover:bg-gray-300">
                  <a x-on:click="updateQuery('diamond','weight','1.2',true);location.reload();">
                    <span class="font-lato text-sm md:text-base">1.2 - 1.49</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center cursor-pointer hover:bg-gray-300">
                  <a x-on:click="updateQuery('diamond','weight','1.5',true);location.reload();">
                    <span class="font-lato text-sm md:text-base">1.5 - 1.99</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center cursor-pointer hover:bg-gray-300">
                  <a x-on:click="updateQuery('diamond','weight','2',true);location.reload();">
                    <span class="font-lato text-sm md:text-base">2.0 - 2.99</span>
                  </a>
                </div>
                <div class="bg-grey-01 py-2 px-2 md:px-5 text-center cursor-pointer hover:bg-gray-300">
                  <a x-on:click="updateQuery('diamond','weight','3',true);location.reload();">                    
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
                @foreach($search_conditions['shape'] as $type => $shape)
                    <label class="relative border bg-white flex items-center justify-center h-12 md:h-20 w-12 md:w-20 p-1.5 md:p-0 cursor-pointer hover:border-brown hover:bg-brown-light"
                    :class=" `${search_conditions.shape.{{$type}}.clicked?' bg-brown-light border-brown':''}`" >
                        <input type="checkbox" name="position" value="1" class="sr-only" x-on:click="search_conditions.shape.{{$type}}.clicked = ! search_conditions.shape.{{$type}}.clicked; @this.toggleValue({{$shape['tagId']}});updateQuery('diamond','shape','{{$type}}')">
                        <div>
                            <img src="/assets/images/image {{$shape['image']}}" alt="shape image">
                        </div>
                    </label>
                @endforeach
                </label>
            </fieldset>
        </div>
        <!-- 4 -->
        <div class="flex flex-col space-y-2 mt-6 md:mt-4">
            <label class="flex items-center space-x-2">
                <span :class="{'text-brown font-bold border-b-2 border-brown' : !search_conditions.color.Fancy.clicked}" x-on:click="@this.toggleValue(42);search_conditions.color.Fancy.clicked = !search_conditions.color.Fancy.clicked" class="text-grey font-lato cursor-pointer">{{__('diamondSearch.White')}}</span>
                <span :class="{'text-brown font-bold border-b-2 border-brown' : search_conditions.color.Fancy.clicked}" x-on:click="@this.toggleValue(42);search_conditions.color.Fancy.clicked = !search_conditions.color.Fancy.clicked" class="text-grey font-lato cursor-pointer">{{__('diamondSearch.Fancy')}}</span>
                <a href="/{{app()->getLocale() . '/education-diamond-grading/4cs/color' }}" target="_blank" >
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565" />
                    </svg>
                </a>
            </label>
            <fieldset x-show="!search_conditions.color.Fancy.clicked" class="flex flex-wrap items-center gap-1.5 md:gap-3">
                @foreach($search_conditions['color'] as $type => $color)
                    @if($type != 'Fancy')
                        <label class="relative border bg-white flex items-center justify-center h-12 w-12 cursor-pointer hover:border-brown hover:bg-brown-light "
                        :class=" `${search_conditions.color.{{$type}}.clicked?' bg-brown-light border-brown':''}`"
                        >
                        <input type="checkbox" name="white" value="1" class="sr-only"
                            x-on:click="search_conditions.color.{{$type}}.clicked = ! search_conditions.color.{{$type}}.clicked; @this.toggleValue({{$color['tagId']}});updateQuery('diamond','color','{{$type}}')">
                            <span>{{$type}}</span>
                        </label>
                    @endif
                @endforeach
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
                @foreach($search_conditions['clarity'] as $type => $clarity)                
                    <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.clarity.{{$type}}.clicked = ! search_conditions.clarity.{{$type}}.clicked; @this.toggleValue({{$clarity['tagId']}});updateQuery('diamond','clarity','{{$type}}')">
                        <span class="font-lato">{{$type}}</span>
                      <span class="border-2 mt-2 px-6 border-gray-300"
                            :class=" `${search_conditions.clarity.{{$type}}.clicked?' bg-brown-light border-brown':''}`">
                            </span>
                    </div>
                @endforeach
            </div>
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
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.cut.Excellent.clicked = ! search_conditions.cut.Excellent.clicked; @this.toggleValue(53);updateQuery('diamond','cut','EX')">
                    <span class="font-lato">Excellent</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.cut.Excellent.clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.cut['Very Good'].clicked = ! search_conditions.cut['Very Good'].clicked; @this.toggleValue(54);updateQuery('diamond','cut','VG')">
                  <span class="font-lato">Very Good</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.cut['Very Good'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.cut.Good.clicked = ! search_conditions.cut.Good.clicked; @this.toggleValue(55);updateQuery('diamond','cut','GD')">
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
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence['None'].clicked = ! search_conditions.fluorescence['None'].clicked; @this.toggleValue(62);updateQuery('diamond','fluorescence','Non')">
                  <span class="font-lato">{{trans('diamondSearch.None')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence['None'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence['Faint'].clicked = ! search_conditions.fluorescence['Faint'].clicked; @this.toggleValue(63);updateQuery('diamond','fluorescence','FNT')">
                  <span class="font-lato">{{trans('diamondSearch.Faint')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence['Faint'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence['Medium'].clicked = ! search_conditions.fluorescence['Medium'].clicked; @this.toggleValue(64);updateQuery('diamond','fluorescence','MED')">
                  <span class="font-lato">{{trans('diamondSearch.Medium')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence['Medium'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence['Strong'].clicked = ! search_conditions.fluorescence['Strong'].clicked; @this.toggleValue(65);updateQuery('diamond','fluorescence','STG')">
                  <span class="font-lato">{{trans('diamondSearch.Strong')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence['Strong'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
                <div class="px-1 flex flex-col items-center" x-on:click="search_conditions.fluorescence['Very Strong'].clicked = ! search_conditions.fluorescence['Very Strong'].clicked; @this.toggleValue(66);updateQuery('diamond','fluorescence','VST')">
                  <span class="font-lato">{{trans('diamondSearch.Very Strong')}}</span>
                  <span class="border-2 mt-2 px-12 border-gray-300"
                        :class=" `${search_conditions.fluorescence['Very Strong'].clicked?' bg-brown-light border-brown':''}`">
                        </span>
                </div>
            </div>
        </div>

    
    </div>


    
    <!-- Apply button for mobile  -->
    <a class="flex md:hidden items-center justify-center w-full mt-7 py-2 bg-brown hover:bg-white text-white hover:text-brown border border-brown transition ease-in-out duration-500" @click="applyFilter = false; ">
        <span class="text-white hover:text-brown font-bold font-lato tracking-widest uppercase"  >{{trans('weddingRing.Apply')}}</span>
    </a>
    <span class="pt-4 md:pt-0"></span>
</form>
    
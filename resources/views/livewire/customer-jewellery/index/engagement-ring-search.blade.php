<form :class="{'hidden lg:flex' : !applyFilter, 'flex lg:hidden fixed overflow-y-scroll h-5/6 w-full top-10 left-0 z-50 bg-white pt-5 md:pt-0 md:pb-0 px-4 md:px-0 border border-2' : applyFilter,}" class="flex-col space-y-7 font-lato" x-on:click.away="applyFilter = false">
    <div class="flex md:hidden items-center space-x-5 justify-between">
        <a @click="applyFilter = false" class="flex-shrink-0 focus:outline-none">
            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
            </svg>                                            
        </a>
        <span class="text-lg font-suranna text-center">
             {{__('engagementRing.ENGAGEMENT RINGS')}} {{__('weddingRing.Filter')}}
        </span>
        <a class="text-brown underline" wire:click="resetAll()">{{__('weddingRing.Clear')}}</a>
    </div>
    <div class="flex flex-col lg:flex-row space-y-5 lg:space-y-0 lg:space-x-10 font-lato">
        <div class="flex flex-col space-y-2">
            <div class="flex items-center space-x-1">
                <span class="font-bold">{{__('engagementRing.Style')}}</span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                </svg>
            </div>
            <div class="flex items-center space-x-1.5 md:space-x-5">
                @foreach($search_conditions['style'] as $type => $style)
                    <div class="relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light {{array_search($search_conditions['style'][$type]['tagId'],$tagIds)>-1? 'border-brown bg-brown-light':'' }}">
                        <input type="checkbox" name="style" value="3" class="sr-only">
                        <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0 md:space-y-2" x-on:click="@this.toggleValue('{{$style['tagId']}}');updateQuery('engagementRing','style','{{$type}}')">
                            <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/ring-design-{{$style['image']}}.png" alt="">
                            <p id="server-size-3-label" class="text-sm md:text-base">{{__('engagementRing.'.$type)}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col space-y-2">
            <div class="flex items-center space-x-1">
                <span class="font-bold">{{__('engagementRing.Shoulder')}}</span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                </svg>
            </div>
            <div class="flex items-center space-x-1.5 md:space-x-5">
                @foreach($search_conditions['shoulder'] as $type => $shoulder)
                    <div class="relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light {{array_search($search_conditions['shoulder'][$type]['tagId'],$tagIds)>-1? 'border-brown bg-brown-light':'' }}">
                        <input type="checkbox" name="position" value="1" class="sr-only">
                        <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0 md:space-y-2" x-on:click="@this.toggleValue('{{$shoulder['tagId']}}');updateQuery('engagementRing','shoulder','{{$type}}')">
                            <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/ring-design-{{$shoulder['image']}}.png" alt="">
                            <p id="server-size-1-label" class="text-sm md:text-base">{{__('engagementRing.'.$type)}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col space-y-2">
            <div class="flex items-center space-x-1">
                <span class="font-bold">{{__('engagementRing.Claw Prong')}}</span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                </svg>
            </div>
            <div class="flex flex-row space-x-3 md:space-x-0 md:flex-col h-full md:justify-between">
                @foreach($search_conditions['prong'] as $type => $prong)
                    <div class="relative block rounded-none md:rounded border bg-white px-5 py-2.5 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light {{array_search($search_conditions['prong'][$type]['tagId'],$tagIds)>-1? 'border-brown bg-brown-light':'' }}" x-on:click="@this.toggleValue('{{$prong['tagId']}}');updateQuery('engagementRing','prong','{{$type}}')">
                        <input type="checkbox" name="claws" value="1" class="sr-only">
                            <p id="server-size-1-label">{{__('engagementRing.'.$type)}}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <a class="flex md:hidden items-center justify-center w-full py-2 bg-brown hover:bg-white text-white hover:text-brown border border-brown transition ease-in-out duration-500" x-on:click="applyFilter = false">
            <span class="text-white hover:text-brown font-bold font-lato tracking-widest uppercase">{{__('weddingRing.Apply')}}</span>
        </a>
    </div>
</form>
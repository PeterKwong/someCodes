<!-- Filter Results  -->
<div class="flex flex-col space-y-5 items-center pb-0 md:pb-7 py-7 border-t mt-5">
    <div class="flex w-full justify-between">
        <div class="flex flex-wrap items-center gap-3">
        @foreach($tags as  $k => $conditions)

                @if(in_array($k,['price','weight']))
                    @if($k == 'price')
                      @if( $conditions[0] != 1000 || $conditions[1] != 50000000  )
                        @php($tagShowMore['count']=$tagShowMore['count']+1)
                        @if($tagShowMore['count'] < 3 || $tagShowMore['show'] )
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
                    @endif
                    @if($k == 'weight')
                        @if( $conditions[0] != 0.3 || $conditions[1] != 20  )

                            @php($tagShowMore['count']=$tagShowMore['count']+1)
                            @if($tagShowMore['count'] < 3 || $tagShowMore['show'] )
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
                @endif

                @if(!in_array($k,['price','weight']))
                    @if(is_object($conditions))
                      @php($conditions = (array)$conditions)
                    @endif

                    @if(is_array($conditions))
                        @if(count($conditions))
                            @php($conditions = array_values($conditions))
                            @if(current($conditions) !== 0)
                                @php($tagShowMore['count']=$tagShowMore['count']+1)
                                @if($tagShowMore['count'] < 3 || $tagShowMore['show'] )
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
                                          {{count($conditions)-1 == $key?'':', '}}
                                        @endforeach
                                    </span>
                                </div>
                                @endif
                            @endif
                        @endif
                    @endif
                @endif

        @endforeach


        </div>
        <div class="flex flex-shrink-0">
            <button class="text-brown underline" wire:click="resetAll()">{{__('engagementRing.Clear')}}</button>
        </div>
    </div>

    @if($tagShowMore['count']>2)
        <button @click="tagShowMore.show = !tagShowMore.show;@this.toggleShowMoreTags()" 
            class="flex items-center font-bold text-brown space-x-2"><!-- 
            <span x-show="tagShowMore.show">{{trans('diamondSearch.View Less')}}</span>
            <span x-show="!tagShowMore.show">{{trans('diamondSearch.View More')}}</span> -->
             <span x-show="!tagShowMore.show">{{$tagShowMore['count']>2?'('.($tagShowMore['count']-2).')':''}}</span>
            <svg :class="{'rotate-0': tagShowMore.show, ' rotate-180': !tagShowMore.show}" class="transform" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41 7.41L6 2.83L10.59 7.41L12 6L6 0L0 6L1.41 7.41Z" fill="#9A7474" />
            </svg>
        </button>
    @endif
    <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row w-full md:items-center md:justify-between pt-10">
        <div class="flex items-center space-x-3 divide-x">
            <span class=" text-sm">{{trans('diamondSearch.Total')}}: {{isset($diamonds['total'])?$diamonds['total']:''}} {{trans('diamondSearch.diamond')}}</span>
            <div class="flex items-center space-x-3 pl-3">
                <button @click="view = 'grid'" :class="{'bg-brown text-white border-brown' : view == 'grid', 'text-grey-lighter' : view != 'grid'}" class="border w-8 h-8 flex items-center justify-center">
                    <svg class="fill-current" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25083 4.21313H10.7367C10.8752 4.21313 10.9875 4.32539 10.9875 4.46397V10.9498C10.9875 11.0884 10.8752 11.2006 10.7367 11.2006H4.25083C4.11226 11.2006 4 11.0884 4 10.9498V4.46397C4 4.32539 4.11226 4.21313 4.25083 4.21313Z"/>
                        <path d="M13.1727 4.21313H19.6585C19.7971 4.21313 19.9094 4.32539 19.9094 4.46397V10.9498C19.9094 11.0884 19.7971 11.2006 19.6585 11.2006H13.1727C13.0341 11.2006 12.9219 11.0884 12.9219 10.9498V4.46397C12.9219 4.32539 13.0341 4.21313 13.1727 4.21313Z"/>
                        <path d="M4.25083 13.1356H10.7367C10.8752 13.1356 10.9875 13.2479 10.9875 13.3865V19.8723C10.9875 20.0109 10.8752 20.1231 10.7367 20.1231H4.25083C4.11226 20.1231 4 20.0109 4 19.8723V13.3865C4 13.2479 4.11226 13.1356 4.25083 13.1356Z"/>
                        <path d="M13.1727 13.1356H19.6585C19.7971 13.1356 19.9094 13.2479 19.9094 13.3865V19.8723C19.9094 20.0109 19.7971 20.1231 19.6585 20.1231H13.1727C13.0341 20.1231 12.9219 20.0109 12.9219 19.8723V13.3865C12.9219 13.2479 13.0341 13.1356 13.1727 13.1356Z"/>
                    </svg>
                </button>
                <button @click="view = 'table'" :class="{'bg-brown text-white border-brown' : view == 'table', 'text-grey-lighter' : view != 'table'}" class="border w-8 h-8 flex items-center justify-center">
                    <svg class="fill-current" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 4.21313H6.42551V8.63864H2V4.21313Z"/>
                        <path d="M7.83203 4.21313H22.0001V8.63864H7.83203V4.21313Z"/>
                        <path d="M2 9.95557H6.42551V14.3811H2V9.95557Z"/>
                        <path d="M7.83203 9.95557H22.0001V14.3811H7.83203V9.95557Z"/>
                        <path d="M2 15.6981H6.42551V20.1238H2V15.6981Z"/>
                        <path d="M7.83203 15.6981H22.0001V20.1238H7.83203V15.6981Z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:items-center md:space-x-16">
            <div class="hidden md:flex items-center space-x-2">
                <input type="checkbox" name="Starred" id="Starred" x-model="advance_search_conditions.starred.clicked"
                    x-on:click="advance_search_conditions.starred.clicked = ! advance_search_conditions.starred.clicked; @this.selectStarred()">
                <label for="Starred" class="font-bold">
                    {{__('diamondSearch.starred')}}
                </label>
            </div>
            <div class="hidden md:flex items-center space-x-2">
                <input type="checkbox" name="HK_Stock" id="HK_Stock" x-model="search_conditions.location['1Hong Kong'].clicked"
                    x-on:click="search_conditions.location['1Hong Kong'].clicked = ! search_conditions.location['1Hong Kong'].clicked;@this.setLocationToHK()">
                <label for="HK_Stock" class="font-bold">
                    {{__('diamondSearch.Only On Stock')}}
                </label>
            </div>
            <div class="flex space-x-1 items-center md:max-w-max border-b">
                <label class="flex-shrink-0">
                    {{__('engagementRing.Sort By')}}:
                </label>
                <select id="Sort" name="Sort" class="block w-full pb-1 text-black focus:outline-none"  wire:model="fetchData.column">
                    @foreach($columns as $column)
                        <option value="{{$column}}" wire:click="toggleOrder('{{$column}}')">
                        <a >{{ __('diamondSearch.'.$column)}}</a>
                    @endforeach
                    @if($fetchData['table_percent'][1] != 0 )
                        <option value="table_percent" wire:click="toggleOrder('table_percent')">
                        <a >{{ __('diamondSearch.table_percent')}}</a>
                    @endif
                    @if($fetchData['depth_percent'][1] != 0 )
                        <option value="depth_percent" wire:click="toggleOrder('depth_percent')">
                        <a >{{ __('diamondSearch.depth_percent')}}</a>
                    @endif
                    @if($fetchData['crown_angle'][1] != 0 )
                        <option value="crown_angle" wire:click="toggleOrder('crown_angle')">
                        <a >{{ __('diamondSearch.crown_angle')}}</a>
                    @endif
                    @if($fetchData['parvilion_angle'][1] != 0 )
                        <option value="parvilion_angle" wire:click="toggleOrder('parvilion_angle')">
                        <a >{{ __('diamondSearch.parvilion_angle')}}</a>
                    @endif
                    @if($fetchData['length'][1] != 0 )
                        <option value="length" wire:click="toggleOrder('length')">
                        <a >{{ __('diamondSearch.length')}}</a>
                    @endif
                    @if($fetchData['width'][1] != 0 )
                        <option value="width" wire:click="toggleOrder('width')">
                        <a >{{ __('diamondSearch.width')}}</a>
                    @endif
                    @if($fetchData['depth'][1] != 0 )
                        <option value="depth" wire:click="toggleOrder('depth')">
                        <a >{{ __('diamondSearch.depth')}}</a>
                    @endif
                </select>
                @if($fetchData['direction'] == 'desc')
                    <span class="border p-2" wire:click="toggleOrder('{{$fetchData['column']}}')">&uarr;</span>
                @else
                    <span class="border p-2" wire:click="toggleOrder('{{$fetchData['column']}}')">&darr;</span>
                @endif
            </div>
        </div>
    </div>
</div>

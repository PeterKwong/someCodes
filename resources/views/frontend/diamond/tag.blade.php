<!-- Filter Results  -->
<div class="flex flex-col space-y-5 items-center pb-0 md:pb-7 py-7 border-t mt-5">
    <div class="flex w-full justify-between">
        <div class="flex flex-wrap items-center gap-3">
        @foreach($tags as  $k => $conditions)
            @if($tagShowMore['count'] < 2 || $tagShowMore['show'] )
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
                        @php($tagShowMore['count']=$tagShowMore['count']+1)
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
                            @php($tagShowMore['count']=$tagShowMore['count']+1)
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
                                @php($tagShowMore['count']=$tagShowMore['count']+1)
                            @endif
                        @endif
                    @endif
                @endif
            @endif
        @endforeach


        </div>
        <div class="flex flex-shrink-0">
            <a class="text-brown underline" wire:click="resetAll()">{{__('engagementRing.Clear')}}</a>
        </div>
    </div>

    <a @click="tagShowMore.show = !tagShowMore.show;@this.toggleShowMoreTags()" 
        class="flex items-center font-bold text-brown space-x-2">
        <span x-show="tagShowMore.show">{{trans('diamondSearch.View Less')}}</span>
        <span x-show="!tagShowMore.show">{{trans('diamondSearch.View More')}}</span>
        <svg :class="{'rotate-0': tagShowMore.show, ' rotate-180': !tagShowMore.show}" class="transform" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.41 7.41L6 2.83L10.59 7.41L12 6L6 0L0 6L1.41 7.41Z" fill="#9A7474" />
        </svg>
    </a>
    <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row w-full md:items-center md:justify-between pt-10">
        <span class="text-sm">{{trans('diamondSearch.Total')}}: {{isset($diamonds['total'])?$diamonds['total']:''}} {{trans('diamondSearch.diamond')}}</span>
        <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:items-center md:space-x-16">
            <div class="hidden md:flex items-center space-x-2" 
                    x-on:click="advance_search_conditions.starred.clicked = ! advance_search_conditions.starred.clicked; @this.selectStarred()">
                <input type="checkbox" name="Starred" id="Starred" x-model="advance_search_conditions.starred.clicked">
                <label for="Starred" class="font-bold">
                    {{__('diamondSearch.starred')}}
                </label>
            </div>
            <div class="hidden md:flex items-center space-x-2" 
                    x-on:click="search_conditions.location['1Hong Kong'].clicked = ! search_conditions.location['1Hong Kong'].clicked;@this.setLocationToHK()">
                <input type="checkbox" name="HK_Stock" id="HK_Stock" x-model="search_conditions.location['1Hong Kong'].clicked">
                <label for="HK_Stock" class="font-bold">
                    {{__('diamondSearch.Only On Stock')}}
                </label>
            </div>
            <div class="flex space-x-1 md:max-w-max border-b">
                <label class="flex-shrink-0">
                    {{__('engagementRing.Sort By')}}:
                </label>
                <select id="Sort" name="Sort" class="block w-full md:w-52 pb-1 text-black focus:outline-none" wire:model="fetchData.column">
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

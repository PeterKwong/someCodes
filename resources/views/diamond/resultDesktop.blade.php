

<div class="relative overflow-hidden mb-8" x-data="destopSearch()">    
    <div class="overflow-x-auto p-2 flex">  
        <table class="table-auto w-full flex-auto">
          <thead>
            <tr class="text-center">
            @foreach($columns as $column)
              <th class="bg-yellow-600 text-white px-4 py-2" wire:click="toggleOrder( '{{$column}}' )">
                    <span>{{ __('diamondSearch.'.$column)}}</span>
                    @if($column == $fetchData['column'])   
                        <span class="dv-table-column">
                        	@if($fetchData['direction'] == 'desc')
		                        <span>&#x25BC;</span>
		                    @else
		                        <span>&#x25B2;</span>
		                     @endif
	                    </span>                 
                    @endif

                </th>
            @endforeach

            @foreach($fetchAdvance as $key => $value)

                @if($fetchData[$key][0] != 0)
		          <th class="bg-yellow-600 text-white px-4 py-2" wire:click="toggleOrder( '{{$key}}' )">
		                <span>{{ __('diamondSearch.'.$value)}}</span>
		                @if($key == $fetchData['column'])   
		                    <span class="dv-table-column">
		                    	@if($fetchData['direction'] == 'desc')
			                        <span>&#x25BC;</span>
			                    @else
			                        <span>&#x25B2;</span>
			                     @endif
		                    </span>                 
		                @endif

		            </th>
                @endif

            @endforeach
   

            </tr>
          </thead>
          <tbody>
            @if( isset($diamonds['data']) )
            @foreach($diamonds['data'] as $row)
                <tr class="text-center {{ in_array( $row['id'], $clickedRows) ? 'bg-gray-400':'' }}"  id="row-{{ $row['id'] }}" x-on:click="goto({{$row['id']}}); @this.goto({{$row['id']}})">
                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">

                        @if($row['image_cache'])
                            <div class="w-48">
                                <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/diamond/' .'images/thm-' . $row['id'] . '.jpg'  }}" class="object-contain w-full h-auto" ></img>
                            </div>
                        @endif

                    
                        </a>
                    </td>

                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">

                        @if($row['plot'])                        
                            <div class="w-48">
                                <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/diamond/' .'plots/' . $row['id'] . '.jpg'  }}" class="object-contain w-full h-auto" ></img>
                            </div>
                        @else
                            <div>
                              <center>
                                <img src="{{ '/images/front-end/diamond_shapes/' . strtolower($row['shape']) . '.png'}}" class="w-16">  
                                <p class="text-gray-800">sample</p>
                              </center>
                            </div>
                        @endif
                
                        </a>
                    </td> 
                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                    HK${{ $row['price'] }}
                        </a>
                    </td>
                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                     {{ $row['weight'] }}
                        </a>
                    </td>
                    @if(array_search('color',$columns) > -1)
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['color'] }}
                            </a>
                        </td>
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['clarity'] }}
                            </a>
                        </td>
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['cut'] }}
                            </a>
                        </td>
                    @endif

                    @if(array_search('fancy_color',$columns) > -1)
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['fancy_intensity'] }}
                            </a>
                        </td>
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['fancy_color'] }}
                            </a>
                        </td>
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['clarity'] }}
                            </a>
                        </td>
                    @endif


                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                     {{ $row['polish'] }}
                        </a>
                    </td>
                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                     {{ $row['symmetry'] }}
                        </a>
                    </td>
                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                     {{ $row['fluorescence'] }}
                        </a>
                    </td>

                    @if($row['location'] == '1Hong Kong')
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{__('diamondSearch.1-2 Days')}}
                            </a>
                        </td>
                    @else
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{__('diamondSearch.Order')}}
                            </a>
                        </td>

                    @endif
                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                     {{ $row['certificate'] }}
                        </a>
                    </td>
                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                     {{ $row['lab'] }}
                        </a>
                    </td>

                    <td class="border-b px-4 py-2" >
                        <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                            @if($row['starred'] != 0)
                            <i class="fa fa-star" aria-hidden="true"></i>
                            @endif
                        </a>
                    </td>

                    @if($fetchData['table_percent'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['table_percent'] }}%
                            </a>
                        </td>
                    @endif
                    
                    @if($fetchData['depth_percent'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['depth_percent'] }}%
                            </a>
                        </td>
                    @endif
                    @if($fetchData['crown_angle'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['crown_angle'] }}°
                            </a>
                        </td>
                    @endif
                    @if($fetchData['parvilion_angle'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['parvilion_angle'] }}°
                            </a>
                        </td>
                    @endif
                    @if($fetchData['length'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['length'] }}mm
                            </a>
                        </td>
                    @endif
                    @if($fetchData['width'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['width'] }}mm
                            </a>
                        </td>
                    @endif
                    @if($fetchData['depth'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a  href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" wire:click.prevent="">
                         {{ $row['depth'] }}mm
                            </a>
                        </td>
                    @endif

                </tr>

            @endforeach
            @endif
            

          </tbody>
        </table>


        
    </div>
</div>


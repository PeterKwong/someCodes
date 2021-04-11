

<div class="relative overflow-hidden mb-8">    
    <div class="overflow-x-auto p-2 flex">  
        <table class="table-auto w-full flex-auto">
          <thead>
            <tr class="text-center">
            @foreach($columns as $column)
              <th class="bg-yellow-500 text-white px-4 py-2" wire:click="toggleOrder( '{{$column}}' )">
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
		          <th class="bg-yellow-500 text-white px-4 py-2" wire:click="toggleOrder( '{{$key}}' )">
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
            @foreach($diamonds['data'] as $id => $row)
                <tr class="text-center"  :class="{ ' bg-gray-400':clickedRows.includes( {{$row['id']}} )}"  x-on:click.prevent="goto( {{$row['id']}}, {{$id}} )">
                    <td class="border-b px-4 py-2" >
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                        @if($row['image_cache'])
                            <div class="w-48">
                                <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/diamond/' .'images/thm-' . $row['id'] . '.jpg'  }}" class="object-contain w-full h-auto transform hover:scale-150" ></img>
                            </div>
                        @endif

                    
                        </a>
                    </td>

                    <td class="border-b px-4 py-2" >
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >

                        @if($row['plot'])                        
                            <div class="w-48">
                                <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/diamond/' .'plots/' . $row['id'] . '.jpg'  }}" class="object-contain w-full h-auto transform hover:scale-150" ></img>
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
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                    HK${{ $row['price'] }}
                        </a>
                    </td>
                    <td class="border-b px-4 py-2" >
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                     {{ $row['weight'] }}
                        </a>
                    </td>
                    @if(array_search('color',$columns) > -1)
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['color'] }}
                            </a>
                        </td>
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['clarity'] }}
                            </a>
                        </td>
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['cut'] }}
                            </a>
                        </td>
                    @endif

                    @if(array_search('fancy_color',$columns) > -1)
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['fancy_intensity'] }}
                            </a>
                        </td>
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['fancy_color'] }}
                            </a>
                        </td>
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['clarity'] }}
                            </a>
                        </td>
                    @endif


                    <td class="border-b px-4 py-2" >
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                     {{ $row['polish'] }}
                        </a>
                    </td>
                    <td class="border-b px-4 py-2" >
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                     {{ $row['symmetry'] }}
                        </a>
                    </td>
                    <td class="border-b px-4 py-2" >
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                     {{ $row['fluorescence'] }}
                        </a>
                    </td>

                    @if($row['location'] == '1Hong Kong')
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{__('diamondSearch.1-2 Days')}}
                            </a>
                        </td>
                    @else
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{__('diamondSearch.Order')}}
                            </a>
                        </td>

                    @endif
                    <td class="border-b px-4 py-2" >
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                     {{ $row['certificate'] }}
                        </a>
                    </td>
                    <td class="border-b px-4 py-2" >
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                     {{ $row['lab'] }}
                        </a>
                    </td>

                    <td class="border-b px-4 py-2" >
                        <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                            @if($row['starred'] != 0)
                            <i class="fa fa-star" aria-hidden="true"></i>
                            @endif
                        </a>
                    </td>

                    @if($fetchData['table_percent'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['table_percent'] }}%
                            </a>
                        </td>
                    @endif
                    
                    @if($fetchData['depth_percent'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['depth_percent'] }}%
                            </a>
                        </td>
                    @endif
                    @if($fetchData['crown_angle'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['crown_angle'] }}°
                            </a>
                        </td>
                    @endif
                    @if($fetchData['parvilion_angle'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['parvilion_angle'] }}°
                            </a>
                        </td>
                    @endif
                    @if($fetchData['length'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['length'] }}mm
                            </a>
                        </td>
                    @endif
                    @if($fetchData['width'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
                         {{ $row['width'] }}mm
                            </a>
                        </td>
                    @endif
                    @if($fetchData['depth'][0] != 0)
                        <td class="border-b px-4 py-2" >
                            <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" >
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


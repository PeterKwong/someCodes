@if( isset($diamonds['data']) )

@foreach($diamonds['data'] as  $row)

<div class="border border-gray-400 {{ in_array( $row['id'], $clickedRows) ? 'bg-gray-400':'' }}">
  <a href="{{ '/' . app()->getLocale() . '/gia-loose-diamonds/' . $row['id'] }}" target="_blanck" 
      wire:click="goto({{$row['id']}})">
      <div class="flex items-center">
            @if($row['image_cache'])  
              <div class="flex-auto" >
                  <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/diamond/' .'images/thm-' . $row['id'] . '.jpg'  }}" class="w-48 h-auto"></img>    
              </div>
            @endif

        
        @if($row['plot'])                        

          <div class="flex-auto" >
              <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/diamond/' .'plots/' . $row['id'] . '.jpg'  }}" class="w-48 h-auto" ></img>
          </div>
        @else
          <div class="flex-auto relative">
            <center>
              <img src="{{ '/images/front-end/diamond_shapes/' . strtolower($row['shape']) . '.png'}}"  class="h-24 w-auto"> 
              <p class="text-gray-800">sample</p>
            </center>
          </div>
        @endif

      </div>

    <div class="row justify-content-center text-center" >
      <div class="col">
        <h5 class="text-blue-500">
          HK$ {{ $row['price'] }}
          <strong style="opacity: 0.3"> | </strong>   

          @if($row['location']=='1Hong Kong')
            <span>{{__('diamondSearch.1-2 Days')}}</span>
          @else
            <span> {{__('diamondSearch.Order')}}</span>
          @endif
        </h5>

        <p class="card-text">
                {{ $row['weight'] }}
                 <strong style="opacity: 0.3"> | </strong>
                {{ $row['color'] }}
                 <strong style="opacity: 0.3"> | </strong>                                        
                {{ $row['clarity'] }} 
                 <strong style="opacity: 0.3"> | </strong>                                        

                {{ $row['cut'] == '0' ? '' : $row['cut'] }}
                 <strong style="opacity: 0.3">  {{ $row['cut'] == '0' ? '' : '|' }} </strong>
                {{ $row['polish'] }} 
                 <strong style="opacity: 0.3"> | </strong>
                {{ $row['symmetry'] }}
                 <strong style="opacity: 0.3"> | </strong>
                {{__('diamondSearch.' . $row['fluorescence'] )}}
                 <strong style="opacity: 0.3"> | </strong>

                {{ $row['lab'] }} 
                {{ $row['certificate'] }}
        </p>
        <p>
          <span >
            @if($row['starred'])
              <i class="fa fa-star" aria-hidden="true">
              <strong style="opacity: 0.3"> | </strong>
              </i>
            @endif
          </span>
          @if($fetchData['table_percent'][1] != 0 )
            <span> {{ $row['table_percent'] }}%
              <strong style="opacity: 0.3"> | </strong>
            </span>
          @endif
          @if($fetchData['depth_percent'][1] != 0 )
            <span> {{ $row['depth_percent'] }}%
              <strong style="opacity: 0.3"> | </strong>
            </span>
          @endif
          @if($fetchData['crown_angle'][1] != 0 )
            <span> {{ $row['crown_angle'] }}°
              <strong style="opacity: 0.3"> | </strong>
            </span>
          @endif
          @if($fetchData['parvilion_angle'][1] != 0 )
            <span> {{ $row['parvilion_angle'] }}°
            </span>
          @endif
          @if($fetchData['length'][1] != 0 )
            <span> {{ $row['length'] }}mm
            </span>
          @endif
          @if($fetchData['width'][1] != 0 )
            <span> {{ $row['width'] }}mm
            </span>
          @endif
          @if($fetchData['depth'][1] != 0 )
            <span> {{ $row['depth'] }}mm
            </span>
          @endif
        </p>

      </div>
    </div>
    </a>
  </div>
@endforeach

@endif
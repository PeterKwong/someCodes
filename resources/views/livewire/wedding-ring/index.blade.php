<div id="totalHeigh">
    <div class="hidden sm:block p-4">
	    <div class="grid grid-cols-12">
	        <div class="col-span-5">
	    		<div class="grid grid-cols-12">
			        <div class="col-span-6">
			            <div>{{trans('weddingRing.Shape')}} </div>
		            		@foreach($search_conditions['shape'] as  $key => $shape)
				              <button class="btn btn-outline {{$search_conditions['shape'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('shape', '{{$key}}' )">
				                    {{__('weddingRing.' . $key)}}

				                   	@if($key == 'straight')
						              	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 438.406 344.308"><rect width="100%" height="100%" fill="#FFF"/><g class="currentLayer"><path fill="#242424" stroke="#222" stroke-width="2" stroke-linejoin="round" color="#000" d="M19 121h402v115H19z"/></g></svg>
						             @endif

				                   	@if($key == 'v-shape')						             
						             	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 438.406 344.308"><rect width="100%" height="100%" fill="#FFF"/><g class="currentLayer"><path fill="#242424" stroke="#222" stroke-width="2" stroke-linejoin="round" d="M220.706 209.06L425.548 23.227l-.476 122.906L220.23 331.965 16.833 144.553l.476-122.906L220.706 209.06z" color="#000"/></g></svg>
						             @endif

				                   	@if($key == 'wave')						             
						             	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 438.406 344.308"><rect width="100%" height="100%" fill="#FFF"/><g class="currentLayer"><path fill="#242424" stroke="#222" stroke-linejoin="round" d="M14.447 113.266c136.442-74.725 272.884 74.725 409.326 0v134.505c-136.442 74.725-272.884-74.725-409.326 0V113.266z" class="selected" color="#000"/><path fill="#242424" stroke="#222" stroke-linejoin="round" d="M90.465 109.516c3.921-4.952 7.843 4.951 11.764 0v8.913c-3.921 4.951-7.843-4.952-11.764 0v-8.913z" color="#000"/></g><defs><filter id="f205" height="1" width="1" y="0" x="0" color-interpolation-filters="sRGB"><feGaussianBlur result="result6" stdDeviation=".4"/><feComposite in2="result6" operator="in" in="SourceGraphic" result="result7"/><feComposite operator="in" in2="result7" result="result8" in="result7"/></filter></defs></svg>
						             @endif

				                   	@if($key == 'cross')
						             	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 438.406 344.308"><rect width="100%" height="100%" fill="#FFF"/><g class="currentLayer"><path fill="#242424" stroke="#222" stroke-linejoin="round" d="M541.216 210.275l-59.571-63.972-72.882 66.126-58.83-64.085-72.937 66.958-60.337-65.725L145.5 214.9l-59.592-64.914-71.158 65.324-88.644-96.56 35.58-32.661 58.846 64.102 72.048-66.14 59.592 64.913 72.048-66.14 59.592 64.913 72.047-66.14 60.337 65.725 72.937-66.958 89.388 97.371c-13.113 9.372-22.81 25.486-37.306 32.539h0z" color="#000"/><path fill="#242424" stroke="#222" stroke-linejoin="round" d="M467.79 276.009l-59.572-63.971-72.881 66.125-58.83-64.084-72.938 66.957-60.337-65.725-71.158 65.324-59.592-64.914-71.158 65.325-88.643-96.56 35.579-32.662 58.847 64.103 72.047-66.141L78.747 214.7l72.047-66.141 59.592 64.913 72.048-66.14 60.337 65.725 72.937-66.958 89.388 97.371c-13.114 9.373-22.81 25.486-37.307 32.539h0z" color="#000"/></g><defs><filter id="f205" height="1" width="1" y="0" x="0" color-interpolation-filters="sRGB"><feGaussianBlur result="result6" stdDeviation=".4"/><feComposite in2="result6" operator="in" in="SourceGraphic" result="result7"/><feComposite operator="in" in2="result7" result="result8" in="result7"/></filter></defs></svg>
						             @endif

				              </button>
				            @endforeach	            		
			        </div>

			        <div class="col-span-6">
			            <div>{{trans('weddingRing.Finish')}}</div>
			                @foreach($search_conditions['finish'] as  $key => $finish)
				              <button class="btn btn-outline {{$search_conditions['finish'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('finish', '{{$key}}' )">
				                    {{__('weddingRing.' . $key)}}


				                   	@if($key == 'high polish')
						              	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 438.406 344.308"><rect width="100%" height="100%" fill="#FFF"/><g class="currentLayer"><path fill="#242424" stroke="#222" stroke-width="2" stroke-linejoin="round" color="#000" d="M19 121h402v115H19z"/></g></svg>
						             @endif

				                    @if($key == 'matte')
				                    	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 438.406 344.308"><rect width="100%" height="100%" fill="#FFF"/><g class="currentLayer"><path fill="#242424" stroke="#222" stroke-linejoin="round" color="#000" d="M8.105 111.706h412v126h-412z"/><path fill="#242424" stroke="#222" stroke-linejoin="round" color="#000" d="M52 128h89v27H52z"/><path fill="#fff" stroke="#222" stroke-linejoin="round" d="M45.028 154.57c0-6.956 6.35-12.591 14.189-12.591s14.189 5.635 14.189 12.59c0 6.957-6.35 12.592-14.19 12.592-7.838 0-14.188-5.635-14.188-12.591zM72.44 208.063c0-8.612 6.35-15.587 14.19-15.587 7.838 0 14.188 6.975 14.188 15.587s-6.35 15.587-14.189 15.587-14.188-6.975-14.188-15.587zM154.72 203.706c0-8.639 6.126-15.636 13.69-15.636 7.562 0 13.688 6.997 13.688 15.636 0 8.64-6.126 15.637-13.689 15.637s-13.689-6.998-13.689-15.637zM261.888 208.248c0-6.597 4.629-11.94 10.343-11.94s10.342 5.343 10.342 11.94c0 6.597-4.628 11.94-10.342 11.94s-10.343-5.343-10.343-11.94zM106.846 166.867c0-7.066 5.813-12.79 12.99-12.79 7.176 0 12.99 5.724 12.99 12.79 0 7.067-5.814 12.79-12.99 12.79-7.177 0-12.99-5.723-12.99-12.79z"/><path fill="#fff" stroke="#222" stroke-linejoin="round" d="M258.329 148.343c0-6.321 4.717-11.44 10.542-11.44 5.824 0 10.542 5.119 10.542 11.44 0 6.32-4.718 11.44-10.542 11.44-5.825 0-10.542-5.12-10.542-11.44z" class="selected"/><path fill="#fff" stroke="#222" stroke-linejoin="round" d="M171.657 163.427c0-8.033 6.35-14.539 14.19-14.539 7.838 0 14.188 6.506 14.188 14.539 0 8.032-6.35 14.538-14.189 14.538s-14.189-6.506-14.189-14.538zM217.42 180.517c0-5.74 5.12-10.391 11.44-10.391 6.32 0 11.44 4.65 11.44 10.391 0 5.742-5.12 10.392-11.44 10.392-6.32 0-11.44-4.65-11.44-10.392zM325.979 210.213c0-6.017 5.344-10.891 11.94-10.891 6.598 0 11.941 4.874 11.941 10.891 0 6.018-5.343 10.892-11.94 10.892-6.597 0-11.941-4.874-11.941-10.892zM307.217 172.8c0-7.176 6.997-12.989 15.636-12.989s15.637 5.813 15.637 12.99c0 7.176-6.998 12.99-15.637 12.99s-15.636-5.814-15.636-12.99zM379.979 187.72c0-6.68 5.276-12.09 11.79-12.09 6.514 0 11.79 5.41 11.79 12.09s-5.276 12.091-11.79 12.091c-6.514 0-11.79-5.41-11.79-12.09zM371.986 146.906c0 6.898-5.677 12.486-12.685 12.486-7.009 0-12.686-5.588-12.686-12.486 0-6.899 5.677-12.486 12.686-12.486 7.008 0 12.685 5.587 12.685 12.486z"/></g><defs><filter id="f205" height="1" width="1" y="0" x="0" color-interpolation-filters="sRGB"><feGaussianBlur result="result6" stdDeviation=".4"/><feComposite in2="result6" operator="in" in="SourceGraphic" result="result7"/><feComposite operator="in" in2="result7" result="result8" in="result7"/></filter></defs></svg>
				                    @endif

				                    @if($key == 'brushed')
				                    	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 438.406 344.308"><rect width="100%" height="100%" fill="#FFF"/><g class="currentLayer"><path fill="#242424" stroke="#222" stroke-linejoin="round" color="#000" d="M12.549 111.706h412v126h-412z"/><path fill="#242424" stroke="#222" stroke-linejoin="round" color="#000" d="M52 128h89v27H52z"/><path fill="none" stroke="#fff" stroke-width="10" stroke-linejoin="round" d="M189.203 142.154l190-5M226.703 177.154h160M49.203 187.154l122.5-2.5M59.203 139.654h90M191.703 219.654l132.5-2.5M119.203 157.154l92.5 2.5M359.203 204.654l72.5-2.5M19.203 217.154l85-2.5M-.797 157.154h67.5M346.703 157.154l102.5-5"/></g><defs><filter id="f205" height="1" width="1" y="0" x="0" color-interpolation-filters="sRGB"><feGaussianBlur result="result6" stdDeviation=".4"/><feComposite in2="result6" operator="in" in="SourceGraphic" result="result7"/><feComposite operator="in" in2="result7" result="result8" in="result7"/></filter></defs></svg>
				                    @endif

				                    @if($key == 'hammered')				                    
				                    	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 438.406 344.308"><rect width="100%" height="100%" fill="#FFF"/><g class="currentLayer"><path fill="#242424" stroke="#222" stroke-linejoin="round" color="#000" d="M12.549 111.706h412v126h-412z"/><path fill="#242424" stroke="#222" stroke-linejoin="round" color="#000" d="M52 128h89v27H52z"/><path fill="#fff" stroke="#fff" stroke-width="10" stroke-linejoin="round" d="M273.748 186.7l-44.657-15.79-21.818 30.908 34.545 32.727M304.657 141.245L269.091 140l3.636 32.727 56.364 23.637 5.454-43.637-29.888-11.482zM579.203 126.7l-46.476 11.482-5.454 40 49.09 29.09 25.455-52.727-22.615-27.846zM351.93 164.881l58.98-10.336 10.908 43.637-63.636 10.909L340 180l11.93-15.119zM602.84 264.881l-44.658 29.664 18.182 34.546L620 314.545 621.818 280l-18.979-15.119zM639.203 35.79l.797 67.846 40 5.455 3.636-54.546-56.363-32.727 11.93 13.972zM68.294 172.154l55.342-1.245 21.819 36.364-21.819 9.09H100l-31.706-44.21zM310.112 439.427L303.636 480l34.546 1.818 25.454-32.727 14.546-20-49.091-5.455-18.98 15.79z" color="#000"/><path fill="#fff" stroke="#fff" stroke-width="10" stroke-linejoin="round" d="M6.475 188.518l57.161 9.664 12.728-47.273-21.819-20-48.07 57.609z" color="#000"/><path fill="#fff" stroke="#fff" stroke-width="10" stroke-linejoin="round" d="M144.657 130.336l4.434 64.21 63.636-9.091V160l-23.636-23.636-44.434-6.028z" class="selected" color="#000"/></g><defs><filter id="f205" height="1" width="1" y="0" x="0" color-interpolation-filters="sRGB"><feGaussianBlur result="result6" stdDeviation=".4"/><feComposite in2="result6" operator="in" in="SourceGraphic" result="result7"/><feComposite operator="in" in2="result7" result="result8" in="result7"/></filter></defs></svg>
				                    @endif

				              </button>
				            @endforeach	 
			        </div>
			    </div>
			</div>
	        <div class="col-span-7">
	    		<div class="grid grid-cols-12">
			        <div class="col-span-5">
			            <div>{{trans('weddingRing.Metal')}}</div>
			                @foreach($search_conditions['metal'] as  $key => $metal)
				              <button class="btn btn-outline {{$search_conditions['metal'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('metal', '{{$key}}' )">
				                    {{__('weddingRing.' . $key)}}
				              </button>
				            @endforeach	 
			        </div>
			        <div class="col-span-2">
			            <div>{{trans('weddingRing.Style')}}</div>		            
				            <select class="btn btn-outline {{count($fetchData['style'])? 'btn-active':'' }}" wire:model="fetchData.style.0">
				            	@foreach($search_conditions['style'] as  $key => $style)
				            		<option value="{{$style['value'][0]}}">{{__('weddingRing.' . $key)}}</option>
				            	@endforeach
				            </select>
			        </div>
<!-- 			        <div class="col-span-2">
			            <div>{{trans('weddingRing.Origin')}}</div>
			                @foreach($search_conditions['origin'] as  $key => $origin)
				              <button class="btn btn-outline {{$search_conditions['origin'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('origin', '{{$key}}' )">
				                    {{__('weddingRing.' . $key)}}
				              </button>
				            @endforeach
			        </div> -->
			        <div class="col-span-3">
			            <div>{{trans('weddingRing.Brand')}}</div>	            
				            <select class="btn btn-outline {{count($fetchData['brand'])? 'btn-active':'' }}" wire:model="fetchData.brand.0">
				            	@foreach($search_conditions['brand'] as  $key => $brand)
				            		<option value="{{$brand['value'][0]}}">
				            			<div wire:click="toggleValue('brand', '{{$key}}' )">{{__('weddingRing.' . $key)}}</div>
				            		</option>
				      
				            	@endforeach
				            </select>
			        </div>
			        <div class="col-span-2">
			            <div>{{trans('weddingRing.Origin')}}</div>	            
				            <select class="btn btn-outline {{count($fetchData['origin'])? 'btn-active':'' }}" wire:model="fetchData.origin.0">
				            	@foreach($search_conditions['origin'] as  $key => $origin)
				            		<option value="{{$origin['value'][0]}}">
				            			<div wire:click="toggleValue('origin', '{{$key}}' )">{{__('weddingRing.' . $key)}}</div>
				            		</option>
				      
				            	@endforeach
				            </select>
			        </div>

			    </div>
			</div>

	    </div>
	</div>

	<div class="sm:hidden">
		<span  x-data="mobileSearch()">
	        <div class="flex box justify-center p-2 mx-1 items-center" x-on:click="selectDisplayColumn('shape')">
	            <a class="is-primary px-2">{{trans('weddingRing.Shape')}}</a>
	            <a >
	             @foreach($search_conditions['shape'] as  $key => $shape)
		             @if($shape['clicked'])
		              <button class="btn btn-outline {{$shape['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('shape', '{{$key}}' )">
		              	{{__('weddingRing.' . $key)}}

		              </button>
		             @endif
	            @endforeach	
	            </a>
			            		
	            <i class="fas fa-chevron-down"></i>
	        </div>
            <div class="flex justify-center"  x-show="displayColumn == 'shape' ">
               	@foreach($search_conditions['shape'] as  $key => $shape)
	              <button class="btn btn-outline {{$shape['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('shape', '{{$key}}' )">
	              	{{__('weddingRing.' . $key)}}

	              </button>
	            @endforeach	
                
            </div>

	        <div class="flex box justify-center p-2 mx-1 items-center" x-on:click="selectDisplayColumn('finish')">
	            <a class="is-primary px-2">{{trans('weddingRing.finish')}}</a>
	            <a >
	             @foreach($search_conditions['finish'] as  $key => $finish)
		             @if($finish['clicked'])
		              <button class="btn btn-outline {{$finish['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('finish', '{{$key}}' )">
		              	{{__('weddingRing.' . $key)}}

		              </button>
		             @endif
	            @endforeach	
	            </a>
			            		
	            <i class="fas fa-chevron-down"></i>
	        </div>
            <div class="flex justify-center"  x-show="displayColumn == 'finish' ">
               	@foreach($search_conditions['finish'] as  $key => $finish)
	              <button class="btn btn-outline {{$finish['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('finish', '{{$key}}' )">
	              	{{__('weddingRing.' . $key)}}

	              </button>
	            @endforeach	
                
            </div>

	        <div class="flex box justify-center p-2 mx-1 items-center" x-on:click="selectDisplayColumn('metal')">
	            <a class="is-primary px-2">{{trans('weddingRing.metal')}}</a>
	            <a >
	             @foreach($search_conditions['metal'] as  $key => $metal)
		             @if($metal['clicked'])
		              <button class="btn btn-outline {{$metal['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('metal', '{{$key}}' )">
		              	{{__('weddingRing.' . $key)}}

		              </button>
		             @endif
	            @endforeach	
	            </a>
			            		
	            <i class="fas fa-chevron-down"></i>
	        </div>
            <div class="flex justify-center"  x-show="displayColumn == 'metal' ">
               	@foreach($search_conditions['metal'] as  $key => $metal)
	              <button class="btn btn-outline {{$metal['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('metal', '{{$key}}' )">
	              	{{__('weddingRing.' . $key)}}

	              </button>
	            @endforeach	
                
            </div>

	        <div class="flex box justify-center p-2 mx-1 items-center" x-on:click="selectDisplayColumn('origin')">
	            <a class="px-2">{{trans('weddingRing.origin')}}</a>
	            <select class="btn btn-outline {{count($fetchData['origin'])? 'btn-active':'' }}" wire:model="fetchData.origin.0">
	            	@foreach($search_conditions['origin'] as  $key => $origin)
	            		<option value="{{$origin['value'][0]}}">
	            			<div wire:click="toggleValue('origin', '{{$key}}' )">{{__('weddingRing.' . $key)}}</div>
	            		</option>
	      
	            	@endforeach
	            </select>
            </div>

	        <div class="flex box justify-center p-2 mx-1 items-center" x-on:click="selectDisplayColumn('brand')">
	            <a class="px-2">{{trans('weddingRing.brand')}}</a>
	            <select class="btn btn-outline {{count($fetchData['brand'])? 'btn-active':'' }}" wire:model="fetchData.brand.0">
	            	@foreach($search_conditions['brand'] as  $key => $brand)
	            		<option value="{{$brand['value'][0]}}">
	            			<div wire:click="toggleValue('brand', '{{$key}}' )">{{__('weddingRing.' . $key)}}</div>
	            		</option>
	      
	            	@endforeach
	            </select>
                
            </div>

	        <div class="flex box justify-center p-2 mx-1 items-center" x-on:click="selectDisplayColumn('style')">
	            <a class="px-2">{{trans('weddingRing.style')}}</a>
	            <select class="btn btn-outline {{count($fetchData['style'])? 'btn-active':'' }}" wire:model="fetchData.style.0">
	            	@foreach($search_conditions['style'] as  $key => $style)
	            		<option value="{{$style['value'][0]}}">{{__('weddingRing.' . $key)}}</option>
	            	@endforeach
	            </select>
                
            </div>

		                
		</span>
	</div>


	<div class="grid grid-cols-12">
		@foreach($model['data'] as $data)
			@if( count($data['images']) )
			    <div class="sm:col-span-3 col-span-6 hover:opacity-75 sm:p-8">
		            <a href="/{{app()->getLocale() . '/wedding-rings/' . $data['id'] }}" target="_blank">
		                <img src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $data['images'][0]['image']}}" width="100%">
		                    <center>
		                        <div class="grid grid-cols-12">
		                            <div class="col-span-6 p-1">
		                            	<p  class="text-gray-600" >HK${{$data['wedding_rings'][0]['unit_price']}} 
			                            ({{__('weddingRing.' . $data['wedding_rings'][0]['gender'])}})
			                        	</p>
			                        	<p class="text-blue-600 text-sm">
			                        		{{ $data['wedding_rings'][0]['title'] }} 
			                        	</p>
			                        </div>
		                            <div class="col-span-6 p-1" > 
		                            	<p  class="text-gray-600" >HK${{$data['wedding_rings'][1]['unit_price']}}
			                            ({{__('weddingRing.' . $data['wedding_rings'][1]['gender'])}})
			                            </p>
			                            <p class="text-blue-600 text-sm">
			                        		{{ $data['wedding_rings'][0]['title'] }}	
			                            </p>
			                        </div>
		                        </div>
		                        
		                       
		                        
		                    </center>
		            </a>
			    </div>
		   	@endif
	    @endforeach


	</div>
	                

	<div class="grid grid-cols-12 ">
	    <div class="col-span-12 flex justify-center {{ isset($model['total']) && $model['total'] == 0 ? ' hidden' : ''}}">
	           <button class="btn btn-primary" wire:click="addPage()">{{trans('engagementRing.More')}}</button>
	    </div>
	    <div class="col-span-12 flex justify-center {{ isset($model['total']) && $model['total'] == 0 ? '' : ' hidden'}}">
	    	 <button class="btn btn-primary" wire:click="resetAll">
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


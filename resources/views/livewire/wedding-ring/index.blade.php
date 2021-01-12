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
				              </button>
				            @endforeach	            		
			        </div>

			        <div class="col-span-6">
			            <div>{{trans('weddingRing.Finish')}}</div>
			                @foreach($search_conditions['finish'] as  $key => $finish)
				              <button class="btn btn-outline {{$search_conditions['finish'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('finish', '{{$key}}' )">
				                    {{__('weddingRing.' . $key)}}
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
	            <a class="is-primary px-2">{{trans('weddingRing.origin')}}</a>
	            <a >
	             @foreach($search_conditions['origin'] as  $key => $origin)
		             @if($origin['clicked'])
		              <button class="btn btn-outline {{$origin['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('origin', '{{$key}}' )">
		              	{{__('weddingRing.' . $key)}}

		              </button>
		             @endif
	            @endforeach	
	            </a>
			            		
	            <i class="fas fa-chevron-down"></i>
	        </div>
            <div class="flex justify-center"  x-show="displayColumn == 'origin' ">
               	@foreach($search_conditions['origin'] as  $key => $origin)
	              <button class="btn btn-outline {{$origin['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('origin', '{{$key}}' )">
	              	{{__('weddingRing.' . $key)}}

	              </button>
	            @endforeach	
                
            </div>

	        <div class="flex box justify-center p-2 mx-1 items-center" x-on:click="selectDisplayColumn('brand')">
	            <a class="is-primary px-2">{{trans('weddingRing.brand')}}</a>
	            <a >
	             @foreach($search_conditions['brand'] as  $key => $brand)
		             @if($brand['clicked'])
		              <button class="btn btn-outline {{$brand['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('brand', '{{$key}}' )">
		              	{{__('weddingRing.' . $key)}}

		              </button>
		             @endif
	            @endforeach	
	            </a>
			            		
	            <i class="fas fa-chevron-down"></i>
	        </div>
            <div class="flex justify-center"  x-show="displayColumn == 'brand' ">
               	@foreach($search_conditions['brand'] as  $key => $brand)
	              <button class="btn btn-outline {{$brand['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('brand', '{{$key}}' )">
	              	{{__('weddingRing.' . $key)}}

	              </button>
	            @endforeach	
                
            </div>

	        <div class="flex box justify-center p-2 mx-1 items-center" x-on:click="selectDisplayColumn('style')">
	            <a class="is-primary px-2">{{trans('weddingRing.style')}}</a>
	            <a >
	             @foreach($search_conditions['style'] as  $key => $style)
		             @if($style['clicked'])
		              <button class="btn btn-outline {{$style['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('style', '{{$key}}' )">
		              	{{__('weddingRing.' . $key)}}

		              </button>
		             @endif
	            @endforeach	
	            </a>
			            		
	            <i class="fas fa-chevron-down"></i>
	        </div>
            <div class="flex justify-center"  x-show="displayColumn == 'style' ">
               	@foreach($search_conditions['style'] as  $key => $style)
	              <button class="btn btn-outline {{$style['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('style', '{{$key}}' )">
	              	{{__('weddingRing.' . $key)}}

	              </button>
	            @endforeach	
                
            </div>

		                
		</span>
	</div>



	<div class="grid grid-cols-12">
		@foreach($model['data'] as $data)
		    <div class="sm:col-span-3 col-span-6 hover:opacity-75 sm:p-8">
	            <a href="/{{app()->getLocale() . '/wedding-rings/' . $data['id'] }}" target="_blank">
	                <img src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $data['wedding_rings'][0]['images'][0]['image']}}" width="100%">
	                    <center>
	                        <div class="grid grid-cols-12">
	                            <div class="col-span-6">
	                            	<p  class="text-gray-600" >HK${{$data['wedding_rings'][0]['unit_price']}} 
		                            ({{__('weddingRing.' . $data['wedding_rings'][0]['gender'])}})
		                        	</p>
		                        	<p class="text-blue-600 text-sm">
		                        		{{$data['wedding_rings'][0]['sideStone']? __('weddingRing.Side stone') :''}} 
		                        		{{__('weddingRing.' . $data['wedding_rings'][0]['shape']) }} {{__('weddingRing.' . $data['wedding_rings'][0]['finish']) }}  {{__('weddingRing.' . $data['wedding_rings'][0]['metal']) }} 
		                        	</p>
		                        </div>
	                            <div class="col-span-6" > 
	                            	<p  class="text-gray-600" >HK${{$data['wedding_rings'][1]['unit_price']}}
		                            ({{__('weddingRing.' . $data['wedding_rings'][1]['gender'])}})
		                            </p>
		                            <p class="text-blue-600 text-sm">
		                            	{{$data['wedding_rings'][1]['sideStone']? __('weddingRing.Side stone') :''}} 
		                            	{{__('weddingRing.' . $data['wedding_rings'][1]['shape']) }} {{__('weddingRing.' . $data['wedding_rings'][1]['finish']) }} {{__('weddingRing.' . $data['wedding_rings'][1]['metal']) }} 
		                            </p>
		                        </div>
	                        </div>
	                        
	                       
	                        
	                    </center>
	            </a>
		    </div>
	    @endforeach
	</div>
	                

	<div class="row justify-content-center">
	    <div class="col">
	        <center>
	            <button class="btn btn-primary" wire:click="addPage()">{{trans('engagementRing.More')}}</button>
	        </center>
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

@include('layouts.components.infinityAddPage')


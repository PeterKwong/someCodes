 <div id="totalHeigh">
   <div class="hidden sm:block p-4">
	    <div class="grid grid-cols-12">

	        <div class="col-span-8">
			    <div class="grid grid-cols-12">
			        <div class="col-span-6">
			            <div>{{trans('engagementRing.Style')}}</div>
			            @foreach($search_conditions['style'] as  $key => $style)
			              <button class="btn btn-outline inline-flex items-center {{$search_conditions['style'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('style', '{{$key}}' )">
			                    <img src="/images/front-end/engagementRing/{{ucfirst($key)}}.png" height="30" width="55">
			                    {{__('engagementRing.' . $key)}}
			              </button>
			            @endforeach
			        </div>
			        <div class="col-span-6">
			            <div>{{trans('engagementRing.Shoulder')}}</div>
			            @foreach($search_conditions['shoulder'] as  $key => $shoulder)
			              <button class="btn btn-outline inline-flex items-center {{$search_conditions['shoulder'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('shoulder', '{{$key}}' )">
			                    <img src="/images/front-end/engagementRing/{{ucfirst($key)}}.png" height="30" width="55">
			                    {{__('engagementRing.' . $key)}}
			              </button>
			            @endforeach	   
			        </div> 			        
			    </div>    
	        </div>
	        <div class="col-span-4">
			    <div class="grid grid-cols-12">
			        <div class="col-span-6">
			            <div>{{trans('engagementRing.Claw Prong')}}</div>
			            @foreach($search_conditions['prong'] as  $key => $prong)
			              <button class="btn btn-outline inline-flex items-center {{$search_conditions['prong'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('prong', '{{$key}}' )">
			                    {{__('engagementRing.' . $key)}}
			              </button>
			            @endforeach	         
			        </div> 
<!-- 			         <div class="col-span-4">
			            <div>{{trans('engagementRing.Shape')}}</div>
				            <select class="btn btn-outline {{count($fetchData['shape'])? 'btn-active':'' }}" wire:model="fetchData.shape.0">
				            	@foreach($search_conditions['shape'] as  $key => $shape)
				            		<option value="{{$shape['value'][0]}}">
				            			<div wire:click="toggleValue('shape', '{{$key}}' )">{{__('diamondSearch.' . $key)}}</div>
				            		</option>
				            	@endforeach
				            </select>      
			        </div>  -->
			         <div class="col-span-6">
			            <div>{{trans('engagementRing.other styles')}}</div>
				            <select class="btn btn-outline {{count($fetchData['other'])? 'btn-active':'' }}" wire:model="fetchData.other.0">
				            	@foreach($search_conditions['other'] as  $key => $other)
				            		<option value="{{$other['value'][0]}}">
				            			<div wire:click="toggleValue('other', '{{$key}}' )">{{__('engagementRing.' . $key)}}</div>
				            		</option>
				            	@endforeach
				            </select>      
			        </div> 
			    </div>
	        </div>


	    </div>    
	</div>



	<div class="block sm:hidden" >
	<span x-data="mobileSearch()">
        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('style')">
            <a class="px-2">{{trans('engagementRing.Style')}}</a>
            <a  x-on:click="selectDisplayColumn('style')">
              @foreach($search_conditions['style'] as  $key => $style)
	             @if($style['clicked'])
	              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('style', '{{$key}}' )">
	                    <img src="/images/front-end/engagementRing/{{ucfirst($key)}}.png" height="30" width="55">
	                    {{__('engagementRing.' . $key)}}
	              </button>
	              @endif
              @endforeach
            </a>

            <i class="fas fa-chevron-down"></i>
        </div>

        <div class="flex justify-center"  x-show="displayColumn == 'style' ">
            @foreach($search_conditions['style'] as  $key => $style)
              <button class="btn btn-outline inline-flex items-center {{$search_conditions['style'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('style', '{{$key}}' )">
                    <img src="/images/front-end/engagementRing/{{ucfirst($key)}}.png" height="30" width="55">
                    {{__('engagementRing.' . $key)}}
              </button>
            @endforeach	 

        </div>

        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('shoulder')">
            <a class="px-2">{{trans('engagementRing.Shoulder')}}</a>
            <a  x-on:click="selectDisplayColumn('shoulder')">
              @foreach($search_conditions['shoulder'] as  $key => $shoulder)
	             @if($shoulder['clicked'])
	              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('shoulder', '{{$key}}' )">
	                    <img src="/images/front-end/engagementRing/{{ucfirst($key)}}.png" height="30" width="55">
	                    {{__('engagementRing.' . $key)}}
	              </button>
	              @endif
              @endforeach
            </a>

            <i class="fas fa-chevron-down"></i>
        </div>

        <div class="flex justify-center"  x-show="displayColumn == 'shoulder' ">
            @foreach($search_conditions['shoulder'] as  $key => $shoulder)
              <button class="btn btn-outline inline-flex items-center {{$search_conditions['shoulder'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('shoulder', '{{$key}}' )">
                    <img src="/images/front-end/engagementRing/{{ucfirst($key)}}.png" height="30" width="55">
                    {{__('engagementRing.' . $key)}}
              </button>
            @endforeach	 

        </div>           
	            
        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('prong')">
            <a class="px-2">{{trans('engagementRing.Prong')}}</a>
            <a  x-on:click="selectDisplayColumn('prong')">
              @foreach($search_conditions['prong'] as  $key => $prong)
	             @if($prong['clicked'])
	              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('prong', '{{$key}}' )">
	                    {{__('engagementRing.' . $key)}}
	              </button>
	              @endif
              @endforeach
            </a>

            <i class="fas fa-chevron-down"></i>
        </div>

        <div class="flex justify-center"  x-show="displayColumn == 'prong' ">
            @foreach($search_conditions['prong'] as  $key => $prong)
              <button class="btn btn-outline inline-flex items-center {{$search_conditions['prong'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('prong', '{{$key}}' )">
                    {{__('engagementRing.' . $key)}}
              </button>
            @endforeach	 

        </div>

        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('other')">
            <a class="px-2">{{trans('engagementRing.other styles')}}</a>
		            <select class="btn btn-outline {{count($fetchData['other'])? 'btn-active':'' }}" wire:model="fetchData.other.0">
		            	@foreach($search_conditions['other'] as  $key => $other)
		            		<option value="{{$other['value'][0]}}">
		            			<div wire:click="toggleValue('other', '{{$key}}' )">{{__('engagementRing.' . $key)}}</div>
		            		</option>
		            	@endforeach
		            </select>      
        </div>

	</span>         
	</div>

	<div class="flex flex-col space-y-5 items-center pb-0 md:pb-7 p-7 border-t mt-5">
      <div class="flex w-full md:items-center justify-between">
          <div class="flex flex-wrap items-center gap-3">
	          @foreach($tags as  $k => $conditions)
							  @foreach($conditions as  $key => $data)
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
		                  <span>{{__('engagementRing.' . $data)}}</span>
		              </div>
				  			@endforeach
						@endforeach
          </div>
          <div class="flex flex-shrink-0">
              <a class="text-brown underline" href="#" wire:click="resetAll()">Clear</a>
          </div>
      </div>
  </div>


	<div class="grid grid-cols-12">
		@foreach($model['data'] as $data)
			
			@if( count($data['images']) )
			    <div class="sm:col-span-3 col-span-6 hover:opacity-75 sm:p-8">
		            <a href="/{{app()->getLocale() . '/engagement-rings/' . $data['id'] }}" target="_blank">
		                <img src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $data['images'][0]['image']}}" width="100%">
		                    <center>
		                        
	                        	<p  class="text-gray-600" >HK${{$data['unit_price']}} 
			                        @if($data['invoices_count'] != 0)
	                        			(<i class="fas fa-star text-yellow-600"></i> 
	                        				<span class="text-yellow-700">
	                        				{{$data['invoices_count']}}
	                        			</span>)
	                        		@endif
                            </p>
                            <p class="text-blue-600 text-sm p-1">
                            	{{ $data['title'] }} 
                            </p>	                			
		                        
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

@include('layouts.js.infinityAddPage')


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









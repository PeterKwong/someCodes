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


	<div class="grid grid-cols-12">
		@foreach($model['data'] as $data)
		    <div class="sm:col-span-3 col-span-6 hover:opacity-75 sm:p-8">
	            <a href="/{{app()->getLocale() . '/engagement-rings/' . $data['id'] }}" target="_blank">
	                <img src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $data['images'][0]['image']}}" width="100%">
	                    <center>
	                        
                        	<p  class="text-gray-600" >HK${{$data['unit_price']}}
                            </p>
                            <p class="text-blue-600 text-sm">
                            	{{$data['style']? __('engagementRing.Side stone') :''}} 
                            	{{__('engagementRing.' . $data['prong']) }} {{__('engagementRing.' . $data['shoulder']) }} {{__('frontHeader.Engagement Rings') }} 
                            </p>
                
	                        
	                    </center>
	            </a>
		    </div>
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

@include('layouts.components.infinityAddPage')








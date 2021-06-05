<div id="totalHeigh">
    <div class="hidden sm:block p-4">
	    <div class="grid grid-cols-12">
	        <div class="col-span-6">
	            <div>{{trans('jewellery.Type')}}</div>
	            @foreach($search_conditions['type'] as  $key => $type)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['type'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('type', '{{$key}}' )">
	                    <img src="/images/front-end/jewellery/{{ucfirst($key)}}.png" class="w-8">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach      
	        </div>
	        <div class="col-span-6">
	            <div>{{trans('jewellery.Gemstone')}}</div>
	            @foreach($search_conditions['gemstone'] as  $key => $gemstone)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['gemstone'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('gemstone', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach             
	        </div>
	    </div>
	    
	    <br>

	    <div class="grid grid-cols-12">
	        <div class="col-span-6">
	            <div>{{trans('jewellery.Metal')}}</div>
	            @foreach($search_conditions['metal'] as  $key => $metal)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['metal'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('metal', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach   
	            </button>
	        </div>
	        <div class="col-span-6">
	            <div>{{trans('jewellery.Setting')}}</div>
	            @foreach($search_conditions['setting'] as  $key => $setting)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['setting'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('setting', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach 
	            
	        </div>
	    </div>

	</div>


	<div class="block sm:hidden" >
		<span x-data="mobileSearch()">
	        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('type')">
	            <a class="px-2">{{trans('jewellery.Type')}}</a>
	            <a  x-on:click="selectDisplayColumn('type')">
	              @foreach($search_conditions['type'] as  $key => $type)
		             @if($type['clicked'])
		              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('type', '{{$key}}' )">
		                    <img src="/images/front-end/jewellery/{{ucfirst($key)}}.png" class="w-8">
		                    {{__('jewellery.' . $key)}}
		              </button>
		              @endif
	              @endforeach
	            </a>
	            <i class="fas fa-chevron-down"></i>
	        </div>

	        <div class="flex justify-center"  x-show="displayColumn == 'type' ">
	            @foreach($search_conditions['type'] as  $key => $type)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['type'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('type', '{{$key}}' )">
	                    <img src="/images/front-end/jewellery/{{ucfirst($key)}}.png" class="w-8">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach	 
	        </div>

	        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('gemstone')">
	            <a class="px-2">{{trans('jewellery.Gemstone')}}</a>
	            <a  x-on:click="selectDisplayColumn('gemstone')">
	              @foreach($search_conditions['gemstone'] as  $key => $gemstone)
		             @if($gemstone['clicked'])
		              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('gemstone', '{{$key}}' )">
		                    {{__('jewellery.' . $key)}}
		              </button>
		              @endif
	              @endforeach
	            </a>
	            <i class="fas fa-chevron-down"></i>
	        </div>

	        <div class="flex justify-center"  x-show="displayColumn == 'gemstone' ">
	            @foreach($search_conditions['gemstone'] as  $key => $gemstone)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['gemstone'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('gemstone', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach	 
	        </div>

	        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('metal')">
	            <a class="px-2">{{trans('jewellery.Metal')}}</a>
	            <a  x-on:click="selectDisplayColumn('metal')">
	              @foreach($search_conditions['metal'] as  $key => $metal)
		             @if($metal['clicked'])
		              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('metal', '{{$key}}' )">
		                    {{__('jewellery.' . $key)}}
		              </button>
		              @endif
	              @endforeach
	            </a>

	            <i class="fas fa-chevron-down"></i>
	        </div>

	        <div class="flex justify-center"  x-show="displayColumn == 'metal' ">
	            @foreach($search_conditions['metal'] as  $key => $metal)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['metal'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('metal', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach	 
	        </div>

	        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('setting')">
	            <a class="px-2">{{trans('jewellery.Setting')}}</a>
	            <a  x-on:click="selectDisplayColumn('setting')">
	              @foreach($search_conditions['setting'] as  $key => $setting)
		             @if($setting['clicked'])
		              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('setting', '{{$key}}' )">
		                    {{__('jewellery.' . $key)}}
		              </button>
		              @endif
	              @endforeach
	            </a>

	            <i class="fas fa-chevron-down"></i>
	        </div>

	        <div class="flex justify-center"  x-show="displayColumn == 'setting' ">
	            @foreach($search_conditions['setting'] as  $key => $setting)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['setting'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('setting', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach	 
	        </div>

		</span>    
	   
	</div>


	<div class="grid grid-cols-12">
		@foreach($model['data'] as $data)
			@if( count($data['images']) )
		    <div class="sm:col-span-3 col-span-6 hover:opacity-75 sm:p-8">
	            <a href="/{{app()->getLocale() . '/jewellery/' . $data['id'] }}" target="_blank">
	                <img src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $data['images'][0]['image']}}" width="100%">
	                    <center>

                        	<p  class="text-gray-600" >HK${{$data['unit_price']}}
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



</div>

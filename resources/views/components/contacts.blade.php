<div class="grid grid-cols-12 gap-6">
  @foreach( config('global.company.staffs') as $staff )
    <div class="col-span-12 sm:col-span-6 box mx-4">
      <div class="card " style="max-width: 540px;">
        <div class="flex justify-center">

        @if(app()->getLocale() != 'cn')
		    <a class="text-blue-600" href="{{ '/links/whatsapp/852' .  $staff['number'] }}">
		    	<div class="flex">
		    		<div class="p-2">
			            <div class="w-12 h-12">
			              <img src="{{ '/images/front-end/contact/' . $staff['name'] . '.png' }}" class="w-12 h-12 rounded-full flex items-center justify-center" alt="...">
			            </div>
			          </div>
			        <div class="card-body">
			       		<div class="flex items-center text-center">
				          <img class="w-8 h-8 m-1" src="/images/front-end/aboutUs/whatsapp.jpg">
				          <h5 class="pt-2 text-2xl text-gray-600">{{ $staff['name'] }}</h5>
			        	</div>

			            <p class="card-text">
			              <small class="text-muted">
			                    {{__('aboutUs.or contact her via')}}
			                    whatsapp
			              </small>
			            </p>
			        </div>
		    	</div>
		     </a>
         @endif

        @if(app()->getLocale() == 'cn')
	      <div class="p-2">

            <div class="w-24 h-24">
              <img src="{{ '/images/front-end/contact/wechat/' . $staff['name'] . '.png' }}" class="" alt="...">
            </div>

          </div>
          
	        <div class="card-body">
	        	<div class="flex items-center text-center">
	          <img class="w-8 h-8 m-1" src="/images/front-end/aboutUs/whatsapp.jpg">
	          <h5 class="pt-2 text-2xl text-gray-600">{{ $staff['name'] }}</h5>
	        		
	        	</div>
	            <p class="pt-2 card-text">{{__('aboutUs.@Wechat')}}</p>
	        </div>
	    @endif


        </div>
      </div>                    
    </div>
  @endforeach

</div>

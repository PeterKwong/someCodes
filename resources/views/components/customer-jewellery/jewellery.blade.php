<div class="p-4 box">
    
    <article>
        <center>
          <x-appointment v-if="appointmentState"/>
  
        </center>
        <br>
        <p>
        {{trans('jewellery.For more detailed information')}}, 
        <br>
        <a @click="appointmentState=!appointmentState">{{trans('jewellery.Make Appointment')}}</a> or <a href="{{app()->getLocale()}}/about-us">{{trans('jewellery.contact us')}}</a> {{trans('jewellery.for further')}}：
        </p>
    </article>
    
    <article class="">

            <div class="grid grid-cols-12 border-b p-2 font-semibold sm:text-lg">
                <div class="col-span-6">{{__('jewellery.Jewellery Info')}}</div>
            </div>
            <div class="grid grid-cols-12 border-b p-2 font-light">
                <div class="col-span-6">{{__('jewellery.Unit Price')}}</div>
                <div class="col-span-6">${{ $jewelleries->unit_price }}</div>
            </div>
            <div class="grid grid-cols-12 border-b p-2 font-light">
                <div class="col-span-6">{{__('jewellery.Type')}}</div>
                <div class="col-span-6">{{ __('jewellery.' . $jewelleries->type) }}</div>
            </div>
            <div class="grid grid-cols-12 border-b p-2 font-light">
                <div class="col-span-6">{{__('jewellery.Gemstone')}}</div>
                <div class="col-span-6">{{ __('jewellery.' . $jewelleries->gemstone) }}</div>
            </div>
            <div class="grid grid-cols-12 border-b p-2 font-light">
                <div class="col-span-6">{{__('jewellery.Metal')}}</div>
                <div class="col-span-6">{{ __('jewellery.' . $jewelleries->metal) }}</div>
            </div>
            <div class="grid grid-cols-12 border-b p-2 font-light">
                <div class="col-span-6">{{__('jewellery.Side Stone')}}</div>
                <div class="col-span-6">{{__('engagementRing.Around')}} {{ $jewelleries->ct}} {{trans('jewellery.ct')}}</div>
            </div>
            <div class="grid grid-cols-12 border-b p-2 font-semibold sm:text-lg">
                <div class="col-span-6">{{__('jewellery.More Details')}}</div>
            </div>
            <div class="grid grid-cols-12 border-b p-2 font-light">
                <div class="col-span-6">{{__('jewellery.Stock')}}</div>
                <div class="col-span-6">{{ $jewelleries->stock}}</div>
            </div>
            <div class="grid grid-cols-12 border-b p-2 font-light">
                <div class="col-span-6">{{__('jewellery.Name')}}</div>
                <div class="col-span-6" >{{ $tags }}</div>
            </div>
            <div class="grid grid-cols-12 border-b p-2 font-light">
                <div class="col-span-6">{{__('jewellery.Description')}}</div>
                <div class="col-span-6">{{ $tags }}</div>
            </div>
   
    </article>

    
</div>
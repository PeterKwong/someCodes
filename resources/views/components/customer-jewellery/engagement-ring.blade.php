<div class="col-span-12 sm:col-span-5 box px-4">
    <article>
      <center class="p-2">

          
<!--                                   <button class="button is-info" @click="appointmentState=!appointmentState">{{__('engagementRing.Appointment')}}</button>
          <appointment v-model="engagementRing" :title="appointmentTitle" @active="appointmentState=!appointmentState" :active="appointmentState" :columns="columns"  :processing="false" :langs="langs" :locale="locale"></appointment>
-->                                  

<!--                                   <x-appointment v-if="appointmentState"/>
-->
      </center>

      <p class="p-2">
      {{trans('engagementRing.For more detailed information')}}, 

          <a @click="appointmentState=!appointmentState">{{trans('engagementRing.Make Appointment')}}</a> or <a href="{{ '/' . app()->getlocale() . '/about-us'}}">{{trans('engagementRing.contact us')}}
          </a> {{trans('engagementRing.for further')}}：
      </p>
  </article>


    <article class="p-2">

            <div class="grid grid-cols-12 border-b p-2" >
              <div class="col-span-6 p-2 text-lg sm:text-2xl font-semibold" >{{__('engagementRing.Engagement Ring Info')}}</div>
            </div>
            <div class="grid grid-cols-12 border-b" >
              <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Unit Price')}}</div>
              <div class="col-span-6 p-2 font-light" >${{ $engagementRings->unit_price }}</div>
            </div>
            <div class="grid grid-cols-12 border-b" >
              <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Style')}}</div>
              <div class="col-span-6 p-2 font-light" >
                <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/engagement-rings?style=' . strtolower($engagementRings->style) }}" target="_blank">
                  {{__('engagementRing.' .$engagementRings->style )}}
                </a>
              </div>
            </div>
            <div class="grid grid-cols-12 border-b" >
              <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Shoulder')}}</div>
              <div class="col-span-6 p-2 font-light" >
                <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/engagement-rings?shoulder=' . strtolower($engagementRings->shoulder)  }}" target="_blank">
                  {{__('engagementRing.' .$engagementRings->shoulder )}}
                </a>
              </div>
            </div>
            <div class="grid grid-cols-12 border-b" >
              <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Prong')}}</div>
              <div class="col-span-6 p-2 font-light" >
                <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/engagement-rings?prong=' . strtolower($engagementRings->prong)  }}" target="_blank">
                  {{__('engagementRing.' .$engagementRings->prong )}}
                </a>
              </div>
            </div>
            <div class="grid grid-cols-12 border-b" >
              <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Side Stone')}}</div>
              <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Around')}} {{ $engagementRings->ct }} {{trans('engagementRing.ct')}}</div>
            </div>
      
            <div class="grid grid-cols-12 border-b p-2" >
              <div class="col-span-12 p-2 font-light" >{{__('engagementRing.More Details')}}</div>
            </div>
       
            <div class="grid grid-cols-12 border-b" >
              <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Stock')}}</div>
              <div class="col-span-6 p-2 font-light" >
                <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/engagement-rings/' . $engagementRings->id  }}" target="_blank">
                {{ $engagementRings->stock }}
                </a>
              </div>
            </div>
            <div class="grid grid-cols-12 border-b" >
              <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Name')}}</div>
              <div  class="col-span-6 p-2 font-light" ></div>
            </div>
            <div class="grid grid-cols-12 border-b" >
              <div class="col-span-6 p-2 font-light" >{{__('engagementRing.Description')}}</div>
              <div class="col-span-6 p-2 font-light" >{{ $tags }}</div>
            </div>

   
    </article>
</div>

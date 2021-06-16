<div class="tile is-child">

    <div class="tile is-child">
    <article>
        <center>
<!--                                         <button class="btn btn-primary" @click="appointmentState=!appointmentState">{{trans('weddingRing.Appointment')}}</button>
-->                                        
         <!--    <appointment v-model="weddingRing.wedding_rings[0]" :title="appointmentTitle" @active="appointmentState=!appointmentState" :active="appointmentState" :columns="columns"  :processing="false" :langs="langs" :locale="locale"></appointment> -->
        <x-appointment v-if="appointmentState"/>
            
        </center>
        <br>
        <p>
        {{trans('engagementRing.For more detailed information')}}, 
        <br>
        <a @click="appointmentState=!appointmentState">{{trans('engagementRing.Make Appointment')}}</a> or <a :href="hrefLangs + '/about-us'">{{trans('engagementRing.contact us')}}</a> {{trans('engagementRing.for further')}}：
    </article>
    </div>
    <article>

        <div class="grid grid-cols-12 border-b font-semibold p-2" >
            <div class="col-span-4 sm:text-lg">{{trans('weddingRing.Wedding Rings Info')}}</div>
            <div class="col-span-4 sm:text-lg" v-if="weddingRing.wedding_rings[1]">
                {{ __('weddingRing.' . $weddingRings->weddingRings[0]->gender) }}
            </div>
            <div class="col-span-4 sm:text-lg" v-if="weddingRing.wedding_rings[1]">{{ __('weddingRing.' . $weddingRings->weddingRings[1]->gender) }}</div>
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">{{trans('weddingRing.Unit Price')}}</div>
            <div class="col-span-4">${{ $weddingRings->weddingRings[0]->unit_price}}</div>
            <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">${{ $weddingRings->weddingRings[1]->unit_price}}</div>
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">
                {{trans('weddingRing.shape')}}
            </div>
            <div class="col-span-4">
                <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?shape=' + weddingRing.wedding_rings[0].shape + '&type=wedding ring'">
                    {{ __('weddingRing.' . $weddingRings->weddingRings[0]->shape) }}
                </a>
            </div>
            <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">
                <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?shape=' + weddingRing.wedding_rings[1].shape + '&type=wedding ring'">
                    {{ __('weddingRing.' . $weddingRings->weddingRings[1]->shape) }}
                </a>
            </div>
        </div>
        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">
                {{trans('weddingRing.finish')}}
            </div>
            <div class="col-span-4">
                <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?finish=' + weddingRing.wedding_rings[0].finish + '&type=wedding ring'">
                    {{ __('weddingRing.' . $weddingRings->weddingRings[0]->finish) }}
                </a>
            </div>
            <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">
                <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?finish=' + weddingRing.wedding_rings[1].finish + '&type=wedding ring'">
                    {{ __('weddingRing.' . $weddingRings->weddingRings[1]->finish) }}
                </a>
            </div>
        </div>
        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">
                {{trans('weddingRing.Metal')}}
            </div>
            <div class="col-span-4">
                <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?metal=' + weddingRing.wedding_rings[0].metal + '&type=wedding ring'">
                    {{ __('weddingRing.' . $weddingRings->weddingRings[0]->metal) }}
                </a>
            </div>
            <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">
                <a class="text-blue-600" target="_blank" :href="hrefLangs + '/customer-jewellery?metal=' + weddingRing.wedding_rings[1].metal + '&type=wedding ring'">
                    {{ __('weddingRing.' . $weddingRings->weddingRings[1]->metal) }}
                </a>
            </div>
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">{{trans('weddingRing.Side Stone')}}</div>
            <div class="col-span-4">{{__('engagementRing.Around')}} {{ $weddingRings->weddingRings[0]->ct}}ct</div>
            <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">{{__('engagementRing.Around')}} {{ $weddingRings->weddingRings[1]->ct}}ct</div>
        </div>

        <div>
            <div class="col-span-4 sm:text-lg" colspan="3">{{trans('weddingRing.More Details')}}</div>
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">{{trans('weddingRing.Stock')}}</div>
            <div class="col-span-4">{{ $weddingRings->weddingRings[0]->stock}}</div>
            <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">{{ $weddingRings->weddingRings[1]->stock}}</div>
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">{{trans('weddingRing.Name')}}</div>
            <div class="col-span-4">{{ $weddingRings->weddingRings[0]->name}}</div>
            <div class="col-span-4" v-if="weddingRing.wedding_rings[1]">{{ $weddingRings->weddingRings[1]->name}}</div>
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4 p-1 sm:text-lg">{{trans('weddingRing.Description')}}</div>
            <div class="col-span-4 p-1">
                {{ $tags[0] }}

            </div>
            <div class="col-span-4 p-1" v-if="weddingRing.wedding_rings[1]">
                {{ $tags[1] }}
            </div>
        </div>

    </article>

    
</div>


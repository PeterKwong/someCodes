<div class="">
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
        <a @click="appointmentState=!appointmentState">{{trans('engagementRing.Make Appointment')}}</a> or <a href="/{{app()->getLocale() . '/about-us'}}">{{trans('engagementRing.contact us')}}</a> {{trans('engagementRing.for further')}}：
    </article>
    <article>

        <div class="grid grid-cols-12 border-b font-semibold p-2" >
            <div class="col-span-4 sm:text-lg">{{trans('weddingRing.Wedding Rings Info')}}</div>
            <div class="col-span-4 sm:text-lg">
                {{ __('weddingRing.' . $weddingRings->weddingRings[0]->gender) }}
            </div>
            @if(isset( $weddingRings->weddingRings[1] ))
                <div class="col-span-4 sm:text-lg">{{ __('weddingRing.' . $weddingRings->weddingRings[1]->gender) }}</div>
            @endif
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">{{trans('weddingRing.Unit Price')}}</div>
            <div class="col-span-4">${{ $weddingRings->weddingRings[0]->unit_price}}</div>
            @if(isset( $weddingRings->weddingRings[1] ))
                <div class="col-span-4">${{ $weddingRings->weddingRings[1]->unit_price}}</div>
            @endif
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">
                {{trans('weddingRing.shape')}}
            </div>
            <div class="col-span-4">
                <a class="text-blue-600" target="_blank" href="/{{app()->getLocale() . '/wedding-rings?shape=' . $weddingRings->weddingRings[0]->shape }}">
                    {{ __('weddingRing.' . $weddingRings->weddingRings[0]->shape) }}
                </a>
            </div>
            @if(isset( $weddingRings->weddingRings[1] ))
                <div class="col-span-4">
                    <a class="text-blue-600" target="_blank" href="/{{app()->getLocale() . '/wedding-rings?shape=' . $weddingRings->weddingRings[1]->shape }}">
                        {{ __('weddingRing.' . $weddingRings->weddingRings[1]->shape) }}
                    </a>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">
                {{trans('weddingRing.finish')}}
            </div>
            <div class="col-span-4">
                <a class="text-blue-600" target="_blank" href="/{{app()->getLocale() . '/wedding-rings?finish=' . $weddingRings->weddingRings[0]->finish }}">
                    {{ __('weddingRing.' . $weddingRings->weddingRings[0]->finish) }}
                </a>
            </div>
            @if(isset( $weddingRings->weddingRings[1] ))
                <div class="col-span-4">
                    <a class="text-blue-600" target="_blank" href="/{{app()->getLocale() . '/wedding-rings?finish=' . $weddingRings->weddingRings[1]->finish }}">
                        {{ __('weddingRing.' . $weddingRings->weddingRings[1]->finish) }}
                    </a>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">
                {{trans('weddingRing.Metal')}}
            </div>
            <div class="col-span-4">
                <a class="text-blue-600" target="_blank" href="/{{app()->getLocale() . '/wedding-rings?metal=' . $weddingRings->weddingRings[0]->metal }}">
                    {{ __('weddingRing.' . $weddingRings->weddingRings[0]->metal) }}
                </a>
            </div>
            @if(isset( $weddingRings->weddingRings[1] ))
                <div class="col-span-4">
                    <a class="text-blue-600" target="_blank" href="/{{app()->getLocale() . '/wedding-rings?metal=' . $weddingRings->weddingRings[1]->metal }}">
                        {{ __('weddingRing.' . $weddingRings->weddingRings[1]->metal) }}
                    </a>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">{{trans('weddingRing.Side Stone')}}</div>
            <div class="col-span-4">{{__('engagementRing.Around')}} {{ $weddingRings->weddingRings[0]->ct}}ct</div>
            @if(isset( $weddingRings->weddingRings[1] ))
                <div class="col-span-4">{{__('engagementRing.Around')}} {{ $weddingRings->weddingRings[1]->ct}}ct</div>
            @endif
        </div>

        <div>
            <div class="col-span-4 sm:text-lg" colspan="3">{{trans('weddingRing.More Details')}}</div>
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">{{trans('weddingRing.Stock')}}</div>
            <div class="col-span-4">
                <a class="text-blue-600" target="_blank" href="/{{app()->getLocale() . '/wedding-rings/' . $weddingRings->weddingRings[0]->weddingRingPair->id }}">{{ $weddingRings->weddingRings[0]->stock}}
                </a>
            </div>
            @if(isset( $weddingRings->weddingRings[1] ))
                <div class="col-span-4">
                    <a class="text-blue-600" target="_blank" href="/{{app()->getLocale() . '/wedding-rings/' . $weddingRings->weddingRings[0]->weddingRingPair->id }}">{{ $weddingRings->weddingRings[1]->stock}}
                    </a>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4">{{trans('weddingRing.Name')}}</div>
            <div class="col-span-4">{{ $weddingRings->weddingRings[0]->name}}</div>
            @if(isset( $weddingRings->weddingRings[1] ))
                <div class="col-span-4">{{ $weddingRings->weddingRings[1]->name}}</div>
            @endif
        </div>

        <div class="grid grid-cols-12 border-b font-light p-2" >
            <div class="col-span-4 p-1 sm:text-lg">{{trans('weddingRing.Description')}}</div>
            <div class="col-span-4 p-1">
                {{ $tags[0] }}

            </div>
            @if(isset( $weddingRings->weddingRings[1] ))
                <div class="col-span-4 p-1">
                    {{ $tags[1] }}
                </div>
            @endif
        </div>

    </article>

    
</div>


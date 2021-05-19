
@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{ $title }} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{ $title }} {{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="{{ $tags[0] }}"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{ $title }} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{ $title }} {{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}"> 
        <meta itemprop="image" content="{{ config('global.cache.' . config('global.cache.live') ) 
                                          . 'public/images/' . $weddingRings->images[0]->image }}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{ $title }} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image" content="{{ config('global.cache.' . config('global.cache.live') ) 
                                          . 'public/images/' . $weddingRings->images[0]->image }}" />
        <meta property="og:description" content="{{ $title }}{{trans('weddingRing.metaDescription4')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{ $title }} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{ $tags[0] }}" /> 

    @endSection

    @section('content')
        <br>
        <div id="weddingRingsShow">
            <div class="flex justify-center">
                <div class="flex-auto">
                    <div class="flex justify-center p-4">
                        <div class="col-span-9">
                                <h1 class="text-center sm:text-2xl">
                                {{$title}}
                                </h1>
                        </div>       
                    </div>


                    <div class="grid grid-cols-12 ">

                        <div class="col-span-12 sm:col-span-7">
                                <div class="tile is-child">
                                        <figure class="image box" @click="carouselState=!carouselState">
              <!--                           <carousel @active="carouselState=!carouselState" :active="carouselState"  :height="'500'" :width="'100%'" :upperitems="combinedUpperWeddingRings" :items="combinedLowerWeddingRings" title="customer jewellries"></carousel> -->
                                        <carousel @active="carouselState=!carouselState" :active="carouselState" :height="'500'" :width="'100%'" :upperitems="weddingRing" :items="customerItems" title="customer jewellries"></carousel>
                                        </figure>
                                </div>
                            </div>


                        <div class="col-span-12 sm:col-span-5 box p-4">
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
                        </div>

                        
                      

                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

        <div class="p-4 text-center border-b">
            <p class="text-2xl">{{__('customerJewellery.Cusomter Jewellery')}} {{__('customerJewellery.May Interested')}}</p>
            @livewire('customer-jewellery.post-fetch-row',
              ['draggableId'=>'draggable0' , 'type'=>'Wedding Ring', 'upperType'=>'shape', 'query'=>$weddingRings->weddingRings[1]->shape ])
            <a class="btn btn-primary text-white text-lg" href="/{{app()->getlocale()}}/customer-jewellery" target="_blank">{{__('engagementRing.More')}}</a>

            <script type="text/javascript">            

            function draggableItem(item) {
                let isDown = false;
                let startX;
                let scrollLeft;

                item.addEventListener('mousedown', (e) => {
                  isDown = true;
                  item.classList.add('active');
                  startX = e.pageX - item.offsetLeft;
                  scrollLeft = item.scrollLeft;
                });
                item.addEventListener('mouseleave', () => {
                  isDown = false;
                  item.classList.remove('active');
                });
                item.addEventListener('mouseup', () => {
                  isDown = false;
                  item.classList.remove('active');
                });
                item.addEventListener('mousemove', (e) => {
                  if(!isDown) return;
                  e.preventDefault();
                  const x = e.pageX - item.offsetLeft;
                  const walk = (x - startX) * 3; //scroll-fast
                  item.scrollLeft = scrollLeft - walk;
                });
            }

            const draggable0 = document.getElementById('draggable0');
            draggableItem(draggable0)
           
          </script>
        </div>


    @endSection


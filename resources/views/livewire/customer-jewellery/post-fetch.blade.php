<div class="p-2">
	<div id="totalHeigh">

        <div class="row p-2" >
            <div class="col-12">
                <center>
                    <h3 class="sm:text-xl font-semibold">{{__('customerMoment.Customer moments')}} - {{__('customerMoment.Customer Jewelrries')}}
                    </h3>    

                    <br>

                    <h5>
                    {{__('customerMoment.Thank you for customers support, so that we could share their precious moments.')}}
                    </h5>
                    
                
                    <h5>
                    {{__('customerMoment.Things worth celebrating in Life are too much. Know how to cherish, everthings now we had are the best.')}}
                    </h5>          
                </center>
                
            </div>
        </div>

        <div class="grid grid-cols-12 justify-between p-4">
            <div class="col-span-12 sm:col-span-6">
                <a class="text-blue-600">
                    {{trans('diamondSearch.Total')}}: {{ $posts['total'] }}
                </a>
                @foreach($selectedTags as $index => $selectedTag)
                    <a wire:click="deleteSelectedTags( {{$index}} )" class="bg-green-500 hover:bg-green-300 text-white rounded-full py-1 px-2">
                        {{ __('customerJewellery.' . $selectedTag['content'] )}} &#10006;
                    </a>
                @endforeach
            </div>

            <div class="col-span-12 sm:col-span-6 mt-2">
                <div class="grid grid-cols-12 ">
                    <div class="col-span-12 flex text-center justify-end">
                        @if(count($upperId)>1)
                            <center>
                                <a wire:click="popLastArray()" class="bg-orange-500 hover:bg-orange-200 text-white rounded-full py-1 px-2">
                                        {{__('customerJewellery.' . $upperId[count($upperId)-1]['content'])}} 
                                </a>
                                <p class="text-xl text-gray-500 mx-2">&#10225;</p>
                            </center>
                        @endif
                    </div>

                    <div class="col-span-12 flex text-center justify-end">
                        @foreach($tags as $index => $tag)
                            <a wire:click="setUpperId( {{$tag['id']}}, '{{$tag['content']}}','{{$tag['count']}}','{{$tag['type']}}' ) " class="bg-blue-500 hover:bg-blue-300 text-white rounded-full py-1 px-2">
                                {{ __('customerJewellery.' . $tag['content'] )}} 
                                <span class="text-blue-200 text-sm">({{$tag['count'] }})</span>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>

    		
    	<div class="grid grid-cols-12 gap-4">

    		@foreach($posts['data'] as $index => $post)
                @if(count($post['images']))
		            <div class="sm:col-span-4 col-span-6 hover:opacity-75 hover:text-blue-600" >
	                    <a href="/{{ app()->getLocale() . '/customer-jewellery/' . $post['id'] }}" target="_blank" @mouseover="loopImages(index)" @mouseleave="loopImages(index,0)">
	                        <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' .  $post['images'][0]['image'] }}" width="100%">
	                            <center class="p-4">
	                                <p class="truncate">{{$post['texts'][config( 'global.locale.' . app()->getLocale())]['content'] }} </p>
	                                </a>
	                                <p v-if="post.created_at">{{$post['date']}} </p>
	                            </center>
	                    </a>
		            </div>
                @endif
		    @endforeach

        </div>
                        
    </div>

        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <center>
                    <button class="btn btn-primary" wire:click="addPage()">{{trans('engagementRing.More')}}</button>
                </center>
            </div>
        </div>






	<div id="loading" wire:loading.class="loading">
	</div>
</div>



@include('layouts.components.infinityAddPage')





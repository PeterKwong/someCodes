<div >
    <main class="draggable-main p-4">
    	<div class="draggable-items" id="{{$draggableId}}">
		    	@if($posts) 	
					@foreach($posts as $index => $post)
			            @if(count($post->images))
			                <div class="draggable-item px-2 hover:opacity-75 hover:text-blue-600 p-2 bg-gray-100 w-96">
			                    <a href="/{{ app()->getLocale() . '/customer-jewellery/' . $post->id }}" target="_blank" >
			                        <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' .  $post->images->first()->image }}" class="w-full">
			                            <center class="sm:p-4">
			                                <p class="truncate">{{$post->texts->content }} </p>
			                                </a>
			                                
		<!-- 	                                <p v-if="post.created_at">{{$post->date}} </p>
		 -->
			                            </center>
			                    </a>
				        	</div>
			            @endif
				    @endforeach
				 @endif
		</div>
	</main>
</div>
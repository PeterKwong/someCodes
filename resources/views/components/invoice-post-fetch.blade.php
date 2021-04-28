<div>

    <div class="grid grid-cols-12 gap-4 p-4 grid-flow-row">    	
		@foreach($posts as $index => $post)
            @if(count($post->images))
	            <div class="sm:col-span-4 col-span-6 hover:opacity-75 hover:text-blue-600 p-2 bg-gray-100" >
                    <a href="/{{ app()->getLocale() . '/customer-jewellery/' . $post->id }}" target="_blank" >
                        <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' .  $post->images->first()->image }}" class="w-full">
                            <center class="sm:p-4">
                                <p class="truncate">{{$post->texts->content }} </p>
                                </a>
                                <p v-if="post.created_at">{{$post->date}} </p>
                            </center>
                    </a>
	            </div>
            @endif
	    @endforeach
    </div>
</div>
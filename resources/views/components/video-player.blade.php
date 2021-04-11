@props(['poster','videoId', 'src'])
		{{ $meta }}
<div class="flex">
	<div class="w-full h-full">  
		{{ $src }}
        <video
        id="{{ $videoId  }}"
        class="video-js vjs-fluid vjs-big-play-centered"
        controls
        preload="auto"
	    poster="{{ $poster  }}"
        data-setup='{"fluid": true}'
        >
	    <source src="{{ $src }}" type="video/mp4">
        </video>
    </div>
</div>

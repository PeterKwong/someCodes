<div class="flex">
	<div class="w-full h-full">  
        <video
        id="my-video"
        class="video-js vjs-fluid vjs-big-play-centered"
        controls
        preload="auto"
	    poster="/images/front-end/home/gia_video.jpg"
        data-setup='{"fluid": true}'
        >
	    <source src="{{url('/videos/GIA_10mins-'. app()->getLocale() . '.mp4' )}}" type="video/mp4">
        </video>
    </div>
</div>

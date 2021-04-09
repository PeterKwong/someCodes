
<template>
    <div v-if="options" class="h-full w-full" :poster="options.poster" :autoplay="autoplay?autoplay:false"> 
        <video
        id="my-video"
        class="h-full w-full video-js vjs-big-play-centered vjs-paused preview-player-dimensions vjs-controls-enabled vjs-workinghover vjs-v7 vjs-user-active vjs-mux"
        controls
        :autoplay="autoplay?autoplay:false"
        preload="auto"
        :poster="options.poster"
        data-setup='{"fluid": true}'
        :src="options.sources[0].src"
        >
        <source :src="options.sources[0].src" type="video/mp4" />
        </video>
    </div>
</template>

<script>
    export default {

    name: "videoPlayer",
    props:{
        'options':false,
        'autoplay':false,
        },
    };
</script>

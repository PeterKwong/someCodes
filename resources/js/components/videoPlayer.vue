<template>
    <div class="videoPlayer">
        <video
            :id="myVideo"
            class="w-full h-auto video-js vjs-fluid vjs-big-play-centered"
        >
        <source
            :src="options.sources[0].src"
            type="video/mp4"
        >
        </video>
    </div>
</template>

<script>
/* eslint-disable */
export default {
    name: "videPlayer",
    props:[
            'options',
            'autoplay',
            ],
    data() {
        return {
            myVideo:'myVideo'+Math.floor(Math.random() * 99999),
        };
    },
    mounted() { 
        // console.log(this.hasLoaded())
        if(!this.hasLoaded()){
            this.initVideo();
        }
        this.updateVideo()

    },
    watch:{
        'options': 'updateVideo'
        },
    methods: {
        initVideo() {
            //初始化视频方法
            let myPlayer = videojs(this.myVideo, {
                //确定播放器是否具有用户可以与之交互的控件。没有控件，启动视频播放的唯一方法是使用autoplay属性或通过Player API。
                controls: true,
                //自动播放属性,muted:静音播放
                autoplay: this.autoplay,
                //建议浏览器是否应在<video>加载元素后立即开始下载视频数据。
                preload: "auto",
                //设置视频播放器的显示宽度（以像素为单位）
                poster: this.options.poster

            });
        },
        updateVideo(){
            videojs(this.myVideo).poster(this.options.poster);
            videojs(this.myVideo).src(this.options.sources[0].src);
            videojs(this.myVideo).autoplay(false);
        },
        hasLoaded(){
            // console.log(videojs.getPlayer(this.myVideo))
            return videojs.getPlayer(this.myVideo) != undefined
        }
    },
    beforeDestroy() {
        if (this.hasLoaded()) {
            videojs.getPlayer('myVideo').dispose()
        }
    }
};
</script>

<style scoped>
</style>


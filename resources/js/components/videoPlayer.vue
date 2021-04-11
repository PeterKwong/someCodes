<template>
    <div class="test_two_box">
        <video
            id="myVideo"
            class="video-js vjs-fluid vjs-big-play-centered"
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
    name: "TestTwo",
    props:[
            'options',
            'autoplay',
            ],
    data() {
        return {};
    },
    mounted() { 
        this.initVideo();
    },
    watch:{
        'options': 'removeVideo'
        },
    methods: {
        initVideo() {
            //初始化视频方法
            let myPlayer = videojs('myVideo', {
                //确定播放器是否具有用户可以与之交互的控件。没有控件，启动视频播放的唯一方法是使用autoplay属性或通过Player API。
                controls: true,
                //自动播放属性,muted:静音播放
                autoplay: "false",
                //建议浏览器是否应在<video>加载元素后立即开始下载视频数据。
                preload: "auto",
                //设置视频播放器的显示宽度（以像素为单位）
                poster: this.options.poster

            });
        },
        removeVideo(){
            videojs('myVideo').poster(this.options.poster);
            videojs('myVideo').src(this.options.sources[0].src);
            videojs('myVideo').autoplay(false);
        },
        hasLoaded(){
            console.log(videojs('myVideo').ready())
            return videojs('myVideo').ready()
        }
    }
};
</script>

<style scoped>
</style>


<!-- 
<template>
    <div v-if="show"> 
        <video
        id="my-video"
        class="w-full h-auto video-js vjs-big-play-centered"
        controls
        preload="auto"
        :poster="options.poster"
        data-setup='{"fluid": true}'
        :src="options.sources[0].src"
        >
        </video>
    </div>
</template>

<script>
    export default {

    name: "videoPlayer",
    props:[
        'options',
        'auto',
        ],
    data(){
        return{
            show:true
        }
    },
    watch:{
        'options': 'refresh'
        },
    methods:{
            refresh(){
                this.show = false
                console.log('update')
                this.$forceUpdate();
                this.show = true

            }
        }
    };
</script>
 -->
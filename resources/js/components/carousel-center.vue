<template>

<div class="grid grid-cols-12">

    <div class="col-span-12">
        <img :src="data.src" v-if="data.type=='image'" class="w-auto" @click="selectingItem(+1)">
        <video-player :options="videoOptions" autoplay="false" v-if="data.type=='video'"></video-player>
        <video-360-exchange  v-if="data.video360" 
                            :src="data.src" 
                            :img="data.thumb" 
                            :vid360="data.video360"/>
        
    </div>

</div>


</template>


<script>


import ProductViewer from '../components/productViewer360'
import videoPlayer from '../components/videoPlayer.vue'
import video360Exchange from '../components/video360Exchange.vue'


export default {
    name : 'carousel',
    components:{
        videoPlayer, 
        ProductViewer,
        video360Exchange,
    },
    props: {
    },
    watch:{
    },
    created () {

    },
    mounted(){

    },
    data () {
        return {
            images: mutualVar.storage[mutualVar.storage.live] + 'public/images/',
            videoPath: mutualVar.storage[mutualVar.storage.live] + 'public/videos/' ,
            mutualVar,
            langs,
            folder: mutualVar.storage[mutualVar.storage.live] + 'public/video360/', 

        }
    },
    methods : {

    },
    computed: {
        videoOptions(){
                return {
                      // videojs options
                      muted: true,
                      language: 'en',
                      playbackRates: [0.7, 1.0, 1.5, 2.0],
                      sources: [{
                        type: "video/mp4",
                        src: this.data.src
                      }],
                      poster: this.data.thumb,
                      fluid: true,
                      buttered:[0.00, 3.46],
                      preload:"auto",
                      readyState: 1,
                      autoplay: false,

            }
        },
        data(){
            var d = mutualVar.lw.carousel
            var url = mutualVar.storage[mutualVar.storage.live] + 'public/'

            if (d.type =='image') {
                d.src = url + 'images/' + d.src 
            }

            if (d.type =='video') {
                d.src = url + 'videos/' + d.src 
                d.thumb = url + 'images/' + d.thumb 
            }
            // if (d.type =='video360') {
            //     d.src = url + 'videos/' + d.src 
            //     d.thumb = url + 'video360/' + d.thumb + '/thm-0.jpg'
            // }

            return d
        },

        
    }
}    
</script>

<style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style>




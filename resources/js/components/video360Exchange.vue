<template>
    <div class="relative">
        <div class="absolute z-10" style="top:5%; left:5% ; opacity:50% ;" >
            <div v-if="videoSelecting == 'video360' " @click="video360Reload()" class=" border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700 text-center"  >
                <p class="text-white">{{ 'Video' |transJs() }}
                <i class="hidden sm:block fa fa-play text-white fa-xl" aria-hidden="true" ></i>
                <i class="sm:hidden fa fa-play text-white " aria-hidden="true" ></i></p>
                
            </div>
            <div v-if="videoSelecting == 'video' "@click="videoReload()" class="relative flex items-center justify-center border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700" >
                    <p class="flex items-center space-x-1 text-white">
                        <svg class="w-6 fill-current" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5987 5.09811C14.8234 4.96838 15.0999 4.96721 15.3257 5.09518L21.3455 8.50637L15.0035 12.1851L8.66356 8.52473L14.5987 5.09811ZM10.5967 20.7044C10.19 20.2906 9.48326 20.4928 9.35914 21.0613L9.03555 22.5431C4.18829 21.2384 1.86104 18.4324 6.46729 16.1307V14.5189C0.42305 17.1264 1.37154 22.0238 8.72266 23.9757L8.43169 25.3079C8.30694 25.8791 8.873 26.3623 9.41895 26.1439L13.0798 24.6795C13.5641 24.4859 13.6968 23.8598 13.3302 23.4866L10.5967 20.7044ZM23.5414 14.5189V16.1307C25.119 16.9189 26.0356 17.8947 26.0356 18.8626C26.0356 21.0811 21.5722 22.8239 17.1564 23.1912C16.7532 23.2244 16.4535 23.5783 16.4872 23.981C16.5188 24.3683 16.8528 24.681 17.2769 24.6506C21.1208 24.3342 27.5 22.6755 27.5 18.8626C27.5 16.7802 25.4624 15.3476 23.5414 14.5189ZM7.93144 16.6461C7.93144 16.9077 8.07099 17.1494 8.29751 17.2802L14.2722 20.7296V13.4537L7.93139 9.79282V16.6461H7.93144ZM22.0773 9.77474V16.6461C22.0773 16.9077 21.9378 17.1494 21.7113 17.2802L15.7366 20.7297V13.4527L22.0773 9.77474Z"></path>
                        </svg>
                        <span class="text-sm">360°</span>
                    </p>
            </div>
        </div>



            <div class="grid grid-cols-12">
                <div class="col-span-12">
                  <center>
                         <div v-if="videoSelecting == 'video360' " >
                            <product-viewer 
                            :key="Math.random()"
                            :id="Math.random()"
                            :folder=" cdn + 'public/video360/' + video360.src +'/'" 
                            :filename="video360.fileName" 
                            :size="video360.size" 
                            :thumb="video360.thumb" 
                            :rotate="video360.rotate" v-if="vid360"></product-viewer>
                         </div>

                            <div  v-if="videoSelecting == 'video' && videoOptions.poster ">
                                <video-player v-if="src" :options="videoOptions" autoplay="false"></video-player>             
                            </div>
                       
                    </center>
                </div>
            </div> 
        </div>
</template>

<script>
/* eslint-disable */

import ProductViewer from '../components/productViewer360'
import videoPlayer from '../components/videoPlayer.vue'

export default {
    name: "vide360Exchange",
    components:{
        videoPlayer, 
        ProductViewer,
    },
    props:[
            'src',
            'img',
            'vid360',
            ],
    data() {
        return {
                cdn: mutualVar.storage[mutualVar.storage.live],
                videoSelecting:'video360',
                langs,
         
        };
    },
    mounted() { 
        // this.setVideo()
        // this.setVideo360()
    },
    computed:{
         video360(){
            var video360 = {
                src:this.vid360, 
                type:"video360", 
                thumb: this.cdn + 'public/images/' + this.img, 
                size:120, 
                rotate:1,
                fileName: '',
                }
                return video360
         },
         videoOptions(){
            var videoOptions = {
                  // videojs options
                  muted: true,
                  language: 'en',
                  playbackRates: [0.7, 1.0, 1.5, 2.0],
                  sources: [{
                    type: "video/mp4",
                    src: this.cdn + 'public/videos/' +this.src
                  }],
                  poster: this.cdn + 'public/images/' +this.img,
                  fluid: true,
                  buttered:[0.00, 3.46],
                  preload:"auto",
                  readyState: 1,
                  autoplay: false,

                }
                return videoOptions
         }
    },
    methods: {
        videoReload(){
            this.videoSelecting = 'video360'
        },
        video360Reload(){
            this.videoSelecting = 'video'
        },

    }
};

</script>


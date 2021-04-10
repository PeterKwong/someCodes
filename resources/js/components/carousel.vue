<template>

    <div class="p-2">

        <div class="nav-item" @click="$emit('active', null)" v-for="(img, index) in upperitems.images" >
            <a class="nav-link" :class="{ 'active' : currentUpperIndex == index }" v-if="!upperitems.images" @click="currentSelectedItem(index,'upper')">
                   {{ index+1 }}
            </a>
        </div>

        <div class="flex justify-center p-2">
            <div class="box " @click="$emit('btn-primary', null)" v-for="(img, index) in chunkedUpperItems" >
                <a class="btn" :class="{ 'btn-primary' : currentUpperIndex == index }"  @click="currentSelectedItem(index,'upper')" >
                       {{ index+1 }}
                </a>
            </div>
        </div>


        <div class="grid grid-cols-12">
            <div class="col-span-4 relative" v-for="(img, index) in chunkedUpperItems" 
                   @click="currentSelectedItem(index,'upper')" v-if="img.thumb"  >
                <img :src="images+img.thumb"  v-if="img.type=='img' || img.type=='video'"  width="100%" class="rounded mx-auto p-2" :class="{'border border-primary rounded':currentUpperIndex == index}"></img>
                <img :src="img.thumb"  v-if="img.type=='video360'"  width="100%" class="rounded mx-auto p-2" :class="{'border border-primary rounded':currentUpperIndex == index}"></img>
                <div class="absolute border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700" style="top:35%; left:35%; opacity:50% ;" v-if="img.type=='video'" >
                    <i class="hidden sm:block fa fa-play text-white fa-2x" aria-hidden="true" ></i>
                    <i class="sm:hidden fa fa-play text-white " aria-hidden="true" ></i>
                </div>
            </div>
        </div>            
  

        <div class="grid grid-cols-12" @click="$emit('active', null)">

            <div class="col-span-12">
                <img :src="images+currentItem.src" v-if="currentItem.type=='img'" class="w-auto" @click="nextItem">
                <video-player :options="videoOptions" autoplay="false" v-if="currentItem.type=='video'"></video-player>
                
                <product-viewer v-if="currentItem.type=='video360'" :folder="folder + upperitems.video360 +'/'" 
                :filename="fileName " :size="currentItem.size" :rotate="currentItem.rotate"></product-viewer>
            
                <p v-if="chunkedItems.length && !showUpper" class="bg-blue-300 text-white text-center p-4">{{chunkedItems[currentIndex].text}}</p>
                <p class="text-xl font-light bg-blue-400 text-white">{{ currentItem.title }}</p>
                <p class="text-lg font-light bg-blue-400 text-white"> {{ currentItem.desc }} </p>
                <span v-html="currentItem.other"></span>
                
            </div>

        </div>


        <center v-if="chunkedItems.length">
                <a>{{ 'Customer Jewelleries' |transJs(langs) }}</a>
        </center>

        <div class="grid grid-cols-12 justify-center">
             <div class="col-span-4 relative" v-for="(img, index) in chunkedItems" 
                                @click="currentSelectedItem(index,'lower')"  v-if="img.thumb">
                 <img :src="images+img.thumb" width="100%" class="rounded mx-auto d-block image-background p-2" :class="{' border border-primary rounded':currentIndex == index}" ></img>
                <div class="absolute border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700" style="top:35%; left:35%; opacity:50% ;" v-if="img.type=='video'" >
                    <i class="hidden sm:block fa fa-play text-white fa-2x"  aria-hidden="true" ></i>
                    <i class="sm:hidden fa fa-play text-white " aria-hidden="true" ></i>
                </div>
             </div>
         </div>


        <div aria-label="Page navigation example">
          <div class="flex justify-center">
            <div class="btn btn-outline">
              <a  @click="currentSelectedItem( 0,'lower')" class="page-link"  aria-label="Previous">
                <span aria-hidden="true">1 &laquo;</span>
              </a>
            </div>
            <div  @click="currentSelectedItem(currentIndex -1,'lower')" class="btn btn-outline" :class=" {' disabled' : currentIndex == 0 }"><a class="page-link" >{{currentIndex }}</a></div>
            <div class="btn btn-primary"><a class="page-link" >{{currentIndex +1}}</a></div>
            <div @click="currentSelectedItem(currentIndex +1,'lower')" class="btn btn-outline"><a class="page-link" >{{currentIndex +2 }}</a></div>
            <div class="btn btn-outline">
              <a class="page-link"  aria-label="Next" @click="currentSelectedItem( items.length -1,'lower')">
                <span aria-hidden="true">&raquo; {{ items.length +1}}</span>
              </a>
            </div>
          </div>
        </div>



    </div>



</template>


<script>


// import {videoPlayer} from '../../../node_modules/vue-video-player/dist/vue-video-player'
import ProductViewer from '../components/productViewer360'
import videoPlayer from '../components/videoPlayer.vue'

// import VideoPlayer from './VueVideoPlayer.vue'

export default {
    name : 'carousel',
    components:{
        videoPlayer, 
        ProductViewer,
        // VideoPlayer
    },
    props: {
        items : {
            Type : Array,
        },
        width: '',
        height:'',
        active:'',
        upperitems:'',

    },
    created () {
        this.currentIndex = 0;
    },
    mounted(){
        if (mutualVar.css.innerWidth<500) {
            this.fileName = 'thm-'
        }
    },
    data () {
        return {
            currentIndex : 0,
            currentUpperIndex : 0,
            showUpper: true,
            rel: '?rel=0',
            images: mutualVar.storage[mutualVar.storage.live] + 'public/images/',
            carouselUpperItems:'',
            chunkedUpperItemsData:'',
            videoType:'video/mp4',
            videoPath: mutualVar.storage[mutualVar.storage.live] + 'public/videos/' ,
            mutualVar,
            langs,
            fileName:'',
            folder: mutualVar.storage[mutualVar.storage.live] + 'public/video360/', 

        }
    },
    methods : {
        
        // onClick:function(event)
        // {
        //     if(event.target.className == 'disabled')
        //     {
        //         return;
        //     }
        //     event.target.className = 'disabled';
        // },
        nextItem () {
            var index = this.currentIndex
            if (this.showUpper) {
                index = this.currentUpperIndex
            }
            if(this.index == this.carouselUpperItemsToArray.length-1){
                this.index = 0;
            }else{
                this.index++;  
            }
        },
        prevItem () {
            var index = this.currentIndex
            if (this.showUpper) {
                index = this.currentUpperIndex
            }
            if(this.index == 0){
                this.index = this.carouselUpperItemsToArray.length-1;
            }else{
                this.index--;  
            }
        },
        currentSelectedItem(index,upper){
            
            // console.log(index)
            // console.log(upper)
            // if (index < 0) {
            //     index = 0
            // }
            // if (index > this.items.length -1) {
            //     index = this.items.length
            // }
            if (index >= 0) {
                if (upper == 'upper') {
                    this.currentUpperIndex = index
                    return this.showUpper = true
                }
                this.showUpper = false
                this.currentIndex = 0
                this.currentIndex = index
            }

            
        },
    },
    computed: {
        currentItem(){
            if (this.showUpper) {
            return this.carouselUpperItemsToArray[this.currentUpperIndex];                
            }
            return this.carouselItemsToArray[this.currentIndex];
        },
        videoOptions(){
            return {
                  // videojs options
                  muted: true,
                  language: 'en',
                  playbackRates: [0.7, 1.0, 1.5, 2.0],
                  sources: [{
                    type: "video/mp4",
                    src: this.videoPath + this.currentItem.src
                  }],
                  poster: this.images + this.currentItem.thumb,
                  fluid: true,
                  buttered:[0.00, 3.46],
                  preload:"auto",
                  readyState: 1,
                  autoplay: true,

                }
        },
        carouselUpperItemsToArray(){
            var arr = []

            if (this.upperitems.video360) {
                    arr.push({src:this.upperitems.video360, type:"video360", thumb:this.folder + this.upperitems.video360 +'/thm-0.jpg', size:120 , rotate:1})
                }

            if (!this.upperitems.video360 && this.upperitems.video) {
                    arr.push({src:this.upperitems.video, type:"video", thumb:this.upperitems.images[0].image})
                }

            if (this.upperitems.images.length>0) {
                    for (var i = 0; this.upperitems.images.length - 1 >= i; i++) {

                            arr.push({src:this.upperitems.images[i].image, type:"img", thumb:this.upperitems.images[i].image})
                    }

                this.carouselUpperItems = arr
                return  arr;
            }

               
            },

        chunkedUpperItems(){
                
                var chunk1 = []
                var chunk2 = []
                var chunk3 = []
                var index = this.currentUpperIndex

                if (!this.carouselUpperItemsToArray) {
                return chunk1
                }
                if (index<=1) {
                 chunk1 = this.carouselUpperItemsToArray.slice(0,3)
                 chunk2 = this.carouselUpperItemsToArray.slice(3,this.carouselUpperItemsToArray.length).fill('')
                 return chunk1.concat(chunk2)
                }

                chunk1 = this.carouselUpperItemsToArray.slice(0,index-1).fill('')
                chunk2 = this.carouselUpperItemsToArray.slice(index-1,index+2)
                chunk3 = this.carouselUpperItemsToArray.slice(index+2,this.carouselUpperItemsToArray.length).fill('')
                
                return chunk1.concat(chunk2,chunk3)
            },


        carouselItemsToArray(){

            var arr = []

            this.items.reverse()
            
            if (!this.items) {
                return arr.push({src:'', type:'', thumb:'', text:''})
            }
 
            for (var i = this.items.length - 1; i >= 0; i--) {
                if (this.items[i].images[0].image&&this.items[i].video) {
                    arr.push({src:this.items[i].video, type:"video", thumb:this.items[i].images[0].image, 
                    text:this.items[i].texts[mutualVar.langs.localeCode].content})
                }else
                {
                    arr.push({src:this.items[i].images[0].image, type:"img", thumb:this.items[i].images[0].image, 
                    text:this.items[i].texts[mutualVar.langs.localeCode].content})
                }
                
            }
                

                return arr;
            },


        chunkedItems(){
                
                var chunk1 = []
                var chunk2 = []
                var chunk3 = []
                
            if (!this.items) {
                return chunk1
            }
            if (this.currentIndex<=1) {
                 chunk1 = this.carouselItemsToArray.slice(0,3)
                 chunk2 = this.carouselItemsToArray.slice(3,this.carouselItemsToArray.length).fill('')
                 return chunk1.concat(chunk2)
                }

                chunk1 = this.carouselItemsToArray.slice(0,this.currentIndex-1).fill('')
                chunk2 = this.carouselItemsToArray.slice(this.currentIndex-1,this.currentIndex+2)
                chunk3 = this.carouselItemsToArray.slice(this.currentIndex+2,this.carouselItemsToArray.length).fill('')
                
                return chunk1.concat(chunk2,chunk3)
            },


        
    }
}    
</script>



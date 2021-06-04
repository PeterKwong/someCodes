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
                <img :src="images+img.thumb"  v-if="img.type=='img' || img.type=='video'"  class="w-full hover:opacity-75 rounded mx-auto p-2" :class="{'border border-primary rounded':currentUpperIndex == index}"></img>
                <img :src="img.thumb"  v-if="img.type=='video360'"  class="w-full hover:opacity-75 rounded mx-auto p-2" :class="{'border border-primary rounded':currentUpperIndex == index}"></img>

                <div class="absolute border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700" style="top:35%; left:35%; opacity:50% ;" v-if="img.type=='video360' " >
                    <svg class="w-8 fill-current text-white " version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 65.79" style="enable-background:new 0 0 122.88 65.79" xml:space="preserve">
                        <g>
                            <path d="M13.37,31.32c-22.23,12.2,37.65,19.61,51.14,19.49v-7.44l11.21,11.2L64.51,65.79v-6.97 C37.4,59.85-26.41,42.4,11.97,27.92c0.36,1.13,0.8,2.2,1.3,3.2L13.37,31.32L13.37,31.32z M108.36,8.31c0-2.61,0.47-4.44,1.41-5.48 c0.94-1.04,2.37-1.56,4.3-1.56c0.92,0,1.69,0.12,2.28,0.34c0.59,0.23,1.08,0.52,1.45,0.89c0.38,0.36,0.67,0.75,0.89,1.15 c0.22,0.4,0.39,0.87,0.52,1.41c0.26,1.02,0.38,2.09,0.38,3.21c0,2.49-0.42,4.32-1.27,5.47c-0.84,1.15-2.29,1.73-4.36,1.73 c-1.15,0-2.09-0.19-2.8-0.55c-0.71-0.37-1.3-0.91-1.75-1.62c-0.33-0.51-0.59-1.2-0.77-2.07C108.45,10.34,108.36,9.38,108.36,8.31 L108.36,8.31z M26.47,10.49l-9-1.6c0.75-2.86,2.18-5.06,4.31-6.59C23.9,0.77,26.91,0,30.8,0c4.47,0,7.69,0.83,9.69,2.5 c1.99,1.67,2.98,3.77,2.98,6.29c0,1.48-0.41,2.82-1.21,4.01c-0.81,1.2-2.02,2.25-3.65,3.15c1.32,0.33,2.34,0.71,3.03,1.15 c1.14,0.7,2.02,1.63,2.65,2.77c0.63,1.15,0.95,2.51,0.95,4.1c0,2-0.52,3.91-1.56,5.75c-1.05,1.83-2.55,3.24-4.51,4.23 c-1.96,0.99-4.54,1.48-7.74,1.48c-3.11,0-5.57-0.37-7.36-1.1c-1.8-0.73-3.28-1.8-4.44-3.22c-1.16-1.41-2.05-3.19-2.67-5.33 l9.53-1.27c0.38,1.92,0.95,3.26,1.74,4.01c0.78,0.74,1.78,1.12,3,1.12c1.27,0,2.33-0.47,3.18-1.4c0.85-0.93,1.27-2.18,1.27-3.74 c0-1.59-0.41-2.82-1.22-3.69c-0.81-0.87-1.92-1.31-3.32-1.31c-0.74,0-1.77,0.18-3.07,0.56l0.49-6.81c0.52,0.08,0.93,0.12,1.22,0.12 c1.23,0,2.26-0.4,3.08-1.19c0.82-0.79,1.24-1.72,1.24-2.81c0-1.05-0.31-1.88-0.93-2.49c-0.62-0.62-1.48-0.93-2.55-0.93 c-1.12,0-2.02,0.34-2.72,1.01C27.19,7.62,26.72,8.8,26.47,10.49L26.47,10.49z M75.15,8.27l-9.48,1.16 c-0.25-1.32-0.66-2.24-1.24-2.78c-0.59-0.54-1.31-0.81-2.16-0.81c-1.54,0-2.74,0.77-3.59,2.33c-0.62,1.13-1.09,3.52-1.38,7.19 c1.14-1.16,2.31-2.01,3.5-2.56c1.2-0.55,2.59-0.83,4.16-0.83c3.06,0,5.64,1.09,7.75,3.27c2.11,2.19,3.17,4.96,3.17,8.31 c0,2.26-0.53,4.32-1.6,6.2c-1.07,1.87-2.55,3.29-4.44,4.25c-1.9,0.96-4.27,1.44-7.13,1.44c-3.43,0-6.18-0.58-8.25-1.76 c-2.07-1.17-3.73-3.03-4.97-5.59c-1.24-2.56-1.86-5.95-1.86-10.18c0-6.18,1.3-10.71,3.91-13.59C54.13,1.44,57.74,0,62.36,0 c2.73,0,4.88,0.31,6.46,0.94c1.58,0.63,2.9,1.56,3.94,2.76C73.81,4.92,74.61,6.44,75.15,8.27L75.15,8.27z M57.62,23.55 c0,1.86,0.47,3.31,1.4,4.36c0.94,1.05,2.08,1.58,3.44,1.58c1.25,0,2.3-0.48,3.14-1.43c0.84-0.95,1.26-2.37,1.26-4.26 c0-1.93-0.44-3.41-1.31-4.42c-0.88-1.01-1.96-1.52-3.26-1.52c-1.32,0-2.44,0.49-3.34,1.48C58.06,20.32,57.62,21.72,57.62,23.55 L57.62,23.55z M77.91,17.57c0-6.51,1.17-11.07,3.52-13.67C83.77,1.3,87.35,0,92.14,0c2.31,0,4.2,0.29,5.68,0.85 c1.48,0.57,2.69,1.31,3.62,2.22c0.94,0.91,1.68,1.87,2.21,2.87c0.54,1.01,0.97,2.18,1.3,3.52c0.64,2.55,0.96,5.22,0.96,8 c0,6.22-1.05,10.76-3.16,13.64c-2.1,2.88-5.72,4.32-10.87,4.32c-2.88,0-5.21-0.46-6.99-1.38c-1.78-0.92-3.23-2.27-4.37-4.05 c-0.82-1.26-1.47-2.98-1.93-5.17C78.14,22.64,77.91,20.22,77.91,17.57L77.91,17.57z M87.34,17.59c0,4.36,0.38,7.34,1.16,8.94 c0.77,1.6,1.89,2.39,3.36,2.39c0.97,0,1.8-0.34,2.51-1.01c0.71-0.68,1.23-1.76,1.56-3.22c0.34-1.47,0.5-3.75,0.5-6.85 c0-4.55-0.38-7.6-1.16-9.18c-0.77-1.56-1.93-2.35-3.47-2.35c-1.58,0-2.71,0.8-3.42,2.39C87.69,10.31,87.34,13.27,87.34,17.59 L87.34,17.59z M112.14,8.32c0,1.75,0.15,2.94,0.46,3.58c0.31,0.64,0.76,0.96,1.35,0.96c0.39,0,0.72-0.13,1.01-0.41 c0.28-0.27,0.49-0.7,0.63-1.29c0.13-0.59,0.2-1.5,0.2-2.74c0-1.82-0.15-3.05-0.46-3.68c-0.31-0.63-0.77-0.94-1.39-0.94 c-0.63,0-1.09,0.32-1.37,0.96C112.28,5.4,112.14,6.59,112.14,8.32L112.14,8.32z M109.3,30.23c10.56,5.37,8.04,12.99-10.66,17.62 c-5.3,1.31-11.29,2.5-17.86,2.99v6.05c7.31-0.51,14.11-2.19,20.06-3.63c28.12-6.81,27.14-18.97,9.36-25.83 C109.95,28.42,109.65,29.35,109.3,30.23L109.3,30.23z"/>
                        </g>
                    </svg>
                </div>
                <div class="absolute border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700" style="top:35%; left:35%; opacity:50% ;" v-if=" img.type=='video'  " >
                    <i class="hidden sm:block fa fa-play text-white fa-2x" aria-hidden="true" ></i>
                    <i class="sm:hidden fa fa-play text-white " aria-hidden="true" ></i>
                </div>
            </div>
        </div>            
  

        <div class="grid grid-cols-12" @click="$emit('active', null)">

            <div class="col-span-12">
                <img :src="images+currentItem.src" v-if="currentItem.type=='img'" class="w-auto" @click="selectingItem(+1)">
                <video-player :options="videoOptions" autoplay="false" v-if="currentItem.type=='video'"></video-player>
                
                <product-viewer v-if="currentItem.type=='video360' && currentItem.size" :folder="folder + upperitems.video360 +'/'" 
                :filename="fileName " :size="currentItem.size" ></product-viewer>
                
                <a v-if="chunkedItems[currentIndex]" :href="'/'+ mutualVar.langs.locale + '/customer-jewellery/' + chunkedItems[currentIndex].postId" target="_blank">
                    <p v-if="chunkedItems.length && !showUpper" class="bg-blue-300 hover:bg-blue-400 text-white text-center p-4">{{chunkedItems[currentIndex].text}}</p>
                    <p class="text-xl font-light bg-blue-400 text-white">{{ currentItem.title }}</p>
                    <p class="text-lg font-light bg-blue-400 text-white"> {{ currentItem.desc }} </p>
                </a>
                <span v-html="currentItem.other"></span>
                
            </div>

        </div>


        <center v-if="chunkedItems.length">
                <a>{{ 'Customer Jewelleries' |transJs(langs) }}</a>
        </center>

        <div class="grid grid-cols-12 justify-center">
             <div class="col-span-4 relative" v-for="(img, index) in chunkedItems" 
                                @click="currentSelectedItem(index,'lower')"  v-if="img.thumb">
                 <img :src="images+img.thumb" class="rounded mx-auto d-block image-background p-2 w-full hover:opacity-75" :class="{' border border-primary rounded':currentIndex == index}" ></img>
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
        selectingItem(index){
            if(this.currentUpperIndex == this.carouselUpperItemsToArray.length-1){
                return this.currentUpperIndex = 0;
            }
            if(this.currentUpperIndex == 0){
                return this.currentUpperIndex = this.carouselUpperItemsToArray.length-1;
            }
            this.currentUpperIndex += index
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
                  autoplay: false,

                }
        },
        carouselUpperItemsToArray(){
            var arr = []

            if (this.upperitems.video360) {
                    arr.push({src:this.upperitems.video360, type:"video360", thumb:this.folder + this.upperitems.video360 +'/thm-0.jpg', size:120 })
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
                return arr.push({src:'', type:'', thumb:'', text:'', postId:''})
            }
 
            for (var i = this.items.length - 1; i >= 0; i--) {
                if (this.items[i].images[0].image&&this.items[i].video) {
                    arr.push({
                        src:this.items[i].video, type:"video", thumb:this.items[i].images[0].image, 
                        text:this.items[i].texts.content, postId:this.items[i].id
                        })
                }else
                {
                    arr.push({src:this.items[i].images[0].image, type:"img", thumb:this.items[i].images[0].image, 
                    text:this.items[i].texts.content})
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

<style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style>




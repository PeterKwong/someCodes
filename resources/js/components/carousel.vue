<template>

    <div>
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item" @click="$emit('active', null)" v-for="(img, index) in upperitems.images" >
                <a class="nav-link" :class="{ 'active' : currentIndex == index }" v-if="!upperitems.images" @click="currentSelectedItem(index,'upper')">
                       {{ index+1 }}
                </a>
            </li>
        </ul>

        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item" @click="$emit('active', null)" v-for="(img, index) in chunkedUpperItems" >
                <a class="nav-link" :class="{ 'active' : currentIndex == index }"  @click="currentSelectedItem(index,'upper')" >
                       {{ index+1 }}
                </a>
            </li>
        </ul>

        <div class="d-none d-sm-block">
            <div class="row justify-content-center">
                <div class="col-4" v-for="(img, index) in chunkedUpperItems" 
                       @click="currentSelectedItem(index,'upper')" v-if="img.thumb" >
                    <img :src="images+img.thumb" width="180" class="rounded mx-auto d-block image-background p-6" :class="{'border border-primary rounded':currentIndex == index}" ></img>
                    <i class="far fa-play-circle fa-3x color-blue image-up-left" style="opacity: 0.5" aria-hidden="true" v-if="img.type=='video'" ></i>
                </div>
            </div>            
        </div>


        <div class="d-sm-none d-block">
            <div class="row justify-content-center">
                <div class="col-4" v-for="(img, index) in chunkedUpperItems" 
                       @click="currentSelectedItem(index,'upper')" v-if="img.thumb"  >
                    <img :src="images+img.thumb" width="96" class="rounded mx-auto d-block image-background p-6" :class="{'border border-primary rounded':currentIndex == index}"></img>
                    <i class="far fa-play-circle fa-3lg color-blue image-up-left" style="opacity: 0.5"  aria-hidden="true" v-if="img.type=='video'" ></i>
                </div>
            </div>            
        </div>
  
  <!--       <ul class="nav nav-pills justify-content-center"> 
            <li class="nav-item" v-for="(img, index) in chunkedUpperItems" 
                   @click="currentSelectedItem(index,'upper')" v-if="img.thumb" :class="{'border border-primary rounded':currentIndex == index}" >
                <a class="nav-link">
                    <center>
                        <img :src="images+img.thumb" width="128" ></img>
                        <i class="far fa-play-circle fa-3x color-blue" aria-hidden="true" v-if="img.type=='video'" ></i>
                    </center>
                    
                </a>
            </li>
        </ul>
 -->
        <div class="" @click="$emit('active', null)">

            <center>
                <img :src="images+currentItem.src" v-if="currentItem.type=='img'" width="80%" @click="nextItem">
                <video-player :options="videoOptions" v-if="currentItem.type=='video'"></video-player>
                    
                        <p class="title is-3">{{ currentItem.title }}</p>
                        <p class="subtitle is-5"> {{ currentItem.desc }} </p>
                        <span v-html="currentItem.other"></span>
            </center>

        </div>


        <center v-if="chunkedItems.length">
                <a>{{title}}</a>
         </center>

         <div class="d-none d-sm-block">
            <div class="row justify-content-center">
                 <div class="col-4 " v-for="(img, index) in chunkedItems" 
                                    @click="currentSelectedItem(index,'lower')"  v-if="img.thumb">
                     <img :src="images+img.thumb" width="256" class="rounded mx-auto d-block image-background p-6" :class="{' border border-primary rounded':currentIndex == index}" ></img>
                        <i class="far fa-play-circle fa-3x color-blue image-up-left" style="opacity: 0.5"  aria-hidden="true" v-if="img.type=='video'"></i>
                 </div>
             </div>
         </div>
         <div class="d-sm-none d-block">
            <div class="row justify-content-center">
                 <div class="col-4 " v-for="(img, index) in chunkedItems" 
                                    @click="currentSelectedItem(index,'lower')"  v-if="img.thumb">
                     <img :src="images+img.thumb" width="96" class="rounded mx-auto d-block image-background p-6" :class="{' border border-primary rounded':currentIndex == index}" ></img>
                        <i class="far fa-play-circle fa-lg color-blue image-up-left" style="opacity: 0.5"  aria-hidden="true" v-if="img.type=='video'"></i>
                 </div>
             </div>
         </div>
            
            <p class="text-primary text-center">{{chunkedItems[currentIndex].text}}</p>


        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a  @click="currentSelectedItem( 0,'lower')" class="page-link"  aria-label="Previous">
                <span aria-hidden="true">1 &laquo;</span>
              </a>
            </li>
            <li  @click="currentSelectedItem(currentIndex -1,'lower')" class="page-item" :class=" {' disabled' : currentIndex == 0 }"><a class="page-link" >{{currentIndex }}</a></li>
            <li class="page-item active"><a class="page-link" >{{currentIndex +1}}</a></li>
            <li @click="currentSelectedItem(currentIndex +1,'lower')" class="page-item"><a class="page-link" >{{currentIndex +2 }}</a></li>
            <li class="page-item">
              <a class="page-link"  aria-label="Next" @click="currentSelectedItem( items.length -1,'lower')">
                <span aria-hidden="true">&raquo; {{ items.length +1}}</span>
              </a>
            </li>
          </ul>
        </nav>



    </div>



</template>

<script>


import {videoPlayer} from '../../../node_modules/vue-video-player/dist/vue-video-player'
import mutualVar from '../helpers/mutualVar'

// import VideoPlayer from './VueVideoPlayer.vue'

export default {
    name : 'carousel',
    components:{
        videoPlayer,
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
    data () {
        return {
            currentIndex : 0,
            showUpper: true,
            youtube:'http://www.youtube.com/embed/',
            rel: '?rel=0',
            images: mutualVar.storage[mutualVar.storage.live] + 'public/images/',
            carouselUpperItems:'',
            chunkedUpperItemsData:'',
            videoType:'video/mp4',
            currentUpperIndex:0,
            videoPath: mutualVar.storage[mutualVar.storage.live] + 'public/videos/' ,
            mutualVar,
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
            if(this.currentIndex == this.carouselUpperItemsToArray.length-1){
                this.currentIndex = 0;
            }else{
                this.currentIndex++;  
            }
        },
        prevItem () {
            if(this.currentIndex == 0){
                this.currentIndex = this.carouselUpperItemsToArray.length-1;
            }else{
                this.currentIndex--;  
            }
        },
        showAtIndex(index){
            this.currentIndex = index;
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
                    this.currentIndex = index
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
            return this.carouselUpperItemsToArray[this.currentIndex];                
            }
            return this.carouselItemsToArray[this.currentIndex];
        },
        title(){
                
                if (window.location.pathname.slice(1,3) == 'en') {
                    return 'Customer Jewellires'
                }
                if (window.location.pathname.slice(1,3) == 'hk') {
                    return '客人首飾'
                }
                if (window.location.pathname.slice(1,3) == 'cn') {
                    return '客人首饰'
                }
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

            if (this.upperitems.video) {
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
                
                if (!this.carouselUpperItemsToArray) {
                return chunk1
                }
                if (this.currentIndex<=1) {
                 chunk1 = this.carouselUpperItemsToArray.slice(0,3)
                 chunk2 = this.carouselUpperItemsToArray.slice(3,this.carouselUpperItemsToArray.length).fill('')
                 return chunk1.concat(chunk2)
                }

                chunk1 = this.carouselUpperItemsToArray.slice(0,this.currentIndex-1).fill('')
                chunk2 = this.carouselUpperItemsToArray.slice(this.currentIndex-1,this.currentIndex+2)
                chunk3 = this.carouselUpperItemsToArray.slice(this.currentIndex+2,this.carouselUpperItemsToArray.length).fill('')
                
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



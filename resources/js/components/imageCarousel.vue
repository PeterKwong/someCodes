<template>
<!--   <div class="relative flex justify-center">
    <button @click="burgerOpen = false" tabindex="-1" class="fixed inset-0 h-full w-full bg-black opacity-50 cursor-default"></button>

    <div class="fixed z-10 bg-white top-0 mt-48 h-64 w-6/12" >
        rwerw
    </div>
</div>
 -->

    <div @click="$emit('active', null)" v-if="active" >
      <transition name="modal" click="mutualVar.notification.contactMessage.active = !mutualVar.notification.contactMessage.active" >
        <div class="modal-mask">
        <button tabindex="-1" class="modal-button"></button>
          <div class="modal-wrapper">
            <div class="modal-dialog" role="document" @click="mutualVar.notification.contactMessage.active = !mutualVar.notification.contactMessage.active">
              <div class="modal-content">


                <div class="modal-header">
                  <h5 class="modal-title">{{title}} </h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" @click="mutualVar.notification.contactMessage.active = !mutualVar.notification.contactMessage.active">&times;</span>
                  </button>
                </div>
                <div class="modal-body" @click="$emit('active', null)">

                    <div class="flex justify-center">
                        <div class="">
                            <button class="btn box bg-blue-300 text-white" @click="currentSelectedItem(0)" >{{ 0 }}</button>
                            <button class="btn box" @click="prevItem()" >{{ currentIndex - 1 > 0 ? currentIndex - 1: 0 }}</button>
                            <button class="btn btn-primary"  >{{ currentIndex + 1 }}</button>
                            <button class="btn box" @click="nextItem()" >{{currentIndex + 2 < items.length ? currentIndex + 2: items.length }}</button>
                            <button class="btn box bg-blue-300 text-white" @click="currentSelectedItem(items.length -1)" >{{ items.length }}</button>
                    </div>

                    </div>

                    <div class="box">
                        <div class="">
                            <img class="" :src="images+currentItem.src" v-if="currentItem.type=='img'" @click="nextItem">
                            <figcaption class="has-text-centered">
                                <p class="title is-3">{{ currentItem.title }}</p>
                                <p class="subtitle is-5"> {{ currentItem.desc }} </p>
                                <span v-html="currentItem.other"></span>
                            </figcaption>
                        </div>
                    </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>

</template>

<script>

import mutualVar from '../helpers/mutualVar'

export default {
    name : 'imageCarousel',
    props: {
        items : {
            Type : Array,
        },
        active:'', 
        title:'',

        
        
    },
    created () {
        this.currentIndex = 0;
    },
    data () {
        return {
            mutualVar,
            currentIndex : 0,
            showUpper: true,
            youtube:'http://www.youtube.com/embed/',
            rel: '?rel=0',
            images:  mutualVar.storage[mutualVar.storage.live] + 'public' +'/images/',
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
            if(this.currentIndex == this.items.length-1){
                this.currentIndex = 0;
            }else{
                this.currentIndex++;  
            }
        },
        prevItem () {
            if(this.currentIndex < 1){
                this.currentIndex = this.items.length-1;
            }else{
                this.currentIndex--;  
            }
        },
        showAtIndex(index){
            this.currentIndex = index;
        },
        currentSelectedItem(index){
            this.currentIndex = index
            
        },
    },
    computed: {
        currentItem(){
            return this.carouselItemsToArray[this.currentIndex];
        },
       

        carouselItemsToArray(){

            this.currentIndex = 0
               var arr = []
            if (!this.items) {
                return arr.push({src:'', type:'', thumb:''})
            }
 
            for (var i = this.items.length - 1; i >= 0; i--) {
                if (this.items[i].image) {
                
                    arr.push({src:this.items[i].image, type:"img", thumb:this.items[i].image})
                }
                
            }
                
                
                return arr;
            },

        

        chunkedItemsDesktop(){
              
                var chunk1 = []
                var chunk2 = []
                var chunk3 = []
                if (!this.items) {
                return chunk1
            }
                if (this.currentIndex<=2) {
                 chunk1 = this.carouselItemsToArray.slice(0,4)
                 chunk2 = this.carouselItemsToArray.slice(4,this.carouselItemsToArray.length).fill('')
                 return chunk1.concat(chunk2)
                }

                chunk1 = this.carouselItemsToArray.slice(0,this.currentIndex-2).fill('')
                chunk2 = this.carouselItemsToArray.slice(this.currentIndex-2,this.currentIndex+2)
                chunk3 = this.carouselItemsToArray.slice(this.currentIndex+2,this.carouselItemsToArray.length).fill('')
                
                return chunk1.concat(chunk2,chunk3)
            },



        chunkedItemsMobile(){
                
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
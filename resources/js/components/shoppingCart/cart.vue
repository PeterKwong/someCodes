<template>
    <div class="section" id="customerMoments">

    <button class="btn btn-primary" @click="selectItem()">{{'Select this Item' |transJs(langs, mutualVar.langs.localeCode)}}</button>


    <div v-if="mutualVar.cookiesInfo.shoppingCart.haveShoppingCart" @click="toggleModal()">
      <div v-if="mutualVar.cookiesInfo.shoppingCart.modalActive">
          <transition name="modal">
            <div class="modal-mask">
            <button tabindex="-1" class="modal-button"></button>
              <div class="modal-wrapper">
                <div class="modal-dialog modal-dialog-centered" role="document" @click="toggleModal()">
                  <div class="modal-content">


                    <div class="modal-header">
                      <h5 class="modal-title"> </h5>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="toggleModal()">&times;</span>
                      </button>
                    </div>
                      <div class="modal-body mx-12 mb-4">
                        <center>
                            <div v-for="option in nextProcedure.modalOptions">
                                <div @click="toggleModal()">
                                    <a :href="`${option.url}`">
                                      <button class="btn btn-primary" :disabled="!option.clickable" >
                                        {{option.text |transJs(langs, mutualVar.langs.localeCode)}}
                                      </button>
                                    </a>
                                </div>
                            </div>

                          <button class="btn btn-primary hover:bg-blue-500" :class="{'opacity-50':!nextProcedure.addToCart.clickable}" :disabled="!nextProcedure.addToCart.clickable" @click="addItemToCart()">{{nextProcedure.addToCart.text |transJs(langs, mutualVar.langs.localeCode)}}</button>
                        </center>

                      </div>

                  </div>
                </div>
              </div>
            </div>
          </transition>          
      </div>
    </div>
               

    </div>
</template>

<script type="text/javascript">

import { get,post, } from '../../helpers/api'
import { setCookie, getCookie, } from '../../helpers/cookie'
import { getLocale, getLocaleCode } from '../../helpers/locale'

import { transJs } from '../../helpers/transJs'
import langsShopC from '../../langs/shoppingCart'


    
export default {
    components: {},
    props:{ item: '', type:'', title: '', carouselItem:'' },
    data(){
        return {
                mutualVar,
                langs: langsShopC,

        }
    },
    watch:{
        'mutualVar.cookiesInfo.fetchStatus': 'updateMutualVar',
        '$route': 'fetchData'
    },
    created(){
        this.fetchCookies()
        this.maxItemIndex()       
        this.addItemIndex()       

    },
    filters:{
            transJs,        
    },
    computed:{
        singularType(){
            return this.type.replace(/s/gi, '')
        },
        shoppingCart(){
            return this.mutualVar.cookiesInfo.shoppingCart
        },
        totalAddedCartItems(){
            var totalItems = 0
            for (var i = 0 ; this.mutualVar.cookiesInfo.shoppingCart.items.length > i; i++) {
                if (this.type == 'engagementRings' || this.type == 'diamonds' ) {
                    if (this.mutualVar.cookiesInfo.shoppingCart.items[i].addedCart) {
                        totalItems += 1
                    }

                }
            }


            return totalItems

        },
        nextProcedure(){
            var procedures = {
                            engagementRings:
                                {
                                    modalOptions: [{text : 'Add A Diamond', url: window.location.pathname.slice(0,3) + '/gia-loose-diamonds', clickable: true} ],

                                    addToCart:
                                        {text : 'Add To Cart', url: '', clickable: false},
                                },
                            diamonds:
                                {
                                    modalOptions: [
                                    {text : 'Add A Engagement Ring', url: window.location.pathname.slice(0,3) + '/engagement-rings', clickable: true},
                                    // {text : 'Add A Jewellery Setting', url: window.location.pathname.slice(0,3) + '/jewellery', clickable: true},
                                        ],
                                     addToCart:
                                        {text : 'Add To Cart', url: '', clickable: true},
                                },
                        }
                        
            var engagementClickable = ''

            if (this.mutualVar.cookiesInfo.shoppingCart.items.length > 0) {
                if (this.type == 'engagementRings' ) {

                    engagementClickable =  this.mutualVar.cookiesInfo.shoppingCart.items[this.mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems.filter((data)=>{return data.type == 'diamonds'})
                    console.log(engagementClickable[0])
                    if (engagementClickable.length) {
                        if (engagementClickable[0].id) {
                            procedures[this.type].addToCart.clickable = true
                        }
                    }

                }
            }

            return procedures[this.type]
        },
    },
    methods:{
        fetchCookies(){
            if (localStorage.getItem('shoppingCart')) {
                this.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')))
            }

        },
        sendCookies(){
            var cookies = this.shoppingCart
            localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), 10080)

        },
        maxItemIndex(){
            if (this.shoppingCart.selectingIndex != 0 && this.shoppingCart.selectingIndex > this.shoppingCart.items.length-1 && this.shoppingCart.items.length) {

                if (this.shoppingCart.items.length) {
                    this.shoppingCart.selectingIndex = this.shoppingCart.items.length-1
                }

            }
            this.sendCookies()
            
        },
        addItemIndex(){
             if (this.shoppingCart.mode == 'create' && this.shoppingCart.items[this.shoppingCart.items.length -1].addedCart == 1 ){
                this.addItemSample()
                this.shoppingCart.selectingIndex += 1            
                this.sendCookies()
             }

        },
        updateMutualVar(){
            this.sendCookies()
        },
        addItemSample(){
            var itemsSample = {addedCart:0, 
                            pairItems:[]
                            }
            this.shoppingCart.items.push(itemsSample)

        },
        checkSameDiamondInCart(){
            var counteditem = this.shoppingCart.items

            for( var i = 0; this.shoppingCart.items.length > i ; i++){

                var item = [] 

                if(counteditem[i].pairItems.length >0 && i != this.shoppingCart.selectingIndex){

                    item = counteditem[i].pairItems.filter((data)=>{
                         if (data.type =='diamonds' && data.id == this.item.id){
                            return data
                         } 
                     })

                    if (item.length > 0) {
                        var message = mutualVar.notification.contactMessage
                        message.active = true
                        message.title = 'message'
                        message.type = 'is-danger'
                        message.data = ['same diamond on the list']
                        message.next = { nextUrl: getLocale() + '/gia-loose-diamonds/', nextText: 'find other diamond'}
                        return 1
                    }
                }

            }
        },
        selectItem(){
            // this.fetchCookies()

            if(this.checkSameDiamondInCart() ==1){
                return 
            }

            var item = {
                            id: '',
                            image: '',
                            unit_price: '',
                            title:'',
                            url:'',
                            type: '',
                            ringSize: 0,
                            available: 1,
                            engrave: '',
                            delivery: 2,
                            diamondSize:'',
                        }
            var shoppingCart = this.shoppingCart

            this.toggleModal()  

            shoppingCart.selectingType = this.type

            shoppingCart.haveShoppingCart = 1

            if ( shoppingCart.items.length == 0) {
                this.addItemSample()

            }

            item.id = this.item.id
            item.title = this.title

            if (this.type == 'engagementRings') {
                item.type = 'engagementRings'
                item.unit_price = this.item.unit_price
                item.image = mutualVar.storage[mutualVar.storage.live] + 'public/images/' + this.item.images.find((data)=>{ return data.type == 'cover'}).image

                item.url = getLocale() +'/engagement-rings/'

            }

            if (this.type == 'diamonds') {
                item.type = 'diamonds'
                item.unit_price = this.item.price
                item.diamondSize = parseFloat(this.item.weight)
                item.url = getLocale() +'/gia-loose-diamonds/'
                if (this.item.image_cache == 1) {
                    item.image = mutualVar.storage[mutualVar.storage.live] + 'public/diamond/images/' + this.item.id + '.jpg'                    
                }else{
                    item.image = '/images/front-end/diamond_show/RoundDiamonds_sample.png'                                      
                }
                if (this.item.location != '1Hong Kong') {
                    item.delivery = 7
                }
            }


            if (shoppingCart.items[shoppingCart.selectingIndex].pairItems.length == 0 ) {
                    shoppingCart.items[shoppingCart.selectingIndex].pairItems.push(item)
            }else{
                var sameItem = 0
                for (var i = 0 ;  shoppingCart.items[shoppingCart.selectingIndex].pairItems.length > i; i++) {

                    if (shoppingCart.items[shoppingCart.selectingIndex].pairItems[i].type == this.type ) {
                        sameItem =1
                        shoppingCart.items[shoppingCart.selectingIndex].pairItems[i] = item
                    }

                    
                }

                if (sameItem == 0) {

                    shoppingCart.items[shoppingCart.selectingIndex].pairItems.push(item)
                }

            }

            if (shoppingCart.items[shoppingCart.selectingIndex].addedCart == 1 ) {
                this.addItemSample()

            }            

            this.sendCookies()

            if ( shoppingCart.items[shoppingCart.selectingIndex].pairItems.length == 3) {
                this.directToReview()
            }


            if ( shoppingCart.items[shoppingCart.selectingIndex].pairItems.length == 2) {

                var langCode = getLocaleCode()
                var mountingFee =  {
                            id: '',
                            image: '/images/front-end/shoppingCart/mountingFee.png',
                            unit_price: 500,
                            title: this.langs.find((data)=>{ return data['mounting fee']})['mounting fee'][langCode],
                            url: getLocale() + '/buying-procedure/diamond-inlay-engrave',
                            type: 'mountingFee',
                            available: 1,
                        }

                // console.log(getLocaleCode())

                var fee = [
                        {amount: 1000, size: 500, id: 211},
                        {amount: 700, size: 2.99, id: 177},
                        {amount: 500, size: 1.39, id: 5},
                    ]

                for (var i =0 ; fee.length > i ; i++) {
                    
                    if(fee[i].size > shoppingCart.items[shoppingCart.selectingIndex].pairItems.find((data)=>{return data.type == 'diamonds'}).diamondSize){
                        mountingFee.unit_price = fee[i].amount
                        mountingFee.id = fee[i].id
                    }

                }

                shoppingCart.items[shoppingCart.selectingIndex].pairItems.push(mountingFee)  
                this.directToReview()
            }




        },
        directToReview(){
            this.toggleModal()
            this.sendCookies()
            window.open( getLocale() + '/diamond-ring-review','_self')
        },
        addItemToCart(){

            this.shoppingCart.items[this.shoppingCart.selectingIndex].addedCart = 1
            this.shoppingCart.mode = 'create'
            this.addItemSample()
            this.sendCookies()
            this.toggleModal()
            window.open( getLocale() + '/shopping-cart','_self')
        },
        toggleModal(){
            this.shoppingCart.modalActive = !this.shoppingCart.modalActive
            this.sendCookies()
        },
       
    }
}
</script>
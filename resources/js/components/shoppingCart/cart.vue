<template>
    <div class="section" id="customerMoments">

    <button class="btn btn-primary" @click="selectItem()">{{'Select this Item' |transJs()}}</button>


    <div v-if="shoppingCart.haveShoppingCart" @click="toggleModal()">
      <div v-if="shoppingCart.modalActive">
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
                                        {{option.text |transJs()}}
                                      </button>
                                    </a>
                                </div>
                            </div>

                          <button class="btn btn-primary hover:bg-blue-500" :class="{'opacity-50':!nextProcedure.addToCart.clickable}" :disabled="!nextProcedure.addToCart.clickable" @click="addItemToCart()">{{nextProcedure.addToCart.text |transJs()}}</button>
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

import { setCookie, getCookie, } from '../../helpers/cookie'
import { getLocale, getLocaleCode } from '../../helpers/locale'



    
export default {
    components: {},
    props:{ item: '', type:'', title: '', carouselItem:'' },
    data(){
        return {
                mutualVar,
                langs,
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
    computed:{
        singularType(){
            return this.type.replace(/s/gi, '')
        },
        shoppingCart(){
            return mutualVar.cookiesInfo.shoppingCart
        },
        totalAddedCartItems(){
            var totalItems = 0
            var shoppingCart = mutualVar.cookiesInfo.shoppingCart

            for (var i = 0 ; shoppingCart.items.length > i; i++) {
                if (this.type == 'engagementRings' || this.type == 'diamonds' ) {
                    if (shoppingCart.items[i].addedCart) {
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
            var shoppingCart = mutualVar.cookiesInfo.shoppingCart

            if (shoppingCart.items.length > 0) {
                if (this.type == 'engagementRings' ) {

                    engagementClickable =  shoppingCart.items[shoppingCart.selectingIndex].pairItems.filter((data)=>{return data.type == 'diamonds'})
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
            var cart = mutualVar.cookiesInfo.shoppingCart

            if (cart.selectingIndex != 0 && cart.selectingIndex > cart.items.length-1 && cart.items.length) {

                if (cart.items.length) {
                    cart.selectingIndex = cart.items.length-1
                }

            }
            this.sendCookies()
            
        },
        addItemIndex(){
            var cart = mutualVar.cookiesInfo.shoppingCart

             if (cart.mode == 'create' && cart.items[cart.items.length -1]){
                if ( cart.items[cart.items.length -1].addedCart == 1) {
                    this.addItemSample()
                    cart.selectingIndex += 1            
                    this.sendCookies()
                }
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

            for( var i = 0; counteditem.length > i ; i++){

                var item = [] 
                console.log('checkingSame')

                if(counteditem[i].pairItems.length >0 && i != this.shoppingCart.selectingIndex){

                    item = counteditem[i].pairItems.filter((data)=>{
                         if (data.type =='diamonds' && data.id == this.item.id){
                            return data
                         } 
                     })

                    if (item.length > 0) {
                        Livewire.emit('notifiication-flash',
                            'warning,Same diamond on the list,Find other diamond')
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

                item.url = '/'+ getLocale() +'/engagement-rings/'

            }

            if (this.type == 'diamonds') {
                item.type = 'diamonds'
                item.unit_price = this.item.price
                item.diamondSize = parseFloat(this.item.weight)
                item.url = '/'+ getLocale() +'/gia-loose-diamonds/'
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
                            url: '/'+ getLocale() + '/buying-procedure/diamond-inlay-engrave',
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
            window.open( '/'+ getLocale() + '/diamond-ring-review','_self')
        },
        addItemToCart(){

            this.shoppingCart.items[this.shoppingCart.selectingIndex].addedCart = 1
            this.shoppingCart.mode = 'create'
            this.addItemSample()
            this.sendCookies()
            this.toggleModal()
            window.open( '/'+ getLocale() + '/shopping-cart','_self')
        },
        toggleModal(){
            this.shoppingCart.modalActive = !this.shoppingCart.modalActive
            this.sendCookies()
        },
       
    }
}
</script>
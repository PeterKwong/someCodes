<template>
    <div>

    <div class="hidden-item-hover max-w-sm p-4 bg-brown hover:bg-white border border-brown transition ease-in-out duration-500" @click="selectItem()">
        <div class="hidden-item-keep flex items-center space-x-3 justify-center">
            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.3334 7.04643H7.33335V12.0464H5.66669V7.04643H0.666687V5.37976H5.66669V0.379761H7.33335V5.37976H12.3334V7.04643Z" fill="white" />
            </svg>
            <span class="text-white font-bold font-lato tracking-widest uppercase">{{'Select this Item' |transJs()}}</span>
        </div>
        <div class="hidden-item flex flex-col md:flex-row space-y-1 md:space-y-0 items-center md:space-x-5 justify-center"  v-if="shoppingCart">
            <div v-for="option in nextProcedure.modalOptions" >
                <div @click="toggleModal()">
                    <a @click="redirectTo(option.url,1)">
                      <button class="flex items-center space-x-2 justify-center" :disabled="!option.clickable" >
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.8944 5.82879L13.8354 3.60338C13.8752 3.5578 13.9009 3.50173 13.9097 3.44188C13.9184 3.38203 13.9098 3.32093 13.8847 3.26587C13.8806 3.25669 13.8736 3.24949 13.8687 3.24085C13.868 3.23616 13.8664 3.23164 13.864 3.22753L12.6704 1.3463C12.642 1.30147 12.6027 1.26456 12.5562 1.23897C12.5097 1.21339 12.4574 1.19997 12.4044 1.19995H7.63026C7.57718 1.19997 7.52496 1.21339 7.47845 1.23897C7.43194 1.26456 7.39264 1.30147 7.36421 1.3463L6.17059 3.22753C6.16888 3.2309 6.16784 3.23457 6.16753 3.23833C6.16103 3.24717 6.15502 3.25637 6.14953 3.26587C6.12448 3.32093 6.11581 3.38203 6.12456 3.44188C6.13331 3.50173 6.1591 3.5578 6.19885 3.60338L8.14021 5.82879C6.55987 6.28141 5.1963 7.28983 4.30066 8.6683C3.40502 10.0468 3.03763 11.7024 3.26617 13.3304C3.4947 14.9583 4.30376 16.4488 5.54433 17.5274C6.7849 18.606 8.37343 19.1999 10.0173 19.1999C11.6612 19.1999 13.2497 18.606 14.4903 17.5274C15.7309 16.4488 16.5399 14.9583 16.7684 13.3304C16.997 11.7024 16.6296 10.0468 15.734 8.6683C14.8383 7.28983 13.4747 6.28141 11.8944 5.82879ZM10.7193 6.21868L11.4482 3.71138H12.9062L10.7193 6.21868ZM10.5901 1.82997H11.8321L11.2107 2.8083L10.5901 1.82997ZM10.638 3.08137H9.39593L10.0173 2.10304L10.638 3.08137ZM8.82387 2.8083L8.20303 1.82997H9.44507L8.82387 2.8083ZM10.7913 3.71138L10.0173 6.3733L9.24328 3.71138H10.7913ZM10.0173 7.81676C10.9205 7.81673 11.8033 8.08451 12.5543 8.58625C13.3053 9.08799 13.8906 9.80114 14.2362 10.6355C14.5819 11.4699 14.6723 12.3881 14.4961 13.2739C14.32 14.1597 13.8851 14.9733 13.2465 15.612C12.6079 16.2506 11.7942 16.6855 10.9084 16.8618C10.0226 17.038 9.10446 16.9475 8.27005 16.6019C7.43565 16.2563 6.72247 15.671 6.2207 14.9201C5.71893 14.1692 5.45111 13.2863 5.45111 12.3831C5.45264 11.1726 5.9342 10.012 6.79019 9.15597C7.64618 8.29994 8.80673 7.81834 10.0173 7.81676ZM13.025 3.08137H11.783L12.4036 2.10304L13.025 3.08137ZM7.63026 2.10304L8.25092 3.08137H7.00888L7.63026 2.10304ZM8.58735 3.71138L9.31619 6.21868L7.1293 3.71138H8.58735ZM10.0173 18.5705C8.49968 18.5703 7.03505 18.0123 5.90194 17.0028C4.76883 15.9932 4.04627 14.6024 3.87166 13.0948C3.69706 11.5873 4.08258 10.0682 4.95493 8.82631C5.82728 7.58446 7.1256 6.70652 8.60301 6.35944L9.36191 7.23013C8.05118 7.39678 6.85316 8.05649 6.01156 9.07506C5.16996 10.0936 4.74799 11.3946 4.83148 12.7132C4.91497 14.0318 5.49766 15.2691 6.46102 16.1734C7.42437 17.0777 8.69603 17.581 10.0173 17.581C11.3386 17.581 12.6102 17.0777 13.5736 16.1734C14.537 15.2691 15.1196 14.0318 15.2031 12.7132C15.2866 11.3946 14.8647 10.0936 14.0231 9.07506C13.1814 8.05649 11.9834 7.39678 10.6727 7.23013L11.4316 6.35998C12.9085 6.70753 14.2062 7.5856 15.0781 8.82729C15.95 10.069 16.3352 11.5877 16.1607 13.0949C15.9861 14.602 15.2639 15.9925 14.1312 17.002C12.9986 18.0115 11.5345 18.5697 10.0173 18.5705Z" fill="#9A7474" />
                        </svg>
                        <span class="text-brown font-bold font-lato tracking-widest uppercase">{{option.text |transJs()}}</span>
                        
                      </button>
                    </a>
                </div>
            </div>

            <span class="transform rotate-90 md:rotate-0 text-brown font-bold font-lato tracking-widest uppercase">|</span>
            <button class="flex items-center space-x-2 justify-center" :class="{'opacity-50':!nextProcedure.addToCart.clickable}" :disabled="!nextProcedure.addToCart.clickable"    @click="addItemToCart()">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.2007 5.56545C18.0827 5.41437 17.9016 5.32625 17.7098 5.32625H5.51484L4.95373 2.97858C4.88661 2.69805 4.63576 2.5 4.34731 2.5H2.28995C1.94561 2.49997 1.6665 2.77907 1.6665 3.12341C1.6665 3.46775 1.94561 3.74685 2.28995 3.74685H3.85522L5.88141 12.2249C5.94853 12.5056 6.19938 12.7034 6.48782 12.7034H16.1928C16.4794 12.7034 16.7292 12.5081 16.7979 12.23L18.315 6.0995C18.3609 5.91333 18.3187 5.71652 18.2007 5.56545ZM15.705 11.4566H6.97992L5.81282 6.57314H16.9132L15.705 11.4566ZM14.8628 13.5973C13.7169 13.5973 12.7847 14.5296 12.7847 15.6754C12.7847 16.8213 13.7169 17.7536 14.8628 17.7536C16.0087 17.7536 16.9409 16.8213 16.9409 15.6754C16.9409 14.5296 16.0087 13.5973 14.8628 13.5973ZM14.8628 16.5067C14.4044 16.5067 14.0315 16.1339 14.0315 15.6754C14.0315 15.217 14.4044 14.8442 14.8628 14.8442C15.3212 14.8442 15.694 15.217 15.694 15.6754C15.694 16.1339 15.3212 16.5067 14.8628 16.5067ZM5.24096 15.6754C5.24096 14.5296 6.17319 13.5973 7.3191 13.5973C8.46497 13.5973 9.39723 14.5296 9.39723 15.6754C9.39723 16.8213 8.46497 17.7536 7.3191 17.7536C6.17322 17.7536 5.24096 16.8213 5.24096 15.6754ZM6.48784 15.6754C6.48784 16.1339 6.86066 16.5067 7.3191 16.5067C7.77753 16.5067 8.15035 16.1339 8.15035 15.6754C8.15035 15.217 7.77753 14.8442 7.3191 14.8442C6.86066 14.8442 6.48784 15.217 6.48784 15.6754Z" fill="#9A7474" />
                </svg>
                <span class="text-brown font-bold font-lato tracking-widest uppercase">{{nextProcedure.addToCart.text |transJs()}}
                </span>
                
            </button>
        </div>
    </div>


    <!-- <button class="btn btn-primary" @click="selectItem()">{{'Select this Item' |transJs()}}</button>


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
                -->

    </div>
</template>

<script type="text/javascript">

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
                                    modalOptions: [{text : 'Add A Diamond', url: '/'+ getLocale() + '/gia-loose-diamonds', clickable: true} ],

                                    addToCart:
                                        {text : 'Add To Cart', url: '', clickable: false},
                                },
                            diamonds:
                                {
                                    modalOptions: [
                                    {text : 'Add A Engagement Ring', url: '/'+ getLocale() + '/engagement-rings', clickable: true},
                                    // {text : 'Add A Jewellery Setting', url: '/'+ getLocale() + '/jewellery', clickable: true},
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
            var cookies = mutualVar.cookiesInfo.shoppingCart
            if (localStorage.getItem('shoppingCart')) {
                cookies = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')))
            }

        },
        sendCookies(){
            var cookies = mutualVar.cookiesInfo.shoppingCart
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
                item.ringSize = 6
                item.url = '/'+ getLocale() +'/engagement-rings'

            }

            if (this.type == 'diamonds') {
                item.type = 'diamonds'
                item.unit_price = this.item.price
                item.diamondSize = parseFloat(this.item.weight)
                item.url = '/'+ getLocale() +'/gia-loose-diamonds'
                if (this.item.image_cache == 1) {
                    item.image = mutualVar.storage[mutualVar.storage.live] + 'public/diamond/images/' + this.item.id + '.jpg'                    
                }else{
                    item.image = '/images/front-end/diamond_show/RoundDiamonds_sample.png'                                      
                }
                if (this.item.location != '1Hong Kong') {
                    item.delivery = 7
                }
            }

            var pairItems = shoppingCart.items[shoppingCart.selectingIndex].pairItems

            if (pairItems.length == 0 ) {
                    pairItems.push(item)
            }else{
                var sameItem = 0
                for (var i = 0 ;  pairItems.length > i; i++) {

                    if (pairItems[i].type == this.type ) {
                        sameItem =1
                        pairItems[i] = item
                    }

                    
                }

                if (sameItem == 0) {

                    pairItems.push(item)
                }

            }

            if (shoppingCart.items[shoppingCart.selectingIndex].addedCart == 1 ) {
                this.addItemSample()

            }            

            this.sendCookies()

            if ( pairItems.length == 3) {
                this.directToReview(pairItems)
            }


            if ( pairItems.length == 2) {

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
                    
                    if(fee[i].size > pairItems.find((data)=>{return data.type == 'diamonds'}).diamondSize){
                        mountingFee.unit_price = fee[i].amount
                        mountingFee.id = fee[i].id
                    }
                }

                pairItems.push(mountingFee)  
                this.directToReview(pairItems)
            }


        },
        directToReview(pairItems){
            var enId = pairItems.find((data)=>{return data.type == 'engagementRings'})
            var diamId = pairItems.find((data)=>{return data.type == 'diamonds'})
            // console.log(pId.id)
            setCookie('shoppingCartEngage',enId.id,300)
            setCookie('shoppingCartDiam',diamId.id,300)
            this.toggleModal()
            this.sendCookies()
            this.redirectTo( '/diamond-ring-review')
        },
        redirectTo(url,full = 0){
            if (full) {
               return  window.open( url,'_self')
            }
            window.open( '/'+ getLocale() + url,'_self')
        },
        addItemToCart(){

            this.shoppingCart.items[this.shoppingCart.selectingIndex].addedCart = 1
            this.shoppingCart.mode = 'create'
            this.addItemSample()
            this.sendCookies()
            this.toggleModal()
            this.redirectTo( '/shopping-cart')
        },
        toggleModal(){
            this.shoppingCart.modalActive = !this.shoppingCart.modalActive
            this.sendCookies()
        },
       
    }
}
</script>
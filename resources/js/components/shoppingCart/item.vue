<template>
    <div class="p-4">
          
        <div class="grid grid-cols-12 border rounded mt-1" v-for="(item,firstIndex) in shortenName" >

            <div class="col-span-12"  v-if="item.pairItems.length >0">
                <div @click="shiftIndex(firstIndex)">
                    <div class="flex justify-between items-center text-white p-1" :class="item.pairItems.filter((data)=>{return data.available != 1}).length?'bg-red-300': 'bg-blue-300' " >
                        <div class="px-4">
                           <p class="text-xl font-light"> <strong>{{item.pairItems[0].type |transJs(langs, mutualVar.langs.localeCode) }} </strong><strong v-if="item.pairItems[1]"> + {{ item.pairItems[1].type |transJs(langs, mutualVar.langs.localeCode) }}</strong></p>
                        </div>

                        <div class="sm:px-4">
                            <a @click="directTo(item.pairItems[0].id)" :href="item.pairItems[0].url + item.pairItems[0].id ">
                                <button class="btn btn-primary" :class="item.pairItems.filter((data)=>{return data.available != 1}).length?'bg-red-500': 'btn-primary' " >{{ 'Back to'|transJs(langs, mutualVar.langs.localeCode) }}{{item.pairItems[0].type |transJs(langs, mutualVar.langs.localeCode)}}</button>
                            </a>
                            <button class="btn btn-primary" :class="item.pairItems.filter((data)=>{return data.available != 1}).length?'bg-red-500': 'btn-primary' "  @click="removeItem(firstIndex)">{{ 'Remove' |transJs(langs, mutualVar.langs.localeCode) }}  <i class="fa fa-times-circle"></i></button>
                        </div>

                    </div>

                    <div v-for="(pairItem, secondIndex) in item.pairItems" >
                        <div class="grid grid-cols-12 text-grey-300 border-b" :class="item.pairItems.filter((data)=>{return data.available != 1}).length?'bg-red-100': 'bg-blue-100' ">
                            <div class="col-span-9">
                                <div class="grid grid-cols-12 ">
                                    <div class="col-span-4">
                                        <div class="flex justify-center">
                                            <a @click="directTo(pairItem.id)" :href="`${pairItem.url}${pairItem.type=='mountingFee'?'':pairItem.id}`">
                                                <img class="arounded border w-32 sm:w-48" :src="pairItem.image" @click="selectingCarousel = pairItem.type">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-span-8 text-center">
                                        <a class="text-blue-600" @click="directTo(pairItem.id)" :href="`${pairItem.url}${pairItem.type=='mountingFee'?'':pairItem.id}`">{{pairItem.title}}</a>
                                        <div v-if="pairItem.type == 'engagementRings' ">    
                                            <div class="flex justify-center">
                                              <div class="bg-gray-300 p-1 rounded">
                                                <label class="" for="inputGroupSelect01">
                                                    {{ 'Ring Size' |transJs(langs, mutualVar.langs.localeCode) }}
                                                </label>
                                              </div>
                                              <select class="rounded" id="inputGroupSelect01" v-model="pairItem.ringSize">
                                                <option v-for="size in ringSizeOptions" :value="size" >{{size}}</option>
                                              </select>
                                            </div>
                                              <input class="input is-small" id="inputGroupSelect01" type="text" name="" v-model="pairItem.engrave" :placeholder="'Engrave' |transJs(langs, mutualVar.langs.localeCode)">
                                        </div>                                        
                                    </div>                                    
                                </div>
                            </div>    

                            <div class="col-span-3">
                                <div class="grid grid-cols-12">
                                    <div class="col-span-6">
                                         <a class="text-blue-600" @click="directTo()" :href="pairItem.url" ><u>{{'change'  |transJs(langs, mutualVar.langs.localeCode) }}</u></a>

                                    </div>

                                    <div class="col-span-6"  @click="selectingCarousel = pairItem.type">
                                        <img class="" width="32" :src=" '/images/front-end/shoppingCart/' + pairItem.type + '.png' ">
                                        <div v-if="couponValid">
                                            <a v-if="pairItem.available">
                                                <del v-if="pairItem.discounted_unit_price && pairItem.discounted_unit_price != pairItem.unit_price">
                                                {{'$' + pairItem.unit_price }}
                                                </del>
                                                <p style="color:red;" v-if="pairItem.discounted_unit_price && pairItem.discounted_unit_price != pairItem.unit_price">{{'$' + pairItem.discounted_unit_price }}</p> 
                                            </a>
                                        </div>
                                        <div v-if="!couponValid || pairItem.discounted_unit_price == pairItem.unit_price">
                                            <p class="text-lg font-light text-gray-700">{{'$' + pairItem.unit_price }}</p>     
                                        </div>
                                        <p style="color:red" v-if="!pairItem.available"><strong>{{'sold'}}</strong></p>
                                    </div>                                    
                                </div>
                            </div>                                         
                        </div>
                    </div>

                </div> 
            </div> 
        </div>


        <div class="grid grid-cols-12 p-1">
            <div class="col-span-6 sm:col-span-8">
                <div class="grid grid-cols-12">
                    <div class="col-span-10">
                        <p>{{ 'Precautions'|transJs(langs, mutualVar.langs.localeCode) }}：</p>                    
                        <small>
                            <p>{{ 'All amounts of the company are subject to Hong Kong dollar settlement' |transJs(langs, mutualVar.langs.localeCode) }}</p>                    
                            <p>{{ 'The customer is required to pay the full amount and withdraw the goods within two months after the order is placed, otherwise the company reserves the right to terminate the transaction.' |transJs(langs, mutualVar.langs.localeCode) }}</p>                    
                            <p>{{ 'In order to protect the interests of both parties, unless the diamond does not match the GIA report, the order will not be returned after confirmation.' |transJs(langs, mutualVar.langs.localeCode) }}</p>                    
                        </small>
                        <br>
                        <div class="rounded border text-center p-10">
                            <p v-if="maxDeliveryDate">{{ 'Today Order, Diamond Gets Free shipment' |transJs(langs, mutualVar.langs.localeCode) }}
                                <strong>{{ 'On' |transJs(langs, mutualVar.langs.localeCode) }} <a class="text-blue-600"> {{ extraWorkingDates( maxDeliveryDate ,'months') |transJs(langs, mutualVar.langs.localeCode) }} {{ extraWorkingDates( maxDeliveryDate ) }} {{ 'day' |transJs(langs, mutualVar.langs.localeCode) }},  {{ extraWorkingDates( maxDeliveryDate ,'dates') |transJs(langs, mutualVar.langs.localeCode) }}</a>
                                </strong> 

                            </p> 
                        </div>                                      
                    </div>
                </div>
            </div>
            
            <div class="col-span-6 sm:col-span-4">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="flex">

                          <div class="input-group-prepend">
                            <button class="btn btn-primary is-small" @click="checkCouponCodeValid" type="button" id="button-addon1">{{'Apply Coupon'|transJs(langs, mutualVar.langs.localeCode) }}</button>
                          </div>
                          <input type="text" class="input" :placeholder="'Enter Coupon Code' |transJs(langs, mutualVar.langs.localeCode) " v-model="mutualVar.cookiesInfo.coupon_code" @focus="$event.target.select()" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                        
                            <p v-if="couponValid == 0 " style="color:red;">
                                <small>{{'not valid'|transJs(langs, mutualVar.langs.localeCode) }}</small>
                            </p>
                        </div>

                    </div>

                </div>
                <div class="grid grid-cols-12">

                    <div class="col-span-6">
                        <div v-if="couponValid || calculatedDiscountRate != 1">
                            <p>{{'Total' |transJs(langs, mutualVar.langs.localeCode) }} </p>
                            <p>{{'Disounted Total' |transJs(langs, mutualVar.langs.localeCode) }}</p>
                        </div>
                        <div v-else="!couponValid ">
                            <p>{{'Total' |transJs(langs, mutualVar.langs.localeCode) }} </p>
                        </div>
                        <p class="text-lg text-blue-600">{{'Deposit (20%)' |transJs(langs, mutualVar.langs.localeCode) }}</p>
                        <div class="">
                            <p class="text-lg text-blue-600">{{'Balance (80%)'|transJs(langs, mutualVar.langs.localeCode) }}
                            </p>
                            <select class="border-2 border-gray-500" v-model="mutualVar.cookiesInfo.checkout.balancePaymentMethod">
                                    <option v-for="paymentOption in paymentOptions" :value="paymentOption.name"> {{paymentOption.name |transJs(langs, mutualVar.langs.localeCode) }}</option>
                            </select>   
                        </div>

                    </div>
                    <div class="col-span-6 text-right">
                        <div v-if="couponValid || calculatedDiscountRate != 1">
                            <del><p>HK$ {{subTotal}}</p></del>
                            <p style="color:red;">HK$ {{discountedSubTotal}}</p>
                            <p></p>
                            <p><strong> HK$ {{mutualVar.cookiesInfo.checkout.discountedDeposit}} </strong></p>
                        </div>
                        <div v-else="!couponValid ">
                            <p>HK$ {{subTotal}}</p>
                            <p></p>
                            <p class="text-lg text-blue-600"><strong> HK$ {{mutualVar.cookiesInfo.checkout.deposit}} </strong></p>
                        </div>
                        <p class="text-lg text-blue-600"><strong> HK$ {{balance}} </strong></p>
                    </div>

                    
                </div>

                <div class="flex justify-between ">

                    <div class="">
                        <p style="color:red;">* {{'you only need to pay deposit, balance will pay after 100% satisfied'|transJs(langs, mutualVar.langs.localeCode) }}</p>
                    </div>

                    <div  v-if=" windowHref.includes('shopping-cart')"  @click="sendCookies()">
                        <a :href=" locale + '/shop-bag-bill' ">
                        <button class="btn btn-primary" :class="{'opacity-25' : !checkoutClickable}" :disabled="!checkoutClickable"> <i class="fas fa-shopping-cart"></i>{{'checkout' |transJs(langs, mutualVar.langs.localeCode) }}</button> 
                        </a>
                    </div>                              

                </div>
                

            </div>
        </div>

    </div>
</template>

<script type="text/javascript">

import Carousel from '../carousel.vue'

import { get,authGet,post, } from '../../helpers/api'
import { getLocale , getLocaleCode} from '../../helpers/locale'
import { setCookie, getCookie, } from '../../helpers/cookie'
import { extraWorkingDates } from '../../helpers/helperFunctions'
import getAuthUser from '../../helpers/getAuthUser'

import { transJs } from '../../helpers/transJs'

import stripeCheckoutForm from '../shoppingCart/stripeCheckoutForm.vue'

    
export default {
    data(){
        return {
            mutualVar,
            langs,
            selectingCarousel:'engagementRings',
            maxDeliveryDate: false,
            extraWorkingDates,
            showCheckout:0,
            couponValid: null,
            discountRate: '',
            ringSizeOptions:[ null ,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22],
            paymentOptions:[{ 'name': 'VISA', 'discount': 1},
                            { 'name': 'ESP(-1%)', 'discount':0.99},
                            { 'name': 'Alipay(-1%)', 'discount':0.99},
                            { 'name': 'Wechat(-1%)', 'discount':0.99},
                            { 'name': 'Cash(-2%)', 'discount':0.98}],
            apiToken: getAuthUser.api_token,
            shortenName:mutualVar.cookiesInfo.shoppingCart.items,
            model:'',

        }
    },
    watch:{
    },
    filters:{
            transJs,        
    },
    created(){
        this.fetchCookies()
        this.deleteNotAddedToCart()
        if (mutualVar.cookiesInfo.shoppingCart.items.length > 0) {
            this.updateCartItems()
        }
        if (mutualVar.cookiesInfo.shoppingCart.items.length == 0) {
            this.fetchCartItems()
        }
        this.checkAvailableOfDiamond()
        if (this.apiToken) {
            this.authGetCouponCode()
        }

    },
    mounted(){
        
        if (getCookie('coupon_code')) {        
            this.checkCouponCodeValid()
        }
        this.updateDiscountedPrices()
    },
    computed:{
        carousel(){
            return mutualVar.cookiesInfo.shoppingCartCarousel.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex]
        },
        types(){
            var procedures = {
                            engagementRings:
                            ['engagementRing','diamond','review'],
                            diamonds:
                            ['diamond','engagementRing','review']

                        }
            return procedures[this.selectingType]
        },
        selectingType(){
            var type = ''
            var urls = [ {url:'gia-loose-diamonds',
                          type: 'diamonds'},
                          {url:'engagement-rings',
                          type: 'engagementRings'},]

            for (var i = 0 ; urls.length > i; i++) {
                if (window.location.pathname.includes(urls[i].url)) {
                    type = urls[i].type
                }
                
            }

            return type
        },
        locale(){
            return  getLocale()
        },
        windowHref(){
            return window.location.href
        },
        calculatedDiscountRate(){
            for(var i =0; this.paymentOptions.length > i; i++){
                if(this.paymentOptions[i].name == mutualVar.cookiesInfo.checkout.balancePaymentMethod){
                    return this.paymentOptions[i].discount
                }
            }
        },
        subTotal(){
            var subTotal = 0
            for (var i = 0 ; this.shortenName.length >i ; i++) {
                for(var j = 0; this.shortenName[i].pairItems.length > j; j++){
                        subTotal += parseInt(this.shortenName[i].pairItems[j].unit_price)
                        if (this.maxDeliveryDate < this.shortenName[i].pairItems[j].delivery) {
                            this.maxDeliveryDate = this.shortenName[i].pairItems[j].delivery
                        }
                    }
                }

            mutualVar.cookiesInfo.checkout.deposit = parseInt( subTotal * 0.2)

            if ( mutualVar.cookiesInfo.checkout.deposit > 10000) {
                 mutualVar.cookiesInfo.checkout.deposit = 10000
            }
            if ( subTotal > 3000 && subTotal < 15000) {
                 mutualVar.cookiesInfo.checkout.deposit = 3000
            }
            if ( subTotal <= 3000) {
                 mutualVar.cookiesInfo.checkout.deposit = subTotal
            }

            return mutualVar.cookiesInfo.checkout.subTotal = subTotal
        },
        discountedSubTotal(){
            var subTotal = 0
            var discountRate = this.calculatedDiscountRate

            for (var i = 0 ; this.shortenName.length >i ; i++) {
                for(var j = 0; this.shortenName[i].pairItems.length > j; j++){

                        if ( this.shortenName[i].pairItems[j].discounted_unit_price > 80000 ) {
                            discountRate = 1
                        }
                        subTotal += parseInt(this.shortenName[i].pairItems[j].discounted_unit_price * discountRate)

                        discountRate = this.calculatedDiscountRate

                }

            }
            subTotal = Math.floor(subTotal)

            return mutualVar.cookiesInfo.checkout.discountedSubTotal = subTotal
        },
        balance(){
            var balance = 0
            
            if (this.couponValid || this.calculatedDiscountRate != 1) {
                mutualVar.cookiesInfo.checkout.discountedDeposit = mutualVar.cookiesInfo.checkout.deposit 
                balance = this.discountedSubTotal - mutualVar.cookiesInfo.checkout.discountedDeposit 
            }else{
               balance = this.subTotal - mutualVar.cookiesInfo.checkout.deposit

            }

            return mutualVar.cookiesInfo.checkout.balance = balance
        },
        checkoutClickable(){
            var items = mutualVar.cookiesInfo.shoppingCart.items
            var allItemsClickable = 1

            for( var i = 0; items.length > i ; i++){
                for( var j = 0; items[i]['pairItems'].length > j; j++){
                    if (items[i]['pairItems'][j].available != 1) {
                        allItemsClickable = 0
                        }

                    }
                }

            return allItemsClickable

        }

    },
    filters:{
            transJs,
    },
    methods:{
        fetchCookies(){
            if (localStorage.getItem('shoppingCart')) {
                mutualVar.cookiesInfo.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')))
            }
            if (getCookie('coupon_code')) {
                mutualVar.cookiesInfo.coupon_code = getCookie('coupon_code')
            }
            if (getCookie('checkout')) {
                mutualVar.cookiesInfo.checkout = JSON.parse(getCookie('checkout'))
            }

        },
        sendCookies(){
            var cookies = mutualVar.cookiesInfo.shoppingCart
            this.shortenName = mutualVar.cookiesInfo.shoppingCart.items
            localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), 10080)
            setCookie('coupon_code', mutualVar.cookiesInfo.coupon_code, 10080)
            setCookie('checkout', JSON.stringify(mutualVar.cookiesInfo.checkout), 10080)

        },
        updateCartItems(){
            var data = {'api_token' : this.apiToken,
                        'data' : mutualVar.cookiesInfo.shoppingCart.items,
                        'order' : 0
                    }
            if (this.apiToken) {
                post('/api/update-cart-items', data)
                .then((res)=>{
                    this.model = res.data.model

                })
                this.sendCookies()
            }

        },
        fetchCartItems(){
            var data = {'api_token' : this.apiToken,
                        'data' : mutualVar.cookiesInfo.shoppingCart.items,
                        'order' : 0
                    }
            if (this.apiToken) {
                post('/api/fetch-cart-items', data)
                .then((res)=>{
                    this.model = res.data.model
                    if (this.model.length > 0) {
                        this.assignCartItems()
                    }

                })
                this.sendCookies()
            }

        },
        assignCartItems(){

            function assignDetails(model,varItem){

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
                }

                if (varItem.length == model.pair_item_id) {
                    varItem.push({'pairItems':[], 'addedCart': 1})  
                                    console.log('hi')
  
                }
                item.id = model.cart_itemable_id 
                item.type = typeOptions[model.cart_itemable_type].type
                item.engrave = model.engrave 
                item.image = model.image 
                item.ringSize = model.ring_size 
                item.title = model.title 
                item.unit_price = model.unit_price 
                item.url = typeOptions[model.cart_itemable_type].url 
                console.log(item)
                varItem[model.pair_item_id].pairItems.push(item) 
            }

            var typeOptions = {'App/Diamond': 
                                    { 'type' : 'diamonds',
                                        'url' : getLocale()+ '/gia-loose-diamonds/'},
                                'App/EngagementRing': 
                                { 'type' : 'engagementRings',
                                    'url' : getLocale()+ '/engagement-rings/'},
                                'App/Jewellery': 
                                { 'type' : 'mountingFee',
                                    'url' : getLocale()+ '/buying-procedure/diamond-inlay-engrave'},
                                }
            for( var i = 0; this.model.length > i ; i ++){
                assignDetails(this.model[i], mutualVar.cookiesInfo.shoppingCart.items)

            }
            this.sendCookies()

        },
        discountedCouponPrice(discountedPrice,item){

            for(var i = 0; this.discountRate.length > i ; i++){
                if (item.type == 'engagementRings') {
                    if (discountedPrice< this.discountRate[i].upperAmount) {
                        return Math.round(discountedPrice * (1-this.discountRate[i].rate))
                    }
                }
            }
            return discountedPrice
        },
        updateDiscountedPrices(){

                var items = mutualVar.cookiesInfo.shoppingCart.items
                var cookiesItems = mutualVar.cookiesInfo.shoppingCart.items

                for( var i = 0; items.length > i ; i++){
                    for( var j = 0; items[i]['pairItems'].length > j; j++){

                            items[i]['pairItems'][j].discounted_unit_price = this.discountedCouponPrice(cookiesItems[i]['pairItems'][j].unit_price,items[i]['pairItems'][j])

                    }


                }

        },
        checkCouponCodeValid(){
            authGet('/api/coupon/valid?code=' + mutualVar.cookiesInfo.coupon_code )
            .then((res)=>{
                this.couponValid = res.data.valid
                this.discountRate = res.data.model
                    if (res.data.valid) {
                        this.updateDiscountedPrices()
                    }
            })
            this.sendCookies()
        },
        authGetCouponCode(){
            authGet('/api/fetch-customer-coupon-code')
            .then((res)=>{
                if (res.data.valid) {
                    this.couponValid = res.data.valid
                    this.discountRate = res.data.model
                    mutualVar.cookiesInfo.coupon_code = res.data.coupon_code.code
                    this.updateDiscountedPrices()
                }
            })
            this.sendCookies()
        },
        checkAvailableOfDiamond(){
            var items = mutualVar.cookiesInfo.shoppingCart.items
            var countedItem = ''

            function axiosGet(item,i,j){

                if (item.type == 'diamonds') {
                        get('/api/diamonds/' + item.id)
                        .then( (res)=>{
                            item.available = res.data.diamond.available
                            item.unit_price = res.data.diamond.price
                                }
                            )  

                    }

            }

            for( var i = 0; items.length > i ; i++){
                for( var j = 0; items[i]['pairItems'].length > j; j++){

                    var vm = this
                    var item = mutualVar.cookiesInfo.shoppingCart.items[i]['pairItems'][j]
                    axiosGet(item,i,j)

                }

                 // console.log(countedItem)


            }

            this.sendCookies()

        },
        shiftIndex(index){
            mutualVar.cookiesInfo.shoppingCart.selectingIndex = index
            this.sendCookies()
        },
        addItemSample(){
            var itemsSample = {addedCart:0, 
                            pairItems:[]
                            }
            mutualVar.cookiesInfo.shoppingCart.items.push(itemsSample)

        },
        deleteNotAddedToCart(){

            for (var i = 0 ; this.shortenName.length > i ; i++) {

                if (this.shortenName[i].addedCart == 0 || this.shortenName[i].pairItems.length == 0) {
                    mutualVar.cookiesInfo.shoppingCart.items.splice(i,1)
                }
                 
            }
            
            mutualVar.cookiesInfo.shoppingCart.selectingIndex = this.shortenName.length
            
            this.sendCookies()
        },
        directTo(item){
            var urlId =0
            
            mutualVar.cookiesInfo.shoppingCart.mode = 'edit'
            this.sendCookies()

            if (Number.isInteger(item)) {
                urlId = mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].url + mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].id 

            }else{
                if (item == 'engagementRings') {
                    urlId  = '/engagement-rings'
                }
                if (item == 'diamonds') {
                    urlId  = '/gia-loose-diamonds'
                }
                if (item == '/shopping-cart/') {
                    urlId  = '/shopping-cart/'
                }

                urlId = getLocale() + urlId
            }
            window.open(urlId,'_self')
        },
        removeItem(index){
            mutualVar.cookiesInfo.shoppingCart.items.splice(index,1)
            this.sendCookies()
            this.updateCartItems()
        },
        addItemToCart(){
            var itemsSample = {addedCart:0, 
                            pairItems:[]
                            }
            mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].addedCart = 1
            mutualVar.cookiesInfo.shoppingCart.selectingIndex += 1
            mutualVar.cookiesInfo.shoppingCart.items.push(itemsSample)
            this.sendCookies()
            this.directTo('/shopping-cart/')
        },

    }
}
</script>

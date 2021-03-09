

import shoppingCartItem from '../../../components/shoppingCart/item.vue'
import stripeCheckoutForm from '../../../components/shoppingCart/stripeCheckoutForm.vue'

import { getLocale , getLocaleCode} from '../../../helpers/locale'
import { setCookie, getCookie, } from '../../../helpers/cookie'

// import QRCode from 'qrcode'
    
export default {
    el:'#shopBagBill',
    components:{ shoppingCartItem, stripeCheckoutForm },
    data(){
        return {
            mutualVar,
            cookies: mutualVar.cookiesInfo,
            form:{
                    user:{
                        'name': '',
                        'email': '',
                        'address' : '',
                        'country' : 'HK',
                        'mobile' : '',
                        'wechat' : '',
                        },
                    onProgress: {'login':false,
                            'customerInfo':false,
                            'payment':false,
                            },
                    onTab:'login',

                },
            formError: '',
            paymentOption:{
                  modal: false,
            },
            formItems:[ 
                    {data : 'name', display : 'Name', errorName: 'data.name', type: 'text'},
                    {data : 'phone', display : 'Mobile', errorName: 'data.phone', type: 'number'},
                    {data : 'address', display : 'Address', errorName: 'data.address', type: 'text'},
                    {data : 'email', display : 'Email', errorName: 'data.email', type: 'text'},
                    ],
            langs,
            apiToken: '',
            customerInfo: {'email': '',
                            },
            showCheckout:0,
            paymentResponse: { 'orderID':'' , 'is_success': false, 'response': 0},
            decodeResponse:'',
            checkoutStatus:'selectingPayment',
            orderStatus:'',
            orderData:'',


        }
    },
    watch:{
    },
    created(){
        this.fetchCookies()
        this.apiToken = getMeta('api-token')
    },
    mounted(){
        this.checkOnProgress()
    },
    computed:{
        shortenName(){
            return this.cookies.shoppingCart.items[this.cookies.shoppingCart.selectingIndex].pairItems
        },
        locale(){
                return getLocale()
        },
        isProcessing(){
            return mutualVar.status.isProcessing
        },
        checkoutClickable(){
            var items = this.cookies.shoppingCart.items
            var allItemsClickable = true

            for( var i = 0; items.length > i ; i++){
                for( var j = 0; items[i]['pairItems'].length > j; j++){
                    if (items[i]['pairItems'][j].available != 1) {
                        allItemsClickable = false
                        }

                    }
                }
            if (items.length <1) {
                allItemsClickable = false       
            }
            if (this.isProcessing) {
                allItemsClickable = false       
            }


            return allItemsClickable
        },
        title(){
            var items = this.cookies.shoppingCart.items
            var title = ''

            for( var i = 0; items.length > i ; i++){
                for( var j = 0; items[i]['pairItems'].length > j; j++){
                    
                       title += items[i]['pairItems'][j].title + ' / '

                    }
                }

            return title 
        },
        formData(){
            return {'user': this.form.user, 'data': this.cookies.shoppingCart, 'api_token': this.apiToken, 
                    'coupon_code': this.cookies.coupon_code, 
                    'balancePaymentMethod': this.cookies.checkout.balancePaymentMethod , 
                    'depositPaymentMethod': this.cookies.checkout.depositPaymentMethod ,  
                    'orderID': this.paymentResponse.orderID, 
                    'status': this.orderStatus, 'stripeToken': '' }
        },
        toQRcode(){

           var data = this.paymentResponse.response.response.qrcode_url
           QRCode.toDataURL(data)
              .then(url => {
                console.log(url)
                this.paymentResponse.response.response.qrcode_url = url
              })
              .catch(err => {
                console.error(err)
              })
            return data
        }

    },
    filters:{
        
    },
    methods:{
        fetchCookies(){
            if (localStorage.getItem('shoppingCart')) {
                this.cookies.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')))
            }

            if (localStorage.getItem('form')) {
                this.form = JSON.parse(decodeURIComponent(localStorage.getItem('form')))
            }

            if (getCookie('coupon_code')) {
                this.cookies.coupon_code = getCookie('coupon_code')
            }
            if (getCookie('checkout')) {
                this.cookies.checkout = JSON.parse(getCookie('checkout'))
            }

        },
        sendCookies(){
            var cookies = this.cookies.shoppingCart
            localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), this.cookies.cookieLast)
            localStorage.setItem('form', encodeURIComponent(JSON.stringify(this.form)), this.cookies.cookieLast)

            setCookie('coupon_code', this.cookies.coupon_code, this.cookies.cookieLast)
            setCookie('checkout', JSON.stringify(this.cookies.checkout), this.cookies.cookieLast)

        },
        updateCustomerInfo(){

            if (this.apiToken == '' || this.isProcessing) {
                return 
            }
            this.isProcessing = true
            var data = {'data': this.form.user, 'api_token': this.apiToken}
            post('/api/update-customer-info', data)
            .then((res)=>{
                if (res.data.model == 'updated' || res.data.model == 'created') {
                    this.form.onProgress.customerInfo = true
                    this.form.onTab = 'payment'
                    this.sendCookies()
                }
                this.isProcessing = false
            })
            .catch((err)=>{
                this.formError = err.response.data.errors
            })

        },
        updateCartItems(){
            var data = {'api_token' : this.apiToken,
                        'data' : this.cookies.shoppingCart.items,
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
        placeOrder(payment){

            if (this.apiToken == '' || !this.checkoutClickable || this.isProcessing) {
                return 
            }
            
            this.isProcessing = true 

            // this.updateCartItems()
             this.cookies.checkout.depositPaymentMethod =  payment

            // console.log(this.formData)
               // return  this.receivedPayment('hi')

            post('/api/place-order', this.formData)
            .then((res)=>{
                // console.log(res.data)
                if (res.data.saved ) {
                    this.receivedPayment(res.data.message)
                    this.isProcessing = false
                }
                if (this.formData.depositPaymentMethod ==  "Alipay(-1%)" ) {
                    this.responseToJson(res)
                    this.checkOrderPaymentStatus()
                    this.isProcessing = false
                }
                if (this.formData.depositPaymentMethod ==  "Wechat(-1%)" ) {
                    this.responseToJson(res)
                    this.checkOrderPaymentStatus()
                    this.isProcessing = false
                }
                // window.open( window.location.pathname ,'_self')

            })
            .catch((err)=>{
                mutualVar.notification.state.error = err.response.data.errors
            })
        },
        alipay(){
            var data = {'user': this.form.user, 'data': this.cookies.shoppingCart, 'api_token': this.apiToken, 'coupon_code': this.cookies.coupon_code, 'balancePaymentMethod': this.cookies.checkout.balancePaymentMethod}            
            post('/purchases/alipay', data)
            .then( (res) => {
                this.responseToJson(res)
            })
            .catch((error)=>{
                this.$emit('paymentModalActive',null)
                mutualVar.notification.state.error = error.response.data.message
            })
            
        },
        receivedPayment(mes){
                // var message = mutualVar.notification.contactMessage
                // message.title = 'message'
                // message.type = 'is-danger'
                // message.data.push(mes)
                // message.next = { nextUrl: mutualVar.langs.locale + '/account/pending', nextText: 'check your pending order'} 
                // message.active = true
                this.cookies.shoppingCart.items = []
                this.cookies.shoppingCart.selectingIndex = 0
                this.sendCookies()
                this.updateCartItems()
                window.open( mutualVar.langs.locale + '/thank-you','_self')                
        },
        checkOrderPaymentStatus(){

            var count = 60
            var vm = this

            function getPaymentS(vm, isProcessing) {

                setTimeout(function(){
                    if (vm.orderStatus != 'received money') {
                            get('/api/order/payment-status/' + vm.paymentResponse.orderID)
                            .then((res)=>{
                                vm.orderStatus = res.data.model
                                if (res.data.model == 'received money') {
                                    vm.receivedPayment(res.data.model)
                                }
                            })
                        }
                }, 2000 * i);

            }

            for (var i = 0; count > i; i++) {   
                    getPaymentS(vm, i)                

            }

        },
        responseToJson(res){
                // console.log(res.data)
                var n = ''

                // this.decodeResponse = res.data

                n =  JSON.parse(res.data.response)

                this.paymentResponse.orderID =  res.data.orderID 
                this.paymentResponse.is_success =  res.data.is_success 
                this.paymentResponse.response =  n 

        },
        responseToJsonOld(res, urlLenght){
                // console.log(res)
                var n = ''
                var n1 = ''

                this.decodeResponse = res.data
                n = this.decodeResponse.lastIndexOf('API--->https://testapi.hipopay.com/')
                n1 = this.decodeResponse.lastIndexOf('{"orderID":')
                n = this.decodeResponse.slice(n+urlLenght, n1)
                n1 = this.decodeResponse.slice(n1+11, -1)
                n =  JSON.parse(n)

                this.paymentResponse = {"orderID": n1 ,"response": n }
        },
        checkOnProgress(){

            if ( this.api_token != '') {
                this.form.onProgress.login = true
                this.fetchUserInfo()
            }else{
                this.form.onProgress.login = false                
                this.form.onTab = 'login'
            }
            if (this.form.user.id != '') {
                this.form.onProgress.customerInfo = true
            }

        },
        fetchUserInfo(){
            get('/api/fetch-customer-info')
            .then((res)=>{
                if (res.data.model != null) {
                    this.form.user = res.data.model                    
                }
            })
        },
        changeOnTab(tab){
            var nextTab = false
            if (tab == 'login') {
                nextTab = true
            }

            if ( tab == 'customerInfo' && this.apiToken != '' ) {
                    nextTab = true
            }

            if (tab == 'payment' && this.form.onProgress.customerInfo == true  && this.apiToken != '' && this.form.user.id){
                    nextTab = true

                }

            if (nextTab) {
                this.form.onTab = tab
                this.sendCookies()                
            }


        },
      

    }
}

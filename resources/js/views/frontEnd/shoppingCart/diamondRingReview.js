
import Carousel from '../../../components/carousel.vue'

import { get,post, } from '../../../helpers/api'
import { getLocale , getLocaleCode} from '../../../helpers/locale'
import { setCookie, getCookie, } from '../../../helpers/cookie'
import { extraWorkingDates } from '../../../helpers/helperFunctions'

	
export default {
    components:{ Carousel,},
    el:'#diamondRingReview',
	data(){
		return {
            mutualVar,
            selectingCarousel:'engagementRings',
            engagementRing : '',
            maxDeliveryDate: 2,
            customerItems: '',
            carouselItem : {
                upperitems:'',
                items: [],
                active: false,
            },
            extraWorkingDates

		}
	},
	watch:{
	},
	created(){
		this.fetchCookies()
        this.cleanLastEmptyItemAndMaxItemIndex()    
        this.getEngagementRing()
        this.setCarouselType()
	},
	computed:{
        shortenName(){
        	return this.mutualVar.cookiesInfo.shoppingCart.items[this.mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems
        },
        shoppingCart(){
            return this.mutualVar.cookiesInfo.shoppingCart
        },
   		locale(){
				return getLocaleCode()
		},
        subTotal(){
            var subTotal = 0
            for (var i = 0 ; this.shortenName.length >i ; i++) {
                subTotal += parseInt(this.shortenName[i].unit_price)
                if (this.maxDeliveryDate < this.shortenName[i].delivery) {
                    this.maxDeliveryDate = this.shortenName[i].delivery
                }
            }
            return subTotal
        }

	},
	methods:{
        fetchCookies(){
            if (localStorage.getItem('shoppingCart')) {
                this.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')))
            }

        },
        sendCookies(){
            var cookies = this.shoppingCart
            localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), this.mutualVar.cookiesInfo.cookieLast)

        },
        getEngagementRing(){
            var engagementRingId = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.filter((data)=>{return data.type == 'engagementRings'})[0].id
            get(`/api/engagementRings/${engagementRingId}`)
            .then((res)=>{
                this.carouselItem.upperitems = res.data.model
                this.filterNotPostable(res.data.posts.invoicePosts, engagementRingId)
            })
        },
        cleanLastEmptyItemAndMaxItemIndex(){
             if (this.shoppingCart.items[this.shoppingCart.items.length -1].pairItems.length == 0){
                this.shoppingCart.items.pop()      
             }
            if (this.shoppingCart.selectingIndex > this.shoppingCart.items.length-1) {
                this.shoppingCart.selectingIndex = this.shoppingCart.items.length-1

            }
            this.sendCookies()
            
        },
        setCarouselType(){
            if (!this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.filter((data)=>{
                return data.type == 'engagementRings'
            }).length >0 ) {
                    this.selectingCarousel = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems[0].type

            }
        },
        directTo(item){
        	var urlId =0

        	if (Number.isInteger(item)) {
        		urlId = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems[item].url + this.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].id 

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
        removeItem(item){
        	var url = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems[item].url
        	this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.splice(item,1)
        	this.sendCookies()
        	window.open( url,'_self')
        },
        addItemToCart(){
            var itemsSample = {addedCart:0, 
                            pairItems:[]
                            }
            this.shoppingCart.items[this.shoppingCart.selectingIndex].addedCart = 1
            this.shoppingCart.mode = 'create'
            this.shoppingCart.selectingIndex += 1
            this.shoppingCart.items.push(itemsSample)
            this.sendCookies()
            this.directTo('/shopping-cart/')
        },
        filterNotPostable(data, id){
                var type = 'App/EngagementRing'
                var filteredData = []

                for (var i = 0 ; data.length > i ; i++) {
                    if (data[i].postable_type == type && data[i].postable_id == id) {
                        filteredData.push(data[i])
                    }
                }
                this.carouselItem.items = filteredData
        },

    }
}
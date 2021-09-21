
import Carousel from '../../../components/carousel.vue'

import { extraWorkingDates } from '../../../helpers/extraWorkingDates'

	
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
            carouselSource:'',
            extraWorkingDates,
            shoppingCart:window.mutualVar.cookiesInfo.shoppingCart,

		}
	},
	watch:{
	},
	created(){
		this.fetchCookies()
        this.cleanLastEmptyItemAndMaxItemIndex()    
        // this.getEngagementRing()
        // this.setCarouselType()
	},
	computed:{
        shortenName(){
        	return this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems
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
        },
        pairItemEngagementRing(){
            return this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.find((data)=>{return data.type =='engagementRings'}) 
        },
        pairItemDiamond(){
            return this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.find((data)=>{return data.type =='diamonds'})             
        },
        pairItemMounting(){
            return this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.find((data)=>{return data.type =='mountingFee'})             
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
            localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), mutualVar.cookiesInfo.cookieLast)

        },
        getEngagementRing(){
            var engagementRingId = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.filter((data)=>{return data.type == 'engagementRings'})[0].id
            get(`/api/engagementRings/${engagementRingId}`)
            .then((res)=>{
                this.carouselItem.upperitems = res.data.model
                // this.filterNotPostable(res.data.posts.invoicePosts, engagementRingId)
                this.carouselItem.items = res.data.posts.invoicePosts?res.data.posts.invoicePosts:[]
            })
        },
        setCarouselSource(type){
            if (type == 'diamonds') {
                this.selectingCarousel = type
                this.carouselSource = {src:'',thumb:'',type:'',video360:''}
                this.carouselSource.src = mutualVar.lw.carousel.src
                this.carouselSource.thumb = mutualVar.lw.carousel.thumb
                this.carouselSource.type = mutualVar.lw.carousel.type
                this.carouselSource.video360 = mutualVar.lw.carousel.video360

                mutualVar.lw.carousel.src = this.pairItemDiamond.image
                mutualVar.lw.carousel.type = 'diamondImage'
                mutualVar.lw.carousel.video360 = false

                console.log(mutualVar.lw.carousel)
                console.log(this.carouselSource)

            }

            if (type == 'engagementRings') {
                this.selectingCarousel = type
                if(this.carouselSource.type == 'video360'){
                    return mutualVar.lw.carousel = this.carouselSource
                }

                if (this.carouselSource.type == 'video') {
                    mutualVar.lw.carousel.src = this.carouselSource.src.replace('https://image.tingdiamond.com/public/videos/','')
                    mutualVar.lw.carousel.thumb = this.carouselSource.thumb.replace('https://image.tingdiamond.com/public/images/','')
                    mutualVar.lw.carousel.type = 'video'
                    mutualVar.lw.carousel.video360 = false
                }

                console.log(mutualVar.lw.carousel)
            }

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

        		urlId = '/' + mutualVar.langs.locale + urlId
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
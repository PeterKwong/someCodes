import { get } from '../../../helpers/api'

import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/customerJewellry'
import ImageCarousel from '../../../components/imageCarousel.vue'
import mutualVar from '../../../helpers/mutualVar'

export default {
		el: '#customerJewelleryIndex',
		components: {ImageCarousel},
	data(){
		return {
			mutualVar,
			query:{
				per_page: 10,
			},
			langs,
			customers: [],
			chunkedItemsDesktop:{},
			chunkedItemsMobile:{},	
			carouselActive:false,
			carouselItems:'',
			scrolled: false,
			originY: 900,	
		}
	},
	watch:{
		'$route': 'fetchData'
	},
	beforeMount(){
		this.fetchData()
	},
	created () {
	  window.addEventListener('scroll', this.handleScroll);
	},
	destroyed () {
	  window.removeEventListener('scroll', this.handleScroll);
	},
	computed:{
			locale(){
				
				if (window.location.pathname.slice(1,3) == 'en') {
					return 0
				}
				if (window.location.pathname.slice(1,3) == 'hk') {
					return 1
				}
				if (window.location.pathname.slice(1,3) == 'cn') {
					return 2
				}
			},

		},
	filters:{
			transJs,
	},
	methods:{
		selectedCarouselItems(images){
			this.carouselItems = images
			this.carouselActive=!this.carouselActive
		},
		more(){
				
			this.query.per_page  +=10
			this.fetchData()
				
			},
		handleScroll () {
		    if (window.pageYOffset > this.originY) {
		    	this.originY += 900
		    	this.more()
		    }
		  },
		chunkItems(){
				var chunk1 = []
				var chunk2 = []
				
				for (var i = 0; this.customers.data.length - 1 >= i ; ) {
					chunk1.push(this.customers.data.slice(i,i+4))
					i += 4
				}
				this.chunkedItemsDesktop = chunk1

				for (var i = 0; this.customers.data.length - 1 >= i ; ) {
					chunk2.push(this.customers.data.slice(i,i+2))
					i += 2
				}
				this.chunkedItemsMobile = chunk2

				return 
			},
		clickRow(row,index){
				this.onClickedRow = row.id
				window.open('customer-jewellries/'+row.id)
			},
		fetchData(){
			get(`/api/customerMoments?per_page=${this.query.per_page}`, window.location.pathname.slice(1,3),)
			.then((res)=>{
				this.customers = res.data.customers
				this.chunkItems()
			})
		}
	}
}
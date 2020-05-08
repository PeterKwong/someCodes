import { get } from '../../../helpers/api'

import langs from '../../../langs/customerJewellry'

export default {
		el: '#customerJewelleryIndex',
	data(){
		return {
			query:{
				per_page: 10,
			},
			langs,
			posts: [],
			chunkedItemsDesktop:{},
			chunkedItemsMobile:{},
			scrolled: false,
			originY: 900,	
			mutualVar,

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
			}
		},
	filters:{
			toHumanDate(time){
				var t = Date.parse(time)
				var d = new Date()
				d.setTime(t)
				var n = d.toDateString()
				return n
			},
	},
	methods:{
		loopDesktopImage(arr1, arr2){
			for (var i = 0; i < this.chunkedItemsDesktop[arr1][arr2].images.length ; i++) {
				this.loopAllImage(this.chunkedItemsDesktop[arr1][arr2].images,i)
			}
			
		},	
		loopMobileImage(arr1, arr2){
			for (var i = 0; i < this.chunkedItemsMobile[arr1][arr2].images.length ; i++) {
				this.loopAllImage(this.chunkedItemsMobile[arr1][arr2].images,i)
			}
		},	
		loopImages(arr1,j=1){
			for (var i = 0; i < this.model.data[arr1].images.length ; i++) {
				this.loopAllImage(this.model.data[arr1].images,i,j)
			}
		},
		loopAllImage(images,i){
			setTimeout(function() {
					images.push(images[0])
					images.shift()
				}, i * 1000);
		},	
		handleScroll () {
		    if (window.pageYOffset > this.originY) {
		    	this.originY += 900
		    	this.more()
		    }
		  },
		MetToHumanDate(time){
				var t = Date.parse(time)
				var d = new Date()
				d.setTime(t)
				var n = d.toDateString()
				return n
			},
		more(){
				
			this.query.per_page  +=10
			this.fetchData()
				
			},
		chunkItems(){
				var chunk1 = []
				var chunk2 = []
				
				for (var i = 0; this.posts.data.length - 1 >= i ; ) {
					chunk1.push(this.posts.data.slice(i,i+3))
					i += 3
				}
				this.chunkedItemsDesktop = chunk1

				for (var i = 0; this.posts.data.length - 1 >= i ; ) {
					chunk2.push(this.posts.data.slice(i,i+2))
					i += 2
				}
				this.chunkedItemsMobile = chunk2

				return 
			},
		clickRow(row,index){
				this.onClickedRow = row.id
				window.open('customer-jewellery/'+row.id)
			},
		fetchData(){
			get(`/api/invoicePosts?per_page=${this.query.per_page}`)
			.then((res)=>{
				this.posts = res.data.model
				this.chunkItems()
			})
		}
	}
}
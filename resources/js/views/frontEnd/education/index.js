import { get } from '../../../helpers/api'

import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/customerJewellry'

export default {
		el: '#education',
	data(){
		return {
			query:{
				per_page: 10,
			},
			mutualVar,
			langs,
			posts: [],
			chunkedItemsDesktop:{},
			chunkedItemsMobile:{},
			activedSubTab: 'carat',	
		}
	},
	watch:{
		'$route': 'fetchData'
	},
	beforeMount(){
		this.fetchData()

		if (window.location.pathname.includes('education-diamond-grading/gia-report/4cs')) {
			return this.activedSubTab = window.location.pathname.slice(45)?window.location.pathname.slice(45):'carat'
		}
		
		if (window.location.pathname.includes('education-diamond-grading/gia-report/')) {
			return this.activedSubTab = window.location.pathname.slice(41)?window.location.pathname.slice(41):'carat'
		}

	
		this.activedSubTab = window.location.pathname.slice(30)?window.location.pathname.slice(30):'carat'
	},
	computed:{
			locale(){
				var location = {
								'en':0,
								'hk':1,
								'cn':2
						}

				return location[window.location.pathname.slice(1,3)]
			},

		},
	filters:{
			transJs,
	},
	methods:{
		activeSubTab(tab){
			this.activedSubTab = tab
		},
		more(){
				
					this.query.per_page  +=10
					this.fetchData()
				
			},
		chunkItems(){
				var chunk1 = []
				var chunk2 = []
				
				for (var i = 0; this.posts.data.length - 1 >= i ; ) {
					chunk1.push(this.posts.data.slice(i,i+4))
					i += 4
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
				window.open('customer-jewellries/'+row.id, '_self')
			},
		fetchData(){
			get(`/api/invPosts?per_page=${this.query.per_page}`, window.location.pathname.slice(1,3),)
			.then((res)=>{
				this.posts = res.data.posts
				// this.chunkItems()
			})
		}
	}
}
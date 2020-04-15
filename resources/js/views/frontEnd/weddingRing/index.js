import { get } from '../../../helpers/api'

import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/weddingRings'

import { setCookie, getCookie, } from '../../../helpers/cookie'

	export default {
		el:'#weddingRings',
		props:[
		'title'
		],
		data(){
			return {
				mutualVar,
				source:'/api/weddingRings',
				fetchData: {
					 style: ['Japanese','Vintage','Classic'],
					 metal: ['18KW','18KR','PT','Mixed'],
					 customized: [1,0], 
					 sideStone: [1,0], 
					 gender: ['f','m',1], 
				},
				preset: {
					 style: ['Japanese','Vintage','Classic'],
					 metal: ['18KW','18KR','PT','Mixed'],
					 customized: [1,0], 
					 sideStone: [1,0],
					 gender: ['f','m',1], 					 
				},
				showModal:false,
				showAdvance:false,
				scrolled: false,
				originY: 500,	
				opened: [],
				model: {},
				langs,
				chunkedItemsDesktop: [],
				chunkedItemsMobile: [],
				sameStock: [],
				clickedRows:[],
				displayColumn:'',
				columns:['style','metal','sideStone'],
				query:{
					page:1,
					column: 'style',
					direction: 'asc',
					per_page: 10,
					search_column: 'id',
					search_operator: 'like',
					search_input: '',
					search_conditions:{
						style: [
						{ description: 'Classic', clicked: false , display: 'Classic'},
						{ description: 'Japanese', clicked: false , display: 'Japanese'},
						{ description: 'Vintage', clicked: false , display: 'Vintage'},
						],
						metal: [
						{ description: '18KW', clicked: false , display: '18K White'},
						{ description: '18KR', clicked: false , display: '18K Rose Gold'},
						{ description: 'PT', clicked: false , display: 'PT950/900'},
						{ description: 'Mixed', clicked: false , display: 'Mixed'},
						],
						sideStone: [
						{ description: 1, clicked: false , display: 'True'},
						{ description: 0, clicked: false , display: 'False'},
						],
						customized: [
						{ description: 1, clicked: false , display: 'True'},
						{ description: 0, clicked: false , display: 'False'},
						],
						gender: [
						{ description: 1, clicked: false , display: 'Men'},
						{ description: 0, clicked: false , display: 'Female'},
						],
					}
				},
				operators: {
					equal : '=',
					not_equal :  '<>',
					less_than :  '<',
					greater_than :  '>',
					less_than_or_equal_to :  '<=',
					greater_than_or_equal_to : '>=',
					in : 'IN',
					like: 'LIKE'
					},
			};
		},
		created(){
			this.fetchCookies()
			this.setQuerySearchConditions()
			this.setUrlData()
			this.fetchIndexData();
			window.addEventListener('scroll', this.handleScroll);

		},
		destroyed () {
		  window.removeEventListener('scroll', this.handleScroll);
		},
		computed:{
			styleClicked(){
				return this.query.search_conditions.style.filter( style => style.clicked)
			},
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
		methods:{
			fetchCookies(){
				var cookies = ''
	            if (getCookie('weddingRingSearch')) {
	                cookies = JSON.parse(getCookie('weddingRingSearch'))
	                this.mutualVar.cookiesInfo.weddingRingSearch = cookies
	                this.fetchData = cookies.fetchData

	                this.query.per_page = 10
	            }
	        },
	        sendCookies(){
	        	var weddingRingSearch = {fetchData: this.fetchData}
	            setCookie('weddingRingSearch', JSON.stringify(weddingRingSearch), this.mutualVar.cookiesInfo.cookieLast)
	        },
	        setQuerySearchConditions(){
	        	var item = ['style', 'metal','sideStone','customized','gender']
				for (var i = 0 ; item.length > i ; i++) {
					if (this.preset[item[i]].length != this.fetchData[item[i]].length) {
						for (var j = 0 ; this.query.search_conditions[item[i]].length > j; j++) {
							if ( this.fetchData[item[i]].includes(this.query.search_conditions[item[i]][j].description) ) {
								this.query.search_conditions[item[i]][j].clicked = true
							}
						}
					}
					
				}
	        },
	        setUrlData(){
		        if (window.location.pathname.slice(3).includes('wedding-rings/')) {
		        	for (var i = 0; this.query.search_conditions.style.length > i ; i++) {
		        		this.query.search_conditions.style[i].clicked = false
		        	}

		        	if (window.location.pathname.slice(3).includes('/classic')) {
						this.fetchData.style = ['Classic']
						this.query.search_conditions.style[0].clicked = true
					}
					if (window.location.pathname.slice(3).includes('/japanese')) {
						this.fetchData.style = ['Japanese']
						this.query.search_conditions.style[1].clicked = true
					}
					if (window.location.pathname.slice(3).includes('/vintage')) {
						this.fetchData.style = ['vintage']
						this.query.search_conditions.style[2].clicked = true
					}

		        }
		        	

	        },
			selectDisplayColumn(column){

				if (this.displayColumn == column) {
					return this.displayColumn = ''
				}

				this.displayColumn = column
			},
			loopImages(arr1,j=1){
				for (var i = 0; i < this.model.data[arr1].wedding_rings[0].images.length ; i++) {
					this.loopAllImage(this.model.data[arr1].wedding_rings[0].images,i,j)
					console.log('hi')
				}
			},
			loopDesktopImage(arr1, arr2, j=1){
				this.chunkedItemsDesktop[arr1][arr2].wedding_rings[0].images = this.chunkedItemsDesktop[arr1][arr2].wedding_rings[0].images.concat(this.chunkedItemsDesktop[arr1][arr2].wedding_rings[1].images)
				for (var i = 0; i < this.chunkedItemsDesktop[arr1][arr2].wedding_rings[0].images.length ; i++) {
					this.loopAllImage(this.chunkedItemsDesktop[arr1][arr2].wedding_rings[0].images,i,j)
				}				
			},
			loopMobileImage(arr1, arr2, j=1){
				for (var i = 0; i < this.chunkedItemsMobile[arr1][arr2].wedding_rings[0].images.length ; i++) {
					this.loopAllImage(this.chunkedItemsMobile[arr1][arr2].wedding_rings[0].images,i,j)
				}
			},
			loopAllImage(images,i,j){
				setTimeout(function() {
						images.push(images[0])
						images.shift()
					}, i * j * 500);
			},
			handleScroll () {
			    if (window.pageYOffset > this.originY) {
			    	this.originY += 500
			    	this.more()
			    }
			  },
			transJsMet(data,ori,langs){
				return transJs(data,ori,langs)
			},
			toggleCustomized(){
				this.fetchData.customized = !this.fetchData.customized
				this.fetchIndexData()
			},
			toggleSideStone(){
				this.fetchData.sideStone = !this.fetchData.sideStone
				this.fetchIndexData()
			},
			clickRow(row,index){
				this.clickedRows.push(index)
				window.open(window.location.pathname.slice(0,3) + '/wedding-rings/'+row.id, '_self')
			},
			toggle(id) {
		    	const index = this.model.data.indexOf(id);
		      if (index > -1) {
		      	this.model.data.splice(index, 1)
		      } else {
		      	this.model.data.push(id)
		      }
		    },
			moveTo(page){
					if (this.query.page + page >0 ) {
					this.query.page = this.query.page + page
					this.fetchIndexData()
				}				
			},
			filterFalse(condition){
				var checked = this.query.search_conditions[condition].filter( condition => condition.clicked)
				this.filterDescriptions(checked)
    				this.fetchData[condition] = checked;

   				this.fetchIndexData(); 			
			},
			filterDescriptions(checked){
				for (var i = checked.length - 1; i >= 0; i--) {
					checked[i]=  checked[i].description		
				}
			},
			toggleValue(query, condition, number){
				var search_conditions = this.query.search_conditions[condition]
					
					if (query === false) {
						search_conditions[number].clicked = true
					}else{
						search_conditions[number].clicked = false
					}

				this.filterFalse(condition); 
			},
			// toggleValueToFalseOnce(condition){
			// 	var search_conditions = this.query.search_conditions[condition]
			// 	for (var i = search_conditions.length - 1; i >= 0; i--) {
			// 			search_conditions[i].clicked = false;
			// 		}
			// },
			more(){
				
					this.query.per_page  +=10
					this.fetchIndexData()
				
			},
			toggleOrder(column){
				if (column === this.query.column) {
					if (this.query.direction === 'desc') {
						this.query.direction = 'asc'
					}else{
						this.query.direction = 'desc'
					}
				}else{
					this.query.column = column
					this.direction = 'asc'

				}
				this.fetchIndexData()
			},
			chunkItems(){
				var filtered= []
				var chunk1 = []
				var chunk2 = []
				
				filtered = this.model.data.filter(data=>data.wedding_rings.length>0)
				for (var i = 0; filtered.length - 1 >= i ; ) {
					chunk1.push(filtered.slice(i,i+4))
					i += 4
				}
				this.chunkedItemsDesktop = chunk1

				for (var i = 0; filtered.length - 1 >= i ; ) {
					chunk2.push(filtered.slice(i,i+2))
					i += 2
				}
				this.chunkedItemsMobile = chunk2

				return 
			},
			fetchIndexData(){
				get(`${this.source}
					?column=${this.query.column}
					&direction=${this.query.direction}
					&page=${this.query.page}
					&per_page=${this.query.per_page}
					&search_column=${this.query.search_column}
					&search_operator=${this.query.search_operator}
					&search_input=${this.query.search_input}
					&customized=${this.fetchData.customized.toString()?this.fetchData.customized:this.preset.customized.toString()}
					&sideStone=${this.fetchData.sideStone.toString()?this.fetchData.sideStone:this.preset.sideStone.toString()}
					&gender=${this.fetchData.gender.toString()?this.fetchData.gender:this.preset.gender.toString()}
					&style=${
						this.fetchData.style.toString()?this.fetchData.style.toString():this.preset.style.toString()
					}
					&metal=${
						this.fetchData.metal.toString()?this.fetchData.metal.toString():this.preset.metal.toString()
					}
					`)
				.then((response)=>{
					this.model= response.data.model
					// Vue.set(vm.$data, 'columns', response.data.columns)
					this.chunkItems()
					this.pairUp()

				}).catch((response)=>{
					console.log(response)
				})
				this.sendCookies()
				
			}

		}
	}
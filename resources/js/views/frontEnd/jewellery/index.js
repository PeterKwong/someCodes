

import langsJew from '../../../langs/jewelleries'
import langsDia from '../../../langs/diamondViewer'
import langsEnga from '../../../langs/engagementRings'
import langsWedd from '../../../langs/weddingRings'

import { setCookie, getCookie, } from '../../../helpers/cookie'

	export default {
		el:'#jewellery',
		props:[
		'title'
		],
		data(){
			return {
				mutualVar,
				source:'/api/jewellery',
				fetchData: {
					 type: ['Ring','Necklace','Earring','Pendant','Bracelet',],
					 metal: ['18KW','18KR','18KY', 'PT','Mixed'],
					 gemstone: ['0','diamond','pearl','fancy diamond'],
					 setting: [1,0], 
					 sideStone: [1,0], 
					 customized: [1,0], 
					 
				},
				preset: {
					 type: ['Ring','Necklace','Earring','Pendant','Bracelet',],
					 metal: ['18KW','18KR','18KY', 'PT','Mixed'],
					 gemstone: ['0','diamond','pearl','fancy diamond'],
					 setting: [1,0], 
					 sideStone: [1,0], 
					 customized: [1,0], 
					 
				},
				scrolled: false,
				originY: 500,	
				langs: langsDia.concat(langsEnga,langsWedd, langsJew),
				showModal:false,
				showAdvance:false,
				opened: [],
				model: {},
				chunkedItemsDesktop: [],
				chunkedItemsMobile: [],
				clickedRows:[],
				displayColumn:'',
				columns:['type','metal','gemstone','setting','sideStone','sideStone'],
				query:{
					page:1,
					column: 'type',
					direction: 'asc',
					per_page: 10,
					search_column: 'id',
					search_operator: 'like',
					search_input: '',
					search_conditions:{
						type: [
						{ description: 'Ring', clicked: false , display: 'Ring'},
						{ description: 'Necklace', clicked: false , display: 'Necklace'},
						{ description: 'Bracelet', clicked: false , display: 'Bracelet'},
						{ description: 'Earring', clicked: false , display: 'Earring'},
						{ description: 'Pendant', clicked: false , display: 'Pendant'},
						],
						gemstone: [
						{ description: '0', clicked: false , display: 'doesntHave'},
						{ description: 'Diamond', clicked: false , display: 'Diamond'},
						{ description: 'Fancy Diamond', clicked: false , display: 'Fancy Diamond'},
						{ description: 'Pearl', clicked: false , display: 'Pearl'},
						],
						metal: [
						{ description: '18KW', clicked: false , display: '18KW'},
						{ description: '18KY', clicked: false , display: '18KY'},
						{ description: '18KR', clicked: false , display: '18KRG'},
						{ description: 'PT', clicked: false , display: 'PT950/900'},
						{ description: 'Mixed', clicked: false , display: 'Mixed'},
						],
						setting: [
						{ description: 1, clicked: false , display: 'True'},
						{ description: 0, clicked: false , display: 'False'},
						],
						sideStone: [
						{ description: 1, clicked: false , display: 'True'},
						{ description: 0, clicked: false , display: 'False'},
						],
						customized: [
						{ description: 1, clicked: false , display: 'True'},
						{ description: 0, clicked: false , display: 'False'},
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
				onLoopingImage:0,
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
			typeClicked(){
				return this.query.search_conditions.type.filter( type => type.clicked)
			},
			locale(){
				return getLocaleCode()
			},

		},
		methods:{
			fetchCookies(){
				var cookies = ''
	            if (getCookie('jewellery')) {
	                cookies = JSON.parse(getCookie('jewellery'))
	                this.mutualVar.cookiesInfo.jewellery = cookies
	                this.fetchData = cookies.fetchData

	                this.query.per_page = 10
	            }
	        },
	        sendCookies(){
	        	var jewellery = {fetchData: this.fetchData}
	            setCookie('jewellery', JSON.stringify(jewellery), this.mutualVar.cookiesInfo.cookieLast)
	        },
	        setQuerySearchConditions(){
	        	var item = ['type', 'gemstone','metal','setting','sideStone','customized']
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
				var url = mutualVar.namepath
				if (url.includes('jewellery/')) {
					for (var i = 0 ; this.query.search_conditions.type.length > i ; i++) {
						this.query.search_conditions.type[i].clicked = false
					}

					for (var i = 0 ; this.query.search_conditions.gemstone.length > i ; i++) {
						this.query.search_conditions.gemstone[i].clicked = false
					}

					if (url.includes('/rings')) {
						this.fetchData.type = ['Ring']
						this.query.search_conditions.type[0].clicked = true
					}
					if (url.includes('/diamond-rings')) {
						this.fetchData.type = ['Ring']
						this.fetchData.gemstone = ['diamond']
						this.query.search_conditions.type[0].clicked = true
						this.query.search_conditions.gemstone[1].clicked = true
					}
					if (url.includes('/fancy-diamond-rings')) {
						this.fetchData.type = ['Ring']
						this.fetchData.gemstone = ['fancy diamond']
						this.query.search_conditions.type[0].clicked = true
						this.query.search_conditions.gemstone[2].clicked = true
					}
					if (url.includes('/necklaces')) {
						this.fetchData.type = ['Necklace']
						this.query.search_conditions.type[1].clicked = true
					}
					if (url.includes('/bracelets')) {
						this.fetchData.type = ['Bracelet']
						this.query.search_conditions.type[2].clicked = true
					}
					if (url.includes('/earrings')) {
						this.fetchData.type = ['Earring']
						this.query.search_conditions.type[3].clicked = true
					}	
					if (url.includes('/pendants')) {
						this.fetchData.type = ['Pendant']
						this.query.search_conditions.type[4].clicked = true
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
				for (var i = 0; i < this.model.data[arr1].images.length ; i++) {
					this.loopAllImage(this.model.data[arr1].images,i,j)
				}
			},
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
			loopAllImage(images,i){
				setTimeout(function() {
						images.push(images[0])
						images.shift()
					console.log(i)}, i * 500);
			},
			handleScroll () {
			    if (window.pageYOffset > this.originY) {
			    	this.originY += 500
			    	this.more()
			    }
			  },
			toggleCustomized(){
				this.fetchData.customized = !this.fetchData.customized
				this.fetchIndexData()
			},
			clickRow(row,index){
				this.clickedRows.push(index)
				window.open(window.location.pathname.slice(0,3) + '/jewellery/' +row.id, '_self')
			},
			toggle(id) {
		    	const index = this.model.data.indexOf(id);
		      if (index > -1) {
		      	this.model.data.splice(index, 1)
		      } else {
		      	this.model.data.push(id)
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
			more(){
				
					this.query.per_page  +=10
					this.fetchIndexData()
				
			},
			chunkItems(){
				var chunk1 = []
				var chunk2 = []
				
				for (var i = 0; this.model.data.length - 1 >= i ; ) {
					chunk1.push(this.model.data.slice(i,i+4))
					i += 4
				}
				this.chunkedItemsDesktop = chunk1

				for (var i = 0; this.model.data.length - 1 >= i ; ) {
					chunk2.push(this.model.data.slice(i,i+2))
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
					&setting=${this.fetchData.setting.toString()?this.fetchData.setting:this.preset.setting.toString()}
					&sideStone=${this.fetchData.sideStone.toString()?this.fetchData.sideStone:this.preset.sideStone.toString()}
					&type=${
						this.fetchData.type.toString()?this.fetchData.type.toString():this.preset.type.toString()
					}
					&metal=${
						this.fetchData.metal.toString()?this.fetchData.metal.toString():this.preset.metal.toString()
					}
					&gemstone=${
						this.fetchData.gemstone.toString()?this.fetchData.gemstone.toString():this.preset.gemstone.toString()
					}`)
				.then((response)=>{
					this.model= response.data.model
					// Vue.set(vm.$data, 'columns', response.data.columns)
					this.chunkItems()

				}).catch(function(){
					console.log(response)
				})
				this.sendCookies()
				
			}

		}
	}
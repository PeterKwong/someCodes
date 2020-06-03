
import Flash from '../../../helpers/flash'
import { get,post, rapPost } from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/form'
import ImageUpload from '../../../components/ImageUpload.vue'

export default {
	el:'#diamondForm',
	components: {
		ImageUpload
	},
	data(){
		return{
			form:{
				csv:'',
				supplier:'',
			},
			select:[
			{title:''}
			],
			suppliers:[],
			jsonData:{diamonds:[]},
			fetchDataSet:[],
			login:{},
			jsonUrl: '',
			urlSingle: '',
			body:'',
			onPage: '',
			totalPageNum:'',
			error: {},
			isProcessing: false,
			initializeURL: `/api/diamonds/create`,
			// initializeURL: `/api/diamondsCreate`,
			resetAllDiamonds: `/api/diamonds/resetDiamonds`,
			importFromRap: `/api/diamonds/fromRap`,
			importVideoURL: '/api/diamonds/fromAPI',

			storeURL: `/api/diamonds`,				
			action: 'Create',
			onPage:0,
			CalTotalPage: '',
			singleD:'',
			lot: 0,
			onLot: 0,
			availableDiamonds:[],

		}
	},
	created(){
		if ( window.location.pathname.includes('edit') ) {
			this.initializeURL = `/api/diamonds/${window.location.pathname.slice(14)}/edit`
			this.storeURL = `/api/diamonds/${window.location.pathname.slice(14)}?_method=PUT`
			this.action = 'Update'
		}
		this.fetchData()

	},
	methods: {
		fetchData(){
            get(this.initializeURL)
                .then((response)=>{
                    Vue.set(this.$data, 'suppliers', response.data.suppliers)
                    Vue.set(this.$data, 'body', response.data.body)
                    Vue.set(this.$data, 'jsonUrl', response.data.url)
                    Vue.set(this.$data, 'urlSingle', response.data.urlSingle)
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        resetAll(){
            
        },
		saveFromAPI(){
			// this.isProcessing = true
			this.CalTotalPage = 'connecting web'

			const form = toMulipartedForm(this.form)
			post(this.importVideoURL, form)
				.then((res)=>{
					if (res.data.saved) {
						Flash.setSuccess(res.data.message)
					}
				})
				.catch((err)=>{
					if (err.response.status === 422) {
						this.error = err.response.data
					}
				this.isProcessing = false
				})

			this.CalTotalPage = 'Updating...'
		},
		saveFromRap(){
			// this.resetAll()
			this.CalTotalPage = 'connecting web'

			var form = {
				  "request": {
				    "header": this.login,
				    "body": this.body
						  }
						}

			this.CalTotalPage = 'disabling old diamonds'

			post(this.importFromRap, {'diamonds': this.availableDiamonds})
                	.then((res)=>{
                		console.log('reset')

                		rapPost(this.jsonUrl, form)
						.then((response)=>{
							Vue.set(this.$data, 'data', response.data.response.body)
							// this.totalPage(response.data.response.body.search_results.total_diamonds_found)

						})
						.catch(function(error){
							Vue.set(this.$data, 'errors', error.response.data)
						})


                	})
       	 this.CalTotalPage = 'Updating...'

			
		},
		disableDiamonds(){
			// this.resetAll()

			this.CalTotalPage = 'disabling old diamonds'

			post(this.resetAllDiamonds, {'diamonds': this.availableDiamonds})
                	.then((res)=>{
                		console.log('reset')

                		rapPost(this.jsonUrl, form)
						.then((response)=>{
							Vue.set(this.$data, 'data', response.data.response.body)
							// this.totalPage(response.data.response.body.search_results.total_diamonds_found)

						})
						.catch(function(error){
							Vue.set(this.$data, 'errors', error.response.data)
						})


                	})
        	
          this.CalTotalPage = 'all have been reset'
			
		},
		test(){
			// this.resetAll()
			get('/api/test')
            	.then((res)=>{

				return res.data
				// this.totalPage(response.data.response.body.search_results.total_diamonds_found)

				})
				.catch(function(error){
					Vue.set(this.$data, 'errors', error.response.data)
				})


        	
			
		},
		pushData(form){
				rapPost(this.this.jsonUrl, form)
				.then((response)=>{
					Vue.set(this.$data, 'data', response.data.response.body)
				})
				.catch(function(error){
					Vue.set(this.$data, 'errors', error.response.data)
				})
		},
		saveDiamondJson(data){
			// this.isProcessing = true
			// const form = toMulipartedForm(data)
			var vm = this
			var resolvedProm = Promise.resolve(vm.onLot);
			var thenProm = resolvedProm.then(function(value){
			    console.log("我在 main stack 之後被呼叫。收到及將回傳的值為：" + value);
			    return value;
			});

			// 我們可以使用 setTimeout 以延遲（postpone）函式執行直到堆疊為空
			setTimeout(function(){
				// console.log(data);
				post('/api/diamondsCreate',data)
				.then((res)=>{
					console.log('to server ' + 2000 * vm.onLot  + '& on page' + 50* vm.onLot + '& on lot' + vm.onLot)
					vm.onPage +=50
					if (res.data.saved) {
						Flash.setSuccess(res.data.message)
					}

				})
				.catch((err)=>{
					if (err.response.status === 422) {
						console.log(err.response.data)
					}
				// this.isProcessing = false
				})
			    // console.log(thenProm);
			}, 2000 *  vm.onLot );


		},
		totalPage(totalPage){
			
			this.loopAllPage(Math.ceil(totalPage))

			
		},
		loopAllPage(totalPage,chunkNum){
			// console.log(totalPage)
			this.CalTotalPage = 'Total Page: ' + totalPage
			var fetchDataSet = []
			var jsonData = {diamonds:[]}
			var vm = this
			var j = 0 
			// 立即紀錄 thenProm
			
			for (var i = 1; i <= totalPage/50; i++) {

				 // console.log(i)
				fetchDataSet.push({ 
				  "request": {
				    "header": this.login,
				    "body": 
				    	{
				    	'search_type': this.body.search_type,
				    	'shape': this.body.shape,
				    	'labs': this.body.labs,
				    	'size_from': this.body.size_from ,   	
					    'size_to': this.body.size_to,
				    	'color_from': this.body.color_from,
				    	'color_to': this.body.color_to,
				    	'clarity_from': this.body.clarity_from,
				    	'clarity_to': this.body.clarity_to,
				    	'cut_from': this.body.cut_from,
				    	'cut_to': this.body.cut_to,
				    	'polish_from': this.body.polish_from,
				    	'polish_to': this.body.polish_to,
				    	'symmetry_from': this.body.symmetry_from,
				    	'symmetry_to': this.body.symmetry_to,
				    	'price_total_from': this.body.price_total_from,
				    	'price_total_to': this.body.price_total_to,
				    	'cut_from': this.body.cut_from,
				    	'page_number':i,
				    	'page_size': this.body.page_size,}
					  } 
					})

				// console.log(fetchDataSet)

			}


			// console.log(fetchDataSet)

			for (var i =0 ; fetchDataSet.length > i; i++ ) {
				var vm = this
				// 我們可以使用 setTimeout 以延遲（postpone）函式執行直到堆疊為空
					setTimeout((data)=>{
						// console.log(data);
						rapPost(vm.jsonUrl, fetchDataSet[j])
							.then((res)=>{
								vm.filterSingleD(res.data.response.body.diamonds)
								vm.onLot = j
					    		console.log( 'on lot' + j +', lot time ' + 4000 * j  )
							})
							.catch(function(error){
								Vue.set(vm.$data, 'errors', error.response.data)
							})
					    // console.log(thenProm);
						j++
					}, 4000 * vm.lot ++);
				
				}

			
			console.log('done')

		},
		filterSingleD(diamondArr){

			var diamonds = diamondArr.map((data)=>{
					return data.diamond_id
					})
			console.log(diamonds)
			var diamondsA = {diamonds:[]}
			this.availableDiamonds.push(diamonds)
			var vm = this
			for (var i = 0; this.availableDiamonds[this.onLot].length > i; i++) {
				var k = 0

				rapPost(this.urlSingle, { 
									  "request": {
									    "header": this.login,
									    "body": 
									    	{
									    	'diamond_id': this.availableDiamonds[this.onLot][i],}
										  } 
										})
							.then((res)=>{
		                        diamondsA.diamonds.push(
		                        	{'diamond':{
                        						'cert_num': res.data.response.body.diamond.cert_num,
                        						'clarity': res.data.response.body.diamond.clarity,
                        						'color': res.data.response.body.diamond.color,
                        						'cut': res.data.response.body.diamond.cut,
                        						'diamond_id': res.data.response.body.diamond.diamond_id,
                        						'fluor_intensity': res.data.response.body.diamond.fluor_intensity,
                        						'has_cert_file': res.data.response.body.diamond.has_cert_file,
                        						'has_image_file': diamondArr[k].has_image_file,
                        						'image_file_url': diamondArr[k].image_file_url,
                        						'lab': res.data.response.body.diamond.lab,
                        						'polish': res.data.response.body.diamond.polish,
                        						'shape': res.data.response.body.diamond.shape,
                        						'size': res.data.response.body.diamond.size,
                        						'stock_num': res.data.response.body.diamond.stock_num,
                        						'symmetry': res.data.response.body.diamond.symmetry,
                        						'country': res.data.response.body.diamond.country,
                        						'total_sales_price': res.data.response.body.diamond.total_purchase_price,
                        						'table_percent': res.data.response.body.diamond.table_percent,},
                        				'supplier': {
                        						'r_id':res.data.response.body.seller.account_id,
                        						'name': res.data.response.body.seller.company,
                        						'country': res.data.response.body.seller.country
                        							}
		                        				})
		                        // console.log(response.data.response.body.diamond)
		                    })
		                    
		        
			}

		this.saveDiamondJson(diamondsA)
		    
			// console.log(diamondsA)

		},

		upload(e){
			const file = e.target.files
			if (file && file.length > 0) {
				this.form.csv = file
			}
		}
		
		
	}
}

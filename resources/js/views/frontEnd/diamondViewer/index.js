import { get } from '../../../helpers/api'
import sliderBar from '../../../components/sliderBar'


import { setCookie, getCookie, } from '../../../helpers/cookie'
import { getLocale , getLocaleCode} from '../../../helpers/locale'


import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/diamondViewer'

	export default {
		el: '#diamondViewerIndex',
		components:{sliderBar},
		props:[
		'title'
		],
		data(){
			return {
				source:'/api/diamonds',
				fetchData: {
					shape: '',
					 color: '',
					 clarity: '',
					 cut: '',
					 polish: '',
					 symmetry: '',
					 fluorescence: '',
					 priceRange: [1000, 50000000],
					 weight: [0.30,20],
					 location: '',
				},
				preset: {
					shape: [],
					 color: [],
					 clarity: [],
					 cut: [],
					 polish: [],
					 symmetry: [],
					 fluorescence: [],
					 priceRange: [1000, 50000000],
					 weight: [0.30,20],
					 location: []
				},
				mutualVar,
				loggedValues:{},
				scrolled: false,
				originY: 600,
				showModal:false,
				showAdvance:false,
				showInGrid: true,
				opened: [],
				model: {},
				storageURL: mutualVar.storage[mutualVar.storage.live] + 'public/diamond/' ,
				displayColumn:'',
				columnsOrder:['color','clarity','cut','polish','symmetry','fluorescence' ],
				langs,
				clickedRows:[],
				columnsToggle:[
					{display:'imageLink',value: 'has_image' },
					{display:'shape',value: 'shape' },
					{display:'price',value: 'price' },
					{display:'weight',value: 'weight' },
					{display:'color',value: 'color' },
					{display:'clarity',value: 'clarity' },
					{display:'cut',value: 'cut' },
					{display:'polish',value: 'polish' },
					{display:'symmetry',value: 'symmetry' },
					{display:'fluorescence',value: 'fluorescence' },
					{display:'location',value: 'location' },
					{display:'certificate',value: 'certificate' },
					{display:'starred',value: 'starred' },
					{display:'lab',value: 'lab' },
				],
				columns:[],
				query:{
					page:1,
					column: 'price',
					direction: 'asc',
					per_page: 10,
					search_column: 'id',
					search_operator: 'like',
					search_input: '',
					search_conditions:{
						shape: [
						{ description: 'Round', clicked: false , value: 'Round'},
						{ description: 'Pear', clicked: false , value: 'Pear'},
						{ description: 'Emerald', clicked: false , value: 'Emerald'},
						{ description: 'Princess', clicked: false , value: 'Princess'},
						{ description: 'Marquise', clicked: false , value: 'Marquise'},
						{ description: 'Cushion', clicked: false , value: 'Cushion'},
						{ description: 'Asscher', clicked: false , value: 'Asscher'},
						{ description: 'Oval', clicked: false , value: 'Oval'},
						{ description: 'Heart', clicked: false , value: 'Heart'},
						{ description: 'Radiant', clicked: false , value: 'Radiant'},
						],
						color: [
						{ description: 'D', clicked: false , value: 'D'},
						{ description: 'E', clicked: false , value: 'E'},
						{ description: 'F', clicked: false , value: 'F'},
						{ description: 'G', clicked: false , value: 'G'},
						{ description: 'H', clicked: false , value: 'H'},
						{ description: 'I', clicked: false , value: 'I'},
						{ description: 'J', clicked: false , value: 'J'},
						{ description: 'K', clicked: false , value: 'K'},
						{ description: 'L', clicked: false , value: 'L'},
						{ description: 'M', clicked: false , value: 'M'},
						],
						cut: [
						{ description: 'Excellent', clicked: false , value: 'Excellent,EX'},
						{ description: 'Very Good', clicked: false , value: 'Very Good,VG'},
						{ description: 'Good', clicked: false , value: 'Good,GD'},
						],
						polish: [
						{ description: 'Excellent', clicked: false , value: 'Excellent,EX'},
						{ description: 'Very Good', clicked: false , value: 'Very Good,VG'},
						{ description: 'Good', clicked: false , value: 'Good,GD'},
						],
						symmetry: [
						{ description: 'Excellent', clicked: false , value: 'Excellent,EX'},
						{ description: 'Very Good', clicked: false , value: 'Very Good,VG'},
						{ description: 'Good', clicked: false , value: 'Good,GD'},
						],
						fluorescence: [
						{ description: 'None', clicked: false , value: 'None,NON'},
						{ description: 'Faint', clicked: false , value: 'Faint,FNT'},
						{ description: 'Medium', clicked: false , value: 'Medium,MED'},
						{ description: 'Strong', clicked: false , value: 'Strong,STG'},
						{ description: 'Very Strong', clicked: false , value: 'Very Strong,VST'},
						],
						clarity: [
						{ description: 'FL', clicked: false, value:'FL'},
						{ description: 'IF', clicked: false, value:'IF'},
						{ description: 'VVS1', clicked: false, value:'VVS1'},
						{ description: 'VVS2', clicked: false, value:'VVS2'},
						{ description: 'VS1', clicked: false, value:'VS1'},
						{ description: 'VS2', clicked: false, value:'VS2'},
						{ description: 'SI1', clicked: false, value:'SI1'},
						{ description: 'SI2', clicked: false, value:'SI2'},
						{ description: 'I1', clicked: false, value:'I1'},
						],
						location: [
						{ description: 'Only On Stock', clicked: false, value:'1Hong Kong'},
						],
						priceRange: [
						{ description: 'Price' },
						{ description: 'minPrice' },
						]
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
	        this.setUrlData()
			this.fetchIndexData()
			this.logValues()
			this.setQuerySearchConditions()
			window.addEventListener('scroll', this.handleScroll)
		},
		destroyed () {
		  window.removeEventListener('scroll', this.handleScroll);
		},
		computed:{
			colorClicked(){
				return this.query.search_conditions.color.filter( color => color.clicked)
			},
			locale(){
				return getLocaleCode()
			},
		},
		watch:{
			'query.column':function(){ this.fetchIndexData() },
			'query.direction':function(){ this.fetchIndexData() },
		},
		filters:{
			transJs,
			diamondSampleShapeUrl(shape){
				return '/images/front-end/diamond_show/sample' + mutualVar.langs.locale + '/'  + transJs(shape,langs,mutualVar.langs.localeCode) + '.png'
			},
			diamondShapeUrl(shape){
				return '/images/front-end/diamond_shapes/' + transJs(shape,langs,mutualVar.langs.localeCode) + '.png'
			},
		},
		methods:{
			fetchCookies(){
				var cookies = ''
	            if (getCookie('diamondSearch')) {
	                cookies = JSON.parse(getCookie('diamondSearch'))
	                mutualVar.cookiesInfo.diamondSearch = cookies
	                this.fetchData = cookies.fetchData
	                this.clickedRows = cookies.clickedRows
	                this.query.per_page = 10
	            }

	        },
	        resetCookies(){
	        	this.fetchData = {
								shape: '',
								 color: '',
								 clarity: '',
								 cut: '',
								 polish: '',
								 symmetry: '',
								 fluorescence: '',
								 priceRange: [1000, 50000000],
								 weight: [0.30,20],
								 location: '',
								}
	        	this.sendCookies()
	        	window.open( getLocale() + '/gia-loose-diamonds', '_self')
	        },
	        sendCookies(){
	        	var diamondSearch = {fetchData: this.fetchData, clickedRows: this.clickedRows}

	            setCookie('diamondSearch', JSON.stringify(diamondSearch), mutualVar.cookiesInfo.cookieLast)
	        },
	        setQuerySearchConditions(){
	        	var item = ['shape', 'color','clarity','cut','polish','symmetry','fluorescence','location']
				for (var i = 0 ; item.length > i ; i++) {
					for (var j = 0 ; this.query.search_conditions[item[i]].length > j; j++) {
						if ( this.fetchData[item[i]].includes(this.query.search_conditions[item[i]][j].value) ) {
							this.query.search_conditions[item[i]][j].clicked = true
						}
					}
					
				}
	        },
	        setUrlData(){
	        	//round
			var fetchData = [
						{url : '/pear-shaped',
						 data :['Pear']},
						{url : '/emerald-cut',
						 data :['Emerald']},
						{url : '/princess-cut',
						 data :['Princess']},
						{url : '/marquise-cut',
						 data :['Marquise']},
						{url : '/cushion-cut',
						 data :['Cushion']},
						{url : '/asscher-cut',
						 data :['Asscher']},
						{url : '/oval-cut',
						 data :['Oval']},
						{url : '/heart-shaped',
						 data :['Heart']},
						{url : '/radiant-cut',
						 data :['Radiant']},
						{url : '/0-30-0-49-carat-weight',
						 data :['0.30','0.49']},
						{url : '/0-50-0-79-carat-weight',
						 data :['0.50','0.79']},
						{url : '/0-80-0-99-carat-weight',
						 data :['0.80','0.99']},
						{url : '/1-00-1-19-carat-weight',
						 data :['1.00','1.19']},
						{url : '/1-20-1-49-carat-weight',
						 data :['1.20','1.49']},
						{url : '/1-50-1-99-carat-weight',
						 data :['1.50','1.99']},
						{url : '/2-00-2-99-carat-weight',
						 data :['2.00','2.99']},
						{url : '/3-00-up-carat-weight',
						 data :['3.00','20']},
						{url : '/3-00-up-carat-weight',
						 data :['3.00','20']},
						{url : '/3-00-up-carat-weight',
						 data :['3.00','20']},
						{url : '/3-00-up-carat-weight',
						 data :['3.00','20']},
						{url : '/3-00-up-carat-weight',
						 data :['3.00','20']},
						]

				if (window.location.pathname.slice(3).includes('gia-loose-diamonds/round-cut') && !window.location.pathname.slice(3).includes('gia-loose-diamonds/round-cut/')) {
					
					for (var i = 0 ; this.query.search_conditions.shape.length > i ; i++) {
						this.query.search_conditions.shape[i].clicked = false
					}
					this.fetchData.shape = ['Round']
					this.query.search_conditions.shape[0].clicked = true
				}

				//fancy cut
				if (window.location.pathname.slice(3).includes('gia-loose-diamonds/fancy-cut-diamond')) {
					this.fetchData.shape = ['Round','Pear','Emerald','Princess','Marquise','Cushion','Asscher','Oval','Heart','Radiant']
					
					for (var i =0 ; this.query.search_conditions.shape.length > i ; i++) {
						this.query.search_conditions.shape[i].clicked = true
						this.query.search_conditions.shape[0].clicked = false
					}
					
				}
				if (window.location.pathname.slice(3).includes('gia-loose-diamonds/fancy-cut-diamond/')) {
					
					for (var i = this.query.search_conditions.shape.length - 1; i >= 0; i--) {
						this.query.search_conditions.shape[i].clicked = false
					}
					
				}

				for (var i = 0 ; fetchData.length > i ; i++) {
					if (window.location.pathname.slice(3).includes(fetchData[i].url) && window.location.pathname.slice(3).includes('carat-weight') ) {
						this.fetchData.weight = fetchData[i].data
					}
					if (window.location.pathname.slice(3).includes(fetchData[i].url) && window.location.pathname.slice(3).includes('fancy-cut-diamond') ) {
						this.fetchData.shape = fetchData[i].data
						this.query.search_conditions.shape[i+1].clicked = true
					}
				}

	        },
			handleScroll() {
			    if (window.pageYOffset > this.originY) {
			    	this.originY += 480
			    	this.more()
			    }
			  },
			clickRow(row,index){
				if (!this.clickedRows.filter((data) => { return data == row.id}).length > 0) {
					this.clickedRows.push(row.id)
				}
				this.sendCookies()
				window.open(window.location.pathname.slice(0,3) + '/gia-loose-diamonds/'+row.id, '')
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
			selectDisplayColumn(column){

				if (this.displayColumn == column) {
					return this.displayColumn = ''
				}

				this.displayColumn = column
			},
			filterFalse(condition){
				var checked = this.query.search_conditions[condition].filter( condition => condition.clicked)
				this.filterDescriptions(checked)
    			this.fetchData[condition] = checked;

   				this.fetchIndexData();    				
			},
			filterDescriptions(checked){
				for (var i = checked.length - 1; i >= 0; i--) {
					checked[i]=  checked[i].value		
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
			receiveSliderValue(value){
				// alert(value)
				this.fetchData.priceRange[0] = Math.ceil(value[0]/100) + '00'
				this.fetchData.priceRange[1] = Math.ceil(value[1]/100) + '00'
				this.logValues();
				this.fetchIndexData();
			},
			logValues(){
				this.loggedValues.priceMin =  this.logValue(this.fetchData.priceRange[0])
				this.loggedValues.priceMax = this.logValue(this.fetchData.priceRange[1])
			},
			logValue(value){
				return Math.log(value)
			},
			// toggleValueToFalseOnce(condition){
			// 	var search_conditions = this.query.search_conditions[condition]
			// 	for (var i = search_conditions.length - 1; i >= 0; i--) {
			// 			search_conditions[i].clicked = false;
			// 		}
			// },
			more(){
				if (this.model.next_page_url) {
					this.query.per_page +=10
					this.fetchIndexData()
				}
			},
			next(){
				if (this.model.next_page_url) {
					this.query.page++
					this.fetchIndexData()
				}
			},
			prev(){
				if (this.model.prev_page_url) {
					this.query.page--
					this.fetchIndexData()
				}
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
			fetchIndexData(){
				this.logValues();
				// console.log(this.query)
				get(`${this.source}
					?column=${this.query.column}
					&direction=${this.query.direction}
					&page=${this.query.page}
					&per_page=${this.query.per_page}
					&search_column=${this.query.search_column}
					&search_operator=${this.query.search_operator}
					&search_input=${this.query.search_input}
					&color=${
						this.checkToString('color')
					}
					&clarity=${
						this.checkToString('clarity')
					}
					&cut=${
						this.checkToString('cut')
					}
					&polish=${
						this.checkToString('polish')
					}
					&symmetry=${
						this.checkToString('symmetry')
					}
					&fluorescence=${
						this.checkToString('fluorescence')
					}
					&shape=${
						this.checkToString('shape')
					}
					&location=${
						this.checkToString('location')
					}
					&price=${
						this.fetchData.priceRange
					}
					&weight=${this.fetchData.weight
					}`)
				.then((response)=>{
					this.model= response.data.model
					this.columns= response.data.columns
					// Vue.set(vm.$data, 'columns', response.data.columns)
				}).catch(function(){
					console.log(response)
				})
				this.sendCookies()

			},
			checkToString(column){
				return this.fetchData[column].toString()?this.fetchData[column].toString():this.preset[column].toString()
			},
		}
	}
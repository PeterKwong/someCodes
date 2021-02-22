
import { get, post } from '../../../helpers/api'

import vueChart from '../../../components/vueChart'

import DataViewer from '../../../components/DataViewer.vue'
import Auth from '../../../store/auth'

export default {

	el: '#onStockDiamond',
	components: { vueChart, DataViewer },

	data(){

		return {
				data:'',
				labels:'',
				url:'/adm/purchase/on-stock-diamonds',
				selectingData:'dueDiamonds',
				dueDiamonds:{
						amountKey: 'amount',
						totalAmount:0,
						data:'',	
					},
				invoiceDiamonds:{
						amountKey: 'balance',
						totalAmount:0,
						data:'',	
					},
				totalAmount:0,
				column: 'weight',
				dataViewer: {
					title: 'Stock Diamonds',
					per_page: 100,
					source: '/api/purchase/on-stock-diamonds-paginate',
					create:'/adm/invoices/create',
					userRole: Auth.state.user_role,
					thead: [
						{ title: 'ID', key: 'id', sort: true},
						{ title: 'Price', key: 'price', sort: true},
						{ title: 'Weight', key: 'weight', sort: true},
						{ title: 'Color', key: 'color', sort: true},
						{ title: 'Clarity', key: 'clarity', sort: true},
						{ title: 'Cut', key: 'cut', sort: true},
						{ title: 'Polish', key: 'polish', sort: true},
						{ title: 'Symmetry', key: 'symmetry', sort: true},
						{ title: 'Fluorescence', key: 'fluorescence', sort: true},
						{ title: 'Certificate', key: 'certificate', sort: true},
						{ title: 'Due Date', key: 'due_date', sort: true},
						{ title: 'Stock', key: 'stock', sort: true},
						{ title: 'Shape', key: 'shape', sort: true},
						{ title: 'Lab', key: 'lab', sort: true},
						{ title: 'Created At', key: 'created_at', sort: true},
						{ title: 'Due Status', key: 'due_date', sort: true},
					],
					filter: [
					      	'id', 'customer.phone','customer.name', 
	            			'customer_id', 'title', 'date', 'due_date', 'discount',
	        				'sub_total', 'deposit', 'balance','total',
	        				
					]
				}
				
		}
	},
	watch:{
		'$route': 'fetchData'
	},
	created(){
		this.fetchData()
	},
	computed:{
		computedData(){

			var dat = []

			this[this.selectingData].totalAmount = 0

			for( var i = 0; this[this.selectingData].data.length >i ; i++){
				for(var j =0; this[this.selectingData].data[i].length > j ; j++){
					if (dat.length <= j) {

						var dataset = {
					            label: '',
					            data: [],
					            backgroundColor: [
					            ],
					            borderColor: [
					            ],
					            borderWidth: 1
					        }

						dat.push(dataset)
					}

					for(var k = dat[j].data.length ; i >k ; k++){
							dat[j].data.push([])
							dat[j].backgroundColor.push([])
							dat[j].borderColor.push([])
						}

						if ( typeof this[this.selectingData].data[i][j].inv_diamonds == 'object') {
							if (this[this.selectingData].data[i][j].inv_diamonds.length > 0) {
								this[this.selectingData].totalAmount += this[this.selectingData].data[i][j][this[this.selectingData].amountKey]
								dat[j].data.push(this[this.selectingData].data[i][j][this[this.selectingData].amountKey])
								dat[j].backgroundColor.push( 'rgba(' + Math.floor( Math.random() * 250 + 1)   + ','  +  Math.floor( Math.random() * 250 + 1)   + ','  + Math.floor( Math.random() * 250 + 1)  +  ',' +  0.2 + ')' )
								dat[j].borderColor.push( 'rgba(' + Math.floor( Math.random() * 250 + 1)   + ','  +  Math.floor( Math.random() * 250 + 1)   + ','  + Math.floor( Math.random() * 250 + 1)  +  ',' +  0.7 + ')' )
							}

						}else{

							this[this.selectingData].totalAmount += this[this.selectingData].data[i][j][this[this.selectingData].amountKey]
							dat[j].data.push(this[this.selectingData].data[i][j][this[this.selectingData].amountKey])
							dat[j].backgroundColor.push( 'rgba(' + Math.floor( Math.random() * 250 + 1)   + ','  +  Math.floor( Math.random() * 250 + 1)   + ','  + Math.floor( Math.random() * 250 + 1)  +  ',' +  0.2 + ')' )
							dat[j].borderColor.push( 'rgba(' + Math.floor( Math.random() * 250 + 1)   + ','  +  Math.floor( Math.random() * 250 + 1)   + ','  + Math.floor( Math.random() * 250 + 1)  +  ',' +  0.7 + ')' )								

						}
					                
					}
			}

			return dat
		},

	},
	methods:{
		fetchData(){
			this.loadDueDiamonds()
		},
		loadDueDiamonds(){
			get(`/api/purchase/on-stock-diamonds`,)
			.then((res)=>{
				this.labels = res.data.labels
				this.dueDiamonds.data = res.data.model
			})
		},
		loadInvoiceDiamonds(){
			get(`/api/purchase/progress-settled-diamond-invoices`,)
			.then((res)=>{
				this.invoiceDiamonds.data = res.data.model
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/invoices/' + id , '_self')
		},		

	}
}
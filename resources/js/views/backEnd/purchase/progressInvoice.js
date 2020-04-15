import { get, post } from '../../../helpers/api'
import router from '../../../router'

import vueChart from '../../../components/vueChart'

import DataViewer from '../../../components/DataViewer.vue'
import Auth from '../../../store/auth'

export default {

	el: '#progressInvoice',
	router,	
	components: { vueChart, DataViewer },

	data(){

		return {
				data:'',
				labels:'',
				totalAmount:0,

				dataViewer: {
					title: 'In-Progress Invoices',
					source: '/api/purchase/progress-invoices-paginate',
					create:'/adm/invoices/create',
					userRole: Auth.state.user_role,
					thead: [
					{ title: 'ID', key: 'id', sort: true},
					{ title: 'Invoice No', key: 'invoice_no', sort: true},
					{ title: 'Date', key: 'date', sort: true},
					{ title: 'Customer', key: 'customer', sort: false},
					{ title: 'title', key: 'title', sort: true},
					{ title: 'deposit', key: 'deposit', sort: true},
					{ title: 'balance', key: 'balance', sort: true},
					{ title: 'Amount' , key: 'total', sort: true},
					{ title: 'Due At', key: 'due_date', sort: true},
					{ title: 'Created At', key: 'created_at', sort: true},
					{ title: 'Account', key: 'count', sort: true},
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
	beforeMount(){
		this.fetchData()
	},
	computed:{
		computedData(){
			var dat = []

			for( var i = 0; this.data.length >i ; i++){
				for(var j =0; this.data[i].length > j ; j++){
					if (dat.length <= j) {

						var dataset = {
					            label:'',
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

					this.totalAmount += this.data[i][j].amount

					dat[j].data.push(this.data[i][j].amount)
					dat[j].backgroundColor.push( 'rgba(' + Math.floor( Math.random() * 250 + 1)   + ','  +  Math.floor( Math.random() * 250 + 1)   + ','  + Math.floor( Math.random() * 250 + 1)  +  ',' +  0.2 + ')' )
					dat[j].borderColor.push( 'rgba(' + Math.floor( Math.random() * 250 + 1)   + ','  +  Math.floor( Math.random() * 250 + 1)   + ','  + Math.floor( Math.random() * 250 + 1)  +  ',' +  0.7 + ')' )
										                

				}
			}

			return dat
		},
	},
	methods:{
		fetchData(){
			get(`/api/purchase/progress-invoices`,)
			.then((res)=>{
				this.data = res.data.model
				this.labels = res.data.labels
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/invoices/' + id , '_self')
		},
		clickRow(row){
			window.open('/adm/invoices/'+ row.id, )
		},
		setDue(row){
			window.open('/api/invoices-update-due-date/'+ row.id,)
			window.open('/adm/invoices/', '_self')
			},

	}
}
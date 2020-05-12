import { get, post } from '../../../helpers/api'
import router from '../../../router'

import DataViewer from '../../../components/DataViewer.vue'
import Auth from '../../../store/auth'

export default {

	el: '#orderIndex',
	router,	
	components: {  DataViewer },

	data(){

		return {

				title: 'Orders',
				source: '/api/orders',
				url:'/adm/orders',
				create:'/adm/orders/create',
				userRole: Auth.state.user_role,
				thead: [
				{ title: 'ID', key: 'id', sort: true},
				{ title: 'Invoice No', key: 'invoice_no', sort: true},
				{ title: 'Date', key: 'date', sort: true},
				{ title: 'Customer', key: 'customer', sort: false},
				{ title: 'title', key: 'title', sort: true},
				{ title: 'discount', key: 'discount', sort: true},
				{ title: 'extra', key: 'extra', sort: true},
				{ title: 'sub total', key: 'sub_total', sort: true},
				{ title: 'deposit', key: 'deposit', sort: true},
				{ title: 'balance', key: 'balance', sort: true},
				{ title: 'balance method', key: 'balance_method', sort: true},
				{ title: 'Amount' , key: 'total', sort: true},
				{ title: 'coupon code' , key: 'coupon_code', sort: true},
				{ title: 'status', key: 'status', sort: true},
				{ title: 'verified', key: 'verified', sort: true},
				{ title: 'Due At', key: 'due_date', sort: true},
				{ title: 'Created At', key: 'created_at', sort: true},
				],
				filter: [
				      	'id', 'customer.phone','customer.name', 
            			'customer_id', 'title', 'date', 'due_date', 'discount',
        				'sub_total', 'deposit', 'balance','total',
        				
				]

		}
	},
	watch:{
	},
	beforeMount(){
	},
	computed:{
	
	},
	methods:{

		clickRow(row){
			window.open('/adm/order-to-invoice/'+ row.id, )
		},
		nextStatus(row){
			get('/api/order-next-status/'+row.id + '?status=' + row.status )
			.then((response)=>{
				window.open('/adm/orders','_self' )
				return
			})
			.catch(function(error){
				Vue.set(this.$data, 'errors', error.response.data)
				this.isProcessing = false
			})

		},
		chargeByStripe(row){
			get('/api/order/charge-by-customer-stripe/'+row.id  )
			.then((response)=>{
				// console.log(response.data)
				window.open('/adm/orders','_self' )
				return
			})
			.catch(function(error){
				Vue.set(this.$data, 'errors', error.response.data)
				this.isProcessing = false
			})

		},

	}
}
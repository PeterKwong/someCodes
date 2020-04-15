

import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'
import Typehead from '../../../components/typehead.vue'
import mutualVar from '../../../helpers/mutualVar'
import Auth from '../../../store/auth'

export default {
	el:'#orderToInvoice',
	name: 'InvoiceForm',
	components:{Typehead},
	data(){
		return {
			mutualVar,
			userRole: Auth.state.user_role,
			form: {
				ind_diamonds:[],
				jewelleries:[{id:''}],
				sub_total: 0
			},
			selectedJew:[],
			selectedEng:[],
			selectedWed:[],
			selectedDia:[],
			errors: {},
			option: {
				customers: []
			},
			title: 'Create',
			initialize: '/api/invoices/create',
			redirect: '/adm/invoices',
			store: '/api/invoices',
			method: 'post',
			isLoading:false,
		}
	},
	beforeMount(){

		// this.title = 'Edit'
		this.initialize = '/api/order-to-invoice/' + window.location.pathname.slice(22)
		// this.store = '/api/invoices/' + window.location.pathname.slice(22)
		// this.method = 'put'

		this.fetchData()
	},
	watch: {
		'$route' : 'fetchData',
		'selectedJew': 'addSelectedJew' ,
		'selectedEng': 'addSelectedEng' ,
		'selectedWed': 'addSelectedWed' ,
		'selectedDia': 'addSelectedDia' ,
	},
	computed: {
		subTotal(){
			
			var price = 0


			price +=  this.form.jewelleries.reduce((carry, item)=>{
						return carry += parseInt(item.unit_price)
					},0)


			price +=  this.form.engagement_rings.reduce((carry, item)=>{
						return carry += parseInt(item.unit_price)
					},0)


			price +=  this.form.wedding_rings.reduce((carry, item)=>{
						return carry += parseInt(item.unit_price)
					},0)


			price +=  this.form.inv_diamonds.reduce((carry, item)=>{
						return carry += parseInt(item.price)
					},0)



			return this.form.sub_total = price
		},
		total(){
			return this.form.total = parseInt(this.form.sub_total) - parseInt(this.form.discount) + parseInt(this.form.extra)
		},
		balance(){
			return this.form.balance = parseInt(this.total) - parseInt(this.form.deposit) 
		},
	
	},		
	filters:{
		regExp(source, str, price){
			var pattern = new RegExp(str,'i')
			var result = pattern.exec(source)

				console.log(result)

			if(result != null){
				var oriPrice = result.toString().slice(2).split("").reverse().join("") * 7.85 *10
				var profit = Math.round( ((price - oriPrice) / oriPrice) * 100 )
				return profit
			}

		}
	},
	methods: {
		addSelectedJew(){
			this.form.jewelleries.push(this.option.jewelleries
				.filter((item)=>{
					return item.id == this.selectedJew
				})[0] )
		},
		addSelectedEng(){
			this.form.engagement_rings.push(this.option.engagement_rings
				.filter((item)=>{
					return item.id == this.selectedEng
				})[0] )
		},
		addSelectedWed(){
			this.form.wedding_rings.push(this.option.wedding_rings
				.filter((item)=>{
					return item.id == this.selectedWed
				})[0] )
		},
		addSelectedDia(){
			this.form.inv_diamonds.push(this.option.inv_diamonds
				.filter((item)=>{
					return item.id == this.selectedDia
				})[0] )
		},
		addDiamond(){
			this.form.inv_diamonds.push({
				certificate: '',
				clarity: '',
				color:'',
				cut:'EX',
				fluorescence:'NON',
				lab:'GIA',
				polish:'EX',
				shape:'RD',
				stock:'',
				symmetry:'EX',
				price:0,
				weight:''
			})
		},
		fetchData(){
			get(this.initialize)
				.then((res)=>{
					Vue.set(this.$data, 'form', res.data.form)
					Vue.set(this.$data, 'option', res.data.option)
				})
				.catch(function(error){
					console.log(error)
				})
		},
		save(){
			this.isLoading = true
			post(this.store, this.form)
			.then((res)=>{
				console.log(res)
					if(res.data.saved){
						window.open(this.redirect, '_self')
						this.isLoading = false
					}
				})
				.catch((error)=>{
					this.$data.errors = error.res.data
				})
		}
	}
}
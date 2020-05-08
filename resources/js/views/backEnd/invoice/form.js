
import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'
import Typehead from '../../../components/typehead.vue'
import Auth from '../../../store/auth'

export default {
	el:'#invoiceForm',
	name: 'InvoiceForm',
	components:{Typehead},
	data(){
		return {
			globeVar,
			mutualVar,
			userRole: Auth.state.user_role,
			form: {
				ind_diamonds:[],
				jewelleries:[{id:''}],
				subTotalExceptDiamonds:0,
				sub_total: 0,
				account_sub_total: 0,
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
		if ( window.location.pathname.includes('edit') ) {
			this.title = 'Edit'
			this.initialize = '/api/invoices/' + this.getIdReg() + '/edit'
			this.store = '/api/invoices/' + this.getIdReg()
			this.method = 'put'
		}
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
		subTotalExceptDiamonds(){
			
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


			return this.form.subTotalExceptDiamonds = price
		},
		subTotal(){
			
			var price = this.subTotalExceptDiamonds
			console.log(price)
			price +=  this.form.invoice_diamonds.reduce((carry, item)=>{
						return carry += parseInt(item.price)
					},0)



			return this.form.sub_total = price
		},
		total(){
			return this.form.total = parseInt(this.subTotal) - parseInt(this.form.discount) + parseInt(this.form.extra)
		},
		balance(){
			return this.form.balance = parseInt(this.total) - parseInt(this.form.deposit) 
		},
		accountSubTotal(){
			
			var price = this.subTotalExceptDiamonds
			console.log(price)

			price +=  this.form.invoice_diamonds.reduce((carry, item)=>{
						return carry += parseInt(item.account_price)
					},0)



			return this.form.account_sub_total = price
		},
		accountTotal(){
			return this.form.account_total = parseInt(this.accountSubTotal) - parseInt(this.form.discount) + parseInt(this.form.extra)
		},
		accountBalance(){

			this.form.account_balance = parseInt(this.accountTotal) - parseInt(this.form.deposit)

			if ( this.form.account_balance <= 0) {
				 this.form.account_balance = 0
			}
			return this.form.account_balance
		},
	
	},		
	filters:{
		regExp(source, str, price){
			var pattern = new RegExp(str,'i')
			var result = pattern.exec(source)

				console.log(result)

			if(result != null){
				var oriPrice = result.toString().slice(2).split("").reverse().join("") * 7.85 *10
				var profit = Math.round( ( ( price  - oriPrice) / oriPrice) * 100 )
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
			this.form.invoice_diamonds.push(this.option.invoice_diamonds
				.filter((item)=>{
					return item.id == this.selectedDia
				})[0] )
		},
		addDiamond(){
			this.form.invoice_diamonds.push({
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
		getIdReg(){
			var txt = window.location.pathname.slice(14)
			var pattern = new RegExp('[0-9]*', 'i')
			 return pattern.exec(txt);
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
			if (this.method === 'put') {
				put(this.store, this.form)
					.then((res)=>{
					if(res.data.saved){
						window.open( this.redirect ,'_self')
					}
					this.isLoading = false
				})
				.catch((error)=>{
					this.$data.errors = error.res.data
					this.isLoading = false						
				})

			}else{post(this.store, this.form)
				.then((res)=>{
					if(res.data.saved){
						window.open( this.redirect ,'_self')
					}
					this.isLoading = false
				})
				.catch((error)=>{
					this.$data.errors = error.res.data
					this.isLoading = false						
				})}
		}
	}
}


import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'
import mutualVar from '../../../helpers/mutualVar'

export default {
	el:'#invoiceDiamondForm',
	name: 'Invoice Diamonds',
	data(){
		return {
			form: {},
			errors: {},
			option: {},
			title: 'Create',
			initialize: '/api/invoiceDiamonds/create',
			redirect: '/adm/invoice-diamonds',
			store: '/api/invoiceDiamonds',
			method: 'post',
			date:'',
			isLoading: false,
		}
	},
	beforeMount(){
		if ( window.location.pathname.includes('edit') ) {
			this.title = 'Edit'
			this.initialize = '/api/invoiceDiamonds/' + this.getIdReg(18) + '/edit'
			this.store = '/api/invoiceDiamonds/' + this.getIdReg(18)
			this.method = 'put'
		}
		if ( window.location.pathname.includes('create-from-diamond/') ) {
			this.title = 'Create'
			this.initialize = '/api/invoice-diamonds/create-from-diamond/' + this.getIdReg(42)
			this.store = '/api/invoiceDiamonds'
			this.method = 'post'
		}
		this.fetchData()
	},
	watch: {
		'$route' : 'fetchData'
	},
	computed:{
		today(){

				this.date = new Date().getFullYear() + '-'
				this.date += new Date().getMonth()+1 + '-'
				this.date += new Date().getDate()

			return this.date
		}
	},
	methods: {
		fetchData(){
			get(this.initialize)
				.then((response)=>{
					Vue.set(this.$data, 'form', response.data.form)
					Vue.set(this.$data, 'option', response.data.option)
				})
				.catch(function(error){
					console.log(error)
				})
		},
		getIdReg(length){

			var txt = window.location.pathname.slice(length)
			var pattern = new RegExp('[0-9]*', 'i')
			 return pattern.exec(txt);
		},
		save(){

			this.isLoading = true	

			if (this.method ==='post') {
				this.form.id = null
				post(this.store, this.form)
				.then((response)=>{
					if(response.data.saved){
						window.open(this.redirect,'_self')
						this.isLoading = false
					}

				})
				.catch(function(error){
					Vue.set(this.$data, 'errors', error.response.data)
				})
			}else{
				put(this.store, this.form)
				.then((response)=>{
					if(response.data.saved){
						window.open(this.redirect,'_self')
					}
				})
				.catch(function(error){
					Vue.set(this.$data, 'errors', error.response.data)
				})
			 }
		}
			
	}
}

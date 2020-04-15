
import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'

export default {
	el:'#customerForm',
	name: 'CustomerForm',
	data(){
		return {
			form: {},
			errors: {},
			option: {},
			title: 'Create',
			initialize: '/api/customers/create',
			redirect: '/adm',
			store: '/api/customers',
			method: 'post',
		}
	},
	beforeMount(){
		if ( window.location.pathname.includes('edit') ) {
			this.title = 'Edit'
			this.initialize = '/api/customers/' + this.getIdReg() + '/edit'
			this.store = '/api/customers/' + this.getIdReg()
			this.method = 'put'
		}
		this.fetchData()
	},
	watch: {
		'$route' : 'fetchData'
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
		getIdReg(source, str, price){

			var txt = window.location.pathname.slice(15)
			var pattern = new RegExp('[0-9]*', 'i')
			 return pattern.exec(txt);
		},
		save(){
			if (this.method ==='post') {
				post(this.store, this.form)
				.then((response)=>{
					if(response.data.saved){
						window.open(this.redirect,'_self')
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

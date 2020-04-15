
import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'

import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/engagementRings'


export default {
	el:'#diamondDiscPrice',
	components: {
	},
	data(){
		return {
			form:{
				shape:'round',
				weight:0.3,
				clarity:'SI2',
				color:'d',
				discount:0,
			},
			price:0,
			tag:'',
			isProcessing: false,
			langs,
			errors: {},
			option: {},
			title: 'Create',
			storeURL: '/api/diamonds/rap-discount-price',
			method: 'post',
		}
	},
	beforeMount(){
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
		save(){
			this.isProcessing = true
			post(this.storeURL, this.form)
			.then((response)=>{
				this.tag = response.data.tag
				this.price = response.data.price
				this.isProcessing = false
			})
			.catch((err)=>{
				if (err.response.status === 422) {
					this.errors = err.response.data.errors
				}
				this.isProcessing = false
			})
				
				
		}

	}
		


}


import Vue from 'vue'
import Images from '../../../helpers/images'
import {get, del} from '../../../helpers/api'

export default {
	el:'#invoiceShow',
	name: 'invoiceShow',
	
	data(){
		return {
			model: {
				customer: {},
				items: []
			},
			company: [],
			images: Images,
			resource: 'invoices',
			redirect: '/adm/invoices'
		}
	},
	beforeMount(){
		this.fetchData()
	},
	watch: {
		'$route' : 'fetchData'
	},
	computed:{
			fullpath(){
				return !window.location.pathname.includes('pdf')
				
			},
			urlId(){
				var extra = 0
				if ( !this.fullpath) {
					extra += 4
				}
				return window.location.pathname.slice(14 + extra)
			},
	},
	methods: {
		fetchData(){

			get(`/api/${this.resource}/ ` + this.urlId )
			.then((res)=>{
				Vue.set(this.$data, 'model', res.data.model)
				Vue.set(this.$data, 'company', res.data.company)
			})
			.catch(function(error){
				console.log(error)
			})
		},
		remove(){

			del(`/api/${this.resource}/` + this.urlId )
				.then((res)=>{
					if (res.data.deleted) {
						window.open(this.redirect,'_self')
					}
				})
				.catch(function(error){
					console.log(error)
				})
					
		}
	}
}

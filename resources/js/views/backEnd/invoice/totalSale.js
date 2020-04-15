
import Vue from 'vue'
import {get, del} from '../../../helpers/api'

export default {
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
			redirect: '/adm/invoices/totalsale'
		}
	},
	watch: {
		'$route' : 'fetchData'
	},
	computed:{
			fullpath(){
				return !this.$route.fullPath.includes('pdf')
				
			}
	},
	methods: {
		fetchData(){

			get(`/api/${this.resource}/${this.$route.params.id}`)
			.then((res)=>{
				Vue.set(this.$data, 'model', res.data.model)
				Vue.set(this.$data, 'company', res.data.company)
			})
			.catch(function(error){
				console.log(error)
			})
		},
		remove(){

			del(`/api/${this.resource}/${this.$route.params.id}`)
				.then((res)=>{
					if (res.data.deleted) {
						this.$router.push(this.redirect)
					}
				})
				.catch(function(error){
					console.log(error)
				})
					
		}
	}
}

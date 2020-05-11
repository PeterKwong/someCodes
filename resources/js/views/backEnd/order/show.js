
import Vue from 'vue'
import {get, del} from '../../../helpers/api'

export default {
	el:'#orderShow',
	name: 'orderShow',
		
	data(){
		return {
			model: {
				customer: {},
				items: []
			},
			company: [],
			resource: 'orders',
			redirect: '/adm/orders'
		}
	},
	beforeMount(){
		this.fetchData()
	},
	watch: {
		'$route' : 'fetchData'
	},
	computed:{

	},
	methods: {
		fetchData(){
			get(`/api/${this.resource}/${window.location.pathname.slice(12)}`)
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

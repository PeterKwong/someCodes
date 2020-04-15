
import Vue from 'vue'
import {get, del} from '../../../helpers/api'

export default {
	el:'#customerShow',
	name: 'CategoryShow',
	data(){
		return {
			model: [],
			resource: 'customers',
			redirect: '/adm'
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

			get(`/api/${this.resource}/${ window.location.pathname.slice(15) }`)
			.then((response)=>{
				Vue.set(this.$data, 'model', response.data.model)
			})
			.catch(function(error){
				console.log(error)
			})
		},
		remove(){

			del(`/api/${this.resource}/${ window.location.pathname.slice(15) }`)
				.then((response)=>{
					if (response.data.deleted) {
						this.$router.push(this.redirect)
					}
				})
				.catch(function(error){
					console.log(error)
				})
					
		}
	}
}

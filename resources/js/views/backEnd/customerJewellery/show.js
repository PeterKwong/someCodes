
import Vue from 'vue'
import {get, del} from '../../../helpers/api'
import mutualVar from '../../../helpers/mutualVar'

export default {
	el:'#customerJewelleryShow',
	name: 'CategoryShow',
	data(){
		return {
			model: [],
			resource: 'invPosts',
			redirect: '/adm',
			mutualVar,
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
			get(`/api/${this.resource}/${window.location.pathname.slice(26)}`)
			.then((response)=>{
				Vue.set(this.$data, 'model', response.data.model)
			})
			.catch(function(error){
				console.log(error)
			})
		},
		remove(){

			del(`/api/${this.resource}/${window.location.pathname.slice(26)}`)
				.then((response)=>{
					if (response.data.deleted) {
						window.open(this.redirect,'_self')
					}
				})
				.catch(function(error){
					console.log(error)
				})
					
		}
	}
}

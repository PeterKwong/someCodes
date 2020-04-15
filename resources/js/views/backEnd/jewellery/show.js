
import Vue from 'vue'
import {get, del} from '../../../helpers/api'
import mutualVar from '../../../helpers/mutualVar'

export default {
	el:'#jewelleryShow',
	name: 'CategoryShow',
	data(){
		return {
			model: [],
			resource: 'jewelleryShow',
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

			get(`/api/${this.resource}/${window.location.pathname.slice(15)}`)
			.then((response)=>{
				Vue.set(this.$data, 'model', response.data.model)
			})
			.catch(function(error){
				console.log(error)
			})
		},
		remove(){

			del(`/api/jewellery/${window.location.pathname.slice(15)}`)
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

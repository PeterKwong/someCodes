
import Vue from 'vue'
import {get, del} from '../../../helpers/api'

export default {
	el:'#invDiamondShow',
	name: 'CategoryShow',
	data(){
		return {
			model: [],
			resource: 'invDiamonds',
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

			get(`/api/${this.resource}/${window.location.pathname.slice(18)}`)
			.then((response)=>{
				Vue.set(this.$data, 'model', response.data.model)
			})
			.catch(function(error){
				console.log(error)
			})
		}
		
	}
}

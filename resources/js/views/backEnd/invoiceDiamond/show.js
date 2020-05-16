
import Vue from 'vue'
import {get, del} from '../../../helpers/api'

export default {
	el:'#invoiceDiamondShow',
	name: 'CategoryShow',
	data(){
		return {
			model: [],
			resource: 'invoiceDiamonds',
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

			get(`/api/${this.resource}/${window.location.pathname.slice(22)}`)
			.then((response)=>{
				Vue.set(this.$data, 'model', response.data.model)
			})
			.catch(function(error){
				console.log(error)
			})
		}
		
	}
}

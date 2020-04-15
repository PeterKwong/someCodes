
import Vue from 'vue'
import {get, del} from '../../../helpers/api'
import {readDiamond} from '../../../helpers/downDiamond'
import mutualVar from '../../../helpers/mutualVar'

export default {
	el:'#engagementRingShow',
	name: 'CategoryShow',
	data(){
		return {
			model: [],
			resource: 'engagementRingsShow',
			delete: 'engagementRings',
			redirect: '/adm',
			diamond: '',
			mutualVar,
		}
	},
	beforeMount(){
		this.fetchData()
		readDiamond()
				.then((response)=>{
					if(response.data){
						this.diamond = response
					}
				})
				
	},
	watch: {
		'$route' : 'fetchData'
	},
	methods: {
		fetchData(){

			get(`/api/${this.resource}/${ window.location.pathname.slice(22) }`)
			.then((response)=>{
				Vue.set(this.$data, 'model', response.data.model)
			})
			.catch(function(error){
				console.log(error)
			})
		},
		remove(){

			del(`/api/${this.delete}/${ window.location.pathname.slice(22) }`)
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

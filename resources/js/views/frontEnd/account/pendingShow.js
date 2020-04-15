import { get, post } from '../../../helpers/api'

import { transJs } from '../../../helpers/transJs'
import { getLocaleCode, getLocale } from '../../../helpers/locale'


export default {
		el: '#pendingShow',
	data(){
		return {
				mutualVar,
				data:'',
				customer:'',

		}
	},
	watch:{
		'$route': 'fetchData'
	},
	beforeMount(){
		this.fetchData()
	},
	computed:{
			locale(){
				return getLocaleCode()
			},

		},
	filters:{
			transJs,
	},
	methods:{
		fetchData(){
			get(`/api/account/pending/${window.location.pathname.slice(20)}`,)
			.then((res)=>{
				this.data = res.data.model
				this.customer = res.data.customer
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/pending/' + id , '_self')
		},		

	}
}
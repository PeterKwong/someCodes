import { get, post } from '../../../helpers/api'

import { transJs } from '../../../helpers/transJs'
import { getLocaleCode, getLocale } from '../../../helpers/locale'
import langsShopC from '../../../langs/shoppingCart'

// import DataViewer from '../../../components/user/DataViewer.vue'

export default {
		el: '#invoices',
	data(){
		return {
				mutualVar,
				data:'',
				langs: langsShopC,
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
			get(`/api/account/invoices`,)
			.then((res)=>{
				this.data = res.data.model
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/invoices/' + id , '_self')
		},		

	}
}
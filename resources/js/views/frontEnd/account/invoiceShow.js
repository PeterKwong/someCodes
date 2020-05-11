import { get, post } from '../../../helpers/api'

import { transJs } from '../../../helpers/transJs'
import { getLocaleCode, getLocale } from '../../../helpers/locale'


// import DataViewer from '../../../components/user/DataViewer.vue'

export default {
		el: '#invoiceShow',
	data(){
		return {
				mutualVar,
				data:'',
				customer:'',
				model: {},
				company: [],
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
			get(`/api/account/invoices/${ window.location.pathname.slice(21)}`,)
			.then((res)=>{
				this.model = res.data.model
				this.company = res.data.company
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/invoices/' + id , '_self')
		},		

	}
}
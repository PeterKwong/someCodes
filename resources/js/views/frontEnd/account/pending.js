import { get, post } from '../../../helpers/api'
import { setCookie, getCookie, } from '../../../helpers/cookie'

import { transJs } from '../../../helpers/transJs'
import { getLocaleCode, getLocale } from '../../../helpers/locale'
import langsShopC from '../../../langs/shoppingCart'

// import DataViewer from '../../../components/user/DataViewer.vue'

export default {
		el: '#pending',
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
			couponCode(){ return getCookie('coupon_code')},

		},
	filters:{
			transJs,
	},
	methods:{
		fetchData(){
			get(`/api/account/pending`,)
			.then((res)=>{
				this.data = res.data.model
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/pending/' + id , '_self')
		},		

	}
}
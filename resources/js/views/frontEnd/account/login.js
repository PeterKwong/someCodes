import { get, post } from '../../../helpers/api'
import { setCookie, getCookie, } from '../../../helpers/cookie'

import { transJs } from '../../../helpers/transJs'
import { getLocaleCode, getLocale } from '../../../helpers/locale'
import langsShopC from '../../../langs/shoppingCart'

// import DataViewer from '../../../components/user/DataViewer.vue'

export default {
		el: '#login',
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
	},
	created(){
		if (this.couponCode != '' && this.referral == 1) {
			this.mutualVar.notification.state.success = transJs('Login to save coupon code',langsShopC, mutualVar.langs.localeCode)
		}
	},
	computed:{
			couponCode(){ 
				return getCookie('coupon_code')
			},
			referral(){
				return getCookie('referral')
			},
	
	},
	methods:{	

	}
}
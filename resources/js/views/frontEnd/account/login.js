
import { setCookie, getCookie, } from '../../../helpers/cookie'

// import DataViewer from '../../../components/user/DataViewer.vue'

export default {
		el: '#login',
	data(){
		return {
				mutualVar,
				data:'',
				langs,

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
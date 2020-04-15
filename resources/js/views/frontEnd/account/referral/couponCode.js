import { get, post } from '../../../../helpers/api'
// import router from '../../../../router'

import { transJs } from '../../../../helpers/transJs'
import { getLocaleCode } from '../../../../helpers/locale'

import Flash from '../../../../helpers/flash'
import Notification from '../../../../components/notification.vue'
import mutualVar from '../../../../helpers/mutualVar'

export default {
		el: '#couponCode',
		// router,	
		components:{Notification},
	data(){
		return {
				model:'',
				mutualVar,
				
		}
	},
	watch:{
		'$route': 'fetchData'
	},
	created(){
		this.fetchData()
	},
	computed:{
			locale(){
				return getLocaleCode()
			},
			hostname(){
				return window.location.hostname
			}

		},
	filters:{
			transJs,
	},
	methods:{
		
		fetchData(){
			get(`/api/referral/code`,)
			.then((res)=>{
				this.model = res.data.model
			})
		},
		

	}
}
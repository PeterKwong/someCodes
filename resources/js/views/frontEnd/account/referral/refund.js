import { get, post } from '../../../../helpers/api'

import { transJs } from '../../../../helpers/transJs'
import { getLocaleCode } from '../../../../helpers/locale'
import langsShopC from '../../../../langs/shoppingCart'

import Flash from '../../../../helpers/flash'
import Notification from '../../../../components/notification.vue'
import mutualVar from '../../../../helpers/mutualVar'

export default {
		el: '#refund',
		components:{Notification},
	data(){
		return {
				model:'',
				mutualVar,
				langs: langsShopC,
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
			discountRateCheck(data, coupon){
				var rate = data[0]
					for(var i = 0; i < coupon.length ; i ++){
						if ( coupon[i].upperAmount > data && coupon[i].lowerAmount < data) {
							rate = coupon[i].rate
							return rate
						}
				}

			},
			hideInfo(data){

					var data = data.toString();

					var x = 'x'
					x = x.repeat(data.length/2)

					return data.slice(0, data.length/2).concat(x)

			},
	},
	methods:{
		
		fetchData(){
			get(`/api/referral/refund`,)
			.then((res)=>{
				this.model = res.data.model
			})

			get(`/api/referral/code`,)
			.then((res)=>{
				this.model = res.data.model
			})
		},
		

	}
}
import { get, post } from '../../../../helpers/api'

import { getLocaleCode } from '../../../../helpers/locale'

import Flash from '../../../../helpers/flash'
import Notification from '../../../../components/notification.vue'
import mutualVar from '../../../../helpers/mutualVar'

export default {
		el: '#records',
		components:{Notification},
	data(){
		return {
				model:'',
				coupon:'',
				mutualVar,
				langs,
				refundAmount:0,
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
			},			
			refundAmountSum(){

				var data = this.model.data
				var rate = ''

				for(var i = 0; i < data.length ; i++){
					if (data[i].status != 'taken') {
						if ( data[i].invoice) {

							for(var j = 0; j < data[i].invoice.inv_diamonds.length; j++){

								this.refundAmount += this.discountRateCheckMet(data[i].invoice.inv_diamonds[j].price) * data[i].invoice.inv_diamonds[j].price

							}
						}

					}
				}

				this.refundAmount = Math.round(this.refundAmount * 100)/100

				return this.refundAmount
			},			
			refunded(){

				var data = this.model.data
				var rate = ''
				var refunded = 0

				for(var i = 0; i < data.length ; i++){
					if (data[i].status == 'taken') {
						if ( data[i].invoice) {

							for(var j = 0; j < data[i].invoice.inv_diamonds.length; j++){

								refunded += this.discountRateCheckMet(data[i].invoice.inv_diamonds[j].price) * data[i].invoice.inv_diamonds[j].price
							}
						}
					}
				}

				refunded = Math.round(refunded * 100)/100

				return refunded
			}

		},
	filters:{
			discountRateCheck(data, coupon){
				var rate = data[0]
					for(var i = 0; i < coupon.length ; i ++){
						if ( coupon[i].upperAmount > data && coupon[i].lowerAmount < data) {
							rate = coupon[i].refund
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
			get(`/api/referral/records`,)
			.then((res)=>{
				this.model = res.data.model
			})

			get(`/api/referral/code`,)
			.then((res)=>{
				this.coupon = res.data.model
			})
		},
		discountRateCheckMet(data){

			var rate = ''

			for(var k = 0; k < this.coupon.discountRate.length ; k ++){

				if ( this.coupon.discountRate[k].upperAmount > data && this.coupon.discountRate[k].lowerAmount < data) {
					rate = this.coupon.discountRate[k].refund
					return rate
				}
			}

		},

	}
}
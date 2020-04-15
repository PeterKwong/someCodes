import { get } from '../../../helpers/api'

import { transJs } from '../../../helpers/transJs'
import { getLocaleCode } from '../../../helpers/locale'

export default {
		el: '#account',
	data(){
		return {
			user:'',
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
			get(`/api/account/user`,)
			.then((res)=>{
				this.user = res.data.user
			})
		}

	}
}
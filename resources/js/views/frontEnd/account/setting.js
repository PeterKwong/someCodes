import { get, post } from '../../../helpers/api'

import { transJs } from '../../../helpers/transJs'
import { getLocaleCode } from '../../../helpers/locale'


export default {
		el: '#setting',
	data(){
		return {
            mutualVar,
				form:{
					user:'',
					password:{
						current:'',
						new:'',
						confirm:'',
						disable: true,
					}
				},
				nullPassword:'',
				data:'',
				isProcessing: false,
				errors:{user:'', password:''},
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
				this.form.user = res.data.user
				this.nullPassword = res.data.nullPassword
			})
		},
		save(){
			var checkingBeforePost = false
			checkingBeforePost = this.checkComfirmPassword()

			this.isProcessing = true

			if (checkingBeforePost) {
				post('/api/account/user', this.form)
				  .then((res)=>{
		            if (res.data.saved) {
                    this.mutualVar.notification.state.success = res.data.message
		            }
		          })
		          .catch((err)=>{
		            if (err.response.status === 422) {
		              this.mutualVar.notification.state.error = err.response.data.message

		            }
		          })
			}
	
				
		},
		checkComfirmPassword(){
			var confirm = true

				 if (this.form.password.new !='') {

					if (this.form.password.new == this.form.password.confirm){
						confirm = true
					}else{
						alert('Passwords are not the same')
						confirm = false
					}
				 }

			return confirm

		}

	}
}
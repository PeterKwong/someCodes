	import Flash from '../../../helpers/flash'
	import Auth from '../../../store/auth'
	import {post} from '../../../helpers/api'
	export default {
		el: '#login',
		data(){
			return {
				form: {
					email: '',
					password: '',

				},
				error: {},
				isProcessing: false
			}
		},
		methods: {
			login(){
				this.isProcessing = true
				this.error = {}
				post(`/api/td-login`, this.form)
					.then((res) => {
						if (res.data.authenticated) {
							Auth.set(res.data.api_token, res.data.user_id, res.data.role.name)
							Flash.setSuccess('You have successfully logged in!')
							window.open('/adm','_self')
						}
						this.isProcessing = false
					})
					.catch((err)=>{
						if (err.response.status === 422) {
							this.error = err.response.data
						}
						this.isProcessing = false
					})
			}
		}
	}

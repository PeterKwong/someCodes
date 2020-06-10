<template>


			<div class="box" style="margin: 50px">

				<form @submit.prevent="login">
				  <div class="form-group" >
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" v-model="form.email" aria-describedby="emailHelp" placeholder="Enter email">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password"  v-model="form.password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" class="btn btn-primary" :disable="isProcessing" >Submit</button>
				</form>

					

			</div>
</template>


<script type="text/javascript">
	import Flash from '../../../helpers/flash'
	import Auth from '../../../store/auth'

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
</script>
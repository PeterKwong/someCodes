
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
	methods:{
		
		fetchData(){
			get(`/api/account/user`,)
			.then((res)=>{
				this.user = res.data.user
			})
		}

	}
}
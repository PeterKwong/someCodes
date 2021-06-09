
export default {
		el: '#pendingShow',
	data(){
		return {
				mutualVar,
				data:'',
				customer:'',

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
			get(`/api/account/pending/${window.location.pathname.slice(20)}`,)
			.then((res)=>{
				this.data = res.data.model
				this.customer = res.data.customer
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/pending/' + id , '_self')
		},		

	}
}

export default {
		el: '#invoices',
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
		this.fetchData()
	},

	methods:{
		fetchData(){
			get(`/api/account/invoices`,)
			.then((res)=>{
				this.data = res.data.model
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/invoices/' + id , '_self')
		},		

	}
}
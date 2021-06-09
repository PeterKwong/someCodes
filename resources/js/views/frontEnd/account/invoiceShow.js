
export default {
		el: '#invoiceShow',
	data(){
		return {
				mutualVar,
				data:'',
				customer:'',
				model: {},
				company: [],
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
			get(`/api/account/invoices/${ window.location.pathname.slice(21)}`,)
			.then((res)=>{
				this.model = res.data.model
				this.company = res.data.company
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/invoices/' + id , '_self')
		},		

	}
}
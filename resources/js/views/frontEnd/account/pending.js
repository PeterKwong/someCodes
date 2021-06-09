
export default {
		el: '#pending',
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
			get(`/api/account/pending`,)
			.then((res)=>{
				this.data = res.data.model
			})
		},
		directTo(id){
			window.open( getLocale() + '/account/pending/' + id , '_self')
		},		

	}
}
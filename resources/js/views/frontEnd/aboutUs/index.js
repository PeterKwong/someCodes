import { get } from '../../../helpers/api'

export default {
	el: '#aboutUs',
	data(){
		return {
			activedSubTab: 'Appointment First',
			mutualVar,
		}
	},
	watch:{
		'$route': 'fetchData'
	},
	computed:{
		partialUrl(){
			return window.location.pathname.slice(4)
		}
	},
	beforeMount(){
		this.fetchData()
		console.log(window.location.pathname.slice(12))
		if (window.location.pathname.includes('buying-procedure')) {
			return this.activedSubTab = window.location.pathname.slice(21)?window.location.pathname.slice(21):'Appointment First'
		}
		
		if (window.location.pathname.includes('about-us')) {
			return this.activedSubTab = window.location.pathname.slice(12)?window.location.pathname.slice(12):'Contact Us'
		}

	
		this.activedSubTab = window.location.pathname.slice(20)?window.location.pathname.slice(20):'Appointment First'
	},
	methods:{
		activeSubTab(tab){
			this.activedSubTab = tab
		},
		fetchData(){
			get(`/api/buyingProcedure`)
			.then((res)=>{
				this.trans = res.data.trans
			})
		}
	}
}

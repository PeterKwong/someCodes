	// import Auth from '../../store/auth'
	import { get, del } from '../../../helpers/api'
	import Appointment from '../../../components/appointment.vue'
	import Carousel from '../../../components/carousel.vue'

	// import Flash from '../../helpers/flash'
	import { transJs } from '../../../helpers/transJs'
	import langsJew from '../../../langs/jewelleries'
	import langsDia from '../../../langs/diamondViewer'
	import langsEnga from '../../../langs/engagementRings'
	import langsWedd from '../../../langs/weddingRings'


		
	export default {
		el: '#jewellery',
		components: {Appointment, Carousel},
		data(){
			return {
				// auth: Auth.state,
				isRemoving: false,
				carouselState: false,
				appointmentState: false,
				title: '',
				langs: langsDia.concat(langsEnga,langsWedd, langsJew),
				text:{
					jewellery: 'jewellery',
				},
				hrefLangs: window.location.pathname.slice(0,3),
				jewellery:'',
				columns:[
				'unit_price',
                'type',
                'gemstone',
                'metal',
                'ct',
                'stock',
                'setting',
                ]
				,
				storeURL: '',
				
				customerItems: '',
			}
		},
		watch:{
			'$route':'fetchData'
		},
		beforeMount(){
			this.fetchData()
			
		},
		filters:{
			transJs,
		},
		computed: {
			appointmentTitle(){
				return transJs(this.jewellery.metal,this.langs,this.locale)  +' ' + transJs(this.jewellery.type,this.langs,this.locale)  +' '+ transJs(this.text.jewellery,this.langs,this.locale) 
			},
			locale(){
				
				if (window.location.pathname.slice(1,3) == 'en') {
					return 0
				}
				if (window.location.pathname.slice(1,3) == 'hk') {
					return 1
				}
				if (window.location.pathname.slice(1,3) == 'cn') {
					return 2
				}
			}
		},
		methods: {
			fetchData(){
				get(`/api/jewellery/${window.location.pathname.slice(14)}`)
				.then((res)=>{
					this.jewellery = res.data.model
					this.filterNotPostable(res.data.posts.invPosts)
				})
			},
			filterNotPostable(data){
				var type = 'App/Jewellery'
				var id = this.jewellery.id
				var filteredData = []

				for (var i = 0 ; data.length > i ; i++) {
					if (data[i].postable_type == type && data[i].postable_id == id) {
						filteredData.push(data[i])
					}
				}

				this.customerItems = filteredData
			},
		}
	}
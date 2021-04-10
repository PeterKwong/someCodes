	// import Auth from '../../store/auth'
	// import { get, del } from '../../../helpers/api'
	// import Appointment from '../../../components/appointment.vue'
	import Carousel from '../../../components/carousel.vue'

	// // import Flash from '../../helpers/flash'
	// import { transJs } from '../../../helpers/transJs'
	// import langsJew from '../../../langs/jewelleries'
	// import langsDia from '../../../langs/diamondViewer'
	// import langsEnga from '../../../langs/engagementRings'
	// import langsWedd from '../../../langs/weddingRings'


		
	export default {
		el: '#jewellery',
		components: { Carousel},
		data(){
			return {
				// auth: Auth.state,
				isRemoving: false,
				carouselState: false,
				appointmentState: false,
				title: '',
				langs,
				text:{
					jewellery: 'jewellery',
				},
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
		methods: {
			fetchData(){
				get(`/api/jewellery/${window.location.pathname.slice(14)}`)
				.then((res)=>{
					this.jewellery = res.data.model
					this.filterNotPostable(res.data.posts.invoicePosts)
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
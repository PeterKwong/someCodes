	// import Auth from '../../store/auth'
	// import { get, del } from '../../../helpers/api'
	// import Appointment from '../../../components/appointment.vue'
	import Carousel from '../../../components/carousel.vue'
	import CarouselCenter from '../../../components/carousel-center.vue'

	// import ProductViewer from '../../../components/productViewer360.vue'
	import ShoppingCart from '../../../components/shoppingCart/cart.vue'

	// import Flash from '../../helpers/flash'
	// import { transJs } from '../../../helpers/transJs'
	// import { getLocaleCode } from '../../../helpers/locale'
	// import langs from '../../../langs/engagementRings'

		
	export default {
		el: '#engagementRingsShow',
		components: { Carousel, CarouselCenter, ShoppingCart},
		data(){
			return {
				// auth: Auth.state,
				isRemoving: false,
				carouselState: false,
				// appointmentState: false,
				title: '',
				langs,
				// filename:'381_x264 ',
				mutualVar,
				text:{
					engagementRing: 'engagementRing',
				},
				hrefLangs: mutualVar.langs.locale,
				engagementRing:'',
				// columns:[
				// 'unit_price',
    //             'shoulder',
    //             'prong',
    //             'ct',
    //             'stock',
    //             'name',
    //             'description',
    //             ]
				// ,
				// storeURL: '',
				
				customerItems:[],
				shoppingCartType: 'engagementRings',
				carouselItem:{
					active: '',
					upperitems: '',
					items: '',
					title: 'customer jewellries'},

			}
		},
		watch:{
			'$route':'fetchData'
		},
		beforeMount(){
			this.fetchData()
			
		},
		computed: {
			// appointmentTitle(){
			// 	return transJs(this.engagementRing.shoulder,this.langs,this.locale)  +' ' + transJs(this.engagementRing.prong,this.langs,this.locale)  +' '+ transJs(this.text.engagementRing,this.langs,this.locale)  +' ' + this.engagementRing.stock 
			// },
			// locale(){
			// 	return getLocaleCode()
			// },
		},
		methods: {
			fetchData(){
				get(`/api/engagementRings/${window.location.pathname.slice(21)}?locale=${this.hrefLangs}`)
				.then((res)=>{
					this.engagementRing = res.data.model
					// this.customerItems = res.data.posts.invoicePosts?res.data.posts.invoicePosts:[]
					// this.filterNotPostable(res.data.posts.invoicePosts)
					this.assignCarouselItem()
				})
			},
			filterNotPostable(data){
				var type = 'App/EngagementRing'
				var id = this.engagementRing.id
				var filteredData = []

				for (var i = 0 ; data.length > i ; i++) {
					if (data[i].postable_type == type && data[i].postable_id == id) {
						filteredData.push(data[i])
					}
				}

				this.customerItems = filteredData
			},
			assignCarouselItem(){

				this.carouselItem.active = this.carouselState
				this.carouselItem.upperitems = this.engagementRing
				this.carouselItem.items = this.customerItems.slice(0,1)

			}
			
			
		}
	}
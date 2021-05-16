
	// import Auth from '../../store/auth'
	// import Appointment from '../../../components/appointment.vue'
	import Carousel from '../../../components/carousel.vue'
	// import Flash from '../../helpers/flash'
	// import { transJs } from '../../../helpers/transJs'
	// import langs from '../../../langs/weddingRings'

		
	export default {
		el:'#weddingRingsShow',
		components: { Carousel},
		data(){
			return {
				// auth: Auth.state,
				// isRemoving: false,
				carouselState: false,
				appointmentState: false,
				title: '',
				// langs,
				weddingRing:'',
				hrefLangs:  mutualVar.langs.locale,
				// columns:[
				// 'unit_price',
    //             'metal',
    //             'ct',
    //             'stock',
    //             'name',
    //             'description',
    //             ]
				// ,
				// text:{
				// 	weddingRing: 'Wedding Ring', 
				// },
				langHref : '/' + window.location.pathname.slice(1,3),				
				storeURL: '',
				customerItems:[],
				combinedUpperWeddingRings:'',
				combinedLowerWeddingRings:'',
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
		created(){
			this.fetchData()
			
		},
		computed: {
			// appointmentTitle(){
			// 	return transJs(this.weddingRing.wedding_rings[0].style,this.langs,this.locale)  + ' ' + transJs(this.weddingRing.wedding_rings[0].metal,this.langs,this.locale)  + transJs(this.text.weddingRing,this.langs,this.locale) 
			// },
			// locale(){
				
			// 	if (window.location.pathname.slice(1,3) == 'en') {
			// 		return 0
			// 	}
			// 	if (window.location.pathname.slice(1,3) == 'hk') {
			// 		return 1
			// 	}
			// 	if (window.location.pathname.slice(1,3) == 'cn') {
			// 		return 2
			// 	}
			// }
		},
		// filters:{
		// 	transJs,
		// },
		methods: {
			fetchData(){
				get(`/api/weddingRings/${window.location.pathname.slice(18)}?locale=${this.hrefLangs}`)
				.then((res)=>{
					this.weddingRing = res.data.model
					this.customerItems = res.data.posts.invoicePosts?res.data.posts.invoicePosts:[]
					// this.UpperWeddingRings()
					// this.filterNotPostable(res.data.posts.invoicePosts)
					// this.assignCarouselItem()
					// this.LowerWeddingRings()
				})
			},
			UpperWeddingRings(){ 
				var obj = {images: [],
							video: null,
							video360: null,
					}


				if (this.weddingRing.images) {
				obj.images.push(this.weddingRing.images)
				}
				if (this.weddingRing.video) {
					obj.video = []
					obj.video.push(this.weddingRing.video)
				}
				console.log(this.weddingRing.video360)
				if (this.weddingRing.video360) {
					obj.video360 = []
					obj.video360.push(this.weddingRing.video360)
				}
				
				return this.combinedUpperWeddingRings = obj
			},
			assignCarouselItem(){

				this.carouselItem.active = this.carouselState
				this.carouselItem.upperitems = this.weddingRing
				this.carouselItem.items = this.customerItems.slice(0,1)

			},
			// filterNotPostable(data){
			// 	var type = 'App/WeddingRing'
			// 	var id = this.weddingRing.id
			// 	var filteredData = []
			// 	// console.log(data)
			// 	for (var i = 0 ; data.length > i ; i++) {
			// 		if (data[i].postable_type == type && data[i].postable_id == id) {
			// 			console.log(data[i])
			// 			filteredData.push(data[i])
			// 		}
			// 	}

			// 	this.customerItems = filteredData
			// },

			// LowerWeddingRings(){ 
			// 	var obj = []
			// 	if (this.customerItems.wedding_rings[0].invoices.length > 0) {
			// 		for (var i =0 ;this.customerItems.wedding_rings[0].invoices.length > i; i++) {
			// 			if (this.customerItems.wedding_rings[0].invoices[i].invoice_posts.length >0) {
			// 				if(this.customerItems.wedding_rings[0].invoices[i].invoice_posts[0].postable_type == 'App/WeddingRing' && this.customerItems.wedding_rings[0].invoices[i].invoice_posts[0].published != 0 ){					
			// 				obj.push(this.customerItems.wedding_rings[0].invoices[i].invoice_posts[0])
			// 				console.log(obj)
			// 				}
			// 			}
						
			// 		}
			// 	}
				
				
			// 	return this.combinedLowerWeddingRings = obj
			// },						
		}
	}
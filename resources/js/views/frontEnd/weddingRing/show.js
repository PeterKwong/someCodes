
	// import Auth from '../../store/auth'
	import { get, del } from '../../../helpers/api'
	import Appointment from '../../../components/appointment.vue'
	import Carousel from '../../../components/carousel.vue'
	// import Flash from '../../helpers/flash'
	import { transJs } from '../../../helpers/transJs'
	import langs from '../../../langs/weddingRings'

		
	export default {
		el:'#weddingRingsShow',
		components: {Appointment, Carousel},
		data(){
			return {
				// auth: Auth.state,
				isRemoving: false,
				carouselState: false,
				appointmentState: false,
				title: '',
				langs,
				weddingRing:'',
				hrefLangs: window.location.pathname.slice(0,3),
				columns:[
				'unit_price',
                'metal',
                'ct',
                'stock',
                'name',
                'description',
                ]
				,
				text:{
					weddingRing: 'Wedding Ring', 
				},
				langHref : '/' + window.location.pathname.slice(1,3),				
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
		computed: {
			appointmentTitle(){
				return transJs(this.weddingRing.wedding_rings[0].style,this.langs,this.locale)  + ' ' + transJs(this.weddingRing.wedding_rings[0].metal,this.langs,this.locale)  + transJs(this.text.weddingRing,this.langs,this.locale) 
			},
			combinedUpperWeddingRings(){ 
				var obj = {images: [],
							video: []
					}

				for (var i =0 ;this.weddingRing.wedding_rings[0].images.length > i; i++) {
					obj.images.push(this.weddingRing.wedding_rings[0].images[i])
					console.log(obj)

					if (this.weddingRing.wedding_rings[1].images[i]) {
					obj.images.push(this.weddingRing.wedding_rings[1].images[i])
					}
				}
				obj.video.push(this.weddingRing.wedding_rings[0].video)
				
				return obj
			},
			combinedLowerWeddingRings(){ 
				var obj = []
				if (this.customerItems.wedding_rings[0].invoices.length > 0) {
					for (var i =0 ;this.customerItems.wedding_rings[0].invoices.length > i; i++) {
						if (this.customerItems.wedding_rings[0].invoices[i].invoice_posts.length >0) {
							if(this.customerItems.wedding_rings[0].invoices[i].invoice_posts[0].postable_type == 'App/WeddingRing' && this.customerItems.wedding_rings[0].invoices[i].invoice_posts[0].published != 0 ){					
							obj.push(this.customerItems.wedding_rings[0].invoices[i].invoice_posts[0])
							console.log(obj)
							}
						}
						
					}
				}
				
				
				return obj
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
		filters:{
			transJs,
		},
		methods: {
			fetchData(){
				get(`/api/weddingRings/${window.location.pathname.slice(18)}`)
				.then((res)=>{
					this.weddingRing = res.data.model
					this.customerItems = res.data.posts
				})
			},
			transJsMet(data,ori,langs){
				return transJs(data,ori,langs)
			},
			
		}
	}
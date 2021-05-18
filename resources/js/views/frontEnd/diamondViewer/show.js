// import Auth from '../../store/auth'
import { get, del } from '../../../helpers/api'
// import xiaohungshu from '../../../components/xiaohungshu.vue'
// import Appointment from '../../../components/appointment.vue'
import ShoppingCart from '../../../components/shoppingCart/cart.vue'
// import Carousel from '../../../components/carousel.vue'

// import Flash from '../../helpers/flash'
import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/diamondViewer'
	
export default {
	el:'#diamondViewerShow',
	components: { ShoppingCart },
	data(){
		return {
			// auth: Auth.state,
			isRemoving: false,
			// appointmentState: false,
			title: '',
			langs,
			text:{
				carat: 'carat',
				diamond: 'diamond',

			},
			mutualVar,
			diamond:{
				weight:'',
			},
			columns:[
			'price',
            'shape',
            'weight',
            'color',
            'clarity',
            'cut',
            'polish',
            'symmetry',
            'fluorescence',
            'certificate',
            'lab',
            ]
			,
			storeURL: '/api/diamonds/appointment',
			
			post: {
				invoice: {},
				content: []
			},
			loadingStatus:{image:0, cert:0},
			storageURL: mutualVar.storage[mutualVar.storage.live] + 'public/diamond/',
			isLoading:true,
			selectingShowType: null,
			invoice: '',
			shoppingCartType: 'diamonds',
			
		}
	},
	watch:{
	},
	beforeMount(){
		this.fetchData()
		
	},
	filters:{
		transJs,
	},
	computed: {
		// localeHref(){
			
		// 	return window.location.pathname.slice(0,4)
				
		// },

	},
	methods: {
		fetchData(){
			get(`/api/diamonds/${window.location.pathname.slice(23)}`)
			.then((res)=>{
				this.diamond = res.data.diamond
			})
			get(`/api/diamondsLoadingImage/${window.location.pathname.slice(23)}`)
			.then((res)=>{
				this.isLoading = false
				this.diamond = res.data.diamond
				this.loadingStatus.image = res.data.loading.image
				if (res.data.diamond.image_cache) {
					this.selectingShowType = 'image'					
				}
				if (res.data.diamond.video_link) {
					this.selectingShowType = 'video'					
				}
				// mutualVar.viewer.src = this.diamond.video_link.includes('http')?this.diamond.video_link.replace('http','https'):this.diamond.video_link 

			})
			get(`/api/diamondsLoadingCert/${window.location.pathname.slice(23)}`)
			.then((res)=>{
				this.isLoading = false
				this.diamond = res.data.diamond
				this.loadingStatus.cert = res.data.loading.cert
			})
		},
		scrollDown(){
			this.loading = !this.loading
		}
		
	}
}


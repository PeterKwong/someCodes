// import Auth from '../../store/auth'
// import { get, del } from '../../../helpers/api'
// import Flash from '../../helpers/flash'

// import {videoPlayer} from '../../../../../node_modules/vue-video-player/dist/vue-video-player'
import videoPlayer from '../../../components/videoPlayer.vue'
import ProductViewer from '../../../components/productViewer360.vue'
import video360Exchange from '../../../components/video360Exchange.vue'
import Carousel from '../../../components/carousel.vue'


export default {
	el: '#customerJewelleryShow',
	components:{
	    videoPlayer,
	    ProductViewer,
      video360Exchange,
      Carousel,
	},
	data(){
		return {
			// auth: Auth.state,
			mutualVar,
			isRemoving: false,
			post: {
				invoice: {},
				content: []
			},
			videoOpts:[
				{videoEng:''},
				{videoWed:''},
				{videoJew:''},
				{videoPost:''},
			],
			videoPath: mutualVar.storage[mutualVar.storage.live] + 'public/videos/' ,
			imagePath: mutualVar.storage[mutualVar.storage.live] + 'public/images/' ,
			langs,
			video360:'',
			videoOptions:{
              // videojs options
              muted: true,
              language: 'en',
              playbackRates: [0.7, 1.0, 1.5, 2.0],
              sources: [{
                type: "video/mp4",
                src: null
              }],
              poster: null,
              fluid: true,
              buttered:[0.00, 3.46],
              preload:"auto",
              readyState: 1,
              autoplay: false,

            }
		}
	},
	watch:{
		'$route':'fetchData',
		'videoJs.src':'videoOptions',
	},
	beforeMount(){
		this.fetchData()

	},
	methods: {
		fetchData(){
			get(`/api/invoicePosts/${window.location.pathname.slice(23)}`,window.location.pathname.slice(1,3))
			.then((res)=>{
				this.post = res.data.model
				this.setVideo360()
				// this.ProceedVideoEng()
				// this.ProceedVideoWed()
				// this.ProceedVideoJew()
				// this.ProceedVideoPost()
				// this.setPublished()
			})
		},
		setVideo360(){
			this.video360 = {
				src:this.post.video360, type:"video360", 
				thumb: mutualVar.storage[mutualVar.storage.live] + 'public/video360/' + this.post.video360 +'/thm-0.jpg', 
				size:120 , 
				rotate:1,
				fileName: '',
				// fileName: mutualVar.css.innerWidth<500 ? 'thm-' :'',
				}
		},

	}
}
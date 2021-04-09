// import Auth from '../../store/auth'
// import { get, del } from '../../../helpers/api'
// import Flash from '../../helpers/flash'

import { transJs } from '../../../helpers/transJs'
import langsDia from '../../../langs/diamondViewer'
import langsEnga from '../../../langs/engagementRings'
import langsWedd from '../../../langs/weddingRings'
// import langs from '../../../langs/customerJewellry'

// import {videoPlayer} from '../../../../../node_modules/vue-video-player/dist/vue-video-player'
import videoPlayer from '../../../components/videoPlayer.vue'
import ProductViewer from '../../../components/productViewer360.vue'


export default {
	el: '#customerJewelleryShow',
	components:{
	    videoPlayer,
	    // videoPlayer,
	    ProductViewer,
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
			langs: langsDia.concat(langsEnga,langsWedd),
			invoice: '',
			published: {engagementRings:0, weddingRings:0, jewelleries:0},
			langHref : '/' + window.location.pathname.slice(1,3),
			video360:'',
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
	methods: {
		transJsMet(data,ori,langs){
			return transJs(data,ori,langs)
		},
		fetchData(){
			get(`/api/invoicePosts/${window.location.pathname.slice(23)}`,window.location.pathname.slice(1,3))
			.then((res)=>{
				this.post = res.data.model
				this.invoice = res.data.invoice
				this.ProceedVideoEng()
				this.ProceedVideoWed()
				this.ProceedVideoJew()
				this.ProceedVideoPost()
				this.setPublished()
				this.setVideo360()
			})
		},
		setVideo360(){
			this.video360 = {
				src:this.post.video360, type:"video360", 
				thumb: mutualVar.storage[mutualVar.storage.live] + 'public/video360/' + this.post.video360 +'/thm-0.jpg', 
				size:120 , 
				rotate:1,
				fileName: mutualVar.css.innerWidth<500 ? 'thm-' :'',
				}
		},
		setPublished(){
			if (this.post.invoice.engagement_rings[0]) {
				if (this.post.invoice.engagement_rings[0].published) {
				this.published.engagementRings = this.post.invoice.engagement_rings[0].published
				}
			}

			if (this.post.invoice.wedding_rings[0]) {
				if (this.post.invoice.wedding_rings[0].published) {
				this.published.weddingRings = this.post.invoice.wedding_rings[0].published
				}
			}
			if (this.post.invoice.jewelleries[0]) {
				if (this.post.invoice.jewelleries[0].published) {
				this.published.jewelleries = this.post.invoice.jewelleries[0].published
				}
			}

			
			
		},
		generateOptions(){
			return {
			  muted: true,
              language: 'en',
              playbackRates: [0.7, 1.0, 1.5, 2.0],
              sources: [{
                type: "video/mp4",
                src: "/videos/"
              }],
              poster: "/images/" ,
              fluid: true,
              autoplay:'',
          	}
		},
		ProceedVideoEng(){
			var opt = this.generateOptions()

			if (this.post.invoice.engagement_rings[0]) {
				if (this.post.invoice.engagement_rings[0].published) {
					this.videoOpts[0].videoEng = opt
					this.videoOpts[0].videoEng.sources[0].src = this.videoPath + this.post.invoice.engagement_rings[0].video
					this.videoOpts[0].videoEng.poster = this.imagePath + this.post.invoice.engagement_rings[0].images.filter( img => img.type == 'cover')[0].image
				}
				
			}

				
		},
		ProceedVideoWed(){

			var opt = this.generateOptions()

			if (this.post.invoice.wedding_rings[0]) {
				if (this.post.invoice.wedding_rings[0].published) {
					this.videoOpts[1].videoWed = opt
					this.videoOpts[1].videoWed.sources[0].src = this.videoPath + this.post.invoice.wedding_rings[0].video
					this.videoOpts[1].videoWed.poster = this.imagePath + this.post.invoice.wedding_rings[0].images.filter(img=>img.type == 'cover')[0].image
				}
				
			}

				
		},
		ProceedVideoPost(){

			var opt = this.generateOptions()

			if (this.post.video) {
				this.videoOpts[3].videoPost = opt
				this.videoOpts[3].videoPost.sources[0].src = this.videoPath + this.post.video
				this.videoOpts[3].videoPost.poster = this.imagePath + this.post.images.filter(img=>img.type == 'cover')[0].image
			}

				
		},
		ProceedVideoJew(){

			var opt = this.generateOptions()

			if (this.post.invoice.jewelleries[0] && this.post.invoice.jewelleries[0].type != 'Misc') {
				if (this.post.invoice.jewelleries[0].published) {
					this.videoOpts[2].videoJew = opt
					this.videoOpts[2].videoJew.sources[0].src = this.videoPath + this.post.invoice.jewelleries[0].video
					this.videoOpts[2].videoJew.poster = this.imagePath + this.post.invoice.jewelleries[0].images.filter(img=>img.type == 'cover')[0].image
				}
				
			}

				
		}
	}
}
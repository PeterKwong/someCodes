import { get } from '../../../helpers/api'

import langs from '../../../langs/customerJewellry'
import {videoPlayer} from '../../../../../node_modules/vue-video-player/dist/vue-video-player'

export default {
		el: '#home',
		components: {
        videoPlayer,
		},
		data(){
		return {
			langs,
			activedSubTab: 'carat',	
		}
	},
	watch:{
		'$route': 'fetchData'
	},
	beforeMount(){
		mutualVar.notification.contactMessage = { active: document.head.querySelector('meta[name="homePageShow"]').content == 1 ?true:false,
												  trans:false,
												  data:[`${document.head.querySelector('meta[name="homePage"]')?document.head.querySelector('meta[name="homePage"]').content:null}`],
												  title: '溫馨提示',
												  type: 'is-info',
												  next:{ nextUrl: mutualVar.langs.locale + 'about-us', nextText: ' 如有問題，請查詢'},
												}


	},
	computed:{
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
			},

		},
	methods:{
		activeSubTab(tab){
			this.activedSubTab = tab
		}
	}
}
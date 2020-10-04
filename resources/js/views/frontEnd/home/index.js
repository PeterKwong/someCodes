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
		mutualVar.notification.contactMessage = { active: false,
												  trans:false,
												  data:['🌕中秋節🌕' + "\n" +
														'🎉🎉2020年10月1 日(星期四)為中秋節假期，本公司營業時間將更改為1pm-6pm，敬請留意🤓' + "\n" +
														'*如有任何查詢，歡迎FB inbox或 WhatsApp我們，我們會盡快於10月2日(星期五)回覆，謝謝支持🥳' + "\n" +
														'💎祝大家中秋節快樂💎' + "\n" ],
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
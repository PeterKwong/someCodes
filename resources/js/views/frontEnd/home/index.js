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
												  data:['【休息啟示】2020年1月1 日(星期三)' + "\n" +
														'為元旦假期，本公司將休息一天，敬請留意。' + "\n" +
														'*如有任何查詢，歡迎FB inbox或 WhatsApp我們，' + "\n" +
														'我們會盡快於1月2日(星期四)回覆，謝謝支持🥳' + "\n" + 
												  		'祝大家新年快樂😀'],
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
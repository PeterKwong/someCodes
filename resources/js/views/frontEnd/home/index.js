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
												  data:['Ting Diamond  祝大家冬至快樂、身體健康、團團圓圓!   ' + "\n" +
														'今日辦公時間為 下午一點至六點' + "\n" +
														'如需看指定4C條件的鑽石, 需提早1-2個工作天預約時間' + "\n" +
														'*如有任何查詢，歡迎FB inbox或 WhatsApp 或者 可以到我們網站上查看，我們會盡快於回覆，謝謝支持🥳' + "\n" ],
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
import { getLocale, getLocaleCode, getCurrentURl } from './locale'
import { fetchLocalStorage, sendLocalStorage } from './local-storage'

import {getMeta} from './getMeta'
window.getMeta = getMeta

import {draggableItem} from './draggableItem'
window.draggableItem = draggableItem

export default {
	cookiesInfo:{
			cookieLast: 60,
			diamondSearch:'',
			engagementSearch:'',
			weddingRingSearch: '',
			jewellery: '',
            coupon_code:'',
            shoppingCart:{
                        items:[], 
                        haveShoppingCart:0,
                        selectingIndex: 0, 
                        selectingPairIndex: 0,
                        selectingType: '',
                        modalActive:0,
	                    mode:'create',
                        },
            checkout:{
                    balancePaymentMethod:'VISA',
                    subTotal:0,
                    discountedSubTotal:0,
                    discountedDeposit:0,
                    deposit:0,
                    depositPaymentMethod:'VISA',
                    balance:0,
                    processingOrderId:'',
                },            
            shoppingCartCarousel:{
            	items:[]
            	},
            fetchCookies:fetchLocalStorage,
            sendCookies:sendLocalStorage,
                	
	   	},
    notification:   {
                state: {
                    success: null,
                    error: null,
                    },
            },
    langs:{
        localeCode: getLocaleCode(),
        locale: getLocale(),
    },
    storage:{
        live: 'cfront',
        s3:'https://s3.tingdiamond.com/',
        cfront: getMeta('meta-js-' + 'cfront'),

    },
    screen:{x:0, y: 0, scrollable:false },
    namepath: getCurrentURl(),
    css:{
        jsReady:true,
        innerWidth:0,
    },
    tabs:{ sideBar:'4cs'},
    status:{ isProcessing: false},
    components:{slider:''},
    vComponents:[],
    lw:{
        customerJewellery:{
            engagementRings:'',
            weddingRings:'',
            jewelleries:'',
            show:{videoSelecting:''},
            }
        }


}
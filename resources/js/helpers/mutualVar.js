import { getLocale, getLocaleCode, getCurrentURl } from './locale'

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
            	}
                	
	   	},
    notification:   {
                state: {
                    success: null,
                    error: null
                    },
                contactMessage:{
                        active: false,
                        title:'',
                        data:[],
                        type:'',
                        trans: true,
                        next:{nextUrl:'', nextText:''},
                    },
            },
    langs:{
        localeCode: getLocaleCode(),
        locale: getLocale(),
    },
    storage:{
        live: 'cfront',
        s3:'https://s3.tingdiamond.com/',
        cfront:'https://cfr.tingdiamond.com/',

    },
    namepath: getCurrentURl(),
    viewer:{
        src:''
    },



}
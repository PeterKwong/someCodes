import { setCookie, getCookie, } from './cookie'
import {queryString} from './queryString'

export default{
    storage:{
        live: 'cfront',
        s3:'https://s3.tingdiamond.com/',
        cfront:'https://cfr.tingdiamond.com/',

    },
    queryString: { search: window.location.search,
                    page: queryString('p=[0-9]*','p='),
                    pePage: queryString('pp=[0-9]*','pp='),
                    searchQuery: queryString('sq1=[0-9]*','sq1='),
                },
	theme:{dark:'', light:'light/'},
	user:{role: document.head.querySelector('meta[name="user-role"]')?document.head.querySelector('meta[name="user-role"]').content:'' },
	setCookie,
	getCookie,	


}
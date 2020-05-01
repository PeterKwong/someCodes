import { setCookie, getCookie, } from './cookie'

export default{
    storage:{
        live: 'cfront',
        s3:'https://s3.tingdiamond.com/',
        cfront:'https://cfr.tingdiamond.com/',

    },
    queryString: window.location.search,
	theme:{dark:'', light:'light/'},
	user:{role: document.head.querySelector('meta[name="user-role"]')?document.head.querySelector('meta[name="user-role"]').content:'' },
	setCookie,
	getCookie,	

}
import { setCookie, getCookie, } from './cookie'

export default{
    storage:{
        live: 'cfront',
        s3:'https://s3.tingdiamond.com/',
        cfront:'https://cfr.tingdiamond.com/',

    },
    queryString: window.location.search,
	theme:{dark:'', light:'light/'},
	setCookie,
	getCookie,	

}
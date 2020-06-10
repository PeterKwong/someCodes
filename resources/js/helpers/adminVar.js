import { setCookie, getCookie, } from './cookie'
import {queryString, queryStringArray} from './queryString'
import { getGoldPrice } from'./APIs/goldPrice'

export default{
    storage:{
        live: 'cfront',
        s3:'https://s3.tingdiamond.com/',
        cfront:'https://cfr.tingdiamond.com/',

    },
    queryString: { search: window.location.search,
                    page: parseInt(queryString('p=[0-9]*','p=')),
                    pePage: parseInt(queryString('pp=[0-9]*','pp=')),
                    searchColumn: queryString('column=[a-z0-9A-Z]*','column='),
                    searchQuery: parseInt(queryString('sq1=[0-9]*','sq1=')),
                    query:queryString,
                    queryArray:queryStringArray,
                },
	theme:{dark:'', light:'light/'},
	user:{role: document.head.querySelector('meta[name="user-role"]')?document.head.querySelector('meta[name="user-role"]').content:'' },
	setCookie,
	getCookie,
    backendFetch:{},
    APIs:{
        goldPrice:getGoldPrice(),
    },

}
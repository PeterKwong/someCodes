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
                    column: queryString('column=[a-z0-9A-Z._-]*','column='),
                    searchColumn: queryString('sc=[a-z0-9A-Z._-]*','sc='),
                    searchQuery: queryString('sq1=[a-z0-9A-Z._-]*','sq1='),
                    query:queryString,
                    queryArray:queryStringArray,
                },
	theme:{dark:'', light:'light/'},
	user:{role: document.head.querySelector('meta[name="user-role"]')?document.head.querySelector('meta[name="user-role"]').content:'' },
	setCookie,
	getCookie,
    backendFetch:{},
    params:{},
    APIs:{
        goldPrice:getGoldPrice(),
    },
    form:{},
    

}
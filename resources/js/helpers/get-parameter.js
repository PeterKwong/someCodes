// export function getParameter(param){
// 	return getParameterByName(param)
// }
export function setParams(query,type,param,string,unique){
	var strings =''
	var url = ''
    for (var i = 0; query[type].length > i; i++) {
        
        strings = getParameterByName(query[type][i])

        if (strings || query[type][i] == param) {
            if (query[type][i] == param) {
            // console.log('strings',unique)
                if (!strings||unique) {

                    if (string != 'clear') {
                        strings = string
                    }else{
                        strings =''
                    }
                    // console.log('strings','clear',strings)
                }else{
                    strings = toogleParameter(strings,string)
                }
            }

            // console.log('strings',unique)
            if(strings.length){
                url = url + query[type][i] +'=' + strings
                if (query[type].length-1 != i) {
                    url = url + '&'
                }
            }
            // console.log('url',url, query[type][i])

        }
    }
    url =  '?' + url
    setUrl(url)
    
}
export function setUrl(url){
    window.history.pushState("","", '/'+mutualVar.langs.locale +mutualVar.namepath + url)
}
function toogleParameter(results,string){

	if (results) {

		results = results.split(',')

	    if (results.includes(string)) {
			// console.log('d1',results)
		    results = results.filter((q)=>{return q != string})
		    // console.log('d',results)
	    }else{
	    	results = results.concat(string)
	    	results = results.toString()
	    }
	}else{
		results = string
	}

	return results
}
function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
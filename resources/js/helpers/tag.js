export function updateTag(type,tag){
	var results = getParameterByName(type)
	var url = ''

	console.log('results',results)

	if (results) {
		var d = []

		d = results.split(',')

	    if (d.includes(tag)) {
			console.log('d1',d)
		    d = d.filter((q)=>{return q != tag})

		    console.log('d',d)
	    }else{
	    	d = d.concat(tag)
	    	d = d.toString()
	    }
	    url =  '?'+ type +'=' + d
	}else{
		url = '?'+ type +'=' +tag 
	}

    window.history.pushState("","", '/'+mutualVar.langs.locale +mutualVar.namepath + url)

	console.log('resu',results)
}
function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
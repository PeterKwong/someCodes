export function queryString(pattern,replace) {
	return query(pattern,replace)
}

export function queryStringArray(string) {
		var data = {}

		for (var i = string.length - 1; i >= 0; i--) {
			var str = string[i] + '='
			str = query('(' +str+ '.*?)\&', str)
			// console.log(str)
			str = { [string[i]]  : str}
			var data = Object.assign( data, str )

		}

	return data
}

function query(pattern,replace){
        if (window.location.search.includes(replace)) {
        var q = new RegExp(pattern, 'i')
        q = q.exec(window.location.search)[1].toString()
        // console.log(q)
        return q.replace(replace,'')
    }
}
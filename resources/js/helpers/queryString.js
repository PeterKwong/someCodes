export function queryString(pattern,replace) {
                if (window.location.search.includes(replace)) {
                    var q = new RegExp(pattern, 'i')
                    q = q.exec(window.location.search).toString()
                    return q.replace(replace,'')
                }
}
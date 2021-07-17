export function fetchLocalStorage(name,data){
	if (localStorage.getItem(name)) {
	    data= JSON.parse(decodeURIComponent(localStorage.getItem(name)))
	}
	return data
}
export function sendLocalStorage(name,data){
    var cookies = data
    localStorage.setItem(name, encodeURIComponent(JSON.stringify(cookies)), 10080)
    return data

}
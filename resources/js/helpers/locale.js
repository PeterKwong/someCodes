export default {
	temp:{
	currentLocale: '',
	lastUrl: ''
	},
	setLocale(locale){
		this.temp.currentLocale = locale
	},
	setLastUrl(url){
		this.temp.lastUrl = url
	},
}

export function getLocaleCode(){
	var location = {
					'en':0,
					'hk':1,
					'cn':2
			}

	return location[window.location.pathname.slice(1,3)]
}

export function getLocale(){
	return window.location.pathname.slice(0,3)
}

export function getCurrentURl(){
	return window.location.pathname.slice(3)
}
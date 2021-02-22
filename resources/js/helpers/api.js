import Auth from '../store/auth'
import Locale from '../helpers/locale'
import {getCookie }from '../helpers/cookie'

var header = {'Authorization' : `Bearer ${decodeURI( getCookie('api-token'))}`,}

export function curlGet(url){
	// lang = this.$route.fullPath.slice(0,3)
	// Locale.setLastUrl(url)
	return axios({
		method: 'GET',
		url: url,
		headers: {
			 'Content-Type': 'application/json',
			 'Accept-Encoding': 'gzip, deflate'
		}
	})
}

export function rapPost(url, data){
	return axios({
		method: 'POST',
		url: url,
		data: data,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded',
		}
	})

}



export function get(url){
	// lang = this.$route.fullPath.slice(0,3)
	// Locale.setLastUrl(url)
	return axios({
		method: 'GET',
		url: url,
		headers: header
	})
}

export function post(url, data){
	return axios({
		method: 'POST',
		url: url,
		data: data,
		headers: header
	})

}


export function put(url, data){
	return axios({
		method: 'PUT',
		url: url,
		data: data,
		headers: header
	})

}

export function del(url){
		return axios({
		method: 'DELETE',
		url: url,
		// data: data,
		headers: header
	})
}
import axios from 'axios'
import Auth from '../store/auth'
import Locale from '../helpers/locale'


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
		headers: {
			'Authorization' : `Bearer ${Auth.state.api_token}`,
			'api_token' : Auth.state.api_token,
			'X-localization' : window.location.pathname.slice(1,3)
		}
	})
}

export function authGet(url){
	// lang = this.$route.fullPath.slice(0,3)
	// Locale.setLastUrl(url)
	return axios({
		method: 'GET',
		url: url,
		headers: {
			'Authorization' : `Bearer ${document.head.querySelector('meta[name="api-token"]')?document.head.querySelector('meta[name="api-token"]').content:null}`,
			'X-localization' : window.location.pathname.slice(1,3)
		}
	})
}

export function post(url, data){
	return axios({
		method: 'POST',
		url: url,
		data: data,
		headers: {
			'Authorization' : `Bearer ${Auth.state.api_token}`,
			'X-localization' : window.location.pathname.slice(1,3)
			 // 'Content-Type': 'application/json',
		}
	})

}


export function put(url, data){
	return axios({
		method: 'PUT',
		url: url,
		data: data,
		headers: {
			'Authorization' : `Bearer ${Auth.state.api_token}`
		}
	})

}

export function del(url){
		return axios({
		method: 'DELETE',
		url: url,
		// data: data,
		headers: {
			'Authorization' : `Bearer ${Auth.state.api_token}`
		}
	})
}
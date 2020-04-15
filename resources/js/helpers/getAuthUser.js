export default {
	
		api_token: document.head.querySelector('meta[name="api-token"]')?document.head.querySelector('meta[name="api-token"]').content:null,
		user_id: document.head.querySelector('meta[name="user-id"]')?document.head.querySelector('meta[name="user-id"]').content:null,

}
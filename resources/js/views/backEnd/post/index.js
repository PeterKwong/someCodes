
import { get } from '../../../helpers/api'
	
export default {
	data(){
		return {
			posts: []
		}
	},
	created(){
		get(`/api/posts`)
		.then((res)=>{
			this.posts = res.data.posts
		})
	}
}

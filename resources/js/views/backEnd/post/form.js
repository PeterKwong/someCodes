
import Vue from 'vue'
import Flash from '../../../helpers/flash'
import { get, post } from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/form'
import ImageUpload from '../../../components/ImageUpload.vue'

export default {
	components: {
		ImageUpload
	},
	data(){
		return{
			form: {
				images:''
			},
			error: {},
			isProcessing: false,
			initializeURL: `/api/posts/create`,
			storeURL: `/api/posts`,
			action: 'Create'
		}
	},
	created(){
		if (this.$route.meta.mode === 'edit') {
			this.initializeURL = `/api/posts/${this.$route.params.id}/edit`
			this.storeURL = `/api/posts/${this.$route.params.id}?_method=PUT`
			this.action = 'Update'
		}
		get(this.initializeURL)
			.then((res)=>{
			Vue.set(this.$data, 'form', res.data.form)
		})
	},
	methods: {
		save(){
			this.isProcessing = true
			const form = toMulipartedForm(this.form, this.$route.meta.mode)
			post(this.storeURL, form)
				.then((res)=>{
					if (res.data.saved) {
						Flash.setSuccess(res.data.message)
						this.$router.push(`/posts/${res.data.id}`)
					}
					
				this.isProcessing = false

				})
				.catch((err)=>{
					if (err.response.status === 422) {
						this.error = err.response.data
					}
				this.isProcessing = false
				})
		},
		addDirection(){
			this.form.directions.push({description: ''})
		},
		addIngredient(){
			this.form.ingredients.push({
				name: '',
				qty: ''
			})
		},
		remove(type, index){
			if (this.form[type].length > 1) {
				this.form[type].splice(index,1)
			}
		}
	}
}

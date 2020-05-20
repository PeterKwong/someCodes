
import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/form'	
import ImageUpload from '../../../components/ImageUpload.vue'
import VideoUpload from '../../../components/VideoUpload.vue'

import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/engagementRings'


export default {
	el:'#engagementRingForm',
	components: {
		ImageUpload,
		VideoUpload
	},
	data(){
		return {
			form:'',
			isProcessing: false,
			langs,
			errors: {},
			option: {},
			title: 'Create',
			initialize: '/api/engagementRings/create',
			redirect: '/adm',
			storeURL: '/api/engagementRings',
			method: 'post',
			goldPrice: adminVar.APIs.goldPrice,
		}
	},
	beforeMount(){
		if (window.location.pathname.includes('edit')) {
			this.title = 'Edit'
			this.initialize = '/api/engagementRings/' + this.getIdReg() + '/edit'
			this.storeURL = `/api/engagementRings/${this.getIdReg()}?_method=PUT`
			this.method = 'put'
		}
		this.fetchData()
	},
	watch: {
		'$route' : 'fetchData'
	},
	methods: {
		fetchData(){
			get(this.initialize)
				.then((response)=>{
					Vue.set(this.$data, 'form', response.data.form)
					Vue.set(this.$data, 'option', response.data.option)
				})
				.catch(function(error){
					console.log(error)
				})
		},
		save(){
			this.isProcessing = true
			const form = toMulipartedForm(this.form)
			post(this.storeURL, form)
			.then((response)=>{
				if(response.data.saved){
					window.open(this.redirect,'_self')
				}
				this.isProcessing = false
			})
			.catch((err)=>{
				if (err.response.status === 422) {
					this.errors = err.response.data.errors
				}
				this.isProcessing = false
			})
				
				
		},
		getIdReg(){
			var txt = window.location.pathname.slice(22)
			var pattern = new RegExp('[0-9]*', 'i')
			 return pattern.exec(txt);
		},		
		addImage(){
			this.form.images.push({'image':'',
									'type':''})
		},
		autoTitle(){

			for (var i=0; this.form.texts.length > i ; i++) {
				this.form.texts[i].content =  transJs(this.form.prong,this.langs,i) +' '+ transJs(this.form.shoulder,this.langs,i) +' '+transJs(this.form.style,this.langs,i) +' '+transJs( 'Engagement Ring',this.langs,i)				
			}
			
		},


	}
		


}

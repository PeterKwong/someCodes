
import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/form'	
import ImageUpload from '../../../components/ImageUpload.vue'
import VideoUpload from '../../../components/VideoUpload.vue'
import UploadMultiImage from '../../../components/UploadMultiImage.vue'

import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/engagementRings'

export default {
	el:'#engagementRingForm',
	components: {
		ImageUpload,
		VideoUpload,
		UploadMultiImage,
	},
	data(){
		return {
			form:'',
			adminVar,
			isProcessing: false,
			langs,
			errors: {},
			option: {},
			title: 'Create',
			initialize: '/api/engagementRings/create',
			redirect: '/adm/engagement-rings',
			storeURL: '/api/engagementRings',
			method: 'post',
			price:{metal:0, diamond:0 },
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
	computed:{
		calculatedRoundedPrice(){
			var price = 0
			this.price.diamond = this.form.ct * 8000
			this.price.metal = this.form.metal_weight * this.goldPrice
			price = Math.round( (this.price.diamond + this.price.metal)/100 ) * 100
			this.form.unit_price = price + parseInt(this.form.cost)
			return price
		},
		goldPrice(){
			var price = 0
			price = adminVar.APIs.goldPrice['metal' + this.form.metal]
			return price
		},

	},
	watch: {
		'$route' : 'fetchData'
	},
	methods: {
		fetchData(){
			get(this.initialize)
				.then((res)=>{
					Vue.set(this.$data, 'form', res.data.form)
					Vue.set(this.$data, 'option', res.data.option)
					adminVar.form = this.form
				})
				.catch(function(error){
					console.log(error)
				})
		},
		save(){
			this.isProcessing = true
			const form = toMulipartedForm(this.form)
			post(this.storeURL, form)
			.then((res)=>{
				if(res.data.saved){
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


import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/weddingRingForm'	
import ImageUpload from '../../../components/ImageUpload.vue'
import VideoUpload from '../../../components/VideoUpload.vue'

import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/weddingRings'


export default {
	el:'#weddingRingForm',
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
			initialize: '/api/weddingRings/create',
			redirect: '/adm',
			storeURL: '/api/weddingRings',
			method: 'post',
			video:'',
			test:[]
		}
	},
	beforeMount(){
		if ( window.location.pathname.includes('edit') ) {
			this.title = 'Edit'
			this.initialize = '/api/weddingRings/' +  this.getIdReg() + '/edit'
			this.storeURL = `/api/weddingRings/${ this.getIdReg()}?_method=PUT`
			this.method = 'put'
		}
		this.fetchData()
	},
	watch: {
		'$route' : 'fetchData'
	},
	computed:{
		withSideStone(){
			if (this.form[0].ct != 0 ) {
				this.form[0].sideStone = 1
				this.form[1].sideStone = 1
			}else{
				this.form[0].sideStone = 0
				this.form[1].sideStone = 0
			}

			if (this.form[1].ct != 0 ) {
				this.form[0].sideStone = 1
				this.form[1].sideStone = 1
			}else{
				this.form[0].sideStone = 0
				this.form[1].sideStone = 0
			}
			
			
		}
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
					if (err.response.status ==422) {
						this.errors = err.response.data.errors
					}
					this.isProcessing = false
				})
				
		},
		getIdReg(){
			var txt = window.location.pathname.slice(19)
			var pattern = new RegExp('[0-9]*', 'i')
			 return pattern.exec(txt);
		},
		addImage(id){
			this.form[id].images.push({'image':'', 'type':''})
		},
		delForm(id){
				this.form.splice(id,id+1)
			
		},
		autoTitle(){

			for (var i=0; this.form[0].texts.length > i ; i++) {
				this.form[0].texts[i].content =  transJs(this.form[0].metal,this.langs,i) +' '+ transJs(this.form[0].style,this.langs,i) +' '+ transJs(this.form[0].gender,this.langs,i) 	
			}
			for (var i=0; this.form[1].texts.length > i ; i++) {
				this.form[1].texts[i].content =  transJs(this.form[1].metal,this.langs,i) +' '+ transJs(this.form[1].style,this.langs,i) +' '+ transJs(this.form[1].gender,this.langs,i) 		
			}
			
		},

	},
		

}

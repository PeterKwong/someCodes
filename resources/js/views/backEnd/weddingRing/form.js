
import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/form'
import ImageUpload from '../../../components/ImageUpload.vue'
import VideoUpload from '../../../components/VideoUpload.vue'
import UploadMultiImage from '../../../components/UploadMultiImage.vue'

import { transJs } from '../../../helpers/transJs'
import langs from '../../../langs/weddingRings'


export default {
	el:'#weddingRingForm',
	components: {
		ImageUpload,
		VideoUpload,
		UploadMultiImage,
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
			redirect: '/adm/wedding-rings',
			storeURL: '/api/weddingRings',
			method: 'post',
			video:'',
			test:[],
			price:[{metal:0, diamond:0 }, {metal:0, diamond:0 },],

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
			if (this.form.weddingRings[0].ct != 0 ) {
				this.form.weddingRings[0].sideStone = 1
				this.form.weddingRings[1].sideStone = 1
			}else{
				this.form.weddingRings[0].sideStone = 0
				this.form.weddingRings[1].sideStone = 0
			}

			if (this.form.weddingRings[1].ct != 0 ) {
				this.form.weddingRings[0].sideStone = 1
				this.form.weddingRings[1].sideStone = 1
			}else{
				this.form.weddingRings[0].sideStone = 0
				this.form.weddingRings[1].sideStone = 0
			}
			
			
		},
		calculatedRoundedPrice(){
			var prices = [
						{price:0},
						{price:0}
						]
			for (var i = 0; prices.length > i ; i++) {
				this.price[i].diamond = this.form.weddingRings[i].ct * 8000
				this.price[i].metal = this.form.weddingRings[i].metal_weight * this.goldPrice
				prices[i].price = Math.round( (this.price[i].diamond + this.price[i].metal)/100 ) * 100
				this.form.weddingRings[i].unit_price = prices[i].price + parseInt(this.form.weddingRings[i].cost)
			}
			
			return prices
		},
		goldPrice(){
			var price = 0
			price = adminVar.APIs.goldPrice['metal' + this.form.weddingRings[0].metal]
			return price
		},
		calculatedRoundedPrice1(){
			var price = 0
			this.price[1].diamond = this.form.weddingRings[1].ct * 8000
			this.price[1].metal = this.form.weddingRings[1].metal_weight * this.goldPrice1
			price = Math.round( (this.price[1].diamond + this.price[1].metal)/100 ) * 100
			this.form.weddingRings[1].unit_price = price + parseInt(this.form.weddingRings[1].cost)
			return price
		},
		goldPrice1(){
			var price = 0
			price = adminVar.APIs.goldPrice['metal' + this.form.weddingRings[1].metal]
			return price
		},
	},
	methods: {
		fetchData(){
			get(this.initialize)
				.then((response)=>{
					Vue.set(this.$data, 'form', response.data.form)
					Vue.set(this.$data, 'option', response.data.option)
					adminVar.form = this.form
				})
				.catch(function(error){
					console.log(error)
				})
		},
		save(){
				this.isProcessing = true
				const form = toMulipartedForm(this.form)
				console.log(form)
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
			this.form.images.push({'image':'', 'type':''})
		},
		delForm(id){
				this.form.weddingRings.splice(id,id+1)
			
		},
		autoTitle(){

			for (var i=0; this.form.weddingRings[0].texts.length > i ; i++) {
				this.form.weddingRings[0].texts[i].content =  transJs(this.form.weddingRings[0].metal,this.langs,i) +' '+ transJs(this.form.weddingRings[0].shape,this.langs,i) +' '+ transJs(this.form.weddingRings[0].finish,this.langs,i) +' '+ transJs(this.form.weddingRings[0].gender,this.langs,i) 	
			}
			for (var i=0; this.form.weddingRings[1].texts.length > i ; i++) {
				this.form.weddingRings[1].texts[i].content =  transJs(this.form.weddingRings[1].metal,this.langs,i) +' '+ transJs(this.form.weddingRings[1].shape,this.langs,i) +' '+ transJs(this.form.weddingRings[1].finish,this.langs,i) +' '+ transJs(this.form.weddingRings[1].gender,this.langs,i) 		
			}
			
		},

	},
		

}

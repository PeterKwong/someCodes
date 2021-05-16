
import {toMulipartedForm} from '../../../helpers/form'
import ImageUpload from '../../../components/ImageUpload.vue'
import VideoUpload from '../../../components/VideoUpload.vue'
import UploadMultiImage from '../../../components/UploadMultiImage.vue'

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
			adminVar,
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
			prices:[{metalPrice:0, metal:0, diamond:0 }, {metalPrice:0, metal:0, diamond:0 },],

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
		calculatedRoundedPrices(){
			var prices = [
						{price:0},
						{price:0}
						]
			this.form.unit_price = 0
			for (var i = 0; prices.length > i ; i++) {
				this.prices[i].diamond = this.form.wedding_rings[i].ct * 8000
				this.prices[i].metalPrice = adminVar.APIs.goldPrice['metal' + this.form.wedding_rings[i].metal]
				this.prices[i].metal = this.form.wedding_rings[i].metal_weight * this.prices[i].metalPrice
				prices[i].price = Math.round( (this.prices[i].diamond + this.prices[i].metal)/100 ) * 100
				this.form.wedding_rings[i].unit_price = prices[i].price + parseInt(this.form.wedding_rings[i].cost)
				this.form.unit_price += this.form.wedding_rings[i].unit_price
			}
			
			return prices
		},

	},
	methods: {
		fetchData(){
			get(this.initialize)
				.then((response)=>{
					this.$data.form = response.data.form
					this.$data.option = response.data.option
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
				this.form.wedding_rings.splice(id,id+1)
			
		},
		autoTitle(){

			for (var i=0; this.form.wedding_rings[0].texts.length > i ; i++) {
				this.form.wedding_rings[0].texts[i].content =  transJs(this.form.wedding_rings[0].metal,this.langs,i) +' '+ transJs(this.form.wedding_rings[0].shape,this.langs,i) +' '+ transJs(this.form.wedding_rings[0].finish,this.langs,i) +' '+ transJs(this.form.wedding_rings[0].gender,this.langs,i) 	
			}
			for (var i=0; this.form.wedding_rings[1].texts.length > i ; i++) {
				this.form.wedding_rings[1].texts[i].content =  transJs(this.form.wedding_rings[1].metal,this.langs,i) +' '+ transJs(this.form.wedding_rings[1].shape,this.langs,i) +' '+ transJs(this.form.wedding_rings[1].finish,this.langs,i) +' '+ transJs(this.form.wedding_rings[1].gender,this.langs,i) 		
			}
			
		},

	},
		

}

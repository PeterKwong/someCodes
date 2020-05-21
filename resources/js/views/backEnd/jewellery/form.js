
import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/form'	
import ImageUpload from '../../../components/ImageUpload.vue'	
import VideoUpload from '../../../components/VideoUpload.vue'

import { transJs } from '../../../helpers/transJs'
import langsJew from '../../../langs/jewelleries'
import langsDia from '../../../langs/diamondViewer'
import langsEnga from '../../../langs/engagementRings'
import langsWedd from '../../../langs/weddingRings'



export default {
	el:'#jewelleryForm',
	components: {
		ImageUpload,
		VideoUpload
	},
	data(){
		return {
			form: {
				cover:'',
				image1:'',
				image2:''
			},
			isProcessing: false,
			langs: langsDia.concat(langsEnga,langsWedd, langsJew),
			errors: {},
			option: {},
			title: 'Create',
			initialize: '/api/jewellery/create',
			redirect: '/adm/jewellery',
			storeURL: '/api/jewellery',
			method: 'post',
			video:'',
			price:{metal:0, diamond:0 },
		}
	},
	beforeMount(){
		if ( window.location.pathname.includes('edit') ) {
			this.title = 'Edit'
			this.initialize = '/api/jewellery/' + this.getIdReg() + '/edit'
			this.storeURL = `/api/jewellery/${this.getIdReg()}?_method=PUT`
			this.method = 'put'
		}
		this.fetchData()
	},
	watch: {
		'$route' : 'fetchData'
	},
	computed:{
		withSideStone(){
			if (this.form.ct != 0 ) {
				this.form.sideStone = '1'
			}else{
				this.form.sideStone = '0'
			}
		},
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
		getIdReg(){
			var txt = window.location.pathname.slice(15)
			var pattern = new RegExp('[0-9]*', 'i')
			 return pattern.exec(txt);
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
		addImage(){
			this.form.images.push({'image':''})
		},
		autoTitle(){

			for (var i=0; this.form.texts.length > i ; i++) {
				this.form.texts[i].content =  transJs(this.form.metal,this.langs,i) +' '+ transJs(this.form.gemstone!=0?this.form.gemstone:'',this.langs,i)  +' '+ transJs(this.form.type,this.langs,i) +' '+ transJs(this.form.setting?'setting':'',this.langs,i) 			
			}
			
		},
			
	}
}

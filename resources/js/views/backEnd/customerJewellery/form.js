
import Vue from 'vue'
import Flash from '../../../helpers/flash'
import { get, post } from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/form'
import ImageUpload from '../../../components/ImageUpload.vue'
import VideoUpload from '../../../components/VideoUpload.vue'

import { transJs } from '../../../helpers/transJs'
import langsJew from '../../../langs/jewelleries'
import langsDia from '../../../langs/diamondViewer'
import langsEnga from '../../../langs/engagementRings'
import langsWedd from '../../../langs/weddingRings'

export default {
	el:'#customerJewelleryForm',
	components: {
		ImageUpload,
		VideoUpload
	},
	data(){
		return{
			option:[],
			form: [],
			langs: langsDia.concat(langsEnga,langsWedd, langsJew),
			errors: {},
			selectedItem: '',
			redirect: '/adm',
			isProcessing: false,
			initializeURL: `/api/invoicePosts/create`,
			storeURL: `/api/invoicePosts`,
			action: 'Create'
		}
	},
	created(){
		if ( window.location.pathname.includes('edit') ) {
			this.initializeURL = `/api/invoicePosts/${this.getIdReg()}/edit`
			this.storeURL = `/api/invoicePosts/${this.getIdReg()}?_method=PUT`
			this.action = 'Update'
		}
		get(this.initializeURL)
			.then((res)=>{
			Vue.set(this.$data, 'form', res.data.form)
			this.assignOption()
			Vue.set(this.$data, 'option', res.data.option.filter((data)=>{return data.id == this.$data.form.invoice_id}))
		})

	},
	computed:{
		optionTitle(){
			return this.option.filter((data)=>{
				return data.id == this.form.invoice_id
			})
		}
	},
	methods: {
		assignOption(){
			if ( window.location.pathname.includes('create') ) {
			this.form.invoice_id = this.getIdReg()
			}
		},

		selectPostType(){
			var list = ['App/EngagementRing','App/WeddingRing','App/Jewellery']

			// alert('hi')
			for (var i = 0; list.length > i; i++) {
				if (this.selectedItem.includes(list[i])){
					this.assignPostable(list[i])
				}

			}
				
		},
		getIdReg(){
			var txt = window.location.pathname.slice(26)
			var pattern = new RegExp('[0-9]*', 'i')
			 return pattern.exec(txt);
		},
		assignPostable(item){
			this.form.postable_type = item			
			item = item.concat('.id_')
			this.form.postable_id = this.selectedItem.replace(item,'')
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
				.catch((error)=>{
					console.log(error.response)
                	this.isProcessing = false
				})
				
		},
		remove(type, index){
			if (this.form[type].length > 1) {
				this.form[type].splice(index,1)
			}
		},
		addImage(){
			this.form.images.push({'image':'',type:''})
		},
		autoTitle(){

			var list = ['App/EngagementRing','App/WeddingRing','App/Jewellery']

			for (var i = 0; list.length > i; i++) {
				if (this.selectedItem.includes(list[i])){
					this.assignPostable(list[i])
				}

			}


			for (var i=0; this.form.texts.length > i ; i++) {
				for (var j = 0; this.option[0].invoice_diamonds.length > j; j++) {
					if (this.selectedItem.includes('App/EngagementRing') && this.option[0].invoice_diamonds[j]) {
						this.form.texts[i].content =  this.option[0].invoice_diamonds[j].weight +' '+ transJs('Carat Diamond Ring',this.langs,i) +', '+ this.option[0].invoice_diamonds[j].color +' '+ transJs('color',this.langs,i) +', '+this.option[0].invoice_diamonds[j].clarity +' '+ transJs('clarity',this.langs,i) + ', '+this.option[0].invoice_diamonds[j].cut +' '+ transJs('cut',this.langs,i) + ', '+this.option[0].invoice_diamonds[j].polish +' '+ transJs('polish',this.langs,i) + ', '+this.option[0].invoice_diamonds[j].symmetry +' '+ transJs('symmetry',this.langs,i) + ', '+this.option[0].invoice_diamonds[j].fluorescence +' '+ transJs('fluorescence',this.langs,i) + ', '
					}
				}
				for (var j = 0; this.option[0].engagement_rings.length > j; j++) {
					if (this.selectedItem.includes('App/EngagementRing') && this.option[0].engagement_rings[j] ) {
					this.form.texts[i].content +=  transJs(this.option[0].engagement_rings[j].prong,this.langs,i) +', '+ transJs(this.option[0].engagement_rings[j].shoulder,this.langs,i) +', '+transJs(this.option[0].engagement_rings[j].style,this.langs,i) +', '+transJs( 'Engagement Ring Setting',this.langs,i) +' '
					}
				}

				if (this.selectedItem.includes('App/WeddingRing') && this.option[0].wedding_rings[0]) {

					this.form.texts[i].content = transJs(this.option[0].wedding_rings[0].metal,this.langs,i) +' '+ transJs(this.option[0].wedding_rings[0].style,this.langs,i) +' '+ transJs(this.option[0].wedding_rings[0].gender,this.langs,i)  +' ' +', '

							+ transJs(this.option[0].wedding_rings[1].metal,this.langs,i) +' '+ transJs(this.option[0].wedding_rings[1].style,this.langs,i) +' '+ transJs(this.option[0].wedding_rings[1].gender,this.langs,i)  +' ' 
					
				}

				for (var j = 0; this.option[0].jewelleries.length > j; j++) {	
					if (this.selectedItem.includes('App/Jewellery') && this.option[0].jewelleries[j] && this.option[0].jewelleries[j].type != 'Misc' && this.selectedItem.includes('App/Jewellery')) {

						this.form.texts[i].content = transJs(this.option[0].jewelleries[j].metal,this.langs,i) +' '+ transJs(this.option[0].jewelleries[j].type,this.langs,i)  +' '
						
					}
				}
								
			}
			
		},
	}
}

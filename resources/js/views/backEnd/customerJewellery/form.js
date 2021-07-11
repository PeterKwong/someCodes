import Flash from '../../../helpers/flash'
import { get, post } from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/form'
import ImageUpload from '../../../components/ImageUpload.vue'
import VideoUpload from '../../../components/VideoUpload.vue'
import UploadMultiImage from '../../../components/UploadMultiImage.vue'


export default {
	el:'#customerJewelleryForm',
	components: {
		ImageUpload,
		VideoUpload,
		UploadMultiImage,
	},
	data(){
		return{
			adminVar,
			option:[],
			form: [],
			langs,
			errors: {},
			tags:[],
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
			this.$data.form = res.data.form
			this.$data.tags = res.data.tags
			this.assignOption()
			this.$data.option = res.data.option.filter((data)=>{return data.id == this.$data.form.invoice_id})
			adminVar.form = this.form
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
			var list = ['App\\Models\\EngagementRing','App\\Models\\WeddingRing','App\\Models\\Jewellery']

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
				// console.log(form)
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
		diamondAssignTag(tagContent,type,batchNumber){
			var vm = this
			var selectedType 

			if (batchNumber > 0) {
				return 
			}

			selectedType = this.tags.filter((tag)=>{ 
					return tag.content.toLowerCase() == type
					})
			// console.log(tagContent)
			this.tags.filter((tag)=>{
				if (tag.content.toLowerCase() == tagContent.toLowerCase() && tag.upper_id == selectedType[0].id) {
					vm.form.page.tags.push(tag)
					// console.log(tag)
				}
			}) 
			
		},
		assignTag(tagContent,type,batchNumber){
			var vm = this

			if (batchNumber > 0) {
				return 
			}

			this.tags.filter((tag)=>{
				if (tag.content == tagContent && tag.type == type) {
					vm.form.page.tags.push(tag)
					// console.log(tag)
				}
			}) 
		},
		priceRange(weight){
			var weights = [
						{ value:0.3, range: '0.3-0.49' },
						{ value:0.5, range: '0.5-0.79' },
						{ value:0.8, range: '0.8-0.99' },
						{ value:1, range: '1.0-1.19' },
						{ value:1.2, range: '1.2-1.49' },
						{ value:1.5, range: '1.5-1.99' },
						{ value:2, range: '2.0-2.99' },
						{ value:3, range: '3.0up' },
						]

			var diamondRange 

			for (var i = 0 ; weights.length > i; i++) {
			// console.log(weights[i].value)
			// console.log(weight)

				if (weight >= weights[i].value) {
					diamondRange = weights[i].range
				}
			}
			// console.log(diamondRange)
			return diamondRange

		},
		autoTitle(){

			var list = ['App\\Models\\EngagementRing','App\\Models\\WeddingRing','App\\Models\\Jewellery']
			var tags 
			var diamondConditions = ['color','shape','clarity','cut','polish','symmetry','fluorescence']
			var engagementConditions = ['style','shoulder','prong']
			var weddingConditions = ['metal','shape','finish','origin','brand','style',]
			var jewelleryConditions = ['metal','gemstone','type',]

			for (var i = 0; list.length > i; i++) {
				if (this.selectedItem.includes(list[i])){
					this.assignPostable(list[i])
				}

			}

			this.form.page.tags = []

			for (var i=0; this.form.texts.length > i ; i++) {
				// for (var j = 0; this.option[0].invoice_diamonds.length > j; j++) {
					var j = this.option[0].invoice_diamonds.length -1
					if (this.option[0].invoice_diamonds[j] ) {
						if (this.selectedItem.includes('App\\Models\\EngagementRing') || this.selectedItem.includes('App\\Models\\Jewellery') ) {
								this.form.texts[i].content =  this.option[0].invoice_diamonds[j].weight +' '+ transJs('Carat Diamond Ring',this.langs,i) +', '+ ''
								this.diamondAssignTag(this.priceRange(this.option[0].invoice_diamonds[j].weight),'weight',i)
									for (var k = 0 ; diamondConditions.length > k; k++) {
										this.form.texts[i].content += this.option[0].invoice_diamonds[j][diamondConditions[k]] +' '+ transJs(diamondConditions[k],this.langs,i) +', '
										this.diamondAssignTag(this.option[0].invoice_diamonds[j][diamondConditions[k]],diamondConditions[k],i)
									}
							}
					}
				// }
				// for (var j = 0; this.option[0].engagement_rings.length > j; j++) {

					j = this.option[0].engagement_rings.length -1
					if (this.selectedItem.includes('App\\Models\\EngagementRing') && this.option[0].engagement_rings[j] ) {

						for (var k = 0 ; engagementConditions.length > k; k++) {
							this.form.texts[i].content += this.option[0].engagement_rings[j][engagementConditions[k]] +' '+ transJs(engagementConditions[k],this.langs,i) +', '
							this.assignTag(this.option[0].engagement_rings[j][engagementConditions[k]],'Engagement Ring',i)
						}
						this.form.texts[i].content += transJs( 'Engagement Ring Setting',this.langs,i) +' '
					}
				// }

				if (this.selectedItem.includes('App\\Models\\WeddingRing') && this.option[0].wedding_rings[0]) {
					for (var k = 0 ; weddingConditions.length > k; k++) {
						console.log(this.option[0].wedding_rings[0][weddingConditions[k]])
						this.form.texts[i].content += transJs(this.option[0].wedding_rings[0][weddingConditions[k]],this.langs,i) +', '
						this.assignTag(this.option[0].wedding_rings[0][weddingConditions[k]],'Wedding Ring',i)
					}
					this.assignTag(this.option[0].wedding_rings[0][weddingConditions[k]]?'sideStone':'No Side-stone','Wedding Ring',i)
					this.form.texts[i].content += transJs(this.option[0].wedding_rings[0].gender,this.langs,i)  +', '

					for (var k = 0 ; weddingConditions.length > k; k++) {
						this.form.texts[i].content += transJs(this.option[0].wedding_rings[1][weddingConditions[k]],this.langs,i) +', '
					}
					this.form.texts[i].content += transJs(this.option[0].wedding_rings[1].gender,this.langs,i)  
					
				}

				for (var j = 0; this.option[0].jewelleries.length > j; j++) {	
					if (this.selectedItem.includes('App\\Models\\Jewellery') && this.option[0].jewelleries[j] && this.option[0].jewelleries[j].type != 'Misc' && this.selectedItem.includes('App\\Models\\Jewellery')) {
						for (var k = 0 ; jewelleryConditions.length > k; k++) {
							this.form.texts[i].content +=  transJs(this.option[0].jewelleries[j][jewelleryConditions[k]],this.langs,i) +', '
							this.assignTag(this.option[0].jewelleries[j][jewelleryConditions[k]],'Jewellery',i)
						}

						
					}
				}
								
			}
			
		},
	}
}

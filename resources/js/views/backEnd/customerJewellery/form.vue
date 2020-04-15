<template>
	<div class="container">		
		<h3 class="title is-3">{{action}} Post</h3>
		<form @submit.prevent="save">
		<div class="field" >

			<div class="columns">

				<div class="column is-2" v-if="option[0]">
					<p>Invoice ID: </p>
					<select class="select" v-model="form.invoice_id" >
						<option v-for="opt in option" >{{opt.id}}</option>
					</select>
				</div>

				<div class="column is-2">
							<select class="select" v-model="form.published">Published
								<option value="0">Draft</option>
								<option value="1">Published</option>
							</select>
				</div>

				<div class="column is-4">
							<label class="label">Publish Date</label>
								<input type="date" class="input" v-model="form.date">
								<small class="is-danger" v-if="errors.date">{{errors.date[0]}}</small>
				</div>

				<div class="column is-4" >
					<p v-if="optionTitle[0]">Title: {{optionTitle[0].title}}</p>
				</div>

			</div>

			<div class="columns">

				<div class="column is-4" v-if="option[0]">
					<p>which Item: </p>
					<select class="select" v-model="selectedItem" @change="selectPostType()">
						<option v-for="jew in option[0].engagement_rings" :value="'App/EngagementRing.id_' + jew.id" >EngagementRing : {{jew.stock}}</option>
						<option v-for="jew in option[0].wedding_rings" :value="'App/WeddingRing.id_' + jew.id" 
						>Wedding Ring : {{jew.stock}}</option>
						<option v-for="jew in option[0].jewelleries" :value="'App/Jewellery.id_' + jew.id" 
						 >Jewellery : {{jew.stock}}</option>
					</select>
				</div>

				<div class="column is-4">
					<p>type : {{form.postable_type}}</p>
				</div>

				<div class="column is-4" >
					<p>ID : {{form.postable_id}}</p>
				</div>

			</div>


			<div class="columns">

				<div class="column is-1">
					<div class="control has-icon-left">
						<div class="control">
							<p class="button is-primary" @click="autoTitle">gen</p>
						</div>
					</div>
				</div>

			</div>
 
			<div class="columns">
                <div class="column is-4">
                    <div class="control ">
                        <div class="control" v-if="form.texts[0]">
                            <label class="label">title - en</label>
                                <input type="text" class="input" v-model="form.texts[0].content" placeholder="title" required>
                                <small class="is-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control" v-if="form.texts[1]">
                            <label class="label">title - hk</label>
                                <input type="text" class="input" v-model="form.texts[1].content" placeholder="title" required>
                                <small class="is-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control" v-if="form.texts[2]">
                            <label class="label">title - cn</label>
                                <input type="description" class="input" v-model="form.texts[2].content" required placeholder="title">
                                <small class="is-danger" v-if="errors.description">{{errors.description[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
						</div>
					</div>
				</div>

            </div>
			
			<div class="columns is-centered">
					<div class="column">
						<p class="button is-primary" @click="addImage">Add Image</p>
					</div>
					
			</div>
			<div class="columns" >
				<div class="column is-4" v-for="(image,index) in form.images">
						<div class="box">
							<label> Image </label>
							<image-upload :name="'images' + index" v-model="form.images[index].image" ></image-upload>
							<small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
							<select v-model="form.images[index].type" required>
								<option value="cover">cover</option>
								<option value="image1">image1</option>
								<option value="image2">image2</option>
								<option value="cert">cert</option>
								<option value="gia_no">Gia No.</option>
								<option value="draft">draft</option>
								<option value="3d">3d</option>
							</select>
						</div>
				</div>
			</div>	
			<div class="columns" >

				<div class="column is-4">
						<div class="box" >
							<label> video</label>
							<video-upload name="video" v-model="form.video" ></video-upload>
							<small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
						</div>
				</div>


				
			</div>		


		<div class="columns is-centered">
					<div class="column">
						<button class="button is-primary" @submit="save" :disabled="isProcessing">Save</button>
					</div>
					
				</div>
		
	</div>
	</form>
		


	</div>
</template>

<script type="text/javascript">
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
				initializeURL: `/api/invPosts/create`,
				storeURL: `/api/invPosts`,
				action: 'Create'
			}
		},
		created(){
			if (this.$route.meta.mode === 'edit') {
				this.initializeURL = `/api/invPosts/${this.$route.params.id}/edit`
				this.storeURL = `/api/invPosts/${this.$route.params.id}?_method=PUT`
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
				if (this.$route.meta.mode === 'create') {
				this.form.invoice_id = this.$route.params.id
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
							this.$router.push(this.redirect)
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
					for (var j = 0; this.option[0].inv_diamonds.length > j; j++) {
						if (this.selectedItem.includes('App/EngagementRing') && this.option[0].inv_diamonds[j]) {
							this.form.texts[i].content =  this.option[0].inv_diamonds[j].weight +' '+ transJs('Carat Diamond Ring',this.langs,i) +', '+ this.option[0].inv_diamonds[j].color +' '+ transJs('color',this.langs,i) +', '+this.option[0].inv_diamonds[j].clarity +' '+ transJs('clarity',this.langs,i) + ', '+this.option[0].inv_diamonds[j].cut +' '+ transJs('cut',this.langs,i) + ', '+this.option[0].inv_diamonds[j].polish +' '+ transJs('polish',this.langs,i) + ', '+this.option[0].inv_diamonds[j].symmetry +' '+ transJs('symmetry',this.langs,i) + ', '+this.option[0].inv_diamonds[j].fluorescence +' '+ transJs('fluorescence',this.langs,i) + ', '
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
</script>
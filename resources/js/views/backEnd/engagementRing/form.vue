<template>
	<div class="container">	
	<h1 class="title is-3">{{title}}</h1>
	<h1 class="title is-3" v-if="option">Latest ID:{{option.id}}</h1>
		<form @submit.prevent="save">
		<div class="field" >

			<div class="columns">
               
                <div class="column is-4">
                            <select class="select" v-model="form.published">Published
                                <option value="0">Draft</option>
                                <option value="1">Published</option>
                            </select>
                </div>
                
            </div>
			<div class="columns">
				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label  class="label">Stock</label>
								<input type="text" class="input" v-model="form.stock" placeholder="stock" required>
								<small class="message is-danger" v-if="errors.stock">
									<div class="message-body">{{errors.stock[0]}}</div>
								</small>
						</div>
					</div>
				</div>

				<div class="column is-1">
					<div class="control has-icon-left">
						<div class="control">
							<p class="button is-primary" @click="autoTitle()">gen</p>
						</div>
					</div>
				</div>

                <div class="column is-3">
                    <div class="control ">
                        <div class="control" v-if="form.texts[0]">
                            <label class="label">title - en</label>
                                <input type="text" class="input" v-model="form.texts[0].content" placeholder="title" required>
                                <small class="message is-danger" v-if="errors.texts">
									<div class="message-body">{{errors.texts[0].content}}</div>
								</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control" v-if="form.texts[0]">
                            <label class="label">title - hk</label>
                                <input type="text" class="input" v-model="form.texts[1].content" placeholder="title" required>
                                <small class="message is-danger" v-if="errors.texts">
									<div class="message-body">{{errors.texts[1].content}}</div>
								</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control" v-if="form.texts[0]">
                            <label class="label">title - cn</label>
                                <input type="description" class="input" v-model="form.texts[2].content" required placeholder="title">
                                <small class="message is-danger" v-if="errors.texts">
									<div class="message-body">{{errors.texts[2].content}}</div>
								</small>
                        </div>
                    </div>
                </div>

            </div>
			

			<div class="columns">


				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label  class="label">Prong</label>
								<select v-model="form.prong" class="select">
									<option value="4-prong">4-prong</option>
									<option value="6-prong">6-prong</option>
								</select>
						</div>
					</div>
				</div>
				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label class="label">Shoulder</label>
								<select v-model="form.shoulder" class="select">
									<option value="Tapering">Tapering</option>
									<option value="Parallel">Parallel</option>
									<option value="Twisted">Twisted</option>
								</select>
						</div>
					</div>
				</div>
				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label  class="label">Style</label>
								<select v-model="form.style" class="select">
									<option value="Solitaire">Solitaire</option>
									<option value="Side-stone">Side-stone</option>
									<option value="Halo">Halo</option>
								</select>
						</div>
					</div>
				</div>
				<div class="column is-2">
					<div class="control ">
						<div class="control">
							<label class="label">Side Stone</label>
								<input type="text" class="input" v-model="form.ct" required>
								<small class="is-danger" v-if="errors.sideStone">{{errors.sideStone[0]}}</small>
						</div>
					</div>
				</div>
				
				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label class="label">Unit Price</label>
								<input type="text" class="input" v-model="form.unit_price" placeholder="unit_price" required>
								<small class="is-danger" v-if="errors.unit_price">{{errors.unit_price[0]}}</small>
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
						<div class="box" v-if="form.images[0]">
							<label> Image </label>
							<image-upload :name="'images' + index" v-model="form.images[index].image" ></image-upload>
							<small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
							<select v-model="form.images[index].type" required>
								<option value="cover">cover</option>
								<option value="image1">image1</option>
								<option value="image2">image2</option>
								<option value="draft">draft</option>
								<option value="3d">3d</option>
							</select>
						</div>
				</div>
			</div>	
			<div class="columns" >

				<div class="column is-4">
						<div class="box">
							<label> video</label>
							<video-upload :name="video" v-model="form.video" ></video-upload>
							<small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
						</div>
				</div>


				
			</div>		


			<div class="columns">
				
			</div>
			
			<div class="columns is-centered">
					<div class="column">
						<button class="button is-primary" @submit="save" :disabled="isProcessing" >Save</button>
					</div>
					
				</div>
		
	</div>
	</form>
</div>
</template>

<script type="text/javascript">
	
	import Vue from 'vue'
	import {get, post, put} from '../../../helpers/api'
	import {toMulipartedForm} from '../../../helpers/form'	
	import ImageUpload from '../../../components/ImageUpload.vue'
	import VideoUpload from '../../../components/VideoUpload.vue'

	import { transJs } from '../../../helpers/transJs'
	import langs from '../../../langs/engagementRings'


	export default {
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
			}
		},
		beforeMount(){
			if (this.$route.meta.mode === 'edit') {
				this.title = 'Edit'
				this.initialize = '/api/engagementRings/' + this.$route.params.id + '/edit'
				this.storeURL = `/api/engagementRings/${this.$route.params.id}?_method=PUT`
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
						this.$router.push(this.redirect)
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
</script>
<template>
	<div class="container">	
	<h1 class="title is-3">{{title}}</h1>
	<h1 class="title is-3" v-if="option">Latest ID:{{option.id}}</h1>
		<form @submit.prevent="save">
		<div class="field" >

		<div class="box" v-if="form[0]">
			<p class="title is-3" @click="delForm(0)"><i class="fa fa-times-circle" aria-hidden="true"></i></p>
			<div class="control has-icon-left">
						<div class="control">
							<label  class="label">Gender</label>
								<select v-model="form[0].gender" class="select">
									<option value="m">Man</option>
									<option value="f">Female</option>
								</select>
						</div>
					</div>
			<div class="columns">
               
                <div class="column is-4">
                            <select class="select" v-model="form[0].published">Published
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
								<input type="text" class="input" v-model="form[0].stock" placeholder="stock" required>
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
                        <div class="control">
                            <label class="label">title - en</label>
                                <input type="text" class="input" v-model="form[0].texts[0].content" placeholder="title" required>
                                <small class="is-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control">
                            <label class="label">title - hk</label>
                                <input type="text" class="input" v-model="form[0].texts[1].content" placeholder="title" required>
                                <small class="is-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control">
                            <label class="label">title - cn</label>
                                <input type="description" class="input" v-model="form[0].texts[2].content" required placeholder="title">
                                <small class="is-danger" v-if="errors.description">{{errors.description[0]}}</small>
                        </div>
                    </div>
                </div>

            </div>
			

			<div class="columns">

				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label  class="label">Style</label>
								<select v-model="form[0].style" class="select">
									<option value="Classic">Classic</option>
									<option value="Japanese">Japanese</option>
									<option value="Vintage">Vintage</option>
								</select>
						</div>
					</div>
				</div>

				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label  class="label">Metal</label>
								<select v-model="form[0].metal" class="select">
									<option value="18KW">18KW</option>
									<option value="18KY">18KY</option>
									<option value="18KR">18KR</option>
									<option value="PT">PT</option>
									<option value="Mixed">Mixed</option>
								</select>
						</div>
					</div>
				</div>
				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label class="label">Customized</label>
								<select v-model="form[0].customized" class="select">
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
						</div>
					</div>
				</div>
				
				<div class="column is-2">
					<div class="control ">
						<div class="control">
							<label class="label">Side Stone</label>
								<input type="text" class="input" v-model="form[0].ct" required>
								<small class="is-danger" v-if="errors.sideStone">{{errors.sideStone[0]}}</small>
						</div>
					</div>
				</div>
				
				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label class="label">Unit Price</label>
								<input type="text" class="input" v-model="form[0].unit_price" placeholder="unit_price" required>
								<small class="is-danger" v-if="errors.unit_price">{{errors.unit_price[0]}}</small>
						</div>
					</div>
				</div>
			</div>

			<div class="columns" >
				<div class="column is-1">
						<p class="button is-primary" @click="addImage(0)">Add Image</p>
				</div>
			</div>
			<div class="columns" >

				<div class="column is-4" v-for="(image,index) in form[0].images">
						<div class="box">
							<label> Image </label>
							<image-upload :name="'image' + index" v-model="form[0].images[index].image" ></image-upload>
							<small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
							<select v-model="form[0].images[index].type">
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
							<video-upload :name="video" v-model="form[0].video" ></video-upload>
							<small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
						</div>
				</div>

			</div>


		</div>	


		<div class="box" v-if="form[1]">
			<p class="title is-3" @click="delForm(1)"><i class="fa fa-times-circle" aria-hidden="true"></i></p>
			<div class="control has-icon-left">
						<div class="control">
							<label  class="label">Gender</label>
								<select v-model="form[1].gender" class="select">
									<option value="m">Man</option>
									<option value="f">Female</option>
								</select>
						</div>
					</div>

			<div class="columns">
               
                <div class="column is-4">
                            <select class="select" v-model="form[1].published">Published
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
								<input type="text" class="input" v-model="form[1].stock" placeholder="stock" required>
								<small class="is-danger" v-if="errors.stock">{{errors.stock[0]}}</small>
						</div>
					</div>
				</div>

                <div class="column is-3">
                    <div class="control ">
                        <div class="control">
                            <label class="label">title - en</label>
                                <input type="text" class="input" v-model="form[1].texts[0].content" placeholder="title" required>
                                <small class="is-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control">
                            <label class="label">title - hk</label>
                                <input type="text" class="input" v-model="form[1].texts[1].content" placeholder="title" required>
                                <small class="is-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control">
                            <label class="label">title - cn</label>
                                <input type="description" class="input" v-model="form[1].texts[2].content" required placeholder="title">
                                <small class="is-danger" v-if="errors.description">{{errors.description[0]}}</small>
                        </div>
                    </div>
                </div>

            </div>
			

			<div class="columns">

				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label  class="label">Style</label>
								<select v-model="form[1].style" class="select">
									<option value="Classic">Classic</option>
									<option value="Japanese">Japanese</option>
									<option value="Vintage">Vintage</option>
								</select>
						</div>
					</div>
				</div>

				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label  class="label">Metal</label>
								<select v-model="form[1].metal" class="select">
									<option value="18KW">18KW</option>
									<option value="18KY">18KY</option>
									<option value="18KR">18KR</option>
									<option value="PT">PT</option>
									<option value="Mixed">Mixed</option>
								</select>
						</div>
					</div>
				</div>
				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label class="label">Customized</label>
								<select v-model="form[1].customized" class="select">
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
						</div>
					</div>
				</div>
				
				<div class="column is-2">
					<div class="control ">
						<div class="control">
							<label class="label">Side Stone</label>
								<input type="text" class="input" v-model="form[1].ct" required>
								<small class="is-danger" v-if="errors.sideStone">{{errors.sideStone[0]}}</small>
						</div>
					</div>
				</div>
				
				<div class="column is-2">
					<div class="control has-icon-left">
						<div class="control">
							<label class="label">Unit Price</label>
								<input type="text" class="input" v-model="form[1].unit_price" placeholder="unit_price" required>
								<small class="is-danger" v-if="errors.unit_price">{{errors.unit_price[0]}}</small>
						</div>
					</div>
				</div>
			</div>

			<div class="columns" >
				<div class="column is-1">
						<p class="button is-primary" @click="addImage(1)">Add Image</p>
				</div>
			</div>
			<div class="columns" >
				<div class="column is-4" v-for="(image,index) in form[1].images">
						<div class="box">
							<label> Image </label>
							<image-upload :name="'image' + index" v-model="form[1].images[index].image" ></image-upload>
							<small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
							<select v-model="form[1].images[index].type" required>
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
							<video-upload :name="video" v-model="form[1].video" ></video-upload>
							<small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
						</div>
				</div>
			</div>

		</div>		


			<div class="columns">
				
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
	import {get, post, put} from '../../../helpers/api'
	import {toMulipartedForm} from '../../../helpers/weddingRingForm'	
	import ImageUpload from '../../../components/ImageUpload.vue'
	import VideoUpload from '../../../components/VideoUpload.vue'

	import { transJs } from '../../../helpers/transJs'
	import langs from '../../../langs/weddingRings'


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
				initialize: '/api/weddingRings/create',
				redirect: '/adm',
				storeURL: '/api/weddingRings',
				method: 'post',
				test:[]
			}
		},
		beforeMount(){
			if (this.$route.meta.mode === 'edit') {
				this.title = 'Edit'
				this.initialize = '/api/weddingRings/' + this.$route.params.id + '/edit'
				this.storeURL = `/api/weddingRings/${this.$route.params.id}?_method=PUT`
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
							this.$router.push(this.redirect)
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
</script>
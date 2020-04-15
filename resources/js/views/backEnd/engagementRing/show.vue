<template>
	<div class="container">
		<nav class="level">
		
		</nav>
		<div class="columns is-centered">
			<div class="column is-9">
				<p class="title is-2">{{model.name}}</p>
			</div>
			<div class="column is-3">
				<router-link :to="'/adm/engagement-rings/' + model.id + '/edit'" class="button is-primary">Edit </router-link>
				<button class="button is-primary" @click="remove">Delete</button>
			</div>
		</div>
		<div class="columns is-centered">
			<div class="column is-2">
				<label>Stock</label>
				<p class="subtitle is-5">{{model.stock}}</p>
			</div>
			<div class="column is-2">
				<label>Unit Price</label>
				<p class="subtitle is-5">{{model.unit_price}}</p>
			</div>
			<div class="column is-3">
				<label>Prong</label>
				<p class="subtitle is-5">{{model.prong}}</p>
			</div>
			<div class="column is-5">
				<label>published</label>
				<p class="subtitle is-5">{{model.published}}</p>
			</div>

			
		</div>
		
		<hr>
		<div class="columns is-centered">
			<div class="column is-2">
				<label>shoulder</label>
				<p class="subtitle is-5">{{model.shoulder}}</p>
			</div>
			<div class="column is-2">
				<label>style</label>
				<p class="subtitle is-5">{{model.style}}</p>
			</div>
			<div class="column is-3">
				<label>Side Stone</label>
				<p class="subtitle is-5">{{model.ct}}</p>
			</div>
			<div class="column is-5">
				<label>created_at</label>
				<p class="subtitle is-5">{{model.created_at}}</p>
			</div>
		</div>

		<hr>
		<div class="columns is-centered">
			<div class="column is-4" v-for="text in model.texts">
				<label>Title</label>
				<p class="subtitle is-5">{{text.content}}</p>
			</div>
			
		</div>
		
		<hr>
		<div class="columns is-centered">
			<div class="column is-4" v-for="image in model.images">
				<img :src="mutualVar.storage[mutualVar.storage.live] + 'public/images/'+ image.image" width="100%">
			</div>
		</div>
		
		<hr>
		<div class="columns is-centered">
			<div class="column is-4" >
				<label>video</label>
				<p class="subtitle is-5">{{model.video}}</p>
			</div>
		</div>
		
		<hr>
	</div>
</template>

<script>
	import Vue from 'vue'
	import {get, del} from '../../../helpers/api'
	import {readDiamond} from '../../../helpers/downDiamond'
	import mutualVar from '../../../helpers/mutualVar'
	
	export default {
		name: 'CategoryShow',
		data(){
			return {
				model: [],
				resource: 'engagementRingsShow',
				delete: 'engagementRings',
				redirect: '/adm',
				diamond: '',
				mutualVar,
			}
		},
		beforeMount(){
			this.fetchData()
			readDiamond()
					.then((response)=>{
						if(response.data){
							this.diamond = response
						}
					})
					
		},
		watch: {
			'$route' : 'fetchData'
		},
		methods: {
			fetchData(){

				get(`/api/${this.resource}/${this.$route.params.id}`)
				.then((response)=>{
					Vue.set(this.$data, 'model', response.data.model)
				})
				.catch(function(error){
					console.log(error)
				})
			},
			remove(){

				del(`/api/${this.delete}/${this.$route.params.id}`)
					.then((response)=>{
						if (response.data.deleted) {
							this.$router.push(this.redirect)
						}
					})
					.catch(function(error){
						console.log(error)
					})
						
			}
		}
	}
</script>
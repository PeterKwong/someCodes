<template>
	<div class="container">
		<nav class="level">
		
		</nav>
		
		<div class="columns is-centered">
			<div class="column is-9">
				<p class="title is-2">{{model.name}}</p>
			</div>
			<div class="column is-3">
				<router-link :to="'/adm/customer-moments/' + model.id + '/edit'" class="button is-primary">Edit </router-link>
				<button class="button is-primary" @click="remove">Delete</button>
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
			<div class="column is-2" v-for="image in model.images">
				<img :src="mutualVar.storage.s3Cache + 'public' + '/images/'+ image.image" width="100%">
			</div>
		</div>
		
		<hr>
		<div class="columns is-centered">
			<div class="column is-4">
				
			</div>
			<div class="column is-3">
				
			</div>
			<div class="column is-5">
				<label>published</label>
				<p class="subtitle is-5">{{model.published}}</p>
			</div>
		</div>
		<hr>

	</div>
</template>

<script>
	import Vue from 'vue'
	import {get, del} from '../../../helpers/api'
	import mutualVar from '../../../helpers/mutualVar'
	
	export default {
		name: 'CategoryShow',
		data(){
			return {
				mutualVar,
				model: [],
				resource: 'customerMoments',
				redirect: '/adm'
			}
		},
		beforeMount(){
			this.fetchData()
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

				del(`/api/${this.resource}/${this.$route.params.id}`)
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
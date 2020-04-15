<template>
	<div class="container" >
		<nav class="level">
		
		</nav>
		
		<div class="box" v-for="wedding_ring in model.wedding_rings">
			<div class="columns is-centered">
				<div class="column is-9">
					<p class="title is-2">{{wedding_ring.name}}</p>
				</div>
				<div class="column is-3">
					<router-link :to="'/adm/wedding-rings/' + model.id + '/edit'" class="button is-primary">Edit </router-link>
					<button class="button is-primary" @click="remove(model.id)">Delete</button>
				</div>
			</div>
			<div class="columns is-centered">
				<div class="column is-2">
					<label>ID</label>
					<p class="subtitle is-5">{{wedding_ring.id}}</p>
				</div>
				<div class="column is-2">
					<label>Stock</label>
					<p class="subtitle is-5">{{wedding_ring.stock}}</p>
				</div>
				<div class="column is-3">
					<label>Unit Price</label>
					<p class="subtitle is-5">{{wedding_ring.unit_price}}</p>
				</div>
				<div class="column is-5">
				<label>published</label>
				<p class="subtitle is-5">{{wedding_ring.published}}</p>
			</div>
				
			</div>

			<hr>
			<div class="columns is-centered">
				<div class="column is-2">
					<label>shoulder</label>
					<p class="subtitle is-5">{{wedding_ring.metal}}</p>
				</div>
				<div class="column is-2">
					<label>style</label>
					<p class="subtitle is-5">{{wedding_ring.style}}</p>
				</div>
				<div class="column is-3">
					<label>Side Stone</label>
					<p class="subtitle is-5">{{wedding_ring.ct}}</p>
				</div>
				<div class="column is-5">
					<label>created_at</label>
					<p class="subtitle is-5">{{wedding_ring.created_at}}</p>
				</div>
			</div>

			<hr>
			<div class="columns is-centered">
				<div class="column is-4" v-for="text in wedding_ring.texts">
					<label>{{text.type}}</label>
					<p class="subtitle is-5">{{text.content}}</p>
				</div>
				
			</div>
			
			<hr>
			<div class="columns is-centered">
				<div class="column is-4" v-for="image in wedding_ring.images">
					<img :src="mutualVar.storage[mutualVar.storage.live] + 'public' + '/images/'+ image.image" width="100%">
				</div>
			</div>
			<hr>
			<div class="columns is-centered">
			<div class="column is-4" >
				<label>video</label>
				<p class="subtitle is-5">{{wedding_ring.video}}</p>
			</div>
		</div>
			<hr>
		</div>
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
				model: [],
				resource: 'weddingRingsShow',
				delete: 'weddingRings',
				redirect: '/adm',
				mutualVar,
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
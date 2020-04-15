@extends('backEnd.app')


  @section('content')

    <div id="engagementRingShow">


	<div class="card-box">
		<nav class="level">
		
		</nav>
		<div class="row">
			<div class="col-9">
				<p class="title is-2">@{{model.name}}</p>
			</div>
			<div class="col-3">
				<a :href="'/adm/engagement-rings/' + model.id + '/edit'" class="btn btn-primary">Edit </a>
				<button class="btn btn-primary" @click="remove()">Delete</button>
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				<label>Stock</label>
				<p class="subtitle is-5">@{{model.stock}}</p>
			</div>
			<div class="col-2">
				<label>Unit Price</label>
				<p class="subtitle is-5">@{{model.unit_price}}</p>
			</div>
			<div class="col-3">
				<label>Prong</label>
				<p class="subtitle is-5">@{{model.prong}}</p>
			</div>
			<div class="col-5">
				<label>published</label>
				<p class="subtitle is-5">@{{model.published}}</p>
			</div>

			
		</div>
		
		<hr>
		<div class="row">
			<div class="col-2">
				<label>shoulder</label>
				<p class="subtitle is-5">@{{model.shoulder}}</p>
			</div>
			<div class="col-2">
				<label>style</label>
				<p class="subtitle is-5">@{{model.style}}</p>
			</div>
			<div class="col-3">
				<label>Side Stone</label>
				<p class="subtitle is-5">@{{model.ct}}</p>
			</div>
			<div class="col-5">
				<label>created_at</label>
				<p class="subtitle is-5">@{{model.created_at}}</p>
			</div>
		</div>

		<hr>
		<div class="row">
			<div class="col-4" v-for="text in model.texts">
				<label>Title</label>
				<p class="subtitle is-5">@{{text.content}}</p>
			</div>
			
		</div>
		
		<hr>
		<div class="row">
			<div class="col-4" v-for="image in model.images">
				<img :src="mutualVar.storage[mutualVar.storage.live] + 'public/images/'+ image.image" width="100%">
			</div>
		</div>
		
		<hr>
		<div class="row">
			<div class="col-4" >
				<label>video</label>
				<p class="subtitle is-5">@{{model.video}}</p>
			</div>
		</div>
		
		<hr>
	</div>


   @endSection

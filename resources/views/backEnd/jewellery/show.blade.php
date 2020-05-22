@extends('backEnd.app')


  @section('content')

    <div id="jewelleryShow">

		<div class="card-box">
			<nav class="level">
			
			</nav>
			
			<div class="row">
				<div class="col-9">
					<p class="title is-2">@{{model.name}}</p>
				</div>
				<div class="col-3">
					<a :href="'/adm/jewellery/' + model.id + '/edit'" class="btn btn-primary">Edit </a>
					<button class="btn btn-primary" @click="remove">Delete</button>
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
				<div class="col-2">
					<label>gemstone</label>
					<p class="subtitle is-5">@{{model.gemstone}}</p>
				</div>
				<div class="col-2">
					<label>type</label>
					<p class="subtitle is-5">@{{model.type}}</p>
				</div>
				<div class="col-2">
					<label>setting</label>
					<p class="subtitle is-5">@{{model.setting}}</p>
				</div>
				<div class="col">
					<label>published</label>
					<p class="subtitle is-5">@{{model.published}}</p>
				</div>
				
			</div>

			<hr>
			<div class="row">
				<div class="col">
					<label>metal</label>
					<p class="subtitle is-5">@{{model.metal}}</p>
				</div>
				<div class="col-2">
					<label>Side Stone</label>
					<p class="subtitle is-5">@{{model.ct}}</p>
				</div>
				<div class="col">
					<label>metal weight</label>
					<p class="subtitle is-5">@{{model.metal_weight}}</p>
				</div>
				<div class="col">
					<label>extra cost</label>
					<p class="subtitle is-5">@{{model.cost}}</p>
				</div>
				<div class="col">
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
					<img :src="mutualVar.storage[mutualVar.storage.live] + 'public' +'/images/'+ image.image" width="100%">
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

    </div>


  @endSection


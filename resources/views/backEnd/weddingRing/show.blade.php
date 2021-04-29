@extends('backEnd.app')


  @section('content')

    <div id="weddingRingShow">

		<div class="card-box" >
			<nav class="level">
			
			</nav>
			
			<div class="box" v-for="wedding_ring in model.wedding_rings">
				<div class="row">
					<div class="col-9">
						<p class="title is-2">@{{wedding_ring.name}}</p>
					</div>
					<div class="col-3">
						<a :href="'/adm/wedding-rings/' + model.id + '/edit'" class="btn btn-primary">Edit </a>
<!-- 						<button class="btn btn-primary" @click="remove(model.id)">Delete</button>
 -->					</div>
				</div>
				<div class="row">
					<div class="col-2">
						<label>ID</label>
						<p class="subtitle is-5">@{{wedding_ring.id}}</p>
					</div>
					<div class="col-2">
						<label>Stock</label>
						<p class="subtitle is-5">@{{wedding_ring.stock}}</p>
					</div>
					<div class="col">
						<label>Unit Price</label>
						<p class="subtitle is-5">@{{wedding_ring.unit_price}}</p>
					</div>
					<div class="col">
						<label>style</label>
						<p class="subtitle is-5">@{{wedding_ring.style}}</p>
					</div>
					<div class="col">
					<label>published</label>
					<p class="subtitle is-5">@{{wedding_ring.published}}</p>
				</div>
					
				</div>

				<hr>
				<div class="row">
					<div class="col-2">
						<label>shoulder</label>
						<p class="subtitle is-5">@{{wedding_ring.metal}}</p>
					</div>
					<div class="col-2">
						<label>Side Stone</label>
						<p class="subtitle is-5">@{{wedding_ring.ct}}</p>
					</div>
					<div class="col">
						<label>metal weight</label>
						<p class="subtitle is-5">@{{wedding_ring.metal_weight}}</p>
					</div>
					<div class="col">
						<label>extra cost</label>
						<p class="subtitle is-5">@{{wedding_ring.cost}}</p>
					</div>
					<div class="col">
						<label>created_at</label>
						<p class="subtitle is-5">@{{wedding_ring.created_at}}</p>
					</div>
				</div>

				<hr>
				<div class="row">
					<div class="col-4" v-for="text in wedding_ring.texts">
						<label>@{{text.type}}</label>
						<p class="subtitle is-5">@{{text.content}}</p>
					</div>
					
				</div>
				
				<hr>
				<div class="row">
					<div class="col-4" v-for="image in wedding_ring.images">
						<img :src="mutualVar.storage[mutualVar.storage.live] + 'public' + '/images/'+ image.image" width="100%">
					</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-4" >
					<label>video</label>
					<p class="subtitle is-5">@{{wedding_ring.video}}</p>
				</div>
			</div>
				<hr>
			</div>
		</div>

    </div>


  @endSection


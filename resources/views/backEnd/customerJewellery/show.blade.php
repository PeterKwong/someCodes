@extends('backEnd.app')


  @section('content')

    <div id="customerJewelleryShow">

		<div class="card-box">
			<nav class="level">
			
			</nav>

			<div class="row">
				<div class="col-9">
					<p class="title is-2">@{{model.name}}</p>
				</div>
				<div class="col-3">
					<a :href="'/adm/customer-jewelleries/' + model.id + '/edit'" class="btn btn-primary">Edit </a>
<!-- 					<button class="btn btn-primary" @click="remove">Delete</button>
 -->				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<label>invoice_id</label>
					<p class="subtitle is-5">@{{model.invoice_id}}</p>
				</div>
				<div class="col-3">
					<label>published</label>
					<p class="subtitle is-5">@{{model.published}}</p>
				</div>
				<div class="col-6">
					<label>Publish Date</label>
					<p class="subtitle is-5">@{{model.date}}</p>
				</div>
			</div>
			
			<hr>
			<div class="row">
				<div class="col-3">
					<label>Post Type</label>
					<p class="subtitle is-5">@{{model.postable_type}}</p>
				</div>
				<div class="col-3">
					<label>Post type ID :</label>
					<p class="subtitle is-5">@{{model.postable_id}}</p>
				</div>
				<div class="col-6">

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
					<img :src="mutualVar.storage[mutualVar.storage.live] + 'public' + '/images/'+ image.image" width="100%">
				</div>
			</div>
			
			<hr>
			<div class="row">
				<div class="col-4">
					<label>video</label>
					<p class="subtitle is-5">@{{model.video}}</p>
				</div>
				<div class="col-3">
					<label>video 360</label>
					<p class="subtitle is-5">@{{model.video360}}</p>
				</div>
				<div class="col-5">
					
				</div>
			</div>
			<hr>

		</div>

    </div>


  @endSection


@extends('backEnd.app')


  @section('content')

    <div id="customerMomentShow">

		<div class="card-box">
			<nav class="level">
			
			</nav>
			
			<div class="row">
				<div class="col-9">
					<p class="title is-2">@{{model.name}}</p>
				</div>
				<div class="col-3">
					<a :href="'/adm/customer-moments/' + model.id + '/edit'" class="btn btn-primary">Edit </a>
					<button class="btn btn-primary" @click="remove">Delete</button>
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
				<div class="col-2" v-for="image in model.images">
					<img :src="mutualVar.storage[mutualVar.storage.live] + 'public' + '/images/'+ image.image" width="100%">
				</div>
			</div>
			
			<hr>
			<div class="row">
				<div class="col-4">
					
				</div>
				<div class="col-3">
					
				</div>
				<div class="col-5">
					<label>published</label>
					<p class="subtitle is-5">@{{model.published}}</p>
				</div>
			</div>
			<hr>

		</div>

    </div>


  @endSection


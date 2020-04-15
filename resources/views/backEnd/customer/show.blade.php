@extends('backEnd.app')


  @section('content')

    <div id="customerShow">
    	<div class="card-box">
			<nav class="level">
			
			</nav>
			<div class="row">
				<div class="col-9">
					<p class="title is-2">@{{model.name}}</p>
				</div>
				<div class="col-3">
					<a :href="'/adm/customers/' + model.id + '/edit'" class="btn btn-primary">Edit </a>
					<button class="btn btn-primary" @click="remove">Delete</button>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<label>Name</label>
					<p class="subtitle is-5">@{{model.name}}</p>
				</div>
				<div class="col-4">
					<label>Email</label>
					<p class="subtitle is-5">@{{model.email}}</p>
				</div>
				<div class="col-4">
					<label>phone</label>
					<p class="subtitle is-5">@{{model.phone}}</p>
				</div>
			</div>

			<div class="row">
				<div class="col-4">
					<label>address</label>
					<p class="subtitle is-5">@{{model.address}}</p>					
				</div>
				<div class="col-4">
					
				</div>
				<div class="col-4">
					<label>created_at</label>
					<p class="subtitle is-5">@{{model.created_at}}</p>
				</div>
			</div>
			
		</div>

    </div>

   @endsection
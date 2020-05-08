@extends('backEnd.app')


  @section('content')

    <div id="invoiceDiamondShow">
	<div class="card-box">
		<nav class="level">
		
		</nav>
		<div class="row">
			<div class="col-9">
				<p class="title is-2">Diamond ID :@{{model.id}}</p>
			</div>
			<div class="col-3">
				<a :href="'/adm/inv-diamonds/' + model.id + '/edit'" class="btn btn-primary">Edit </a>
				
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<label>Price</label>
				<p class="subtitle is-5">$@{{model.price}}</p>
			</div>
			<div class="col-1">
				<label>Stock</label>
				<p class="subtitle is-5">@{{model.stock}}</p>
			</div>
			<div class="col-2">
				<label>Clarity</label>
				<p class="subtitle is-5">@{{model.clarity}}</p>
			</div>
			<div class="col-2">
				<label>Weight</label>
				<p class="subtitle is-5">@{{model.weight}}</p>
			</div>
			<div class="col-1">
				<label>Color</label>
				<p class="subtitle is-5">@{{model.color}}</p>
			</div>
			<div class="col-3">
				<label>pay date</label>
				<p class="subtitle is-5">@{{model.pay_date}}</p>
			</div>
			
		</div>
		<hr>
		<div class="row">
			<div class="col-1">
				<label>Cut</label>
				<p class="subtitle is-5">@{{model.cut}}</p>
			</div>	
			<div class="col-1">
				<label>Polish</label>
				<p class="subtitle is-5">@{{model.polish}}</p>
			</div>
			<div class="col-1">
				<label>Symmetry</label>
				<p class="subtitle is-5">@{{model.symmetry}}</p>
			</div>
			<div class="col-3">
				<label>Fluorescence</label>
				<p class="subtitle is-5">@{{model.fluorescence}}</p>
			</div>
			<div class="col-3">
				<label>certificate</label>
				<p class="subtitle is-5">@{{model.certificate}}</p>
			</div>
			<div class="col-1">
				<label>Lab</label>
				<p class="subtitle is-5">@{{model.lab}}</p>
			</div>
			<div class="col-1">
				<label>Shape</label>
				<p class="subtitle is-5">@{{model.shape}}</p>
			</div>	
			<div class="col-2">
				<label>created_at</label>
				<p class="subtitle is-5">@{{model.created_at}}</p>
			</div>
		</div>

		<div class="row">
			<div class="col-4">
				
			</div>
			<div class="col-4">
				
			</div>
			
		</div>
		
	</div>

    </div>


  @endSection


@extends('backEnd.app')

	@section('content')

	<div id="orderShow">
		
		<br>

		<div class="columns">

			<div class="column">
				
			</div>
			<div class="column is-8">
				<input class="input" type="text" name="title" v-model="model.title">
			</div>
			<div class="column">
				
			</div>

		</div>

		<div class="columns">

			<div class="column is-2">
				<input class="input" type="text" name="title" v-model="model.sub_total">				
			</div>
			<div class="column is-2">
				<input class="input" type="text" name="title" v-model="model.total">
			</div>
			<div class="column">
				
			</div>

		</div>


	</div>



	@endSection
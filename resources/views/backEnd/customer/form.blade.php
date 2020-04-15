@extends('backEnd.app')


  @section('content')

    <div id="customerForm">

		<div class="card-box">	
			<h1 class="title is-3">@{{title}}</h1>
				<div class="field" @submit.prevent="save">
					<div class="row">

						<div class="col-4">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Name</label>
										<input type="text" class="form-control" v-model="form.name" placeholder="name">
										<small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
								</div>
							</div>	
						</div>	

						<div class="col-4">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">phone</label>
										<input type="text" class="form-control" v-model="form.phone" placeholder="Phone">
										<small class="is-danger" v-if="errors.phone">@{{errors.phone[0]}}</small>
								</div>
							</div>
						</div>

						<div class="col-4">
							<div class="control ">
								<div class="control">
									<label class="label">email</label>
										<input type="email" class="form-control" v-model="form.email">
										<small class="is-danger" v-if="errors.email">@{{errors.email[0]}}</small>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col">
								<button class="btn btn-primary" @click="save">Save</button>
							</div>
						</div>
				
			</div>
		</div>

	</div>

   @endsection
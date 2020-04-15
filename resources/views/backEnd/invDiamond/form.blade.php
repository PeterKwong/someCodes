@extends('backEnd.app')


  @section('content')

    <div id="invDiamondForm">

    	<div class="card-box">	
			<h1 class="title is-3">@{{title}}</h1>
				<form @submit.prevent="save">
				<div class="field" >
					<div class="row">

						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Price</label>
										<input type="text" class="form-control" v-model="form.price" placeholder="price" required>
										<small class="is-danger" v-if="errors.price">@{{errors.price[0]}}</small>
								</div>
							</div>	
						</div>	

						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Stock</label>
										<input type="text" class="form-control" v-model="form.stock" placeholder="stock" required>
										<small class="is-danger" v-if="errors.stock">@{{errors.stock[0]}}</small>
								</div>
							</div>
						</div>

						<div class="col-1">
							<div class="control ">
								<div class="control">
									<label class="label">Weight</label>
										<input type="weight" class="form-control" v-model="form.weight" required>
										<small class="is-danger" v-if="errors.weight">@{{errors.weight[0]}}</small>
								</div>
							</div>
						</div>
						
						<div class="col-1">
							<div class="control ">
								<div class="control">
									<label class="label">Color</label>
										<input type="text" class="form-control" v-model="form.color" required>
										<small class="is-danger" v-if="errors.color">@{{errors.color[0]}}</small>
								</div>
							</div>
						</div>


						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Clarity</label>
										<input type="text" class="form-control" v-model="form.clarity" placeholder="clarity" required>
										<small class="is-danger" v-if="errors.clarity">@{{errors.clarity[0]}}</small>
								</div>
							</div>
						</div>


						<div class="col-3">
							<div class="control ">
								<div class="control">
									<label class="label">Due Date</label>
										<input type="date" class="form-control" v-model="form.due_date" >
										<small class="is-danger" v-if="errors.due_date">@{{errors.due_date[0]}}</small>
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-1">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Cut</label>
										<input type="text" class="form-control" v-model="form.cut" placeholder="cut" required>
										<small class="is-danger" v-if="errors.cut">@{{errors.cut[0]}}</small>
								</div>
							</div>	
						</div>	

						<div class="col-1">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Polish</label>
										<input type="text" class="form-control" v-model="form.polish" placeholder="polish" required>
										<small class="is-danger" v-if="errors.polish">@{{errors.polish[0]}}</small>
								</div>
							</div>
						</div>

						<div class="col-1">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Symmetry</label>
										<input type="text" class="form-control" v-model="form.symmetry" placeholder="symmetry" required>
										<small class="is-danger" v-if="errors.symmetry">@{{errors.symmetry[0]}}</small>
								</div>
							</div>
						</div>
						<div class="col-3">
							<div class="control ">
								<div class="control">
									<label class="label">Fluorescence</label>
										<input type="fluorescence" class="form-control" v-model="form.fluorescence" required>
										<small class="is-danger" v-if="errors.fluorescence">@{{errors.fluorescence[0]}}</small>
								</div>
							</div>
						</div>
						<div class="col-3">
							<div class="control ">
								<div class="control">
									<label class="label">certificate</label>
										<input type="text" class="form-control" v-model="form.certificate" required>
										<small class="is-danger" v-if="errors.certificate">@{{errors.certificate[0]}}</small>
								</div>
							</div>
						</div>
						<div class="col-1">
							<div class="control ">
								<div class="control">
									<label class="label">Lab</label>
										<input type="text" class="form-control" v-model="form.lab" required>
										<small class="is-danger" v-if="errors.lab">@{{errors.lab[0]}}</small>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">shape</label>
										<input type="shape" class="form-control" v-model="form.shape" required>
										<small class="is-danger" v-if="errors.shape">@{{errors.shape[0]}}</small>
								</div>
							</div>
						</div>
						
					</div>


					<div class="row">
							<div class="col">
								<button class="btn btn-primary" :disabled="isLoading" @submit="save">Save</button>
							</div>
						</div>
				
			</div>
			</form>
		</div>

    </div>


  @endSection


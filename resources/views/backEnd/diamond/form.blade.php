@extends('backEnd.app')


  @section('content')

    <div id="diamondForm">

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
										<select type="color" class="form-control" v-model="form.color" required>
											<option value="D">D</option>
											<option value="E">E</option>
											<option value="F">F</option>
											<option value="G">G</option>
											<option value="H">H</option>
											<option value="I">I</option>
											<option value="J">J</option>
											<option value="K">K</option>
											<option value="L">L</option>
										</select>
										<small class="is-danger" v-if="errors.color">@{{errors.color[0]}}</small>
								</div>
							</div>
						</div>


						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Clarity</label>
										<select type="color" class="form-control" v-model="form.clarity" required>
											<option value="I1">I1</option>
											<option value="SI2">SI2</option>
											<option value="SI1">SI1</option>
											<option value="VS2">VS2</option>
											<option value="VS1">VS1</option>
											<option value="VVS2">VVS2</option>
											<option value="VVS1">VVS1</option>
											<option value="IF">IF</option>
											<option value="FL">FL</option>
										</select>
										<small class="is-danger" v-if="errors.clarity">@{{errors.clarity[0]}}</small>
								</div>
							</div>
						</div>


						<div class="col-3">
							<div class="control ">
								<div class="control">
									<label class="label">Starred Date</label>
										<input type="date" class="form-control" v-model="form.starred" >
										<small class="is-danger" v-if="errors.starred">@{{errors.starred[0]}}</small>
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-1">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Cut</label>
										<select type="cut" class="form-control" v-model="form.cut" required>
											<option value="EX">EX</option>
											<option value="VG">VG</option>
											<option value="GD">GD</option>
										</select>									
										<small class="is-danger" v-if="errors.cut">@{{errors.cut[0]}}</small>
								</div>
							</div>	
						</div>	

						<div class="col-1">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Polish</label>
										<select type="polish" class="form-control" v-model="form.polish" required>
											<option value="EX">EX</option>
											<option value="VG">VG</option>
											<option value="GD">GD</option>
										</select>											
										<small class="is-danger" v-if="errors.polish">@{{errors.polish[0]}}</small>
								</div>
							</div>
						</div>

						<div class="col-1">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Symmetry</label>
										<select type="symmetry" class="form-control" v-model="form.symmetry" required>
											<option value="EX">EX</option>
											<option value="VG">VG</option>
											<option value="GD">GD</option>
										</select>											
										<small class="is-danger" v-if="errors.symmetry">@{{errors.symmetry[0]}}</small>
								</div>
							</div>
						</div>
						<div class="col-3">
							<div class="control ">
								<div class="control">
									<label class="label">Fluorescence</label>
										<select type="fluorescence" class="form-control" v-model="form.fluorescence" required>
											<option value="NON">NON</option>
											<option value="FNT">FNT</option>
											<option value="MED">MED</option>
											<option value="STG">STG</option>
											<option value="VSTG">VSTG</option>
										</select>											
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
										<select type="shape" class="form-control" v-model="form.shape" required>
											<option value="ROUND">ROUND</option>
											<option value="HEART">HEART</option>
											<option value="PRINCESS">PRINCESS</option>
											<option value="CUSHION">CUSHION</option>
											<option value="OVAL">OVAL</option>
											<option value="PEAR">PEAR</option>
											<option value="EMERALD">EMERALD</option>
										</select>			
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


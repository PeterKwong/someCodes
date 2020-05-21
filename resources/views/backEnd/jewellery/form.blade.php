@extends('backEnd.app')


  @section('content')

    <div id="jewelleryForm">

		<div class="card-box">	
			<h1 class="title is-3">@{{title}}</h1>
			<h1 class="title is-3" v-if="option">Latest ID:@{{option.id}}</h1>
				<form @submit.prevent="save">
				<div class="field" >

					<div class="row">
		               
		                <div class="col-4">
		                            <select class="form-control" v-model="form.published">Published
		                                <option value="0">Draft</option>
		                                <option value="1">Published</option>
		                            </select>
		                </div>
		                
		            </div>
					<div class="row">
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
							<div class="control has-icon-left">
								<div class="control">
									<p class="btn btn-primary" @click="autoTitle()">gen</p>
								</div>
							</div>
						</div>

		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control">
		                            <label class="label">title - en</label>
		                                <input type="text" class="form-control" v-model="form.texts[0].content" placeholder="title" required>
		                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control">
		                            <label class="label">title - hk</label>
		                                <input type="text" class="form-control" v-model="form.texts[1].content" placeholder="title" required>
		                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control">
		                            <label class="label">title - cn</label>
		                                <input type="description" class="form-control" v-model="form.texts[2].content" required placeholder="title">
		                                <small class="is-danger" v-if="errors.description">@{{errors.description[0]}}</small>
		                        </div>
		                    </div>
		                </div>

		            </div>
					

					<div class="row">


						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Type</label>
										<select v-model="form.type" class="form-control">
											<option value="Accessory">Accessory</option>
											<option value="Bracelet">Bracelet</option>
											<option value="Necklace">Necklace</option>
											<option value="Earring">Earring</option>
											<option value="Pendant">Pendant</option>
											<option value="Ring">Ring</option>
											<option value="Misc">Misc</option>
										</select>
								</div>
							</div>
						</div>

						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Gemstone</label>
										<select v-model="form.gemstone" class="form-control">
											<option value="0">No</option>
											<option value="fancy diamond">fancy diamond</option>
											<option value="diamond">diamond</option>
											<option value="pearl">pearl</option>
										</select>
								</div>
							</div>
						</div>


						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Setting</label>
										<select v-model="form.setting" class="form-control">
											<option value="0">0</option>
											<option value="1">1</option>
										</select>
								</div>
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">Metal  @$ @{{goldPrice}} </label>
									<select v-model="form.metal" class="form-control">
										<option value="18KW">18KW</option>
										<option value="18KY">18KY</option>
										<option value="18KR">18KR</option>
										<option value="PT">PT</option>
										<option value="Mixed">Mixed</option>
									</select>
								</div>
							</div>
						</div>					
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">Metal Weight :$ @{{price.metal}}</label>
										<input type="text" class="form-control" v-model="form.metal_weight" placeholder="gram" required>
										<small class="is-danger" v-if="errors.sideStone" >@{{errors.metal_weight[0]}}</small>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">Side Stone :$ @{{price.diamond}}</label>
										<input type="text" class="form-control" v-model="form.ct" placeholder="@$8000" required>
										<small class="is-danger" v-if="errors.sideStone">@{{errors.sideStone[0]}}</small>
								</div>
							</div>
						</div>	
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">Extra Cost</label>
										<input type="text" class="form-control" v-model="form.cost" required>
										<small class="is-danger" v-if="errors.sideStone" >@{{errors.cost[0]}}</small>
								</div>
							</div>
						</div>	
						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Unit Price $( @{{calculatedRoundedPrice}} + @{{form.cost}} )</label>
										<input type="text" class="form-control" v-model="form.unit_price" placeholder="unit_price" required>
										<small class="is-danger" v-if="errors.unit_price">@{{errors.unit_price[0]}}</small>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
							<div class="column">
								<p class="btn btn-primary" @click="addImage">Add Image</p>
							</div>
							
					</div>

					<div class="row" @submit.prevent="fetchData">
						<div class="col-4" v-for="(image,index) in form.images">
								<div class="box">
									<label> Image </label>
									<image-upload :name="'images' + index" v-model="form.images[index].image" ></image-upload>
									<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
									<select v-model="form.images[index].type">
										<option value="cover">cover</option>
										<option value="image1">image1</option>
										<option value="image2">image2</option>
										<option value="draft">draft</option>
										<option value="3d">3d</option>
									</select>
								</div>
						</div>
					


						
					</div>	

					<div class="row" >
						
						<div class="col-4">
								<div class="box">
									<label> video</label>
									<video-upload :name="video" v-model="form.video" ></video-upload>
									<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
								</div>
						</div>


						
					</div>		
			


					<div class="row">
						
					</div>
					
					<div class="row">
							<div class="column">
								<button class="btn btn-primary" @submit="save" :disabled="isProcessing">Save</button>
							</div>
						</div>
				
			</div>
			</form>
		</div>

    </div>


  @endSection


@extends('backEnd.app')


  @section('content')

    <div id="weddingRingForm">

		<div class="card-box">	
			<h1 class="title is-3">@{{title}}</h1>
			<h1 class="title is-3" v-if="option">Latest ID:@{{option.id}}</h1>
				<form @submit.prevent="save">
					<div class="field" >

						<div class="box" v-for="(weddingRing,index) in form.wedding_rings ">
							<p class="title is-3" @click="delForm(index)"><i class="fa fa-times-circle" aria-hidden="true"></i></p>
							<div class="row">
								<div class="col-2">
									<label  class="label">Gender</label>
										<select v-model="weddingRing.gender" class="form-control">
											<option value="m">Man</option>
											<option value="f">Female</option>
										</select>
								</div>
							</div>

							<div class="row">
								<div class="col-2">
									<div class="control has-icon-left">
										<div class="control">
											<label  class="label">Stock</label>
												<input type="text" class="form-control" v-model="weddingRing.stock" placeholder="stock" required>
												<small class="message is-danger" v-if="errors.stock">
													<div class="message-body">@{{errors.stock[0]}}</div>
												</small>
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
				                        <div class="control" v-if="weddingRing.texts.length > 0">
				                            <label class="label">title - en</label>
				                                <input type="text" class="form-control" v-model="weddingRing.texts[0].content" placeholder="title" required>
				                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
				                        </div>
				                    </div>
				                </div>
				                <div class="col-3">
				                    <div class="control ">
				                        <div class="control" v-if="weddingRing.texts.length > 0">
				                            <label class="label">title - hk</label>
				                                <input type="text" class="form-control" v-model="weddingRing.texts[1].content" placeholder="title" required>
				                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
				                        </div>
				                    </div>
				                </div>
				                <div class="col-3">
				                    <div class="control ">
				                        <div class="control" v-if="weddingRing.texts.length > 0">
				                            <label class="label">title - cn</label>
				                                <input type="description" class="form-control" v-model="weddingRing.texts[2].content" required placeholder="title">
				                                <small class="is-danger" v-if="errors.description">@{{errors.description[0]}}</small>
				                        </div>
				                    </div>
				                </div>

				            </div>
					

							<div class="row">

								<div class="col-2">
									<div class="control has-icon-left">
										<div class="control">
											<label  class="label">Shape</label>
												<select class="form-control" v-model="weddingRing.shape">
													<option value="straight">straight</option>
													<option value="v-shape">v-shape</option>
													<option value="wave">wave</option>
													<option value="cross">cross</option>
												</select>
										</div>
									</div>
								</div>
								<div class="col-2">
									<div class="control has-icon-left">
										<div class="control">
											<label class="label">Finish</label>
												<select class="form-control" v-model="weddingRing.finish">
													<option value="high polish">high polish</option>
													<option value="matte">matte</option>
													<option value="brushed">brushed</option>
													<option value="hammered">hammered</option>
												</select>
										</div>
									</div>
								</div>
								<div class="col-2">
									<div class="control has-icon-left">
										<div class="control">
											<label  class="label">Origin</label>
												<select class="form-control" v-model="weddingRing.origin">
													<option value="local">local</option>
													<option value="japan">japan</option>
												</select>
										</div>
									</div>
								</div>

								<div class="col-2">
									<div class="control has-icon-left">
										<div class="control">
											<label  class="label">Style</label>
												<select class="form-control" v-model="weddingRing.style">
													<option value=""></option>
													<option value="milgrain">milgrain</option>
													<option value="puzzle">puzzle</option>
													<option value="forge">forge</option>
												</select>
										</div>
									</div>
								</div>
								<div class="col-2">
									<div class="control has-icon-left">
										<div class="control">
											<label  class="label">Brand</label>
												<select class="form-control" v-model="weddingRing.brand">
													<option value=""></option>
													<option value="angerosa">angerosa</option>
													<option value="feerie porte">feerie porte</option>
													<option value="timeless ones">timeless ones</option>
												</select>
										</div>
									</div>
								</div>



							</div>

							<div class="row">
								<div class="col-2">
									<div class="control ">
										<div class="control">
											<label class="label">Metal  @$ @{{prices[index].metalPrice}} </label>
											<select v-model="weddingRing.metal" class="form-control">
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
											<label class="label">Metal Weight :$ @{{prices[index].metal}}</label>
												<input type="text" class="form-control" v-model="weddingRing.metal_weight" placeholder="gram" required>
												<small class="is-danger" v-if="errors.sideStone" >@{{errors.metal_weight[index]}}</small>
										</div>
									</div>
								</div>
								<div class="col-2">
									<div class="control ">
										<div class="control">
											<label class="label">Side Stone :$ @{{prices[index].diamond}}</label>
												<input type="text" class="form-control" v-model="weddingRing.ct" placeholder="@$8000" required>
												<small class="is-danger" v-if="errors.sideStone">@{{errors.sideStone[index]}}</small>
										</div>
									</div>
								</div>	
								<div class="col-2">
									<div class="control ">
										<div class="control">
											<label class="label">Extra Cost</label>
												<input type="text" class="form-control" v-model="weddingRing.cost" required>
												<small class="is-danger" v-if="errors.sideStone" >@{{errors.cost[index]}}</small>
										</div>
									</div>
								</div>	
								<div class="col-2">
									<div class="control has-icon-left">
										<div class="control">
											<label class="label">Unit Price $( @{{calculatedRoundedPrices[index].price}} + @{{weddingRing.cost}} )</label>
												<input type="text" class="form-control" v-model="weddingRing.unit_price" placeholder="unit_price" required>
												<small class="is-danger" v-if="errors.unit_price">@{{errors.unit_prices[index]}}</small>
										</div>
									</div>
								</div>
							</div>

						</div>
						
						<br>
						<br>

						<div class="row">
			                <div class="col-4">
		                            <select class="form-control" v-model="form.published">Published
		                                <option value="0">Draft</option>
		                                <option value="1">Published</option>
		                            </select>
			                </div>
			            </div>

						<div class="row">
								<div class="column">
									<p class="btn btn-primary" @click="addImage">Add Image</p>
								</div>
						</div>
						<div class="row" >
							<div class="col" v-for="(image,index) in form.images">
									<div class="box" v-if="form.images[0]">
										<label> Image </label>
										<image-upload :name="'images' + index" v-model="form.images[index].image" ></image-upload>
										<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
										<select class="form-control" v-model="form.images[index].type" required>
											<option value="cover">cover</option>
											<option value="m">Men</option>
											<option value="f">Woman</option>
										</select>
									</div>
							</div>
						</div>	
						<div class="row" >

							<div class="col">
									<div class="box" v-if="form.video">
										<label> video</label>
										<video-upload v-model="form.video" ></video-upload>
										<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
									</div>
							</div>

							<div class="col">
									<div class="box" v-if="form.video360">
										<label> video 360</label>
										<p >@{{form.video360[0]}}</p>
										<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
									</div>
							</div>
							
						</div>		
						
						<div class="row">
							<div class="column">
								<button class="btn btn-primary" @submit="save" :disabled="isProcessing">Save</button>
							</div>
						</div>


					</div>
					

<!-- 				<div class="box" v-if="form[0]">
					<p class="title is-3" @click="delForm(0)"><i class="fa fa-times-circle" aria-hidden="true"></i></p>
					<div class="row">
								<div class="col-2">
									<label  class="label">Gender</label>
										<select v-model="form[0].gender" class="form-control">
											<option value="m">Man</option>
											<option value="f">Female</option>
										</select>
								</div>
							</div>
					<div class="row">
		               
		                <div class="col-2">
		                            <select class="form-control" v-model="form[0].published">Published
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
										<input type="text" class="form-control" v-model="form[0].stock" placeholder="stock" required>
										<small class="message is-danger" v-if="errors.stock">
											<div class="message-body">@{{errors.stock[0]}}</div>
										</small>
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
		                        <div class="control" v-if="form[0].texts.length > 0">
		                            <label class="label">title - en</label>
		                                <input type="text" class="form-control" v-model="form[0].texts[0].content" placeholder="title" required>
		                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control" v-if="form[0].texts.length > 0">
		                            <label class="label">title - hk</label>
		                                <input type="text" class="form-control" v-model="form[0].texts[1].content" placeholder="title" required>
		                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control" v-if="form[0].texts.length > 0">
		                            <label class="label">title - cn</label>
		                                <input type="description" class="form-control" v-model="form[0].texts[2].content" required placeholder="title">
		                                <small class="is-danger" v-if="errors.description">@{{errors.description[0]}}</small>
		                        </div>
		                    </div>
		                </div>

		            </div>
					

					<div class="row">

						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Shape</label>
										<select class="form-control" v-model="form[0].shape">
											<option value="straight">straight</option>
											<option value="v-shape">v-shape</option>
											<option value="wave">wave</option>
											<option value="cross">cross</option>
										</select>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Finish</label>
										<select class="form-control" v-model="form[0].finish">
											<option value="high polish">high polish</option>
											<option value="matte">matte</option>
											<option value="brushed">brushed</option>
											<option value="hammered">hammered</option>
										</select>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Origin</label>
										<select class="form-control" v-model="form[0].origin">
											<option value="local">local</option>
											<option value="japan">japan</option>
										</select>
								</div>
							</div>
						</div>

						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Style</label>
										<select class="form-control" v-model="form[0].style">
											<option value=""></option>
											<option value="milgrain">milgrain</option>
											<option value="puzzle">puzzle</option>
											<option value="forge">forge</option>
										</select>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Brand</label>
										<select class="form-control" v-model="form[0].brand">
											<option value=""></option>
											<option value="angerosa">angerosa</option>
											<option value="feerie porte">feerie porte</option>
											<option value="timeless ones">timeless ones</option>
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
									<select v-model="form[0].metal" class="form-control">
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
									<label class="label">Metal Weight :$ @{{price[0].metal}}</label>
										<input type="text" class="form-control" v-model="form[0].metal_weight" placeholder="gram" required>
										<small class="is-danger" v-if="errors.sideStone" >@{{errors.metal_weight[0]}}</small>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">Side Stone :$ @{{price[0].diamond}}</label>
										<input type="text" class="form-control" v-model="form[0].ct" placeholder="@$8000" required>
										<small class="is-danger" v-if="errors.sideStone">@{{errors.sideStone[0]}}</small>
								</div>
							</div>
						</div>	
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">Extra Cost</label>
										<input type="text" class="form-control" v-model="form[0].cost" required>
										<small class="is-danger" v-if="errors.sideStone" >@{{errors.cost[0]}}</small>
								</div>
							</div>
						</div>	
						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Unit Price $( @{{calculatedRoundedPrice}} + @{{form[0].cost}} )</label>
										<input type="text" class="form-control" v-model="form[0].unit_price" placeholder="unit_price" required>
										<small class="is-danger" v-if="errors.unit_price">@{{errors.unit_price[0]}}</small>
								</div>
							</div>
						</div>
					</div>

					<div class="row" >
						<div class="col-2">
								<p class="btn btn-primary" @click="addImage(0)">Add Image</p>
						</div>
					</div>
					<div class="row" >

						<div class="col-4" v-for="(image,index) in form[0].images">
								<div class="box">
									<label> Image </label>
									<image-upload :name="'image' + index" v-model="form[0].images[index].image" ></image-upload>
									<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
									<select v-model="form[0].images[index].type">
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

						<div class="col">
								<div class="box">
									<label> video</label>
									<video-upload :name="video" v-model="form[0].video" ></video-upload>
									<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
								</div>
						</div>
						<div class="col">
								<div class="box" v-if="form.video360">
									<label> video 360</label>
									<p >@{{form.video360[0]}}</p>
									<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
								</div>
						</div>


					</div>
					<div class="row">
				       
				        <div class="col-12">
						<upload-multi-image type="weddingRingForm"></upload-multi-image>
						</div>
					</div>



				</div>	


				<div class="box" v-if="form[1]">
					<p class="title is-3" @click="delForm(1)"><i class="fa fa-times-circle" aria-hidden="true"></i></p>
					<div class="row">
								<div class="col-2">
									<label  class="label">Gender</label>
										<select v-model="form[1].gender" class="form-control">
											<option value="m">Man</option>
											<option value="f">Female</option>
										</select>
								</div>
							</div>

					<div class="row">
		               
		                <div class="col-2">
		                            <select class="form-control" v-model="form[1].published">Published
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
										<input type="text" class="form-control" v-model="form[1].stock" placeholder="stock" required>
										<small class="is-danger" v-if="errors.stock">@{{errors.stock[0]}}</small>
								</div>
							</div>
						</div>

		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control" v-if="form[1].texts.length > 0">
		                            <label class="label">title - en</label>
		                                <input type="text" class="form-control" v-model="form[1].texts[0].content" placeholder="title" required>
		                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control" v-if="form[1].texts.length > 0">
		                            <label class="label">title - hk</label>
		                                <input type="text" class="form-control" v-model="form[1].texts[1].content" placeholder="title" required>
		                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control" v-if="form[1].texts.length > 0">
		                            <label class="label">title - cn</label>
		                                <input type="description" class="form-control" v-model="form[1].texts[2].content" required placeholder="title">
		                                <small class="is-danger" v-if="errors.description">@{{errors.description[0]}}</small>
		                        </div>
		                    </div>
		                </div>

		            </div>
					

					<div class="row">

						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Shape</label>
										<select class="form-control" v-model="form[1].shape">
											<option value="straight">straight</option>
											<option value="v-shape">v-shape</option>
											<option value="wave">wave</option>
											<option value="cross">cross</option>
										</select>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Finish</label>
										<select class="form-control" v-model="form[1].finish">
											<option value="high polish">high polish</option>
											<option value="matte">matte</option>
											<option value="brushed">brushed</option>
											<option value="hammered">hammered</option>
										</select>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Origin</label>
										<select class="form-control" v-model="form[1].origin">
											<option value="local">local</option>
											<option value="japan">japan</option>
										</select>
								</div>
							</div>
						</div>

						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Style</label>
										<select class="form-control" v-model="form[1].style">
											<option value=""></option>
											<option value="milgrain">milgrain</option>
											<option value="puzzle">puzzle</option>
											<option value="forge">forge</option>
										</select>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label  class="label">Brand</label>
										<select class="form-control" v-model="form[1].brand">
											<option value=""></option>
											<option value="angerosa">angerosa</option>
											<option value="feerie porte">feerie porte</option>
											<option value="timeless ones">timeless ones</option>
										</select>
								</div>
							</div>
						</div>





					</div>

					<div class="row">
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">Metal  @$ @{{goldPrice1}} </label>
									<select v-model="form[1].metal" class="form-control">
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
									<label class="label">Metal Weight :$ @{{price[1].metal}}</label>
										<input type="text" class="form-control" v-model="form[1].metal_weight" placeholder="gram" required>
										<small class="is-danger" v-if="errors.sideStone" >@{{errors.metal_weight[0]}}</small>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">Side Stone :$ @{{price[1].diamond}}</label>
										<input type="text" class="form-control" v-model="form[1].ct" placeholder="@$8000" required>
										<small class="is-danger" v-if="errors.sideStone">@{{errors.sideStone[1]}}</small>
								</div>
							</div>
						</div>	
						<div class="col-2">
							<div class="control ">
								<div class="control">
									<label class="label">Extra Cost</label>
										<input type="text" class="form-control" v-model="form[1].cost" required>
										<small class="is-danger" v-if="errors.sideStone" >@{{errors.cost[1]}}</small>
								</div>
							</div>
						</div>	
						<div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Unit Price $( @{{calculatedRoundedPrice1}} + @{{form[1].cost}} )</label>
										<input type="text" class="form-control" v-model="form[1].unit_price" placeholder="unit_price" required>
										<small class="is-danger" v-if="errors.unit_price">@{{errors.unit_price[1]}}</small>
								</div>
							</div>
						</div>
					</div>

					<div class="row" >
						<div class="col-2">
								<p class="btn btn-primary" @click="addImage(1)">Add Image</p>
						</div>
					</div>
					<div class="row" >
						<div class="col-4" v-for="(image,index) in form[1].images">
								<div class="box">
									<label> Image </label>
									<image-upload :name="'image' + index" v-model="form[1].images[index].image" ></image-upload>
									<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
									<select v-model="form[1].images[index].type" required>
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
									<video-upload :name="video" v-model="form[1].video" ></video-upload>
									<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
								</div>
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
				
			</div> -->
			</form>
		</div>
    </div>


  @endSection


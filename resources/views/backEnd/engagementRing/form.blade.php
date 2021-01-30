@extends('backEnd.app')


  @section('content')

    <div id="engagementRingForm">

	<div class="card-box">	
		<h1 class="title is-3">@{{title}} </h1>
		<h1 class="title is-3" v-if="option">Latest ID: @{{option.id}}</h1>
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
	                        <div class="control" v-if="form.texts[0]">
	                            <label class="label">title - en</label>
	                                <input type="text" class="form-control" v-model="form.texts[0].content" placeholder="title" required>
	                                <small class="message is-danger" v-if="errors.texts">
										<div class="message-body">@{{errors.texts[0].content}}</div>
									</small>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-3">
	                    <div class="control ">
	                        <div class="control" v-if="form.texts[0]">
	                            <label class="label">title - hk</label>
	                                <input type="text" class="form-control" v-model="form.texts[1].content" placeholder="title" required>
	                                <small class="message is-danger" v-if="errors.texts">
										<div class="message-body">@{{errors.texts[1].content}}</div>
									</small>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-3">
	                    <div class="control ">
	                        <div class="control" v-if="form.texts[0]">
	                            <label class="label">title - cn</label>
	                                <input type="description" class="form-control" v-model="form.texts[2].content" required placeholder="title">
	                                <small class="message is-danger" v-if="errors.texts">
										<div class="message-body">@{{errors.texts[2].content}}</div>
									</small>
	                        </div>
	                    </div>
	                </div>

	            </div>
				

				<div class="row">
					<div class="col-2">
						<div class="control has-icon-left">
							<div class="control">
								<label  class="label">Prong</label>
									<select class="form-control" v-model="form.prong">
										<option value="3-prong">3-prong</option>
										<option value="4-prong">4-prong</option>
										<option value="5-prong">5-prong</option>
										<option value="6-prong">6-prong</option>
										<option value="8-prong">8-prong</option>
									</select>
							</div>
						</div>
					</div>
					<div class="col-2">
						<div class="control has-icon-left">
							<div class="control">
								<label class="label">Shoulder</label>
									<select class="form-control" v-model="form.shoulder">
										<option value="Tapering">Tapering</option>
										<option value="Parallel">Parallel</option>
										<option value="Twisted">Twisted</option>
									</select>
							</div>
						</div>
					</div>
					<div class="col-2">
						<div class="control has-icon-left">
							<div class="control">
								<label  class="label">Style</label>
									<select class="form-control" v-model="form.style">
										<option value="Solitaire">Solitaire</option>
										<option value="Side-stone">Side-stone</option>
										<option value="Halo">Halo</option>
									</select>
							</div>
						</div>
					</div>
					<div class="col-2">
						<div class="control has-icon-left">
							<div class="control">
								<label  class="label">Shape</label>
									<select class="form-control" v-model="form.shape">
										<option value="round">round</option>
										<option value="heart">heart</option>
										<option value="princess">princess</option>
										<option value="emerald">emerald</option>
										<option value="asscher">asscher</option>
										<option value="cushion">cushion</option>
										<option value="oval">oval</option>
										<option value="marquise">marquise</option>
										<option value="radiant">radiant</option>
										<option value="pear">pear</option>
									</select>
							</div>
						</div>
					</div>
					<div class="col-2">
						<div class="control has-icon-left">
							<div class="control">
								<label  class="label">other style</label>
									<select class="form-control" v-model="form.other">
										<option value=""></option>
										<option value="enlarge">enlarge</option>
										<option value="hand-engraving">hand-engraving</option>
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
				<div class="row" >
					<div class="col-4" v-for="(image,index) in form.images">
							<div class="box" v-if="form.images[0]">
								<label> Image </label>
								<image-upload :name="'images' + index" v-model="form.images[index].image" ></image-upload>
								<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
								<select class="form-control" v-model="form.images[index].type" required>
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
								<video-upload v-model="form.video" ></video-upload>
								<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
							</div>
					</div>


					
				</div>		


				<div class="row">
					
				</div>
				
				<div class="row">
						<div class="column">
							<button class="btn btn-primary" @submit="save" :disabled="isProcessing" >Save</button>
						</div>
						
					</div>
			
		</div>
		</form>
	</div>

	<div class="row">
       
        <div class="col-12">
		<upload-multi-image></upload-multi-image>
		</div>
	</div>

   @endSection

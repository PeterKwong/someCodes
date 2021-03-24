@extends('backEnd.app')


  @section('content')

    <div id="customerJewelleryForm">

		<div class="card-box">		
			<h3 class="title is-3">@{{action}} Post</h3>
				<form @submit.prevent="save">
				<div class="field" >

					<div class="row">

						<div class="col-2" v-if="option[0]">
							<p>Invoice ID: </p>
							<select class="select" v-model="form.invoice_id" >
								<option v-for="opt in option" >@{{opt.id}}</option>
							</select>
						</div>

						<div class="col-2">
									<select class="select" v-model="form.published">Published
										<option value="0">Draft</option>
										<option value="1">Published</option>
									</select>
						</div>

						<div class="col-4">
									<label class="label">Publish Date</label>
										<input type="date" class="form-control" v-model="form.date">
										<small class="is-danger" v-if="errors.date">@{{errors.date[0]}}</small>
						</div>

						<div class="col-4" >
							<p v-if="optionTitle[0]">Title: @{{optionTitle[0].title}}</p>
						</div>

					</div>

					<div class="row">

						<div class="col-4" v-if="option[0]">
							<p>which Item: </p>
							<select class="select" v-model="selectedItem" @change="selectPostType()">
								<option v-for="jew in option[0].engagement_rings" :value="'App/EngagementRing.id_' + jew.id" >EngagementRing : @{{jew.stock}}</option>
								<option v-for="jew in option[0].wedding_rings" :value="'App/WeddingRing.id_' + jew.id" 
								>Wedding Ring : @{{jew.stock}}</option>
								<option v-for="jew in option[0].jewelleries" :value="'App/Jewellery.id_' + jew.id" 
								 >Jewellery : @{{jew.stock}}</option>
							</select>
						</div>

						<div class="col-4">
							<p>type : @{{form.postable_type}}</p>
						</div>

						<div class="col-4" >
							<p>ID : @{{form.postable_id}}</p>
						</div>

					</div>


					<div class="row">

						<div class="col-1">
							<div class="control has-icon-left">
								<div class="control">
									<p class="btn btn-primary" @click="autoTitle">gen</p>
								</div>
							</div>
						</div>

					</div>
		 
					<div class="row">
		                <div class="col-4">
		                    <div class="control ">
		                        <div class="control" v-if="form.texts[0]">
		                            <label class="label">title - en</label>
		                                <input type="text" class="form-control" v-model="form.texts[0].content" placeholder="title" required>
		                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control" v-if="form.texts[1]">
		                            <label class="label">title - hk</label>
		                                <input type="text" class="form-control" v-model="form.texts[1].content" placeholder="title" required>
		                                <small class="is-danger" v-if="errors.name">@{{errors.name[0]}}</small>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-3">
		                    <div class="control ">
		                        <div class="control" v-if="form.texts[2]">
		                            <label class="label">title - cn</label>
		                                <input type="description" class="form-control" v-model="form.texts[2].content" required placeholder="title">
		                                <small class="is-danger" v-if="errors.description">@{{errors.description[0]}}</small>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-2">
							<div class="control has-icon-left">
								<div class="control">
								</div>
							</div>
						</div>

		            </div>
					<div class="row">
						<div class="column">
							<p class="btn btn-success" v-for="tag in form.page.tags" >@{{tag.content}}</p>
						</div>
					</div>
					<div class="row">
							<div class="column">
								<p class="btn btn-primary" @click="addImage">Add Image</p>
							</div>
							
					</div>
					<div class="row" >
						<div class="col-4" v-for="(image,index) in form.images">
								<div class="box">
									<label> Image </label>
									<image-upload :name="'images' + index" v-model="form.images[index].image" ></image-upload>
									<small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
									<select v-model="form.images[index].type" required>
										<option value="cover">cover</option>
										<option value="image1">image1</option>
										<option value="image2">image2</option>
										<option value="cert">cert</option>
										<option value="gia_no">Gia No.</option>
										<option value="draft">draft</option>
										<option value="3d">3d</option>
									</select>
								</div>
						</div>
					</div>	
					<div class="row" >

						<div class="col-4">
								<div class="box" >
									<label> video</label>
									<video-upload name="video" v-model="form.video" ></video-upload>
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
			</form>
				

			<div class="row">
		       
		        <div class="col-12">
				<upload-multi-image></upload-multi-image>
				</div>
			</div>


		</div>

    </div>


  @endSection


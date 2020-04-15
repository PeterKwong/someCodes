@extends('backEnd.app')


  @section('content')

    <div id="customerMomentForm">

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
		                    <div class="col">
		                        <p class="btn btn-primary" @click="addImage">Add Image</p>
		                    </div>
		                    
		            </div>
		            <div class="row" >
		                <div class="col-2" v-for="(image,index) in form.images">
		                        <div class="box">
		                            <label> Image </label>
		                            <image-upload :name="'images' + index" v-model="form.images[index].image" ></image-upload>
			                        <select class="form-control" v-model="form.images[index].type" required>
										<option value="cover">cover</option>
										<option value="image1">image1</option>
										<option value="image2">image2</option>
										<option value="draft">draft</option>
										<option value="3d">3d</option>
									</select>
		                            <small class="error__control" v-if="errors.cover">@{{errors.cover[0]}}</small>
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
		                    <div class="col">
		                        <button class="btn btn-primary" @submit="save" :disabled="isProcessing">Save</button>
		                    </div>
		                    
		                </div>
		        
		    </div>
		   </form>

		</div>
    </div>


  @endSection


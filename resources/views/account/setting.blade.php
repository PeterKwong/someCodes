@extends('layouts.section.account')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('home.meta1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('home.webTitle')}}"> 
        <meta itemprop="keywords" content="{{trans('home.keywords')}}"> 
        <meta itemprop="description" content="{{trans('home.meta1')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('home.webTitle')}}" /> 
        <meta property="og:type" content="article" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('home.meta1')}}" /> 
        <meta property="og:site_name" content="{{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" /> 
        <meta property="article:section" content="Article Section" /> 
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 
        <meta property="fb:admins" content="https://www.facebook.com/tingdiamonds/" />


    @endSection

    @section('content')
        <br>
            <div class="col-10 text-center" id="setting">
              	<form @submit.prevent="save">

	                <h4>{{__('account.Account Setting')}}</h4>

	                <div class="row justify-content-center">
	                  <div class="col">
	                  	<p class="subtitle is-6">{{__('account.Name')}}</p>
	                  </div> 
	                  <div class="col">
	                    <input class="form-control" type="text" name="name" v-model="form.user.name" required>
	                  </div>    
	                </div>

	                <div class="row justify-content-center">
	                  <div class="col">
	                  	<p class="subtitle is-6">{{__('account.Email')}}</p>
	                  </div> 
	                  <div class="col">
	                    <input class="form-control" type="email" name="email" v-model="form.user.email" disabled required>
	                  </div>    
	                </div>


	                @if( auth()->user()->customers()->first() )

	                <br>
	                
	                <div v-if="form.user.customers.length >0">	 

	                	<h5>{{__('account.Shopping Address')}}</h5>
	                	<br>
               			<div v-if="form.user.customers.length >0" >

		               	<div class="row justify-content-center">
			                  <div class="col">
			                  	<p class="subtitle is-6">{{__('account.Name')}}</p>
			                  </div> 
			                  <div class="col">
			                    <input class="form-control" type="text" name="name" v-model="form.user.customers[0].name" required>
			                  </div>    
		                </div>

		               	<div class="row justify-content-center">
			                  <div class="col">
			                  	<p class="subtitle is-6">{{__('account.Phone')}}</p>
			                  </div> 
			                  <div class="col">
			                    <input class="form-control" type="number" name="phone" v-model="form.user.customers[0].phone" required>
			                  </div>    
		                </div>

		               	<div class="row justify-content-center">
			                  <div class="col">
			                  	<p class="subtitle is-6">{{__('account.email')}}</p>
			                  </div> 
			                  <div class="col">
			                    <input class="form-control" type="email" name="email" v-model="form.user.customers[0].email" required>
			                  </div>    
		                </div>

		               	<div class="row justify-content-center">
			                  <div class="col">
			                  	<p class="subtitle is-6">{{__('account.Area')}}</p>
			                  </div> 
			                  <div class="col">
			                    <input class="form-control" type="text" name="country" v-model="form.user.customers[0].country" required>
			                  </div>    
		                </div>

		               	<div class="row justify-content-center">
			                  <div class="col">
			                  	<p class="subtitle is-6">{{__('account.Address')}}</p>
			                  </div> 
			                  <div class="col">
			                    <input class="form-control" type="text" name="address" v-model="form.user.customers[0].address" required>
			                  </div>    
		                </div>

		                </div>
	               	</div>
	               	@endif


	                 <div class="row justify-content-center">
	                  <div class="col">
	                  	<p class="btn btn-primary" @click="form.password.disable = !form.password.disable ">{{__('account.Change Password')}}</p>
	                  </div> 
	                </div>

	                <div class="row justify-content-center" v-if="!form.password.disable">

	                  <div class="col">
	                  	<center>
		                  	<p class="subtitle is-6">{{__('account.New Password')}}</p>
	                    	<input class="form-control" type="password" name="formPasswordNew" v-model="form.password.new" required>
	                    </center>
	                  </div>

	                  <div class="col">
	                  	<center>
		                  	<p class="subtitle is-6">{{__('account.confirm Password')}}</p>
	                    	<input class="form-control" type="password" name="formPasswordConfirm" v-model="form.password.confirm" required>
	                    </center>
	                  </div>


	                </div>


	                <div class="row justify-content-center" >

	                  <div class="col">
	                  	<center>
	                  	<button class="btn btn-primary" :disable="isProcessing" @submit="save" >{{__('account.Save')}}</button>
	                    </center>
	                  </div>

	                </div>




	            </form>


            </div>



    @endSection



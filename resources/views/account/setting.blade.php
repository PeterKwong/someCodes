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

            <div class="col-span-10 p-2" id="setting">
              	<form @submit.prevent="save">

	                <h4 class="text-xl">{{__('account.Account Setting')}}</h4>
	                <div class="p-2 box"> 
		                <div class="grid grid-cols-12 p-1">
		                  <div class="col-span-4">
		                  	<p class="subtitle is-6">{{__('account.Name')}}</p>
		                  </div> 
		                  <div class="col-span-8">
		                    <input class="input w-9/12" type="text" name="name" v-model="form.user.name" required>
		                  </div>    
		                </div>

		                <div class="grid grid-cols-12 p-1">
		                  <div class="col-span-4">
		                  	<p class="subtitle is-6">{{__('account.Email')}}</p>
		                  </div> 
		                  <div class="col-span-8">
		                    <input class="input w-9/12 bg-gray-300" type="email" name="email" v-model="form.user.email" disabled required>
		                  </div>    
		                </div>
	            	</div>

	                @if( auth()->user()->customers()->first() )

	                <br>
	                
	                <div v-if="form.user.customers.length >0">	 

	                	<h5 class="text-xl">{{__('account.Shopping Address')}}</h5>

	                	<div class="p-2 box"> 
	               			<div v-if="form.user.customers.length >0" >

			               	<div class="grid grid-cols-12 p-1">
				                  <div class="col-span-4">
				                  	<p class="subtitle is-6">{{__('account.Name')}}</p>
				                  </div> 
				                  <div class="col-span-8">
				                    <input class="input w-9/12" type="text" name="name" v-model="form.user.customers[0].name" required>
				                  </div>    
			                </div>

			               	<div class="grid grid-cols-12 p-1">
				                  <div class="col-span-4">
				                  	<p class="subtitle is-6">{{__('account.Phone')}}</p>
				                  </div> 
				                  <div class="col-span-8">
				                    <input class="input w-9/12" type="number" name="phone" v-model="form.user.customers[0].phone" required>
				                  </div>    
			                </div>

			               	<div class="grid grid-cols-12 p-1">
				                  <div class="col-span-4">
				                  	<p class="subtitle is-6">{{__('account.email')}}</p>
				                  </div> 
				                  <div class="col-span-8">
				                    <input class="input w-9/12" type="email" name="email" v-model="form.user.customers[0].email" required>
				                  </div>    
			                </div>

			               	<div class="grid grid-cols-12 p-1">
				                  <div class="col-span-4">
				                  	<p class="subtitle is-6">{{__('account.Area')}}</p>
				                  </div> 
				                  <div class="col-span-8">
				                    <input class="input w-9/12" type="text" name="country" v-model="form.user.customers[0].country" required>
				                  </div>    
			                </div>

			               	<div class="grid grid-cols-12 p-1">
				                  <div class="col-span-4">
				                  	<p class="subtitle is-6">{{__('account.Address')}}</p>
				                  </div> 
				                  <div class="col-span-8">
				                    <input class="input w-9/12" type="text" name="address" v-model="form.user.customers[0].address" required>
				                  </div>    
			                </div>

			                </div>
		               	</div>
		               	@endif


		                 <div class="grid grid-cols-12 p-1">
		                  <div class="col-span-6 col-start-4 text-center">
		                  	<p class="btn btn-primary" @click="form.password.disable = !form.password.disable ">{{__('account.Change Password')}}</p>
		                  </div> 
		                </div>

		                <div class="grid grid-cols-12 p-1" v-if="!form.password.disable">

		                  <div class="col-span-12">
		                  	<center>
			                  	<p class="subtitle is-6">{{__('account.New Password')}}</p>
		                    	<input class="input w-9/12" type="password" name="formPasswordNew" v-model="form.password.new" required>
		                    </center>
		                  </div>

		                  <div class="col-span-12">
		                  	<center>
			                  	<p class="subtitle is-6">{{__('account.confirm Password')}}</p>
		                    	<input class="input w-9/12" type="password" name="formPasswordConfirm" v-model="form.password.confirm" required>
		                    </center>
		                  </div>


		                </div>


		                <div class="grid grid-cols-12 p-1" >

		                  <div class="col-span-12">
		                  	<center>
		                  	<button class="btn btn-primary" :disable="isProcessing" @submit="save" >{{__('account.Save')}}</button>
		                    </center>
		                  </div>

		                </div>
		            </div>




	            </form>


            </div>



    @endSection



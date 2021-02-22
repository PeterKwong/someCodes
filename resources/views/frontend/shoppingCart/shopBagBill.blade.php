
@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('frontend.shoppingCart.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('frontend.shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content="@include('frontend.shoppingCart.keywords')"> 


        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('frontend.shoppingCart.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('frontend.shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">


        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('frontend.shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('frontend.shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('frontend.shoppingCart.keywords')" /> 
        
        <script src="https://checkout.stripe.com/checkout.js" defer></script>

 

    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-span-12">
                    <center><h3 class="text-lg font-semibold">{{__('shoppingCart.Secure Checkout')}}</h3>                        
                    </center>
                    
                </div>
            </div>


        <div id="jewellery">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <br>

                      <div id="shopBagBill">
                        <ul class="grid grid-cols-12 px-4 text-center">
                          <li class="col-span-4 text-lg border" :class="{ ' bg-blue-400 text-white' : form.onTab == 'login' }">
                            <a class="p-1" href="#" @click="changeOnTab('login')">
                              <p>
                                <span>1. {{__('shoppingCart.Login') }}</span>
                                <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                <span v-if="form.onProgress.login">{{__('shoppingCart.Edit') }}</span>
                              </p>
                            </a>
                          </li>
                          <li class="col-span-4 text-lg border" :class="{ ' bg-blue-400 text-white' :  form.onTab == 'customerInfo' }">
                            <a class="p-1" href="#" @click="changeOnTab('customerInfo')">
                              <p>
                                <span>2. {{__('shoppingCart.Info') }}</span>
                                <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                <span v-if="form.onProgress.customerInfo">{{__('shoppingCart.Edit') }}</span>
                              </p>
                            </a>
                          </li>
                          <li class="col-span-4 text-lg border" :class="{ ' bg-blue-400 text-white' :  form.onTab == 'payment' }">
                            <a class="p-1" href="#" @click="changeOnTab('payment')">
                              <p>
                                <span>3. {{__('shoppingCart.Review') }} </span>
                                <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                <span v-if="form.onProgress.peyment">{{__('shoppingCart.Edit') }}</span>
                              </p>
                            </a>
                          </li>
                        </ul>

                        <br>

                        <div v-if="form.onTab == 'login' ">

                          <div v-if="!apiToken">

                              <div class="grid grid-cols-12 text-center">

                                  <div class="col-span-12 sm:col-span-5 sm:col-start-4">
                                      <div class="">
                                        @include('frontend.auth.lang.socialLogin')
                                      </div>

                                      <div class="col-span-12 p-8">
                                          <a :href="mutualVar.langs.locale + '/login' " class="btn btn-primary bg-green-400">{{__('shoppingCart.Create New Account/Login') }}</a>
                                      </div>

                                      
                                  </div>

                              </div>
                              
                          </div>

                          <div v-if="apiToken">

                              <div class="grid grid-cols-12 ">
                                  <div class="col-span-12 rounded border p-8 mx-8" @click="changeOnTab('customerInfo')">

                                      <center>
                                          <p class="text-lg font-light btn btn-primary w-48">{{__('shoppingCart.You Logged in!') }}</p>
                                      </center>
                                  </div>

                              </div>
                              
                          </div>


                      </div>




                      <div v-if="form.onTab == 'customerInfo' " >
                          <center>
                          <p>{{__('shoppingCart.Shipping Address') }}</p>

                           <div class="rounded border mx-4">
                              <form @submit.prevent="updateCustomerInfo">

                                  <div class="" v-for="(item,value) in formItems">
                                    <div class="grid grid-cols-12">
                                      <div class="col-span-4 input-group-prepend m-1">
                                        <span class="input-group-text" id="basic-addon1">
                                          * @{{ item.display |transJs(langs) }}
                                        </span>
                                      </div>
                                      <input type="text" class="col-span-8 input w-9/12 m-1" :class="{'is-invalided': formError[item.errorName]}"  :placeholder="item.display |transJs(langs)" aria-label="Username" aria-describedby="basic-addon1"  v-model="form.user[item.data]" required>
                                    </div>
                                    <p v-if="formError[item.errorName]" style="color:red;"> 
                                          <small>                                                     {{__('shoppingCart.this is not correct!') }}
                                          </small>
                                      </p>


                                  </div>


                                  <div class="" >
                                    <div class="grid grid-cols-12">
                                      <div class="col-span-4 input-group-prepend m-1">
                                        <label class="input-group-text" for="inputGroupSelect01">@{{'Area' |transJs(langs) }}
                                        </label>
                                      </div>
                                      <select class="col-span-8 w-9/12 rounded p-1 box m-1" id="inputGroupSelect01" v-model="form.user.country">
                                        <option :value = " 'HK' ">{{__('shoppingCart.HK') }}</option>
                                        <option :value = " 'CN' ">{{__('shoppingCart.CN') }}</option>
                                      </select>
                                    </div>

                                      <div class="col ">
                                        <p style="color: red" v-if="form.user.country == 'CN' ">*<small> {{__('shoppingCart.China customer will be sent a ring size tool.') }} </small></p>
                                      </div>
                                  </div>

                                  <div class="row" >

                                    <div class="col">
                                      <center>
                                      <button class="btn btn-primary" :disabled="isProcessing" @click="updateCustomerInfo" >{{__('shoppingCart.Save' ) }}</button>
                                      </center>
                                    </div>
                                  </div>


                              </form>

                          </div>


                      </center>

                      </div>


                                  <div v-if="form.onTab == 'payment' ">

                                       <div class="grid grid-cols-12">
                                        <div class="col-span-12 p-8">
                                          <div class=""> 
                                          <div>
                                              <th colspan="12"> <center>{{__('shoppingCart.Info') }}</center> </th>
                                          </div>             
                                            <div>
                                              <div v-for="(item,value) in formItems" class="grid grid-cols-12 ">
                                                <div class="col-span-4 box p-2">@{{ item.display |transJs(langs) }}</div>
                                                <div class="col-span-8 box p-2">@{{form.user[item.data]}}</div>
                                              </div>
                                              <div class="grid grid-cols-12 ">
                                                <div class="col-span-4 box p-2"><p class="text-lg font-light">@{{'Area' |transJs(langs) }}</p>
                                                </div>
                                                <div  class="col-span-8 box p-2">@{{form.user.country |transJs(langs) }}</div>
                                              </div>                               
                                            </div>
                                          </div>

                                        </div>  
                                      </div>

                                      <form class="p-4">
                                         <div class="grid grid-cols-12">
                                              <div class="col-span-12">
                                                <shopping-cart-item></shopping-cart-item>
                                              </div>
                                        </div>

                                      <div class="flex justify-between">
                                        <div></div>
                                        <div class="order-last">
                                          <div @click="checkoutStatus = 'selectingPayment'">
                                            <buton class="btn btn-primary " :class="{'opacity-25' : !checkoutClickable || isProcessing}" @click="paymentOption.modal = !paymentOption.modal"  >{{__('shoppingCart.select payment')  }}</buton>
                                          </div>
                                        </div>                            
                                      </div>



                                            <div v-if="paymentOption.modal && checkoutClickable " @click="paymentOption.modal = !paymentOption.modal">
                                              <transition name="modal">
                                                <div class="modal-mask">
                                                <button tabindex="-1" class="modal-button"></button>
                                                  <div class="modal-wrapper">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" @click="paymentOption.modal = !paymentOption.modal">
                                                      <div class="modal-content">
                                                        <div class="modal-header flex justify-between items-center bg-blue-300 rounded-t-lg px-4">
                                                          <h5 class="modal-title text-white order-first">{{__('shoppingCart.Payment Methods')}}</h5>
                                                          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" @click="paymentOption.modal = !paymentOption.modal">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body p-8">
                                                          <div class="grid grid-cols-12">
                                                        <div class="col-span-8">
                                                            <div v-if="checkoutStatus == 'selectingPayment' && !isProcessing" @click="checkoutStatus = 'paymentProcessing' ">
                                                              <center>
                                                              <div @click="paymentOption.modal = !paymentOption.modal" >
                                                                <span @click="cookies.checkout.depositPaymentMethod = 'VISA' " >
                                                                  <stripe-checkout-form :paymentmodalactive="paymentOption.modal" :clickable="checkoutClickable" :deposit="cookies.checkout.discountedDeposit" :user="form.user" :title="title" :billformdata="formData" ></stripe-checkout-form> 
                                                                </span>
                                                              </div>

                                                              <div>
                                                                <button @click="placeOrder('Alipay(-1%)')" class="btn btn-primary "><i class="fab fa-alipay"></i>{{__('shoppingCart.Alipay')}}</button>
                                                              </div>

                                                              <div>
                                                                <button @click="placeOrder('Wechat(-1%)')" class="btn btn-primary "><i class="fab fa-weixin"></i>{{__('shoppingCart.Wechat')}}</button>
                                                              </div>
                                                                                                                  
                                                              </center>

                                                            </div>

                                                            <div v-if="isProcessing">
                                                                <img src="/images//front-end/loader.gif"  width="150">

                                                            </div>

                                                            <div  v-if="checkoutStatus == 'paymentProcessing' ">
                                                              <div v-if="paymentResponse.response">
                                                                <iframe v-if="paymentResponse.response.code_img_url" width="100%" height="350" :src="paymentResponse.response.code_img_url"></iframe>

                                                                <img v-if="paymentResponse.response.is_success && paymentResponse.response.response.code_img_url" width="200" height="200" :src="toQRcode"></img>                                                               
                                                              </div>                                         
                                                            </div>

                                                        </div>

                                                        <div class="col-span-4">
                                                          <br>
                                                          <p class="text-lg font-semibold">
                                                            <small> @{{ title }} </small>
                                                          </p>
                                                          <a class="text-blue-600" v-if="cookies.checkout.discountedDeposit">{{ __('shoppingCart.Deposit') }} : HK$ @{{ cookies.checkout.discountedDeposit }}</a>
                                                          <a class="text-blue-600" v-else>{{ __('shoppingCart.Deposit') }} : HK$ @{{ cookies.checkout.deposit }}</a>


                                                            <br>
                                                              <a class="text-green-400" v-if="formData.depositPaymentMethod == 'Wechat(-1%)' ">
                                                                {{__('shoppingCart.select payment')  }} : 
                                                                <i class="fab fa-weixin"></i>{{__('shoppingCart.Wechat')}}
                                                              </a>

                                                              <a class="text-blue-400" v-if="formData.depositPaymentMethod == 'Alipay(-1%)' ">
                                                                {{__('shoppingCart.select payment')  }} : 
                                                                <i class="fab fa-weixin"></i>{{__('shoppingCart.Alipay')}}
                                                              </a>


                                                        </div>
                                                                                            
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </transition>
                                          </div>



                                      </div>



                                  </form>
                                  </div>

                          </div>

                      </div>



                    
                </div>
                
            </div>
            
        </div>

    @endSection





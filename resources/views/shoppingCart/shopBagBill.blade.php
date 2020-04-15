
@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('shoppingCart.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content="@include('shoppingCart.keywords')"> 


        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">


        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('shoppingCart.keywords')" /> 
        
        <script src="https://checkout.stripe.com/checkout.js" defer></script>

 

    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-12">
                    <center><h3 class="title is-5">{{__('shoppingCart.Secure Checkout')}}</h3>                        
                    </center>
                    
                </div>
            </div>


        <div id="jewellery">
            <div class="row justify-content-center">
                <div class="col-11">
                    <br>

                      <div id="shopBagBill">
                        <ul class="nav nav-pills nav-fill">
                          <li class="nav-item border">
                            <a class="nav-link" href="#" :class="{ ' active' : form.onTab == 'login' }" @click="changeOnTab('login')">
                              <p>
                                <span>1. {{__('shoppingCart.Login') }}</span>
                                <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                <span v-if="form.onProgress.login">{{__('shoppingCart.Edit') }}</span>
                              </p>
                            </a>
                          </li>
                          <li class="nav-item border">
                            <a class="nav-link" href="#" :class="{ ' active' :  form.onTab == 'customerInfo' }" @click="changeOnTab('customerInfo')">
                              <p>
                                <span>2. {{__('shoppingCart.Info') }}</span>
                                <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                                <span v-if="form.onProgress.customerInfo">{{__('shoppingCart.Edit') }}</span>
                              </p>
                            </a>
                          </li>
                          <li class="nav-item border">
                            <a class="nav-link" href="#" :class="{ ' active' :  form.onTab == 'payment' }" @click="changeOnTab('payment')">
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

                                          <div class="row justify-content-center ">

                                              <div class="col-md-5">
                                                  <div class="rounded border">
                                                      <div v-if=" locale != '/cn' " class="row justify-content-center ">
                                                        <a href="/auth/facebook" class="btn btn-primary"><i class="fab fa-facebook"></i> Facebook</a>
                                                        <a href="/auth/google" class="btn btn-primary"><i class="fab fa-google"></i> google</a>              
                                                        <a href="/auth/twitter" class="btn btn-primary"><i class="fab fa-twitter"></i> Twitter</a>
                                                      </div>  

                                                      <br>

                                                      <div class="row justify-content-center ">
                                                        <a href="https://open.weixin.qq.com/connect/qrconnect?appid=wx37cf6a202a727207&scope=snsapi_login&redirect_uri=https%3A%2F%2Ftingdiamond.com%2Fwechatqrnext&state=&login_type=jssdk&self_redirect=true&style=black" class="btn btn-primary"><i class="fab fa-weixin"></i> {{__('shoppingCart.Wechat') }}</a>

                                                        <a href="https://auth.alipay.com/login/index.htm?goto=https%3A%2F%2Fopenauth.alipay.com%3A443%2Foauth2%2FpublicAppAuthorize.htm%3Fapp_id%3D2018081161022086%26scope%3Dauth_user%26redirect_uri%3Dhttps%253A%252F%252Ftingdiamond.com%252Falipay%26state%3Dinit" class="btn btn-primary"><i class="fab fa-alipay"></i>{{__('shoppingCart.Alipay') }}</a>

                                                      </div>
                                                  </div>

                                                  <br>

                                                  <div class="row justify-content-center ">
                                                      <a :href="mutualVar.langs.locale + '/login' " class="btn btn-success">{{__('shoppingCart.Create New Account/Login') }}</a>
                                                  </div>

                                                  
                                              </div>

                                          </div>
                                          
                                      </div>

                                      <div v-if="apiToken">

                                          <div class="row justify-content-center ">
                                              <div class="col-6 rounded border" @click="changeOnTab('customerInfo')">

                                                  <center>
                                                      <p class="subtitle is-6">{{__('shoppingCart.You Logged in!') }}</p>
                                                  </center>
                                              </div>

                                          </div>
                                          
                                      </div>


                                  </div>




                                  <div v-if="form.onTab == 'customerInfo' " >
                                      <center>
                                      <p>{{__('shoppingCart.Shipping Address') }}</p>

                                       <div class="col-11 rounded border">
                                          <form @submit.prevent="updateCustomerInfo">

                                              <div class="row" v-for="(item,value) in formItems">
                                                <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                      * @{{ item.display |transJs(langs) }}
                                                    </span>
                                                  </div>
                                                  <input type="text" class="form-control" :class="{'is-invalided': formError[item.errorName]}"  :placeholder="item.display |transJs(langs)" aria-label="Username" aria-describedby="basic-addon1"  v-model="form.user[item.data]" required>
                                                </div>
                                                <p v-if="formError[item.errorName]" style="color:red;"> 
                                                      <small>                                                     {{__('shoppingCart.this is not correct!') }}
                                                      </small>
                                                  </p>


                                              </div>


                                              <div class="row" >
                                                <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">@{{'Area' |transJs(langs) }}</label>
                                                  </div>
                                                  <select class="custom-select" id="inputGroupSelect01" v-model="form.user.country">
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

                                       <div class="row justify-content-center">
                                        <div class="col-11">
                                          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth"> 
                                          <thead>
                                              <th colspan="12"> <center>{{__('shoppingCart.Info') }}</center> </th>
                                          </thead>             
                                            <tbody>
                                              <tr v-for="(item,value) in formItems">
                                                <td >@{{ item.display |transJs(langs) }}</td>
                                                <td>@{{form.user[item.data]}}</td>
                                              </tr>
                                              <tr>
                                                <td ><p class="subtitle is-6">@{{'Area' |transJs(langs) }}</p></td>
                                                <td>@{{form.user.country |transJs(langs) }}</td>
                                              </tr>                               
                                            </tbody>
                                          </table>

                                        </div>  
                                      </div>

                                      <form>
                                           <div class="row">
                                                <div class="col">
                                                  <shopping-cart-item></shopping-cart-item>
                                                </div>
                                          </div>



                                      <br>

                                      <div class="row">
                                        <div class="col-auto mr-auto">
                                        </div>
                                        <div class="col-auto">

                                          <div @click="checkoutStatus = 'selectingPayment'">
                                            <buton class="btn btn-primary " @click="paymentOption.modal = !paymentOption.modal" :class = " {'disabled' : !checkoutClickable || isProcessing } " >{{__('shoppingCart.select payment')  }}</buton>
                                          </div>

                                            <div v-if="paymentOption.modal && checkoutClickable " @click="paymentOption.modal = !paymentOption.modal">
                                              <transition name="modal">
                                                <div class="modal-mask">
                                                  <div class="modal-wrapper">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" @click="paymentOption.modal = !paymentOption.modal">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title">{{__('shoppingCart.Payment Methods')}}</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" @click="paymentOption.modal = !paymentOption.modal">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="row">
                                                        <div class="col-8">
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

                                                        <div class="col">
                                                          <br>
                                                          <p class="title is-6">
                                                            <small> @{{ title }} </small>
                                                          </p>
                                                          <a class="color-blue" v-if="cookies.checkout.discountedDeposit">{{ __('shoppingCart.Deposit') }} : HK$ @{{ cookies.checkout.discountedDeposit }}</a>
                                                          <a class="color-blue" v-else>{{ __('shoppingCart.Deposit') }} : HK$ @{{ cookies.checkout.deposit }}</a>


                                                            <br>
                                                              <a class="" v-if="formData.depositPaymentMethod == 'Wechat(-1%)' ">
                                                                {{__('shoppingCart.select payment')  }} : 
                                                                <i class="fab fa-weixin"></i>{{__('shoppingCart.Wechat')}}
                                                              </a>

                                                              <a class="" v-if="formData.depositPaymentMethod == 'Alipay(-1%)' ">
                                                                {{__('shoppingCart.select payment')  }} : 
                                                                <i class="fab fa-weixin"></i>{{__('shoppingCart.Alipay')}}
                                                              </a>


                                                        </div>
                                    


                                                    </div>
                                                        </div>

<!--                                                         <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" @click="paymentOption.modal = !paymentOption.modal">Close</button>
                                                        </div>
 -->

                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </transition>
                                            </div>




                                                  
                                                  </div>                            
                                              </div>
                                      </div>
                                      <br>



                                  </form>
                                  </div>

                          </div>

                      </div>



                    
                </div>
                
            </div>
            
        </div>

    @endSection





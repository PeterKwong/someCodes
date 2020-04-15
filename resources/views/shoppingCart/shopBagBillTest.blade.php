<!doctype html>
@include('layouts.style.lang')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.metas.schema')
        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('shoppingCart.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content="@include('shoppingCart.keywords')"> 

        @include('layouts.metas.google')

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        @include('layouts.metas.twitter')

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('shoppingCart.keywords')" /> 
        @include('layouts.metas.openGraph')
        @include('layouts.style.checkoutHeader')

        @include('layouts.metas.stripeHeaders')
        @include('layouts.metas.userApiToken')

        <!-- Fonts -->
       
        <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
       
    </head>
   
    @include('layouts.frontHeader')
    <body>
            <br>
            <div class="columns is-mobile is-centered is-multiline box">
              <div class="column is-narrow">
                <p class="subtitle is-5">
                  {{__('shoppingCart.Secure Checkout')}}<br>
                </p>
              </div>
            </div>

        <div id="shopBagBill">
           <div>
                 <div class="tabs is-fullwidth " :class=" {'is-toggle': apiToken }">
                      <ul>

                        <li :class="{ 'is-active' : form.onTab == 'login' }" @click="changeOnTab('login')">
                          <a>
                            <span>1. {{__('shoppingCart.Login') }}</span>
                            <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                            <span v-if="form.onProgress.login">{{__('shoppingCart.Edit') }}</span>
                          </a>
                        </li>

                       <li :class="{ 'is-active' :  form.onTab == 'customerInfo' }" @click="changeOnTab('customerInfo')">
                          <a>
                            <span>2. {{__('shoppingCart.Info') }}</span>
                            <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                            <span v-if="form.onProgress.customerInfo">{{__('shoppingCart.Edit') }}</span>
                          </a>
                        </li>

                       <li :class="{ 'is-active' :  form.onTab == 'payment' }" @click="changeOnTab('payment')">
                          <a>
                            <span>3. {{__('shoppingCart.Review') }} </span>
                            <span class="icon"><i class="fas fa-angle-right" aria-hidden="true"></i></span>
                            <span v-if="form.onProgress.peyment">{{__('shoppingCart.Edit') }}</span>
                          </a>
                        </li>
                        
                      </ul>
                    </div>

                    <div v-if="form.onTab == 'login' ">
                        <div v-if="!apiToken">

                            <div class="columns is-mobile">
                                <div class="column is-hidden-mobile">
                                    
                                </div>
                                <div class="column">
                                    <div class="box">
                                        <div v-if=" locale != '/cn' ">
                                        <a href="/auth/facebook" class="button is-primary"><i class="fab fa-facebook"></i> Facebook</a>
                                        <a href="/auth/google" class="button is-primary"><i class="fab fa-google"></i> google</a>              
                                        <a href="/auth/twitter" class="button is-primary"><i class="fab fa-twitter"></i> Twitter</a>
                                        </div>  

                                        <br>

                                        <div >
                                        <a href="https://open.weixin.qq.com/connect/qrconnect?appid=wx37cf6a202a727207&scope=snsapi_login&redirect_uri=https%3A%2F%2Ftingdiamond.com%2Fwechatqrnext&state=&login_type=jssdk&self_redirect=true&style=black" class="button is-primary"><i class="fab fa-weixin"></i> {{__('shoppingCart.Wechat') }}</a>

                                        <a href="https://auth.alipay.com/login/index.htm?goto=https%3A%2F%2Fopenauth.alipay.com%3A443%2Foauth2%2FpublicAppAuthorize.htm%3Fapp_id%3D2018081161022086%26scope%3Dauth_user%26redirect_uri%3Dhttps%253A%252F%252Ftingdiamond.com%252Falipay%26state%3Dinit" class="button is-primary"><i class="fab fa-alipay"></i>{{__('shoppingCart.Alipay') }}</a>

                                        </div>
                                    </div>

                                    <div class="box">
                                        <a :href="mutualVar.langs.locale + '/login' " class="button is-info">{{__('shoppingCart.Create New Account') }}</a>
                                    </div>

                                    
                                </div>


                                <div class="column is-hidden-mobile">
                                    
                                </div>
                            </div>
                            
                        </div>

                        <div v-if="apiToken">
                            <div class="columns is-mobile">
                                <div class="column is-hidden-mobile">
                                    
                                </div>

                                <div class="column box" @click="changeOnTab('customerInfo')">
                                    <center>
                                        <p class="subtitle is-6">{{__('shoppingCart.You Logged in!') }}</p>
                                    </center>
                                </div>

                                <div class="column is-hidden-mobile">
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>


                    <div v-if="form.onTab == 'customerInfo' " >
                        <center>
                        <p>{{__('shoppingCart.Shipping Address') }}</p>

                         <div class="column box">
                            <form @submit.prevent="updateCustomerInfo">

                                <div class="columns is-mobile is-multilined" v-for="(item,value) in formItems">
                                  <div class="column is-1 is-hidden-mobile">
                                  </div>
                                  <div class="column is-3">
                                    <p class="subtitle is-6">* @{{ item.display |transJs(langs) }}</p>
                                  </div> 
                                  <div class="column ">
                                    <input @keyup="sendCookies()" class="input" :class="{'is-danger': formError[item.errorName]}" type="text" :name="item.data" v-model="form.user[item.data]" required>
                                    <p v-if="formError[item.errorName]" style="color:red;"> 
                                        <small>{{__('shoppingCart.this is not correct!') }} </small>
                                    </p>

                                  </div>

                                  <div class="column is-2 is-hidden-mobile">
                                  </div>

                                </div>


                                <div class="columns is-mobile is-multilined" >
                                    <div class="column is-1 is-hidden-mobile">
                                      </div>
                                      <div class="column is-3">
                                        <p class="subtitle is-6">@{{'Area' |transJs(langs) }}</p>
                                      </div> 
                                      <div class="column ">
                                            <center>
                                                <div class="select">
                                                <select v-model="form.user.country" >
                                                    <option :value = " 'HK' ">{{__('shoppingCart.HK') }}</option>
                                                    <option :value = " 'CN' ">{{__('shoppingCart.CN') }}</option>
                                                </select>
                                                </div>
                                            </center>
                                        </p>

                                      </div>

                                      <div class="column ">
                                        <p style="color: red" v-if="form.user.country == 'CN' ">*<small> {{__('shoppingCart.China customer will be sent a ring size tool.') }} </small></p>
                                      </div>

                                      <div class="column is-2 is-hidden-mobile">
                                      </div>

                                </div>

                                <div class="columns is-mobile is-multilined" >
                                  <div class="column is-3">
                                  </div> 

                                  <div class="column is-3">
                                  </div> 

                                  <div class="column is-3">
                                    <center>
                                    <button class="button is-primary" :disabled="isProcessing" @click="updateCustomerInfo" >{{__('shoppingCart.Save' ) }}</button>
                                    </center>
                                  </div>

                                  <div class="column is-3">
                                  </div> 

                                </div>


                            </form>

                        </div>


                    </center>

                    </div>


                    <div v-if="form.onTab == 'payment' ">
                        <form>
                             <div class="columns is-mobile is-multilined">
                                  <div class="column is-1 is-hidden-mobile">
                                  </div>
                                     <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth"> 
                                    <thead>
                                        <th colspan="12"> <center>{{__('shoppingCart.Info') }}</center> </th>
                                    </thead>             
                                      <tbody>
                                        <tr v-for="(item,value) in formItems">
                                          <td colspan="3"><p class="subtitle is-6">@{{ item.display |transJs(langs)  }}</p></td>
                                          <td>@{{form.user[item.data]}}</td>
                                        </tr>
                                        <tr>
                                          <td colspan="3"><p class="subtitle is-6">@{{'Area' |transJs(langs) }}</p></td>
                                          <td>@{{form.user.country |transJs(langs) }}</td>
                                        </tr>                               
                                      </tbody>
                                    </table>

                                  <div class="column is-1 is-hidden-mobile">
                                  </div>

                                </div>

                             <div class="columns is-mobile is-multilined">
                                  <div class="column is-1 is-hidden-mobile">
                                  </div>

                                    <div class="column">

                                    <shopping-cart-item></shopping-cart-item>
                                  </div>

                                  <div class="column is-1 is-hidden-mobile">
                                  </div>

                            </div>



                        <br>

                        <div class="columns is-multilined is-mobile">
                            <div class="column is-6 is-hidden-mobile"></div>
                            <div class="column">
                                <div class="columns is-mobile is-multilined">
                                    <div class="column">
                                        
                                    </div>
                                    <div class="column">

 <!--                                      
                                        <buton class="button is-primary" @click="placeOrder('empty')" :disabled="!checkoutClickable || isProcessing" >{{__('shoppingCart.Review and Order' )  }}</buton>
                                 -->


                                        <div @click="checkoutStatus = 'selectingPayment'">
                                          <buton class="button is-primary" @click="paymentOption.modal = !paymentOption.modal" :disabled="!checkoutClickable || isProcessing" >{{__('shoppingCart.select payment')  }}</buton>
                                        </div>



                                        <div class="modal" :class=" {'is-active' : paymentOption.modal }"  v-if="paymentOption.modal && orderStatus != 'received money' ">

                                          <div class="modal-background" @click="paymentOption.modal = !paymentOption.modal">  
                                          </div>

                                            <div class="modal-card" >
                                              
                                              <header class="modal-card-head">
                                                <p class="modal-card-title">{{__('shoppingCart.Payment Methods')}}</p>
                                                <button class="delete" aria-label="close" @click="paymentOption.modal = !paymentOption.modal"></button>
                                              </header>

                                              <section class="modal-card-body">

                                                <div class="columns">
                                                    <div class="column is-7">
                                                        <div v-if="checkoutStatus == 'selectingPayment' && !isProcessing" @click="checkoutStatus = 'paymentProcessing' ">
                                                          <center>
                                                          <div @click="paymentOption.modal = !paymentOption.modal" >
                                                            <span @click="cookies.checkout.depositPaymentMethod = 'VISA' " >
                                                              <stripe-checkout-form :paymentmodalactive="paymentOption.modal" :clickable="checkoutClickable" :deposit="cookies.checkout.discountedDeposit" :user="form.user" :title="title" :billformdata="formData" ></stripe-checkout-form> 
                                                            </span>
                                                          </div>

                                                          <div>
                                                            <a @click="placeOrder('Alipay(-1%)')" class="button is-primary is-large"><i class="fab fa-alipay"></i>{{__('shoppingCart.Alipay')}}</a>
                                                          </div>

                                                          <div>
                                                            <a @click="placeOrder('Wechat(-1%)')" class="button is-primary is-large"><i class="fab fa-weixin"></i>{{__('shoppingCart.Wechat')}}</a>
                                                          </div>
                                                                                                              
                                                          </center>

                                                        </div>

                                                        <div v-if="isProcessing">
                                                            <img src="/front_end/loader.gif"  width="150">

                                                        </div>

                                                        <div  v-if="checkoutStatus == 'paymentProcessing' ">
                                                          <div v-if="paymentResponse.response">
                                                            <iframe v-if="paymentResponse.response.code_img_url" width="100%" height="350" :src="paymentResponse.response.code_img_url"></iframe>

                                                            <img v-if="paymentResponse.response.is_success && paymentResponse.response.response.code_img_url" width="200" height="200" :src="toQRcode"></img>                                                               
                                                          </div>                                         
                                                        </div>

                                                    </div>

                                                    <div class="column">
                                                      <br>
                                                      <p class="title is-6">
                                                        <small> @{{ title }} </small>
                                                      </p>
                                                      <a class="">{{ __('shoppingCart.Deposit') }} : HK$ @{{ cookies.checkout.discountedDeposit }}</a>


                                                        <br>
                                                          <a class="button" v-if="formData.depositPaymentMethod == 'Wechat(-1%)' ">
                                                            {{__('shoppingCart.select payment')  }} : 
                                                            <i class="fab fa-weixin"></i>{{__('shoppingCart.Wechat')}}
                                                          </a>

                                                          <a class="button" v-if="formData.depositPaymentMethod == 'Alipay(-1%)' ">
                                                            {{__('shoppingCart.select payment')  }} : 
                                                            <i class="fab fa-weixin"></i>{{__('shoppingCart.Alipay')}}
                                                          </a>


                                                    </div>
                                


                                                </div>

                                                

                                              </section>



                                          </div>





                                        </div>




                                    
                                    </div>                            
                                </div>
                            </div>
                        </div>
                        <br>

                    </form>
                    </div>

            </div>

        </div>



<script src="https://checkout.stripe.com/checkout.js"></script>

    @include('layouts.frontFooter')

  

</body>



</html>

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
            <div class="col-10 " id="couponCode">

                <form @submit.prevent="save">

                  <p class="title is-4">{{__('account.Referrals')}}</p>

                  <div class="row ">
                    <div class="col-5">
                      <p class="subtitle is-6">{{__('account.Coupon Code')}}</p>
                    </div> 
                    <div class="col-5">
                        <p style="color:blue;">@{{model.code}}</p>
                    </div>    
                  </div>

                    <div class="row ">
                      <div class="col-5">
                        <p class="subtitle is-6">{{__('account.Coupon Link')}}</p>
                      </div> 
                      <div class="col-5">
                        <a :href="'/coupon?code='+ model.code">@{{ hostname + '/coupon?code='+ model.code}}</a>
                      </div>    
                    </div>

                    <div class="row ">
                      <div class="col-5">
                        <p class="subtitle is-6">{{__('account.Total Applied Coupon User')}}</p>
                      </div> 
                      <div class="col-5">
                        <p style="color:blue;">@{{model.appliedUser}}</p>
                      </div>    
                    </div>


                    <div class="row ">
                      <div class="col-5">
                        <p class="subtitle is-6">{{__('account.Total Clicked')}} ( {{__('account.Apply in shopping cart or Click link')}} )</p>
                      </div> 
                      <div class="col-5">
                        <p style="color:blue;">@{{model.clicked}}</p>
                      </div>  
                    </div>

                    <div class="row  box">
                      <div class="col-5">
                        <a :href=" mutualVar.langs.locale + '/account/referral/records' " class="subtitle is-6">{{__('account.Total Applied Orders')}} </a>
                      </div> 
                      <div class="col-5">
                        <a :href=" mutualVar.langs.locale + '/account/referral/records' " style="color:blue;">@{{model.orders}}</a>
                      </div>  
                    </div>

                    


                    <div class="tabs">
                      <table class="table table-responsive">
                        <thead>
                          <tr>
                              <center>
                                  <th colspan="12"><strong><a>{{__('account.Discount Rate')}}</a></strong></th>   
                              </center>                     
                          </tr>
                          <tr>
                            <th>{{__('account.Item')}}</th>
                            <th>{{__('account.Amount')}}</th>

<!--                             <th>{{__('account.Rate')}}</th>
 -->                            
                            <th>{{__('account.Refund Rate')}}</th>
                          
                          </tr>
                        </thead>
   
                        <tbody>
                          
                          <tr v-for="(rate,key) in model.discountRate">
                            <th>@{{key}}</th>
                            <td>HK $ @{{rate.lowerAmount}} - HK $ @{{rate.upperAmount}}</td>

<!--                             <td>@{{rate.rate * 10000 /100}}%</td>
 -->                            
                            <td>@{{rate.refund * 10000 /100}}%</td>
                       
                          </tr>
                        </tbody>
                      </table>
                    </div>


                </div>


    @endSection


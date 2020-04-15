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
        <meta property="fb:admins" content="https://www.facebook.com/tingdiamonds/" />

    @endSection

    @section('content')
        <br>
          <div class="col-10" id="pending">


                    <p class="title is-4">{{__('shoppingCart.Pending Orders')}}</p>

                    <div class="row">
                      <div class="col table-responsive">

                        <table class="table table-sm table-striped">
                          <thead>
                            <tr>
                              <th></th>
                              <th>{{__('shoppingCart.Title')}}</th>
                              <th>{{__('shoppingCart.Email Verified')}}</th>
                              <th>{{__('shoppingCart.Status')}}</th>
                              <th>{{__('shoppingCart.Original Total')}}</th>
                              <th>{{__('shoppingCart.Discount Amount')}}</th>
                              <th>{{__('shoppingCart.Deposit')}}</th>
                              <th>{{__('shoppingCart.Balance')}}</th>
                              <th>{{__('shoppingCart.Balance Payment')}}</th>
                              <th>{{__('shoppingCart.Date')}}</th>
                            </tr>
                          </thead>

                          <tbody>
                                <tr v-for="(da,key) in data.data" @click="directTo(da.id)">
                                  <th>@{{key + 1}}</th>
                                  <td>@{{da.title}}</td>
                                  <td>@{{da.verified |transJs(langs, mutualVar.langs.localeCode) }}</td>
                                  <td>@{{da.status |transJs(langs, mutualVar.langs.localeCode) }}</td>
                                  <td><p><del>@{{da.sub_total}}</del></p></td>
                                  <td><p style="color: red">@{{da.total}}</p></td>
                                  <td>@{{da.deposit}}</td>
                                  <td>@{{da.balance}}</td>
                                  <td>@{{da.deposit_method |transJs(langs, mutualVar.langs.localeCode) }}</td>
                                  <td>@{{da.date}}</td>
                                </tr>                           
                          </tbody>
                        </table>
                        

                      </div>    
                    </div>

                    <div v-if="couponCode">
                        <div class="control">
                          <div class="tags has-addons">
                            <span class="tag is-dark">{{__('shoppingCart.Coupon Code')}}</span>
                            <span class="tag is-success">@{{couponCode}}
                            </span>
                          </div>
                        </div>
                    </div>

       

                   

          </div>


    @endSection


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
            <div class="col-10 " id="records">

                  <p class="title is-4">{{__('account.Referral Records')}}</p>

                    <div class="row">
                      <div class="tabs">

                        <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th></th>
                              <th>{{__('account.Amount')}}</th>
                              <th>{{__('account.Refund Rate')}}</th>
                              <th>{{__('account.Refund Amount')}}</th>
                              <th>{{__('account.Progress')}}</th>
                              <th>{{__('account.Customer Info')}}</th>
                            </tr>
                          </thead>

                          <tbody>
                                <tr v-for="(da,key) in model.data" v-if="da.invoice_id">
                                  <th>@{{key + 1}}</th>
                                  <td> <p v-for="d in da.invoice.inv_diamonds"> $@{{d.price}} ( @{{d.weight}}, @{{d.color}}, @{{d.clarity}} )</p></td>
                                  <td> <p v-for="d in da.invoice.inv_diamonds"> @{{ d.price | discountRateCheck(coupon.discountRate) }} </p></td>
                                  <td> <del v-if="da.status == 'taken' "> 
                                        <p v-for="d in da.invoice.inv_diamonds">$@{{ d.price | discountRateCheck(coupon.discountRate) * d.price }}</p> 
                                        </del> 
                                        <p v-else v-for="d in da.invoice.inv_diamonds">$@{{ d.price | discountRateCheck(coupon.discountRate) * d.price }}</p> 
                                  </td>
                                  <td><p v-if="da.status == 'taken' " style="color: red">Retrieved</p>
                                      <p v-else style="color: blue">@{{ da.status }}</p>
                                  </td>
                                  <td>Name : @{{ da.invoice.customer.name | hideInfo() }}, Phone : @{{ da.invoice.customer.phone | hideInfo() }}, </td>
                                </tr>  

                                <tr v-if="!da.invoice_id" v-for="(da,key) in model.data" >
                                  <th>@{{key + 1}}</th>
                                  <td>/</td>
                                  <td>/</td>
                                  <td>/</td>
                                  <td v-if="da.status == 'cancelled'"><p style="color: red"> {{__('account.The order is cancelled by customer')}} </p></td>
                                  <td v-if="da.status != 'cancelled'"><p style="color: red"> {{__('account.The order is waiting for confirmation')}} </p></td>
                                  <td v-if="da.status == 'cancelled'"> <del> @{{ da.title }} </del> </td>
                                  <td v-if="da.status != 'cancelled'"> @{{ da.title }} </td>
                                </tr>


                                <tr>
                                  <td></td>
                                  <td>Total Price : $@{{ refundAmountSum + refunded }} </td>
                                  <td></td>
                                  <td><p style="color: #0000dd">Remain $@{{ refundAmountSum }}</p></td>
                                  <td><p style="color: #dd0000">Retrieved $@{{ refunded }}</p></td>
                                  <td></td>
                                </tr> 

                                <tr><br></tr>  
                                                    
                          </tbody>

                        </table>
                        
                        </div>
                      </div> 


                </div>


    @endSection

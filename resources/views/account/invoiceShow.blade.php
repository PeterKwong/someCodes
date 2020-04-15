@extends('layouts.section.account')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('home.meta1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('home.webTitle')}}"> 
        <meta itemprop="keywords" content="{{trans('home.keywords')}}"> 
        <meta itemprop="description" content="{{trans('home.meta1')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('home.webTitle')}}" /> 
        <meta property="og:type" content="article" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
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
          <div class="col-10" id="invoiceShow">
              <div class="row">
                      <div class="col">
                        
                            <img src="{{ url('/') . config('global.company.info.logo')}}" width="128" height="auto"  >
                         
                      </div>
                      <div class="col-4">
                        <h1 class="title is-3" >Invoice</h1>      
                        <h1 class="subtitle is-5">@{{company.info.name}}</h1>      
                        <small><small><p >@{{company.info.address}}</p></small></small>
                        <small><small><p >Tel: @{{company.info.contact}}</p></small></small>
                        <a href="/">@{{company.info.website}}</a>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <p class="title is-6">BILL TO</p>
                        <p class="subtitle is-5"><small><small>@{{model.customer.name}}</small></small></p>
                        <p ><small><small>Phone: @{{model.customer.phone}}</small></small></p>
                      </div>
                      <div class="col-3">
                        <p v-if="model.invoice_no"><small><small>Invoice Number: </small></small></p>     
                        <p ><small><small> Invoice Date: </small></small></p>     
                        <p v-if="model.due_date"><small><small> Payment Due: </small></small></p>
                        <p ><small><small> Total (HKD): </small></small></p>
                        <p ><small><small> Amount Due (HKD): </small></small></p>
                      </div>
                      <div class="col-2">
                        <p v-if="model.invoice_no"><small><small>@{{model.invoice_no}}</small></small></p>     
                        <p ><small><small>@{{model.date}}</small></small></p>      
                        <p ><small><small>@{{model.due_date}}</small></small></p>
                        <p ><small><small>$@{{model.total}}</small></small></p>
                        <p ><small><small>$@{{model.balance}}</small></small></p>
                      </div>
                    </div>

                    <div class="tile">
                   
                <!--         <article class="tile notification is-primary">
                 -->    
                        </article>
                       </div>
                    <table class="table is-fullwidth">
                        <thead>
                          <tr class="background-primary text-white">
                            <th><small>Items</small></th>
                            <th><small>Desciption</small></th>
                            <th><small>Quantity</small></th>
                            <th><small>Price</small></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="diamond in model.inv_diamonds" v-if="model.inv_diamonds">
                            <td><small><small><small>@{{diamond.lab}}:@{{diamond.certificate}}</small></small></small></td>
                            <td><small><small><small>@{{diamond.weight}}ct,@{{diamond.color}} Color,@{{diamond.clarity}} Clarity,@{{diamond.cut}} Cut,@{{diamond.polish}} Polish,@{{diamond.symmetry}} Symmetry,@{{diamond.fluorescence}}</small></small></small></td>
                            <td><small><small><small>1</small></small></small></td>
                            <td><small><small><small>@{{diamond.price}}</small></small></small></td>
                          </tr>
                          <tr v-for="jewellery in model.jewelleries" v-if="model.jewelleries">
                            <td><small><small><small>@{{jewellery.stock}}</small></small></small></td>
                            <td v-if="jewellery.texts[0]"><small><small><small>@{{jewellery.texts[0].content}}</small></small></small></td>
                            <td><small><small><small>1</small></small></small></td>
                            <td><small><small><small>@{{jewellery.unit_price}}</small></small></small></td>            
                          </tr>
                          <tr v-for="engagementRing in model.engagement_rings" v-if="model.engagement_rings">
                            <td><small><small><small>@{{engagementRing.stock}}</small></small></small></td>
                            <td v-if="engagementRing.texts[0]"><small><small><small>@{{engagementRing.texts[0].content}}</small></small></small></td>
                            <td><small><small><small>1</small></small></small></td>
                            <td><small><small><small>@{{engagementRing.unit_price}}</small></small></small></td>           
                          </tr>
                          <tr v-for="weddingRing in model.wedding_rings" v-if="model.wedding_rings">
                            <td><small><small><small>@{{weddingRing.stock}}</small></small></small></td>
                            <td><small><small><small>@{{weddingRing.texts[0].content}}</small></small></small></td>
                            <td><small><small><small>1</small></small></small></td>
                            <td><small><small><small>@{{weddingRing.unit_price}}</small></small></small></td>            
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="2"></td>
                            <td><p class="subtitle is-6"><small><small>Discount:</small></small></p></td>
                            <td><small><small>$@{{model.discount}}</small></small></td>
                          </tr>
                          <tr>
                            <td colspan="2"></td>
                            <td><p class="subtitle is-6"><small><small>Extra:</small></small></p></td>
                            <td><small><small>$@{{model.extra}}</small></small></td>
                          </tr>
                          <tr>
                            <td colspan="2"></td>
                            <td><p class="subtitle is-6"><small><small>Deposit:</small></small></p></td>
                            <td><small><small>$@{{model.deposit}}</small></small></td>
                          </tr>
                          <tr>
                            <td colspan="2"></td>
                            <td><p class="subtitle is-6"><small><small>Balance:</small></small></p></td>
                            <td><small><small>$@{{model.balance}}</small></small></td>
                          </tr>
                          <tr>
                            <td colspan="2"></td>
                            <td><small>Total:</small></td>
                            <td><small>$@{{model.total}}</small></td>
                          </tr>
                        </tfoot>
                      </table>
                      <hr>
                      <div class="row is-centered">
                        <div class="col-11 ">
                          <small><small>
                            <p class="">Notes:
                              <br>
                            @{{model.notes}}
                            </p>
                          </small></small>
                        </div>
                      </div>
          </div>


    @endSection




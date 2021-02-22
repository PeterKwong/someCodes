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

          <div class="col-span-10 p-2 border relative" id="invoiceShow">
              <div class="grid grid-cols-12 sm:m-8">
                      <div class="col-span-6 sm:col-span-8">
                        
                            <img src="{{ url('/') . config('global.company.info.logo')}}" width="128" height="auto"  >
                         
                      </div>
                      <div class="col-span-6 sm:col-span-4">
                        <h1 class="text-4xl" >Invoice</h1>      
                        <h1 class="text-2xl font-ligth">@{{company.info.name}}</h1>      
                        <p class="text-xs font-ligth" >@{{company.info.address}}</p>
                        <p class="text-xs font-ligth" >Tel: @{{company.info.contact}}</p>
                        <a class="text-blue-600" href="/">@{{company.info.website}}</a>
                      </div>
                    </div>
                    <hr>
                    <div class="grid grid-cols-12 sm:m-8">
                      <div class="col-span-7">
                        <p class="title is-6">BILL TO</p>
                        <p class="text-lg font-ligth">@{{model.customer.name}}</p>
                        <p >Phone: @{{model.customer.phone}}</p>
                      </div>
                      <div class="col-span-3">
                        <p v-if="model.invoice_no">Invoice Number: </p>     
                        <p > Invoice Date: </p>     
                        <p v-if="model.due_date"> Payment Due: </p>
                        <p > Total (HKD): </p>
                        <p > Amount Due (HKD): </p>
                      </div>
                      <div class="col-span-2">
                        <p v-if="model.invoice_no">@{{model.invoice_no}}</p>     
                        <p >@{{model.date}}</p>      
                        <p >@{{model.due_date}}</p>
                        <p >$@{{model.total}}</p>
                        <p >$@{{model.balance}}</p>
                      </div>
                    </div>

                    <div class="tile">
    
                        </article>
                       </div>
                  
                    <div class="overflow-x-scroll">
                      <table class=" w-full">
                          <thead>
                            <tr class="border bg-blue-500 text-white" class="background-primary text-white">
                              <th>Items</th>
                              <th>Desciption</th>
                              <th>Quantity</th>
                              <th>Price</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="border" v-for="diamond in model.inv_diamonds" v-if="model.inv_diamonds">
                              <td>@{{diamond.lab}}:@{{diamond.certificate}}</td>
                              <td>@{{diamond.weight}}ct,@{{diamond.color}} Color,@{{diamond.clarity}} Clarity,@{{diamond.cut}} Cut,@{{diamond.polish}} Polish,@{{diamond.symmetry}} Symmetry,@{{diamond.fluorescence}}</td>
                              <td>1</td>
                              <td>@{{diamond.price}}</td>
                            </tr>
                            <tr class="border" v-for="jewellery in model.jewelleries" v-if="model.jewelleries">
                              <td>@{{jewellery.stock}}</td>
                              <td v-if="jewellery.texts[0]">@{{jewellery.texts[0].content}}</td>
                              <td>1</td>
                              <td>@{{jewellery.unit_price}}</td>            
                            </tr>
                            <tr class="border" v-for="engagementRing in model.engagement_rings" v-if="model.engagement_rings">
                              <td>@{{engagementRing.stock}}</td>
                              <td v-if="engagementRing.texts[0]">@{{engagementRing.texts[0].content}}</td>
                              <td>1</td>
                              <td>@{{engagementRing.unit_price}}</td>           
                            </tr>
                            <tr class="border" v-for="weddingRing in model.wedding_rings" v-if="model.wedding_rings">
                              <td>@{{weddingRing.stock}}</td>
                              <td>@{{weddingRing.texts[0].content}}</td>
                              <td>1</td>
                              <td>@{{weddingRing.unit_price}}</td>            
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr class="border">
                              <td colspan="2"></td>
                              <td><p class="text-lg font-ligth">Discount:</p></td>
                              <td>$@{{model.discount}}</td>
                            </tr>
                            <tr class="border">
                              <td colspan="2"></td>
                              <td><p class="text-lg font-ligth">Extra:</p></td>
                              <td>$@{{model.extra}}</td>
                            </tr>
                            <tr class="border">
                              <td colspan="2"></td>
                              <td><p class="text-lg font-ligth">Deposit:</p></td>
                              <td>$@{{model.deposit}}</td>
                            </tr>
                            <tr class="border">
                              <td colspan="2"></td>
                              <td><p class="text-lg font-ligth">Balance:</p></td>
                              <td>$@{{model.balance}}</td>
                            </tr>
                            <tr class="border">
                              <td colspan="2"></td>
                              <td>Total:</td>
                              <td>$@{{model.total}}</td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>

                      <hr>

                      <div class="grid grid-cols-12 sm:m-8 is-centered">
                        <div class="col-span-11 ">
                          
                            <p class="">Notes:
                              <br>
                            @{{model.notes}}
                            </p>
                          
                        </div>
                      </div>
          </div>


    @endSection




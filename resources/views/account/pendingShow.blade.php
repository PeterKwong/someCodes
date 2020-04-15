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
          <div class="col-10" id="pendingShow">

              <p class="title is-4">{{__('shoppingCart.Pending Orders')}}</p>

              <div class="row justify-content-center">
               <div class="col">
                  <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;" width="95%">
                    <tr>
                      <td align="center" bgcolor="#81cdf3" style="padding: 0px 0 0px 0;">

                      </td>
                    </tr>

                     <tr style="border: 1px solid #cccccc;">
                        <td bgcolor="#ffffff" style="padding: 10px 20px 10px 20px;">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">

                            <tr>
                              <td width="100%" valign="top">
                               
                             </td>

                              <td></td>
                            </tr>
                            

                            <tr>
                              <td width="75%">
                                <a href="https://www.tingdiamond.com">
                                <img src="{{ url('/') . config('global.company.info.logo')}}" alt="Creating Email Magic" width="128" height="auto" style="display: block;" />
                                </a>
                            </td>

                              <td bgcolor="#ffffff"  align="right">
                                    <p><strong>Ting Diamond Limited</strong></p>
                                    <p>{{config('global.company.info.address')}}</p>
                                    <a href="https://www.tingdiamond.com" style="text-decoration: none"><p>www.tingdiamond.com</p></a>
                            </td>
                            </tr>
                          </table>
                        </td>


                     </tr>

                     <tr style="border: 1px solid #cccccc;">
                      <td bgcolor="#ffffff" align="center" style="padding: 10px 10px 30px 10px;">
                         <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">

                          <tr>
                           <td align="center" style="padding: 10px 0 10px 0;">
                            <table  border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 10px 20px 10px 20px;">
                              <tr>
                                <td width="60%" align="left">
                                  <p>{{__('shoppingCart.Bill To')}}</p>
                                  <p><small>@{{ customer.name }}</small></p>
                                  <p><small></small></p>
                                  <p><small>@{{ customer.phone }}</small></p>
                                </td>
                                <td>
                                  <p><small>{{__('shoppingCart.Order Number')}}: </small></p>
                                  <p><small>{{__('shoppingCart.Order Date')}}:  </small></p>
                                  <p><small>{{__('shoppingCart.Payment Due')}}: </small></p>
                                  <p><small>{{__('shoppingCart.Total')}} (HKD): </small></p>
                                  <p><small>{{__('shoppingCart.Amount Due(HKD)')}}: </small></p>
                                </td>
                                <td>
                                  <p><small> @{{ data[0].id }} </small></p>
                                  <p><small> @{{ data[0].date }} </small></p>
                                  <p><small> @{{ data[0].due_date }}</small></p>
                                  <p><small>$ @{{ data[0].total }} </small></p>
                                  <p><small>$ @{{ data[0].balance }} </small></p>
                                </td>
                              </tr>
                            </table>
                           </td>
                          </tr>

                          <tr>
                           <td style="padding: 2px 0 2px 0;" align="center" bgcolor="#81cdf3">
                            <p style="color: #ffffff"> @{{  data[0].title }}</p>
                           </td>
                          </tr>
                           

                          <tr style="border: 1px solid #cccccc;" v-for="item in data[0].cart_items">


                           <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                           <tr>

                            <td width="80" valign="top">
                             <table border="0" cellpadding="0" cellspacing="0" width="100%">

                              <tr>
                               <td>
                                <img :src="item.image" alt="" width="100%" height="auto" style="display: block;" />
                               </td>
                              </tr>

                             </table>
                            </td>


                            <td style="font-size: 0; line-height: 0;" width="20">
                             &nbsp;
                            </td>

                            <td width="260" valign="top">
                             <table border="0" cellpadding="0" cellspacing="0" width="100%">

                              <tr>
                               <td style="padding: 25px 0 0 0;" align="center">
                                <p>@{{ item.title }}</p>
                                  <p>$ @{{ item.unit_price}}</p>                
                                  <p><small>@{{ item.ring_size ? 'Ring Size :' + item.ring_size: ''}} 
                                    @{{ item.engrave ?  ' engrave : ' + item.engrave: ''}}</small></p>             
                               </td>
                              </tr>

                             </table>
                            </td>

                           </tr>
                          </table>

                           </td>
                          </tr>


                         </table>
                      </td>
                     </tr>


                     <tr>
                      <td bgcolor="#d0d0d0">

                        <table  border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 30px 20px 30px 20px;">
                          <tr  align="center">
                            <td><a href="https://tingdiamond.com/hk/engagement-rings" style="color: #ffffff">{{__('shoppingCart.Engagement Rings')}}</a></td>
                            <td><a href="https://tingdiamond.com/hk/gia-loose-diamonds" style="color: #ffffff">{{__('shoppingCart.Diamonds')}}</a></td>
                            <td><a href="https://tingdiamond.com/hk/wedding-rings" style="color: #ffffff">{{__('shoppingCart.Wedding Rings')}}</a></td>
                            <td><a href="https://tingdiamond.com/hk/jewellery" style="color: #ffffff">{{__('shoppingCart.Jewellery')}}</a></td>
                          </tr>
                        </table>
                  


                       <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 30px 20px 30px 20px;">

                       <tr>

                        <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                         &reg; 
                         <a href="https://tingdiamond.com" style="color: #ffffff; text-decoration: none" ><font color="#ffffff"></font>Ting Diamond, 2016<br/></a> 
                         Twinkle Stars For You Beloved
                        </td>

                        <td align="right">
                         <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                           <td>

                           </td>

                           <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>

                           <td>
                            <a href="https://facebook.com/tingdiamonds">
                             <img src="/images/front-end/icon/fb.jpg" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                            </a>
                           </td>


                          </tr>
                         </table>
                        </td>

                       </tr>
                      </table>



                      </td>
                     </tr>
                  </table>
                  
                </div>

              </div>


                   

          </div>


    @endSection



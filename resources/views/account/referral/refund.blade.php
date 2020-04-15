@extends('account.app')

@section('content')
<div id="refund">

	<br>

	<div class="columns">

		<div class="column">

			 <p class="title is-4">{{__('account.Referral Records')}}</p>

                    <div class="columns is-mobile is-multilined">
                      <div class="tabs">

                        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
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
                                <tr v-for="(da,key) in model" >
                                  <th>@{{key + 1}}</th>
                                  <td> <p v-for="d in da.invoice.inv_diamonds"> $@{{d.price}} ( @{{d.weight}}, @{{d.color}}, @{{d.clarity}} )</p></td>
                                  <td> <p v-for="d in da.invoice.inv_diamonds"> @{{ d.price | discountRateCheck(coupon.discountRate) }} </p></td>
                                  <td> <p v-for="d in da.invoice.inv_diamonds"> $@{{ d.price | discountRateCheck(coupon.discountRate) * d.price }} </p> </td>
                                  <td><p style="color: blue">@{{ da.status }}</p></td>
                                  <td>Name : @{{ da.invoice.customer.name | hideInfo() }}, Phone : @{{ da.invoice.customer.phone | hideInfo() }}, </td>
                                </tr>                           
                          </tbody>
                        </table>
                        

                      </div>    
                    </div>

		</div>
		
	</div>



</div>
@endsection
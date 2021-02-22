@extends('email.layouts.app')


@section('content')

		 <tr style="border: 1px solid #cccccc;">
		  <td bgcolor="#ffffff" align="center" style="padding: 10px 10px 30px 10px;">
				 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">


				 	<tr>
		  				<td width="100%" valign="top">
						   <table border="0" cellpadding="0" cellspacing="0" width="100%">

						    <tr>
						    <td></td>
						     <td style="" align="center">
		  						<h2 style="color: red;"><strong>{{__('shoppingCart.Order')}} </strong><small><small>{{__('shoppingCart.(Pending)')}}</small></small></h2>
						     </td>
						     <td></td>
						    </tr>

						    <tr>
						    <td width="40%"></td>
						     <td  bgcolor="#bbbbbb"  align="center">
								<a href="https://www.tingdiamond.com/webfinalizeorder?code={{ $data->finalize_code }}&id={{ $data->id }}" style="text-decoration: none">
		  						<h2 style="color: white; "><strong>{{__('shoppingCart.Confirm Order')}} </strong></h2>
		  						</a>
						     </td>
						     <td width="40%"></td>
						    </tr>

						   </table>
						 </td>

					  	<td></td>
		  			</tr>


				  <tr>
				   <td align="center" style="padding: 10px 0 10px 0;">
				    <table  border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 10px 20px 10px 20px;">
				    	<tr>
				    		<td width="75%" align="left">
				    			<p>{{__('shoppingCart.Bill To')}}</p>
				    			<p><small>{{ $customer->name }}</small></p>
				    			<p><small></small></p>
				    			<p><small>{{ $customer->phone }}</small></p>
				    		</td>
				    		<td>
				    			<p><small>{{__('shoppingCart.Order Number')}}: </small></p>
				    			<p><small>{{__('shoppingCart.Order Date')}}:  </small></p>
				    			<p><small>{{__('shoppingCart.Payment Due')}}: </small></p>
				    		</td>
				    		<td>
				    			<p><small> {{ $data->id }} </small></p>
				    			<p><small> {{ $data->date }} </small></p>
				    			<p><small> {{ $data->due_date }}</small></p>
				    		</td>
				    	</tr>
				    </table>
				   </td>
				  </tr>

				  <tr>
				   <td style="padding: 2px 0 2px 0;" align="center" bgcolor="#81cdf3">
				    <p style="color: #ffffff"> {{ $data->title }}</p>
				   </td>
				  </tr>
				   

				  @foreach($data->cartItems as $item)


				  <tr style="border: 1px solid #cccccc;">


				   <td>
				    <table border="0" cellpadding="0" cellspacing="0" width="100%">
					 <tr>

					  <td width="80" valign="top">
					   <table border="0" cellpadding="0" cellspacing="0" width="100%">

					    <tr>
					     <td>

					      <img src="{{ strpos($item->image,'://') ? $item->image: 'https://tingdiamond.com' . $item->image }}" alt="" width="100%" height="auto" style="display: block;" />

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
					     	<p>{{$item->title}}</p>
					      	<p>$ {{$item->unit_price}}</p>					     	
					      	<p><small>{{$item->ring_size ? 'Ring Size :' . $item->ring_size: ''}} 
					      		{{$item->engrave ?  ' engrave : ' .$item->engrave: ''}}</small></p>				     	
					     </td>
					    </tr>

					   </table>
					  </td>

					 </tr>
					</table>

				   </td>
				  </tr>

					  @endforeach



				 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">

				  <tr>
				   <td align="center" style="padding: 10px 0 10px 0;">
				    <table  border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 10px 20px 10px 20px;">
				    	<tr>
				    		<td width="75%" align="left">
				    		</td>
				    		<td>
				    			<p><small>{{__('shoppingCart.Deposit')}}:  </small></p>
				    			<p><small>{{__('shoppingCart.Balance')}}: </small></p>
				    			<p><small>{{__('shoppingCart.Original Total')}}: </small></p>
				    			<p><small>{{__('shoppingCart.Total')}}: </small></p>
				    		</td>
				    		<td>
				    			<p><small>$ {{ $data->deposit }} </small></p>
				    			<p><small>$ {{ $data->balance }}</small></p>
				    			<p><small>$ {{ $data->sub_total }} </small></p>
				    			<p><small>$ {{ $data->total }} </small></p>
				    		</td>
				    	</tr>
				    </table>
				   </td>
				  </tr>


				 </table>
		  </td>
		 </tr>

		 
@endsection
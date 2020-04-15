@extends('email.layouts.app')


@section('content')

		 <tr style="border: 1px solid #cccccc;">
		  <td bgcolor="#ffffff" align="center" style="padding: 10px 10px 30px 10px;">
				 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
	
				  <tr>
				   <td style="padding: 2px 0 2px 0;" align="center" bgcolor="#81cdf3">
				    	<p style="color: #ff0000; font-size:30px ; " ><strong> {{ __('account.Congraduation') }} ! </strong></p>
				   	<a href="{{url(app()->getLocale())}}/account/referral/records" style="color: #ffffff; text-decoration: none">
				    	<p style="color: #ffffff; font-size: 20px"> 
				    		<strong> {{ __('account.An order') }} </strong> 
				    		<small>{{ __('account.applied your coupon code, check it out') }} </small> 
				    	</p>
				    </a>

				   </td>
				  </tr>


				 </table>
		  </td>
		 </tr>


@endsection
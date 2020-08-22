<!doctype html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="api-token" content="{{ Auth::guard('admin')->check()?Auth::guard('admin')->user()->api_token:'' }}">
        <meta name="user-role" content="{{ Auth::guard('admin')->check()
                ?Auth::guard('admin')->user()->roles()->first()->name:'' }}">         
        <title>Ting Diamond</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">

		<!-- Custome -->
		<link href="{{ asset('css/all.css') }}" rel="stylesheet">  
		 
		<style type="text/css">
			
			@media print { 
			    .table thead ,  .table th { 
			        background-color: rgba(0,150,255,1) !important; 
			    } 
			}
/*			@page {
				  size: 2.36in 1.18in;
				}*/

		</style>

    </head>

    <body>
        <div>

        @if(auth()->guard('admin')->user() && !strpos(url()->current(), 'invoices/pdf'))

            @include('layouts.backEnd.header')

        @endif

            <div id="backend" class="container is-widescreen"></div>
            
			<div id="invoiceShow">
				
				<div class="container">

				<br>
				<br>
				<br>
				
				<nav class="level">
					
				</nav>
				<div v-if="fullpath">
					<div class="row justiy-content-center">
						<div class="col-5">
							<a :href="'/adm/invoices/pdf/' + model.id" class="button is-primary">Print</a>
							<a :href="'/adm/customer-jewelleries/' +model.id + '/create'" class="button is-primary">Create Post</a>
						</div>
						<div class="col-7">
						
						<a :href="'/adm/invoices/create'" class="button is-primary">Create</a>
						<a :href="'/adm/invoices/' + model.id + '/edit'" class="button is-primary">Edit</a>
						<button class="button is-primary" @click="remove">Delete</button>
						</div>
					</div>

				</div>

				<div :class="{'box': fullpath}">
					<div class="row justiy-content-center pt-30">
						<div class="col">
							
						      <img src="/images/front-end/company/logo_2019_grey.png" alt="Bulma: a modern CSS framework based on Flexbox" width="200" >
						   
						</div>
						<div class="col-4">
							<h1 class="text-dark" >Invoice</h1>			
							<h4 class="subtitle is-5">@{{company.info.name}}</h4>			
							<p >@{{company.info.address}}</p>
							<p >Tel: @{{company.info.contact}}</p>
							<a href="/">@{{company.info.website}}</a>
						</div>
					</div>
					<hr>
					<div class="row justiy-content-center">
						<div class="col">
							<h5 class="title is-6">&nbsp; BILL TO</h5>
							<p class="text-dark" >&nbsp; @{{model.customer.name}}</p>
							<p class="text-dark" >&nbsp; Phone: @{{model.customer.phone}}</p>
						</div>
						<div class="col-3">
							<p class="text-dark"  v-if="adminVar.user.role == 'admin' ">Invoice Number: </p>	
							<p class="text-dark" v-else> Invoice ID: </p>			
							<p class="text-dark" > Invoice Date: </p>			
							<p class="text-dark" v-if="model.due_date"> Payment Due: </p>
							<p class="text-dark" > Amount Due (HKD): </p>
						</div>
						<div class="col-2">
							<p class="text-dark" v-if="adminVar.user.role == 'admin' " @click="adminVar.user.role = '' ">@{{model.invoice_no}}</p>
							<p class="text-dark" v-else>@{{model.id}}</p>							
							<p class="text-dark" >@{{model.date}}</p>			
							<p class="text-dark" >@{{model.due_date}}</p>
							<p class="text-dark" v-if="adminVar.user.role == 'admin' ">$@{{model.account_total}}</p>
							<p class="text-dark" v-else>$@{{model.total}}</p>
						</div>
					</div>

			    <div class="tile">
			   
			<!--         <article class="tile notification is-primary">
			 -->    
			        </article>
			       </div>
					<table class="table">
							<thead>
								<tr class="text-white bg-primary">
									<th>Items</th>
									<th>Description</th>
									<th>Quantity</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="diamond in model.invoice_diamonds" v-if="model.invoice_diamonds">
									<td>@{{diamond.lab}}:@{{diamond.certificate}}</td>
									<td>@{{diamond.weight}}ct,@{{diamond.color}} Color,@{{diamond.clarity}} Clarity,@{{diamond.cut}} Cut,@{{diamond.polish}} Polish,@{{diamond.symmetry}} Symmetry,@{{diamond.fluorescence}}</td>
									<td>1</td>
									<td  v-if="adminVar.user.role == 'admin' ">@{{diamond.account_price}}</td>
									<td v-else>@{{diamond.price}}</td>
								</tr>
								<tr v-for="jewellery in model.jewelleries" v-if="model.jewelleries">
									<td>@{{jewellery.stock}}</td>
									<td v-if="jewellery.invoice_items[0]">@{{jewellery.invoice_items[0].title}}</td>
									<td v-else>@{{jewellery.texts[0].content}}</td>
									<td>1</td>
									<td v-if="jewellery.invoice_items[0]">@{{jewellery.invoice_items[0].unit_price}}</td>						
									<td v-else>@{{jewellery.unit_price}}</td>						
								</tr>
								<tr v-for="engagementRing in model.engagement_rings" v-if="model.engagement_rings">
									<td>@{{engagementRing.stock}}</td>
									<td v-if="engagementRing.invoice_items[0]">@{{engagementRing.invoice_items[0].title}}</td>
									<td v-else>@{{engagementRing.texts[0].content}}</td>
									<td>1</td>
									<td v-if="engagementRing.invoice_items[0]">@{{engagementRing.invoice_items[0].unit_price}}</td>						
									<td v-else>@{{engagementRing.unit_price}}</td>						
								</tr>
								<tr v-for="weddingRing in model.wedding_rings" v-if="model.wedding_rings">
									<td>@{{weddingRing.stock}}</td>
									<td v-if="weddingRing.invoice_items[0]">@{{weddingRing.invoice_items[0].title}}</td>
									<td v-else>@{{weddingRing.texts[0].content}}</td>
									<td>1</td>
									<td v-if="weddingRing.invoice_items[0]">@{{weddingRing.invoice_items[0].unit_price}}</td>						
									<td v-else>@{{weddingRing.unit_price}}</td>						
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2"></td>
									<td><p class="subtitle is-6">Discount:</p></td>
									<td>$@{{model.discount}}</td>
								</tr>
								<tr>
									<td colspan="2"></td>
									<td><p class="subtitle is-6">Extra:</p></td>
									<td>$@{{model.extra}}</td>
								</tr>
								<tr>
									<td colspan="2"></td>
									<td><p class="subtitle is-6">Deposit:</p></td>
									<td>$@{{model.deposit}}</td>
								</tr>
								<tr>
									<td colspan="2"></td>
									<td><p class="subtitle is-6">Balance:</p></td>
									<td  v-if="adminVar.user.role == 'admin' ">$@{{model.account_balance}}</td>
									<td  v-else>$@{{model.balance}}</td>
								</tr>
								<tr>
									<td colspan="2"></td>
									<td>Total:</td>
									<td  v-if="adminVar.user.role == 'admin' ">$@{{model.account_total}}</td>
									<td v-else>$@{{model.total}}</td>
								</tr>
							</tfoot>
						</table>
						<hr>
						<div class="row justiy-content-center is-centered">
							<div class="col-11 ">
								
									<p class="text-dark">Notes:
										<br>
									@{{model.notes}}
									</p>
								
							</div>
						</div>

					</div>
				</div>

			</div>


                
            </div>
            
        <script type="text/javascript" src="{{mix('js/backend.js')}}"></script>
        <script type="text/javascript" src="{{mix('js/burgers.js')}}"></script>
    </body>
</html>

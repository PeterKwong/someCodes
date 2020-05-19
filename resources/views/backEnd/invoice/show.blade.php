@extends('backEnd.app')

	@section('content')

	<div id="invoiceShow">
			
			<div class="d-print-none">
			    <div class="row">
	                    <div class="col-12">
	                        <div class="page-title-box">
	                            <h4 class="page-title">Invoice</h4>
	                        </div>
	                    </div>
	                </div>    
	            <div class="row">
					<div class="col">
						<div class="row">
							<div class="col">
								<a :href="'/adm/invoices/pdf/' + model.id" class="btn btn-primary waves-effect waves-light">Print</a>
								<a :href="'/adm/customer-jewelleries/' +model.id + '/create'" class="btn btn-primary waves-effect waves-light">Create Post</a>
							</div>
							<div class="col-6"></div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col-6"></div>
							<div class="col">
								<a href="/adm/invoices/create" class="btn btn-primary waves-effect waves-light">Create</a>
								<a :href="'/adm/invoices/' + model.id + '/edit'" class="btn btn-primary waves-effect waves-light">Edit</a>
								<button class="btn btn-primary waves-effect waves-light" @click="remove">Delete</button>
							</div>
						</div>
					</div>

				</div>
			</div>
                <!-- end page title --> 

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <h3><img src="/images/front-end/company/logo_2019_white.png" width="80">@{{company.info.name}}</h3>
                                    </div>
                                    <div class="float-right">
                                    	<div class="row">
                                    		<div class="col-4"></div>
                                    		<div class="col">
                                    			 <address>
		                                            <strong>@{{company.info.website}}</strong><br>
		                                            @{{company.info.address}}
		                                            <br>
		                                            <abbr title="Phone">Tel:</abbr> @{{company.info.contact}}
		                                        </address>
                                    		</div>
                                    	</div>
                                       
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="float-left mt-3">
                                            <p class="title is-6">&nbsp; BILL TO</p>
											<p class="subtitle is-5"><small><small>&nbsp; @{{model.customer.name}}</small></small></p>
											<p ><small><small>&nbsp; Phone: @{{model.customer.phone}}</small></small></p>
                                        </div>
                                        <div class="float-right mt-3">
                                            <p class="m-t-10"><strong>Invoice ID : </strong> # @{{model.id}}</p>
                                            <p><strong>Invoice Date: </strong> @{{model.date}}</p>
                                            <p class="m-t-10"><strong>Invoice Due : </strong> <span class="label label-pink">@{{model.due_date}}</span></p>
                                            <p><strong>Amount Due (HKD) : </strong>$@{{model.total}}</p>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-sm mt-4">
                                                <thead>
                                                <tr class="is-selected">
													<th>Items</th>
													<th>Desciption</th>
													<th>Quantity</th>
													<th>Price</th>
												</tr>
                                            	</thead>
                                                <tbody >
                                                <tr v-for="diamond in model.invoice_diamonds" v-if="model.invoice_diamonds">
													<td> <p style="font-size: 80%">@{{diamond.lab}}:@{{diamond.certificate}}</p> </td>
													<td> <p style="font-size: 80%">@{{diamond.weight}}ct,@{{diamond.color}} Color,@{{diamond.clarity}} Clarity,@{{diamond.cut}} Cut,@{{diamond.polish}} Polish,@{{diamond.symmetry}} Symmetry,@{{diamond.fluorescence}}</p> </td>
													<td> <p style="font-size: 80%">1</p> </td>
													<td> <p style="font-size: 80%">@{{diamond.price}}</p> </td>
												</tr>
												<tr v-for="jewellery in model.jewelleries" v-if="model.jewelleries">
													<td> <p style="font-size: 80%">@{{jewellery.stock}}</p> </td>
													<td v-if="jewellery.invoice_items[0]"> <p style="font-size: 80%">@{{jewellery.invoice_items[0].title}}</p> </td>
													<td v-else> <p style="font-size: 80%">@{{jewellery.texts[0].content}}</p> </td>
													<td> <p style="font-size: 80%">1</p> </td>
													<td> <p style="font-size: 80%"v-if="jewellery.invoice_items[0]">@{{jewellery.invoice_items[0].unit_price}}</p> </td>	
													<td> <p style="font-size: 80%"v-else>@{{jewellery.unit_price}}</p> </td>						
												</tr>
												<tr v-for="engagementRing in model.engagement_rings" v-if="model.engagement_rings">
													<td> <p style="font-size: 80%">@{{engagementRing.stock}}</p> </td>
													<td v-if="engagementRing.invoice_items[0]"> <p style="font-size: 80%">@{{engagementRing.invoice_items[0].title}}</p> </td>
													<td v-else> <p style="font-size: 80%">@{{engagementRing.texts[0].content}}</p> </td>
													<td> <p style="font-size: 80%">1</p> </td>
													<td> <p style="font-size: 80%"v-if="engagementRing.invoice_items[0]">@{{engagementRing.invoice_items[0].unit_price}}</p> </td>	
													<td> <p style="font-size: 80%"v-else>@{{engagementRing.unit_price}}</p> </td>						
												</tr>
												<tr v-for="weddingRing in model.wedding_rings" v-if="model.wedding_rings">
													<td> <p style="font-size: 80%">@{{weddingRing.stock}}</p> </td>
													<td> 
														<p style="font-size: 80%" v-if="weddingRing.invoice_items[0]">@{{weddingRing.invoice_items[0].title}}</p> 
														<p style="font-size: 80%" v-else>@{{weddingRing.texts[0].content}}</p> 
													</td>
													<td> <p style="font-size: 80%">1</p> </td>
													<td> 
														<p style="font-size: 80%"v-if="weddingRing.invoice_items[0]">@{{weddingRing.invoice_items[0].unit_price}}</p>
														<p style="font-size: 80%"v-else>@{{weddingRing.unit_price}}</p> 
													</td>						
												</tr>
                                                </tbody>
                                             	<tfoot>
													<tr>
														<td colspan="2"></td>
														<td><p style="font-size: 80%">Discount:</p></td>
														<td>$@{{model.discount}}</td>
													</tr>
													<tr>
														<td colspan="2"></td>
														<td><p style="font-size: 80%">Extra:</p></td>
														<td>$@{{model.extra}}</td>
													</tr>
													<tr>
														<td colspan="2"></td>
														<td><p style="font-size: 80%">Deposit:</p></td>
														<td>$@{{model.deposit}}</td>
													</tr>
													<tr>
														<td colspan="2"></td>
														<td><p style="font-size: 80%">Balance:</p></td>
														<td>$@{{model.balance}}</td>
													</tr>
												</tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-6">
                                        <div class="clearfix mt-4">
                                            <h5 class="small text-dark">Notes:</h5>
                                            <small>
                                                 @{{model.notes}}

                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-6 offset-xl-3">
                                        
                                        <hr>
                                        <h3 class="text-right">Total: $@{{model.total}}</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-print-none">
                                    <div class="float-right">
                                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


	</div>



	@endSection
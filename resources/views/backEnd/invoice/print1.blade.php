<!doctype html>
@include('layouts.style.lang')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="api-token" content="{{ Auth::guard('admin')->check()?Auth::guard('admin')->user()->api_token:'' }}">
        
        <title>Ting Diamond</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="/front_end/company/logo_PNG_sq_60x60.png">   

        <!-- Plugin css -->
        <link href="/adm/assets/libs/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="/adm/assets/css/light/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/adm/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/adm/assets/css/light/app.min.css" rel="stylesheet" type="text/css" />

        <style type="text/css">
        	.print-with-color {
			    background-color: #7aceff;
			    color: #fff;
			}
			@media print {
			    .print-with-color{
				    background-color: #7aceff !important;
				    color: #fff !important;
			        -webkit-print-color-adjust: exact; 			    	
			    }
			    a{
			    	color: #71b6f9 !important;
			    }
			},

        </style>

    </head>

    <body>

        <!-- Navigation Bar-->


        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">
            <div class="container-fluid">


                <div class="row flex-row flex-nowrap">
                    <div class="col-12">
                        <div id="backend" class="container is-widescreen"></div>

                             	<div id="invoiceShow">
									
					                <div class="row">
					                    <div class="col-md-12">
					                        <div class="card-box">
					                            <!-- <div class="panel-heading">
					                                <h4>Invoice</h4>
					                            </div> -->
					                            <div class="panel-body">
					                                <div class="clearfix">
					                                    <div class="float-left">
					                                        <h3><img src="/front_end/company/logo_2019_grey.png" width="80">@{{company.info.name}}</h3>
					                                    </div>
					                                    <div class="float-right">
					                                    	<div class="row">
					                                    		<div class="col-4"></div>
					                                    		<div class="col">
					                                    			 <address>
							                                            <strong><a href="">@{{company.info.website}}</a></strong><br>
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
					                                            <p class="m-t-10"><strong>Invoice ID : </strong> # @{{model.invoice_no}}</p>
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
					                                                <thead class="print-with-color">
					                                                <tr>
																		<th>Items</th>
																		<th>Desciption</th>
																		<th>Quantity</th>
																		<th>Price</th>
																	</tr>
					                                            	</thead>
					                                                <tbody >
					                                                <tr v-for="diamond in model.inv_diamonds" v-if="model.inv_diamonds">
																		<td> <p style="font-size: 80%">@{{diamond.lab}}:@{{diamond.certificate}}</p> </td>
																		<td> <p style="font-size: 80%">@{{diamond.weight}}ct,@{{diamond.color}} Color,@{{diamond.clarity}} Clarity,@{{diamond.cut}} Cut,@{{diamond.polish}} Polish,@{{diamond.symmetry}} Symmetry,@{{diamond.fluorescence}}</p> </td>
																		<td> <p style="font-size: 80%">1</p> </td>
																		<td> <p style="font-size: 80%">@{{diamond.price}}</p> </td>
																	</tr>
																	<tr v-for="jewellery in model.jewelleries" v-if="model.jewelleries">
																		<td> <p style="font-size: 80%">@{{jewellery.stock}}</p> </td>
																		<td v-if="jewellery.texts[0]"> <p style="font-size: 80%">@{{jewellery.texts[0].content}}</p> </td>
																		<td> <p style="font-size: 80%">1</p> </td>
																		<td> <p style="font-size: 80%">@{{jewellery.unit_price}}</p> </td>						
																	</tr>
																	<tr v-for="engagementRing in model.engagement_rings" v-if="model.engagement_rings">
																		<td> <p style="font-size: 80%">@{{engagementRing.stock}}</p> </td>
																		<td v-if="engagementRing.texts[0]"> <p style="font-size: 80%">@{{engagementRing.texts[0].content}}</p> </td>
																		<td> <p style="font-size: 80%">1</p> </td>
																		<td> <p style="font-size: 80%">@{{engagementRing.unit_price}}</p> </td>						
																	</tr>
																	<tr v-for="weddingRing in model.wedding_rings" v-if="model.wedding_rings">
																		<td> <p style="font-size: 80%">@{{weddingRing.stock}}</p> </td>
																		<td> <p style="font-size: 80%">@{{weddingRing.texts[0].content}}</p> </td>
																		<td> <p style="font-size: 80%">1</p> </td>
																		<td> <p style="font-size: 80%">@{{weddingRing.unit_price}}</p> </td>						
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



                        <!-- end col-12 -->
                    </div>
                </div> <!-- end row -->



            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->

<!--             @include('layouts.backEnd.footer')
 -->            
        <!-- end Footer -->

        <!-- Right Sidebar -->

            @include('layouts.backEnd.rightBar')

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        <script type="text/javascript" src="{{mix('js/backend.js')}}"></script>
        <script type="text/javascript" src="{{mix('js/burgers.js')}}"></script>
       <!-- Vendor js -->
        <script src="/adm/assets/js/vendor.min.js"></script>

        <!-- fullcalendar plugins -->
        <script src="/adm/assets/libs/moment/moment.js"></script>
        <script src="/adm/assets/libs/jquery-ui/jquery-ui.min.js"></script>
        <script src="/adm/assets/libs/fullcalendar/fullcalendar.min.js"></script>

        <!-- fullcalendar js -->
        <script src="/adm/assets/js/pages/fullcalendar.init.js"></script>

        <!-- App js-->
        <script src="/adm/assets/js/app.min.js"></script>

    </body>
</html>

<!DOCTYPE html>
<html>
<head>

	<title>test</title>
	<style type="text/css">
		/*@media print {
			     a[href*='//']:after {
			        content:" (" attr(href) ") ";
			        color: $primary;
			    }
			#content, #page {
			width: 100%; 
			margin: 0; 
			float: none;
			}*/
			    
			/** Seitenränder einstellen */       
/*			@page { margin: 2cm }
*/
			@page {
				  size: 2.36in 1.18in;
				}

				.flex-container {
				  display: flex;
				  flex-wrap: nowrap;
				  border: solid;
				  border-width: 0.1px;
/*				  background-color: DodgerBlue;
*/				}

				.flex-container > div {
/*				  background-color: #f1f1f1;
				  width: 100px;
				  margin: 10px;
*/				  text-align: center;
/*				  line-height: 75px;
				  font-size: 30px;
*/				}

	</style>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js"></script>

</head>
<body style="margin: 0;">

	<div class="flex-container" id="printLabel">
		<div style="width: 75px; ">
					<img src="/images/front-end/company/logo_2019_grey_sq.png" width="100%" >	
			</div>
		<div >
			<div class="flex-container">
				<div style="width: 130px; font-size: 17px">  @{{data.weight}}, @{{data.color}}, @{{data.clarity}}</div>
			</div>
			<div class="flex-container">
				<div style="width: 130px; font-size: 11px;  margin:0; padding: 0;">
					<span> GIA: @{{data.gia}} </span>		
					<br>
					<svg id="barcode1"></svg>
					<br>
					<span> @{{data.stock}}</span>
				</div>
			</div>
			<div class="flex-container" style=" margin:0; padding: 0;">
				<div style="width: 130px;  margin:0; padding: 0;"> 
					
					<span style="font-size: 25px;  margin:0; padding: 0;"> $@{{data.price}}</span>
				</div>
			</div>

		</div>
	</div>


<!-- 	<div class="flex-container" id="printLabel">
		<div >
			<div class="flex-container">
				<div style="width: 45px; ">
					<img src="/images/front-end/company/logo_2019_grey_sq.png" width="100%" >	
				</div>
			</div>

				<div class="flex-container">
					<div style="width: 145px; font-size: 11px"> @{{data.stock}}</div>
				</div>
				<div class="flex-container">
					<svg id="barcode1"></svg>
				</div>
			<div class="flex-container">
				
			</div>
			<div class="flex-container">
				<svg id="barcode1"></svg>
			</div>
			<div class="flex-container">
				<div style="width: 125px; font-size: 11px"> @{{data.stock}}</div>
			</div>
			<div class="flex-container">
				<div style="width: 35px; ">
					<img src="/images/front-end/company/logo_2019_grey_sq.png" width="100%" >	
				</div>
				<div style="width: 95px;  border: solid; border-width: 0.5px;">
					<span style="font-size: 18px; margin:none ">$@{{data.price}}</span>
					<br>
					<span style="font-size: 9px; margin:none ">GIA: @{{data.gia}}</span>
				</div>
			</div>
		</div>


		<div>
			<div id="qrcode"></div>
		</div>


	</div> -->




	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js">
		
	</script>


        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

            
        <script type="text/javascript" src="{{mix('js/backend.js')}}"></script>
        <script type="text/javascript" src="{{mix('js/burgers.js')}}"></script>
       <!-- Vendor js -->
        <script src="/admin/assets/js/vendor.min.js"></script>

        <!-- fullcalendar plugins -->
        <script src="/admin/assets/libs/moment/moment.js"></script>
        <script src="/admin/assets/libs/jquery-ui/jquery-ui.min.js"></script>
        <script src="/admin/assets/libs/fullcalendar/fullcalendar.min.js"></script>

        <!-- fullcalendar js -->
        <script src="/admin/assets/js/pages/fullcalendar.init.js"></script>

        <!-- App js-->
        <script src="/admin/assets/js/app.min.js"></script>

</body>
</html>
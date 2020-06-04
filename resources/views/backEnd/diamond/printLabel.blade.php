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
				  border-width: 0.5px;
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
<body>

	<div class="flex-container" id="printLabel">
		<div >
			<div class="flex-container">
				<div style="width: 35px; ">
					<img src="/images/front-end/company/logo_2019_grey_sq.png" width="100%" >	
				</div>
				<div style="width: 95px;  border: solid; border-width: 0.5px;">
					<span style="font-size: 20px; margin:none ">$@{{data.price}}</span>
					<br>
					<span style="font-size: 12px; margin:none ">GIA: @{{data.gia}}</span>
				</div>
			</div>
			<div class="flex-container">
				<div style="width: 125px; font-size: 18px"> @{{data.weight}}, @{{data.color}}, @{{data.clarity}} </div>
			</div>
			<div class="flex-container">
				<div style="width: 125px; font-size: 15px"> @{{data.stock}}</div>
			</div>
		</div>
		<div>
			<div id="qrcode"></div>
		</div>

	</div>

<!-- 
	<div class="flex-container">
		<div class="flex-container">
			<div class="flex-container">
				<div style="width: 50px;">
					<img src="/images/front-end/company/logo_2019_grey_sq.png" width="100%" >	
				</div>
				<div style="width: 100px;">aierh123ui</div>
			</div>
			<br>
			<div class="flex-container">
				<div style="width: 100px;">aierh123ui</div>
			</div>	
			<div class="flex-container">
				<div style="width: 100px;">aierh123ui</div>
			</div>
		</div>
		<div style="width: 300px;">
			<div id="qrcode"></div>
			<script type="text/javascript">
			var qrcode = new QRCode(document.getElementById("qrcode"), {
				text: "https://youtu.be/XvDUKOKUsRM",
				width: 80,
				height: 80,
				colorDark : "#000000",
				colorLight : "#ffffff",
				correctLevel : QRCode.CorrectLevel.H
			});
			</script>	
		</div>
	</div> -->


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
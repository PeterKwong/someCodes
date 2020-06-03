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

	<div class="flex-container">
		<div >
			<div class="flex-container">
				<div style="width: 30px; ">
					<img src="/images/front-end/company/logo_2019_grey_sq.png" width="100%" >	
				</div>
				<div style="width: 120px;  font-size: 25px">$123141</div>
			</div>
			<div class="flex-container">
				<div style="width: 150px; font-size: 20px">S138-ekjr123-123</div>
			</div>
			<div class="flex-container">
				<div style="width: 150px;">1.01 , G , VVS2 </div>
			</div>
		</div>
		<div>
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

</body>
</html>
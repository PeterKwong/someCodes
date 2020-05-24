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

	</style>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js"></script>
</head>
<body>


	<center>
		<table>
			<tr>
				<td>
					<img src="/images/front-end/company/logo_2019_grey.png" width="150" >
				</td>
				<td>
					<div id="qrcode"></div>
					<script type="text/javascript">
					var qrcode = new QRCode(document.getElementById("qrcode"), {
						text: "https://youtu.be/XvDUKOKUsRM",
						width: 100,
						height: 100,
						colorDark : "#000000",
						colorLight : "#ffffff",
						correctLevel : QRCode.CorrectLevel.H
					});
					</script>	
				</td>
			</tr>
		</table>
		<a href="https://youtu.be/XvDUKOKUsRM">https://youtu.be/XvDUKOKUsRM</a> 	

	</center>
</body>
</html>
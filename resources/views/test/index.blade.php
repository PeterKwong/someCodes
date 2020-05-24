<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<style type="text/css">
		@media print {
			     a[href*='//']:after {
			        content:" (" attr(href) ") ";
			        color: $primary;
			    }
			#content, #page {
			width: 100%; 
			margin: 0; 
			float: none;
			}
			    
			/** Seitenränder einstellen */       
			@page { margin: 2cm }

			@page {
				  size: 2.36in 1.18in;
				}

	</style>
</head>
<body>
	<img src="/images/front-end/company/logo_2019_grey.png" width="50" >
	test
</body>
</html>
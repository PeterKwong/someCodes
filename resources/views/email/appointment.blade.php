<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	@foreach($appointments as $ap=>$v)
	<h3>{{$ap}} : {{$ap== 'phone' ? 'https://api.whatsapp.com/send?phone=852' . $v : $v}} </h3>
	@endforeach
</body>
</html>
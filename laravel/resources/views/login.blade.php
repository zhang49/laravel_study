<html>
	<head>
	<meta charset="utf-8" />
	</head>
	<body>
	<div style="width:500px;margin:0 auto;">
		<h3 style="align:center">Welcome<h3>
		{!! Form::open(['url' => 'pro/login','method' => 'get']) !!}
		  {!! Form::text('name','crazyBuss') !!}
		  {!! Form::submit('提交') !!}
		{!! Form::close() !!}
	</body>
</html>
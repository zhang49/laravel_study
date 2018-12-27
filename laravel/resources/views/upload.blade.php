<html>
<head>
<meta charset="utf-8" />
<link rel='stylesheet' href="{{ asset('/css/databaseform.css')}}">
</head>
<body>
{!! Form::open(['url' => '/upload','method' => 'post']) !!}
  {!! Form::file('myfile') !!}
  {!! Form::submit('确定') !!}
{!! Form::close() !!}
<?php

}
?>
</body>
</html>





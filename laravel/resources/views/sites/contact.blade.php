@extends('app')
@section('content')
<h3>people has:</h3>
<ul>
@foreach($people as $person)
<li>{{ $person }}</li>
@endforeach
</ul>
@stop

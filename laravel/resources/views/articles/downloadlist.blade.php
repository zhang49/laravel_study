@extends('app-article')
@section('article-content')
@foreach($downloadlist as $element)
<p>{{ $element->target }}<p>
<p><a href={{ $element->url }}> {{ $element->name }}</a></p>
@endforeach
@endsection
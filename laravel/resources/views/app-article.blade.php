<link rel='stylesheet' href="/css/bootstrap.css" />
<link rel='stylesheet' href="/css/reset.css" />
@extends('app-base')
@section('base-content')
<div class="container">
	<section class="content">
		<div class="pad group">
			<a href="#" style="display:inline-block;color:#aaa" onclick="javascript:history.back(-1)"><div class="fa fa-reply"></div>返回</a>
			@yield('article-content')
		</div>
	</section>
</div>
@endsection
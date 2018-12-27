@extends('app-article')
@section('article-content')
<h3  style="margin:0 auto;"><a href="/article/create">撰写新Article</a></h3>
@foreach($articles as $article)
<article class="format-image group">
    <h2 class="post-title pad">
        <a href="/article/{{ $article->id }}"> {{ $article->title }}</a>
    </h2>
    <div class="post-inner">
        <div class="post-deco">
            <div class="hex hex-small">
                <div class="hex-inner"><i class="fa"></i></div>
                <div class="corner-1"></div>
                <div class="corner-2"></div>
            </div>
        </div>
        <div class="post-content pad">
            <div class="entry custome">{{ $article->intro }} </div>
			<div style="height:50px;">
            <a class="more-link-custom extar-delete" href="/article/remove/{{ $article->id }}"><span><i>删除</i></span></a>
            <a class="more-link-custom extar-delete" href="/article/modify/{{ $article->id }}"><span><i>修改</i></span></a>
            <a class="more-link-custom" href="/article/{{ $article->id }}"><span><i>更多</i></span></a>
			</div>
		</div>
    </div>
</article>
@endforeach
@endsection

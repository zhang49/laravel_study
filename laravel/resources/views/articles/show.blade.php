@extends('app-article')
@section('article-content')
    <article class="format-image group">
        <h2 class="post-title pad">
            <a > {{ $article->title }}</a>
        </h2>
        <div class="post-inner">
            <div class="post-content pad">
                <div class="entry custome">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </article>
@endsection
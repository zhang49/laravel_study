@extends('app-article')
@section('article-content')
  <h3>Modify</h3>
  {!! Form::open(['url'=>'article/store']) !!}
   <div class="form-group">
       {!! Form::label('title','标题:') !!}
       {!! Form::text('title',$article->title,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('intro','intro:') !!}
       {!! Form::text('intro',$article->intro,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('content','正文:') !!}
       {!! Form::textarea('content',$article->content,['class'=>'form-control']) !!}
   </div>   
   <div class="form-group">
       {!! Form::submit('Post',['class'=>'btn btn-success form-control']) !!}
   </div>
  {!! Form::close() !!}
@endsection


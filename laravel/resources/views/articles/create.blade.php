@extends('app-article')
@section('article-content')
  <h3>Create</h3>
  {!! Form::open(['url'=>'article/store']) !!}
   <div class="form-group">
       {!! Form::label('title','标题:') !!}
       {!! Form::text('title',null,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('intro','intro:') !!}
       {!! Form::text('intro',null,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('content','正文:') !!}
       {!! Form::textarea('content',null,['class'=>'form-control']) !!}
   </div>   
   <div class="form-group">
       {!! Form::submit('Post',['class'=>'btn btn-success form-control']) !!}
   </div>
  {!! Form::close() !!}
@endsection


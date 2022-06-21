@extends('layouts.main')
<?php $titleTag = htmlspecialchars($post->title);?>
@section('title',"| $post->title")
@section('content')

<div class="row" >
    <div class="col-md-8 col-md-offset-2">
   <img src="{{ asset('images/' . $post->image)}}" height="400px" width="800px" alt="">     
  <h1>{{$post->title}}</h1>
  <p class="lead">{!! $post->body !!}</p>
  <hr>
  <p>Posted In: {{$post->category->name}}</p>

</div>
</div>
<div class="row" >
   <div class="col-md-8 col-md-offset-2" style="background-color:#eee">
    <h3>Comments</h3>
    @foreach($post->comments as $comment)
    <div class="comment">
      <div class="author-info">
        <img src="" alt="" class="author-image">
        <div class="author-name">
          <h4>{{$comment -> name}}</h4>
          <p class="author_time">{{ $comment->created_at}}</p>
        </div>
      </div>
      <div class="comment-content">
     {{strip_tags($comment->comment)}}
      </div>
    </div>
    <hr>
  @endforeach
   </div>


</div>
<div class="row">
  <div class="commment-form" class="col-md-8 col-md-offset-2">
    {{Form::open(['route' => ['comments.store' , $post->id], 'method' =>'POST'])}}
     <div class="row">
      <div class="col-md-6">
        {{Form::label('name', "Name:")}}
        {{Form::text('name',null, ['class' => 'form-control'])}}
      </div>

      <div class="col-md-6">
        {{Form::label('email', "Email:")}}
        {{Form::email('email',null, ['class' => 'form-control'])}}
      </div>

      <div class="col-md-12">
        {{Form::label('comment', "Comment:")}}
        {{Form::textarea('comment',null, ['class' => 'form-control' ,'rows'=>'4'])}}

        {{Form::submit('send' , ['class' => 'btn btn-success btn-block', 'style'=>'margin-top:10px'])}}
      </div>
      </div>
    {{Form::close()}}
   
  </div>
</div>

@endsection('content')
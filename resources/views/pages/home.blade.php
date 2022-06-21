
@extends('layouts.main')
@section('title', '|Home')

@section('content')

<div class="row">
<div class="col-md-12">
<div class="jumbotron">
  <h1 class="display-4">Welcome Ya Zemily!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
  </p>
</div>
</div> 
</div> <!--end-->
<div class="row">
    <div class="col-md-8">
        @foreach ($post as $post)
        <div class="post">
            <h3>{{$post->title}}</h3>
            <p>{{substr(strip_tags($post->body) ,0 , 60)}} {{strlen(strip_tags($post->body))>60? "...." : ""}}</p>
            <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>           
        </div>
        <hr>
        @endforeach

    </div>


@endsection
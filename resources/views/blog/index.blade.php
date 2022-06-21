@extends('layouts.main')
@section('title','| Blog')
@section('content')

<div class="row" >
    <div class="col-md-8 col-md-offset-2">
        
  <h1>Blog</h1>
</div>
</div>

<div class="row">
@foreach ($data as $post)
    <div class="col-md-8 col-md-offset-2">
    <h1>{{$post->title}}</h1>
    <h5>Published: {{date('M j, Y', strtotime($post->created_at)) }}</h5>
  <p class="lead">{{substr(strip_tags($post->body) ,0 , 60)}} {{strlen(strip_tags($post->body))>60? "...." : ""}}</p>
  <a href="{{route ('blog.single', $post->slug)}}" class="btn btn-primary">Read More</a>
  <hr>
    </div>
    
    @endforeach
</div>


<div class="row">
<div class="col-md-12 ">
<div class="text-center">
{!! $data->links(); !!}
  </div>
</div>
</div>
</div>

@endsection('content')
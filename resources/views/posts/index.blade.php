@extends('layouts.main')
@section('title', '|View Posts')
@section('content')
<div class="row">
    <div class="col-md-10">
        <h1>All Posts</h1>
       
    </div> 
    <div class="col-md-2">
        <a href="{{ Route('posts.create') }}" class="btn btn-md btn-block btn btn-primary " >Create New Post</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
        

</div><!--end row-->
<div class="row">
<div class="col-md-12">

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Category</th>
      <th scope="col">Created At</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{substr(strip_tags($post->body) ,0 , 60)}} {{strlen(strip_tags($post->body))>60? "...." : ""}}</td>
      <td>{{$post->category->name}}</td>
      <td>{{date('M j,Y', strtotime($post->created_at))}}</td>
      <td><a href="{{Route('posts.show', $post->id)}}" class="btn btn-primary btn-block btn-sm">View</a>
        <a href="{{Route('posts.edit', $post->id)}}" class="btn btn-success btn-block btn-sm">Edit</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

<div>
  {{ $data->links(); }}
</div>
    </div>

</div>
@endsection('content')

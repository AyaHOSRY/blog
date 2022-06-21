@extends('layouts.main')
@section('title',"| $tag->name Tag")
@section('content')
 
<div class="row" >
   <div class="col-md-8">

<h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1> 
</div>
<div class="col-md-2">
<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:10px">Edit</a>
</div>

<div class="col-md-2">
            {!!Form::open(['route'=>['tags.destroy',$tag->id], 'method'=>'delete']) !!}
            
            {{ Form::submit('Delete', ['class' => 'btn btn-danger pull-right btn-block ','style'=>'margin-top:10px'])}}
            </div>  
</div>

<div class="row">
<div class="col-md-12">

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Tags</th>
      <th scope="col">control</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tag->posts as $post)
    <tr>
      <th >{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td> @foreach($post->tags as $tag)
     <span >{{$tag->name}}</span>
     @endforeach
     </td>
      <td>
      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success" style="margin-top:20px">View</a>
     </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
</div>

@endsection('content')

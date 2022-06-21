@extends('layouts.main')
@section('title','|View Post')
@section('content')

<div class="row" >
    <div class="col-md-8 col-md-offset-2">
      <img src="{{asset ('images/' . $post->image)}}" alt="this is a photo">
        
  <h1>{{$post->title}}</h1>
  <p class="lead">{!! $post->body !!}</p>
  <hr>
  <div class="tags">
@foreach($post->tags as $tag)
   
   <button type="button" class="btn btn-secondary btn-sm disabled">{{ $tag->name }}</button>
@endforeach
<div class="div" style="margin-top:20px;">
  <h3>Comments <small>{{ $post->comments->count() }} total</small></h3>
    <table class="table">
       <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Comment</th>
          <th width="70px">Control</th>
        </tr>
       </thead>
       <tbody>
        @foreach ($post->comments as $comment)
        <tr>
          <td>{{$comment->name}}</td>
          <td>{{$comment->email}}</td>
          <td>{{$comment->comment}}</td>
          <td>
 
 {!!Form::open(['route'=>['comments.destroy', $comment->id ,$post->id], 'method'=>'delete']) !!}
            
            {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            
            {!!Form::close()!!}
            </td>

</tr>
@endforeach
       </tbody>
    </table>
</div>
  </div>
    </div>
    <div class="col-md-4" >
        <div class="shadow-none p-3 mb-5 bg-light rounded">
           <dl class="dl-horizontal"> 
            <dt>Url:</dt>
            <dd><a href="{{ route('blog.single', $post->slug) }}">{{url($post->slug)}}</a> </dd>
            <dt>Category:</dt>
            <dd>{{$post->category->name}} </dd>
           <dt >Created At: </dt>
           <dd>{{date('M j,Y h:ia',strtotime($post->created_at))}} </dd>
           </dl>
           <dl class="dl-horizontal"> 
           <dt >Last Updated: </dt>
           <dd>{{date('M j,Y h:ia',strtotime($post->updated_at))}}</dd>
           </dl>
           <hr>
           <div class="row">
           <div class="col-sm-6">
           
            {!! Html::linkRoute('posts.edit','Edit', array( $post->id ),array('class' => 'btn btn-primary btn-block'))!!}
            </div>
            <div class="col-sm-6">
            {!!Form::open(['route'=>['posts.destroy',$post->id], 'method'=>'delete']) !!}
            
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
            </div>
            {!!Form::close()!!}
            <!-- <a href="#" class="btn btn-primary btn-block">Edit</a>
            <a href="#" class="btn btn-danger btn-block">Delete</a>-->

           </div>
           </div>
           <div class="row">
           {{ Html::linkRoute('posts.index','View All Posts',[] ,array('class' => 'btn btn-outline-primary btn-block')) }}
           </div>
          
        </div>

    </div>
</div>


@endsection('content')
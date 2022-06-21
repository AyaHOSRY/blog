@extends('layouts.main')

@section('title','| Create New Post')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        
        {!! Form::open(array('route'=>'posts.store' , 'data-parsley-validate' => '' , 'files' => true)) !!}
        {{ Form::label('title','Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}

        {{ Form::label('body','Post:') }}
        {{ Form::textarea('body', null, array('class' => 'form-control')) }}
        <br>
        
        {{ Form::label('category_id','Category:') }}
        <select class="form-control" name="category_id">
          @foreach ($category as $category)
          <option value='{{ $category->id }}'>{{ $category->name }}</option>
          @endforeach
        </select>
        <br>
        
        {{ Form::label('tags','Tags:') }}
        <select class="selectpicker" multiple data-live-search="true" name="tags[]">
          @foreach ($tags as $tag)
          <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
          @endforeach
        </select>
        <br>
        <br>
        {{ Form::label('featured_image','Upload Featured Image:') }}
        {{ Form::file('featured_image')}}
           <br>
           <br>

        {{ Form::label('slug','Slug:') }}
        {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength'=>'5', 'maxlength'=>'225')) }}

        {{ Form::submit('create Post', array('class' => 'btn btn-primary' , 'style' =>'margin-top:20px')) }}

        {!! Form::close() !!}
    </div>
 
</div>

<!--<form>
    
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>-->
@endsection
@section('scripts')

  <script type="text/javascript">

$(document).ready(function() {

    $('select').selectpicker();

});

</script>
@endsection


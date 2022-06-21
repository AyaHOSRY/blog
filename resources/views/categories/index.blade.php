@extends('layouts.main')
@section('title', '|All Categories')
@section('content')
<div class="row">
    <div class="col-md-10">
        <h1>All Categories</h1>
       
    </div> 
    <div class="col-md-2">
        <a href="{{ Route('categories.create') }}" class="btn btn-md btn-block btn btn-primary " >Create New Post</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
        

</div><!--end row-->
<div class="row">
<div class="col-md-8">

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $Category)
    <tr>
      <th scope="row">{{$Category->id}}</th>
      <td>{{$Category->name}}</td>
      <td><a href="#" class="btn btn-primary btn-block btn-sm">Edit</a>
        <div>
          {!!Form::open(['route'=>['categories.destroy',$Category->id], 'method'=>'delete']) !!}
            
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
            </div>
            {!!Form::close()!!}
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

<!--<div>
 /* $data->links(); }}
</div>-->
    </div>
  <div class="col-md-4">
    <div class="shadow-none p-3 mb-5 bg-light rounded">
        {!!Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
        <h4>Create New Category</h4>
        {{ Form::label('name','Name:') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
        {{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block'])}}
        </div>
        {!!Form::close()!!}
    </div>
  </div>
</div>
@endsection('content')

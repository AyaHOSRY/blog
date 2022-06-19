@extends('layouts.main')

@section('title','| Edit Your Tag')

@section('content')
<div class="row" >
{!! Form::model($tag, ['route' => ['tags.update',$tag->id], 'method' => 'put'])!!}

{{ Form::label('name','Title:') }}
{{ Form::text('name', $tag->name, array('class' => 'form-control')) }}

{{ Form::submit('Save Changes', ['class' => 'btn btn-success '])}}
 {!! Form::close()!!}
  
 
</div>


@endsection


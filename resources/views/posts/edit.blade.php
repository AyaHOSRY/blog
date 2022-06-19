@extends('layouts.main')

@section('title','| Edit Your Post')

@section('content')
{!! Form::model($post, ['route' => ['posts.update',$post->id], 'method' => 'put', 'file'=> true])!!}
<div class="row" >
    
  
    <div class="col-md-8">
    
        {{ Form::label('title','Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}

        {{ Form::label('slug','Slug:') }}
        {{ Form::text('slug', null, array('class' => 'form-control')) }}
         
        {{ Form::label('category_id','Category:') }}
        {{ Form::select('category_id', $cats ,null,['class' => 'form-control']) }} 
        
        {{ Form::label('tags','Tags:') }}
        {{ Form::select('tags[]', $taggs ,null,['class' => 'selectpicker', 'multiple data-live-search'=>'true']) }} 
        <br>
        {{ Form::label('featured_image','Upload Featured Image:') }}
        {{ Form::file('featured_image')}}
        <br>

        {{ Form::label('body','Post:') }}
        {{ Form::textarea('body', null, array('class' => 'form-control')) }}
    </div>

    <div class="col-md-4" >
        <div class="shadow-none p-3 mb-5 bg-light rounded">
           <dl class="dl-horizontal"> 
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
            
            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
           </div>
            <div class="col-sm-6">
            {!! Html::linkRoute('posts.show','Cancel', array( $post->id ),array('class' => 'btn btn-danger btn-block'))!!}
            
        </div>
           </div>
           
        </div>
       
    </div>
  
 
</div>
{!! Form::close()!!}

@endsection
@section('scripts')

  <script type="text/javascript">

$(document).ready(function() {

    $('select').selectpicker();

});

</script>
@endsection

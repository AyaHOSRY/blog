@extends('layouts.main')
@section('title', '|Contact')

@section('content')

    <div class="row">
        <div class="col-md-12">

       
    <h1>Contact me</h1>
    <form action="{{ url('contact') }}" method="POST">
      {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">subject</label>
      <input name="subject" type="text" class="form-control" id="subject" placeholder="subject">
    </div>
    
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <input name="message" type="text" class="form-control" id="message" placeholder="your message">
  </div>
 <button type="submit" class="btn btn-primary">Send</button>
</form>
</div>
    </div>

@endsection
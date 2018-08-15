@extends('main')

@section('title','| Contact')


@section('content')

  <div class="row">
    <div class="col-md-8 offset-2">
      <h1>Contact Us</h1>
      <form action="{{ route('contact.store')}}" method="POST">

        {{ csrf_field() }}
      	<div class="form-group">
      		<label name="email">Email:</label>
      		<input id="email" name="email" class="form-control">
      	</div>
      	<div class="form-group">
      		<label name="subject">subject:</label>
      		<input id="subject" name="subject" class="form-control">
      	</div>
      	<div class="form-group">
      		<label name="message">Message:</label>
      		<textarea id="message" name="message" placeholder="Type your message here..." class="form-control"></textarea> 
      	</div>
      	<input type="submit" value="submit" class="btn btn-success">
      </form>
    </div>
  </div>
@endsection
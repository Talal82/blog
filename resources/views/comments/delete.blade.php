@extends('main')

@section('title', '| Delete Comment?')

@section('content')

<div class="row">
	<div class="col-md-8 offset-2">
		<h2>Delete this Comment?</h2>
		<p>
			<strong>Name:</strong>{{ $comment -> name }}<br>
			<strong>Email:</strong>{{ $comment -> email }}<br>
			<strong>Comment:</strong>{{ $comment -> comment }}<br>
		</p>
		{{ Form::open(['route' => ['comment.destroy', $comment -> id], 'method' => 'DELETE']) }}

			{{ Form::submit('Yes Delete this comment', ['class' => 'btn btn-block btn-danger']) }}

		{{ Form::close() }}
	</div>
</div>

@endsection
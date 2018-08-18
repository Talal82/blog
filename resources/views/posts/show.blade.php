@extends('main')

@section('title', '| View Post')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1> {{ $post -> title }} </h1>
		<p class="lead"> {!! $post -> body !!} </p>
		<hr>
		<div class="tags">
			@foreach($post-> tags as $tag)
				<span class="label label-default">{{ $tag -> name }}</span>
			@endforeach
		</div>
		<div class="backend-comments">
			<h3>Comments <small> {{ $post -> comments() -> count() }} total</small></h3>

			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th width="100px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($post -> comments as $comment)
					<tr>
						<td> {{ $comment -> name }} </td>
						<td> {{ $comment -> email }} </td>
						<td> {{ $comment -> comment }} </td>
						<td>
							<a href="{{ route('comment.edit', $comment -> id) }}" class="btn btn-xs btn-primary float-left">Edit</a>
							<a href=" {{ route('comment.delete', $comment -> id) }} " class="btn btn-xs btn-danger float-left">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Url:</label>
				<p> <a href="{{ route('blog.single', $post->slug) }}"> {{ route('blog.single', $post->slug) }} </a> </p>
			</dl>
			<dl class="dl-horizontal">
				<label>Category:</label>
				<p> {{ $post -> category -> name }} </p>
			</dl>
			<dl class="dl-horizontal">
				<label>Created At:</label>
				<p> {{ date('M j,Y h:i a' , strtotime($post -> created_at)) }} </p>
			</dl>
			<dl class="dl-horizontal">
				<label>Last Updated:</label>
				<p> {{ date('M j,Y h:i a', strtotime($post -> created_at)) }} </p>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.edit', 'Edit', array($post -> id), array('class' => 'btn btn-primary btn-block')) !!}
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE' ]) !!}
					
					{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

					{!! Form::close() !!}
				</div>
			</div> <!-- end of the internal first .row-->

			<div class="row">
				<div class="col-md-12">
					{!! Html::linkRoute('posts.index', '<< Show All Posts', [] , array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
				</div>
			</div> <!-- end of the internal 2nd .row -->
		</div> <!-- end of the .well -->
	</div>
</div> <!-- end of the Main .row -->

@endsection
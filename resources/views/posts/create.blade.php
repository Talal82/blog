@extends('main')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>

@endsection

@section('title', '| Create Post')
@section('content')
	<div class="row">
		<div class="col-md-8 offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
				{{ csrf_field() }}

			    {{ Form::label('title', 'Title:')}}
			    {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '191' ))}}

			    {{ Form::label('slug', "Slug:", ['class' => 'btn-h1-spacing']) }}
			    {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' =>
			    '5', 'maxlength' => '191']) }}

			    {{ Form::label('category_id', 'Category:', ['class' => 'btn-h1-spacing']) }}
			    <select class="form-control form-control-lg" name="category_id">
					@foreach($categories as $category)
					
						<option value="{{ $category -> id }}"> {{ $category -> name }} </option>

					@endforeach
			    </select>

			    {{ Form::label('tag_id', 'Tags:', ['class' => 'btn-h1-spacing']) }}
			    <select class="form-control form-control-lg select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
					
						<option value="{{ $tag -> id }}"> {{ $tag -> name }} </option>

					@endforeach
			    </select>

			    {{ Form::label('featured_image', 'Upload Featured Image', ['class' => 'btn-h1-spacing']) }}
				{{ Form::file('featured_image') }}

			    {{ Form::label('body', 'Post Body:', ['class' => 'btn-h1-spacing'])}}
			    {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '' ))}}

			    {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>


@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>


@endsection
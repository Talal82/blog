@extends('main')

@section('title','| Home')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>Welcome to my Blog!</h1> 
        <p>This is a blog built by Laravel, which is a Frameword of PHP. It's a very powerful framework and is getting popularity very quickly and vastly in the world and it has many great features and it makes your development easy.</p>
        <p><a href="#" class="btn btn-primary btn-lg">Read More..</a></p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">

      @foreach($posts as $post)
      <div class="post">
        <h3> {{ $post->title }} </h3> 
        <p> {{ substr(strip_tags($post->body), 0, 300) }} {{ strlen(strip_tags($post->body)) > 300 ? ".." : "" }} </p>
        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More..</a>
      </div>
      @endforeach
      
    </div>
   
    <div class="col-md-3 offset-1">
      @include('partials._sidebar')
    </div>
  </div>

   <div class="row">
    <div class="col-md-12">
      <div class="text-center">
          {!! $posts->links() !!}
        </div>
      </div>
    </div>
@endsection
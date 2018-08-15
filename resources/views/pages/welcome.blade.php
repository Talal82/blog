@extends('main')

@section('title','| Home')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>Welcome to my Blog!</h1> 
        <p>Fugiat exercitation reprehenderit eiusmod.C’est à dire ici, c’est le contraire, au lieu de panacée, l'imbroglio par rapport aux diplomaties vise à effaceter une kermesse.</p>
        <p><a href="#" class="btn btn-primary btn-lg">Read More..</a></p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">

      @foreach($posts as $post)
      <div class="post">
        <h3> {{ $post->title }} </h3> 
        <p> {{ substr($post->body, 0, 300) }} {{ strlen($post->body) > 300 ? ".." : "" }} </p>
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
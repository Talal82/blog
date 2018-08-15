<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class BlogController extends Controller
{
	public function getIndex(){
		$posts = Post::paginate(5);

		return view('blog.index')->withPosts($posts);
	}

    public function getSingle($slug){
    	// $post = DB::table('posts')->where('slug', $slug)->first();

    	 // upper line works or the posts table only but if try to get category tables id through this variable.. it doesn't work.. for that the line below works i don't know why but it does work..


    	$post = Post::where('slug', $slug) -> first();

    	return view('blog.single')->withPost($post);
    }
}

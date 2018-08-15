<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
Use Session;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //store all the blog posts in a variable and pass that variable to the index view..
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view ('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        //validate the data

        $this->validate($request,array(
            'title' => 'required | max:191',
            'slug'  => 'required | alpha_dash | min:5 | max:191 | unique:posts,slug',
            'category_id' => 'required | integer',
            'body'  => 'required'
        ));

        //store in the database

        $post = new Post;

        $post -> title = $request -> title ;
        $post -> slug = $request -> slug;
        $post -> category_id = $request -> category_id;
        $post -> body = $request -> body ;

        $post -> save();

        $post -> tags() -> sync($request->tags, false);

        // flash messages for successfully save post
            
        Session::flash('success', 'The blog post was successfully created!');

        //redirect to any specific page

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post we want to edit and save it in a variable
        $post = Post::find($id);


        //The code snippets below are sending categories and tags as an associative array to our view to show the categories and tags in the select field to set {id => name} as {key => value} in the select field.. 
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
            $cats[$category -> id] = $category -> name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach($tags as $tag){
            $tags2[$tag -> id] = $tag -> name;
        } 
        //return the view and pass that variable in the view
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        //validate the data
        if($request->input('slug') == $post->slug){
            $this->validate($request,array(
            'title' => 'required | max:191',
            'category_id' => 'required | integer',
            'body'  => 'required'
            ));
        }
        else{
           $this->validate($request,array(
            'title' => 'required | max:191',
            'slug'  => 'required | alpha_dash | min:5 | max:191 | unique:posts,slug',
            'category_id' => 'required | integer',
            'body'  => 'required'
            )); 
        }

        
        //store the data in the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();

        $post -> tags() -> sync($request->tags);
         

        //store a flash data with success message
        Session::flash('success', 'This post was successfully updated.');

        //redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post -> tags() -> detach();

        $post->delete();

        Session::flash('success', 'Post deleted Successfully');

        return redirect()->route('posts.index');
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Register routes for the pages

//Authentication routes


Route::get('blog/{slug}','BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('blog', 'BlogController@getIndex')->name('blog.index');
Route::get('about', 'PageController@getAbout')->name('about');
Route::get('contact', 'PageController@getContact')->name('contact');
Route::post('contact', 'PageController@postContact')->name('contact.store');
Route::get('/', 'PageController@getIndex')->name('main');

//Register our PostController routes and methods
Route::resource('posts','PostController');

//Register our CategoryControlller/TagController routes and methods
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

//Comments routes
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');


//Authentication Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function category()
    {
    	return $this -> belongsTo('App\Category');
    	// return $this -> belongsTo(Category::class);
    }
    public function tags(){
    	return $this -> belongsToMany('App\Tag');
    	// return $this -> belongsToMany(Tag::class,'post_tag');
    }
    public function comments(){
    	return $this -> hasMany('App\Comment');
    }
}

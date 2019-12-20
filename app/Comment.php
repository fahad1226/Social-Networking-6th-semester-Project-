<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //to access this function like this,we can make this relationship.. $comment->post

	protected $guarded = [];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function user()  // comment->user to access its this way
    {
    	return $this->belongsTo(User::class);
    }
}

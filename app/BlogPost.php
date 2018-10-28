<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public function comments()
    {
        return $this->hasMany('App\BlogComment');
    }

    public function likes()
    {
        return $this->hasMany('App\BlogPostLike');
    }

    public function dislikes()
    {
        return $this->hasMany('App\BlogPostDislike');
    }

    public function favorites()
    {
        return $this->hasMany('App\UserFavoriteBlog');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

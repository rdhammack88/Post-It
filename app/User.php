<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'avatar', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** User hasMany Blogs Relationship */
    public function blogs()
    {
        return $this->hasMany('App\BlogPost');
    }

    /** User hasMany Blog Likes Relationship */
    public function blog_likes()
    {
        return $this->hasMany('App\BlogPostLike');
    }

    /** User hasMany Blog Dislikes Relationship */
    public function dislikes()
    {
        return $this->hasMany('App\BlogPostDislike');
    }

    /** User hasMany Blog Favorites Relationship */
    public function favorites()
    {
        return $this->hasMany('App\UserFavoriteBlog');
    }

    /** User hasMany Blog Comments Relationship */
    public function comments()
    {
        return $this->hasMany('App\BlogComment');
    }

    /** User hasMany Blog Comments Likes Relationship */
    public function comment_likes()
    {
        return $this->hasMany('App\BlogCommentLike');
    }
}

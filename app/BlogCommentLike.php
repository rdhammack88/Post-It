<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCommentLike extends Model
{
    public $timestamps = false;

    public function comments()
    {
        return $this->belongsTo('App\BlogComment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

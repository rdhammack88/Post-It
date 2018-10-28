<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    public function blogs()
    {
        return $this->belongsTo('App\BlogPost');
    }

    public function likes()
    {
        return $this->hasMany('App\BlogCommentLike');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavoriteBlog extends Model
{
    public $timestamps = false;

    public function blogs()
    {
        return $this->belongsTo('App\BlogPost');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

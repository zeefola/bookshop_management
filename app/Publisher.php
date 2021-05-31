<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Publisher extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
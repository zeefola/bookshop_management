<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Supplier extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
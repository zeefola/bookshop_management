<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Supplier');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
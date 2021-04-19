<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
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
}
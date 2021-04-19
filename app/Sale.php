<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
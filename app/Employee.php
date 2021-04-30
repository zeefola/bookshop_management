<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
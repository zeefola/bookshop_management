<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function authors()
    {
        return $this->hasMany('App\Author');
    }

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function publishers()

    {
        return $this->hasMany('App\Publisher');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Supplier');
    }
}
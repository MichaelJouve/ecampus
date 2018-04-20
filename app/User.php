<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $fillable = ['name','firstname', 'password', 'email', 'paypal', 'birthdate'];

    public function publication()
    {
        return $this->hasMany('App\Publication')->where('status','1')->orderBy('created_at','desc');
    }

    public function post()
    {
        return $this->belongsTo('App\Publication')->orderBy('created_at','desc');;
    }


}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class User extends Authenticatable
{
    use Sluggable;
    use SluggableScopeHelpers;
    use SoftDeletes;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['firstname', 'name'],
                'separator' => '-'
            ],
        ];
    }

    protected $fillable = ['name', 'firstname', 'password', 'email', 'paypal', 'birthday', 'description'];

    public function publication()
    {
        return $this->hasMany('App\Publication')->orderBy('created_at','desc');
    }

    public function post()
    {
        return $this->belongsTo('App\Publication')->orderBy('created_at','desc');;
    }

    public function media()
    {
        return $this->hasMany('App\Media');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
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

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id_followed', 'user_id_following');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id_following', 'user_id_followed');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {

            return $this->hasAnyRole($roles) || abort(401, 'Cette action n\'est pas autorisée');
        }

        return $this->hasRole($roles) || abort(401, 'Cette action n\'est pas autorisée');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}

<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    use SoftDeletes;

    protected $fillable = ['type', 'imgpublication', 'price', 'title', 'slug', 'description', 'content', 'goals', 'required', 'category_id', 'user_id'];
    protected $perPage = 10;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeTuto($query)
    {
        return $query->where('type', 'tutorial');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function consultation()
    {
        return $this->hasOne('App\Consultation');
    }

    public function media()
    {
        return $this->hasMany('App\Media');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    public function userOwner()
    {
        return $this->belongsToMany(User::class, 'boughts', 'publi_id', 'user_id');
    }


}

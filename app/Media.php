<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['title', 'type_mime', 'file_path'];

    public function publication()
    {
        return $this->belongsTo('App\Publication');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
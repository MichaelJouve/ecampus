<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   //
    public function publication()
    {
        return $this->belongsTo('App\Publication');
    }

    public function scopeTuto($query) {
        return $query->where('type','=','tutorial');
    }

    public function post()
    {
        return $this->belongsTo('App\Publication')->where('type','=','post');
    }

    public function tutoroel()
    {
        return $this->belongsTo('App\Publication')->tuto();
    }

}

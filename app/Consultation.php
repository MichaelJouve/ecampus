<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{

    protected $fillable = ['publication_id', 'user_id'];

    public function publication()
    {
        return $this->belongsTo('App\Publication');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function consultation()
    {
        //
    }
}
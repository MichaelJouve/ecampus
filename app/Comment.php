<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    //
    protected $fillable = ['content','user_id', 'publication_id'];

    public function publication(){
        return $this->belongsTo('App\Publication');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

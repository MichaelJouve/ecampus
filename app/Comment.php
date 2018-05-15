<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use SoftDeletes;

    //
    protected $fillable = ['content','user_id', 'publication_id'];

    public function publication(){
        return $this->belongsTo('App\Publication');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'from_user_id', 'to_user_id'];


    public function scopeFindConversation($query, $userId, $otherUserId)
    {

        return $query->where([
                ['from_user_id', '=', $userId],
                ['to_user_id', '=', $otherUserId],
            ])->orWhere([
                ['from_user_id', '=', $otherUserId],
                ['to_user_id', '=', $userId],
            ]);
    }

}

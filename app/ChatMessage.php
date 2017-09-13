<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
     protected $fillable = [
        'id', 'message', 'user_id', 'created_at', 'updated_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}

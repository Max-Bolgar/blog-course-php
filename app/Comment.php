<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = [
        'id', 'comment', 'article_id', 'user_id', 'created_at', 'updated_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function article() {
        return $this->belongsTo('App\Article');
    }

}

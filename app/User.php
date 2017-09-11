<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'login', 'id', 'remember_token', 'created_at', 'updated_at', 'facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function country() {
        return $this->hasOne('App\Country');
    }

    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

}

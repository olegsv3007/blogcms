<?php

namespace App\Model;

class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "users";
    protected $fillable = array("name", "avatar", "email", "password", "about_self","isSubscribe");

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role');
    }
}
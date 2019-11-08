<?php

namespace App\Model;

class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "users";
    protected $fillable = array("name", "avatar", "email_id", "password", "about_self", "is_subscribe");

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role', 'user_role');
    }

    public function articles()
    {
        return $this->morphMany('App\Model\Article', 'author');
    }

    public function comments()
    {
        return $this->morphMany('App\Model\Comment', 'author');
    }

    public function email()
    {
        return $this->hasOne("App\Model\Email", 'id', 'email_id');
    }
}
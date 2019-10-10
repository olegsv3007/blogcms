<?php

namespace App\Model;

class Role extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "roles";
    protected $fillable = array("name");

    public function users()
    {
        return $this->belongsToMany('App\Model\User', 'user_role');
    }
}
<?php

namespace App\Model;

class Email extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "emails";
    protected $fillable = array("email", "is_subscribe", "unsub_id");

    public function user()
    {
        return $this->hasOne('App\Model\User');
    }
}
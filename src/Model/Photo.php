<?php

namespace App\Model;

class Photo extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "photos";
    protected $fillable = array('name');

    public function article()
    {
        return $this->morphTo();
    }
}
<?php

namespace App\Model;

class Comment extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "comments";
    protected $fillables = array("text", "is_published");

    public function article()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo('App\Model\User');
    }
}
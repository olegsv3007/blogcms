<?php

namespace App\Model;

class Article extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "articles";
    protected $fillable = array("header", "content", "image", "author_id");

    public function author()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->hasMany('App\Model\Comment')->orderBy('created_at', 'desc');
    }
}
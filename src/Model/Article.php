<?php

namespace App\Model;

class Article extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "articles";
    protected $fillable = array("header", "content", "image");

    public function photos()
    {
        return $this->morphMany('App\Model\Photo', 'article');
    }

    public function author()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->motrphMany('App\Model\Comment', 'article');
    }
}
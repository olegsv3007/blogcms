<?php

namespace App\Model;

class Page extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "pages";
    protected $fillable = ['url', 'filename', 'name'];
}
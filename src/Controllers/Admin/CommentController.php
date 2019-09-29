<?php

namespace App\Controllers\Admin;

class CommentController
{
    public static function index()
    {
        return new \App\View("admin\comments\index");
    }
}
<?php

namespace App\Controllers\Admin;

class ArticleController
{
    public static function index()
    {
        return new \App\View('admin\articles\index');
    }

    public static function add()
    {
        return new \App\View('admin\articles\add');
    }

    public static function edit()
    {
        return new \App\View('admin\articles\edit');
    }
}
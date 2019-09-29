<?php

namespace App\Controllers\Admin;

class StaticController
{
    public static function index()
    {
        return new \App\View('admin\statics\index');
    }

    public static function add()
    {
        return new \App\View('admin\statics\add');
    }

    public static function edit()
    {
        return new \App\View('admin\statics\edit');
    }
}
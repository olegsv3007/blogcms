<?php

namespace App\Controllers\Admin;

class UserController
{
    public static function index()
    {
        return new \App\View('admin\users\index');
    }

    public static function add()
    {
        return new \App\View('admin\users\add');
    }

    public static function edit()
    {
        return new \App\View('admin\users\edit');
    }
}
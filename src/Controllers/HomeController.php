<?php

namespace App\Controllers;

class HomeController
{
    public static function index()
    {
        return new \App\View('index');
    }
}
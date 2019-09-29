<?php

namespace App\Controllers\Admin;

class SettingsController
{
    public static function index()
    {
        return new \App\View("admin\settings\index");
    }
}
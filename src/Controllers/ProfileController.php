<?php

namespace App\Controllers;

class ProfileController
{
    public static function index()
    {
        return new \App\View("profile");
    }
}
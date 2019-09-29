<?php

namespace App\Controllers;

class RegistrationController
{
    public static function index()
    {
        return new \App\View("registration");
    }
}
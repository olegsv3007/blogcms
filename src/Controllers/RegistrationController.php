<?php

namespace App\Controllers;

class RegistrationController
{
    public static function index($user)
    {
        return new \App\View("registration");
    }

    public static function registration()
    {

    }

    private function createUser()
    {

    }
}
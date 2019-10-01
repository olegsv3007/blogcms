<?php

namespace App\Controllers;

class ProfileController
{
    public static function index()
    {
        $profile = self::getProfile($_SESSION['email']);
        return new \App\View("profile", $profile);
    }

    private static function getProfile($email)
    {
        return \App\Model\User::where('email', $email)->first();
    }
}
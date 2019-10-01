<?php

namespace App\Helpers;

class SessionManager
{
    public static function sessionStart(string $email)
    {
        self::sessionDestroy();
        session_set_cookie_params(3600);
        session_start();
        session_regenerate_id();
        $_SESSION['email'] = $email;
    }

    public static function sessionDestroy()
    {
        session_unset();
        session_destroy();
    }
}
<?php

namespace App\Controllers;

use \App\Helpers\SessionManager;


class AuthorizationController
{
    public static function index($user = null, $validationInfo = null)
    {
        $data['user'] = $user;
        $data['validation_info'] = $validationInfo;
        return new \App\View("authorization", $data);
    }

    public static function login()
    {
        $user['email'] = $_POST['email'];
        $user['password'] = $_POST['password'];

        $resultValidate = self::validateAuthorizationForm($user);
    
        if (isset($resultValidate['errors'])) {
            return self::index($user, $resultValidate);
        }

        self::authorize($user['email']);
        
        return header("Location: /");
    }

    public static function logout()
    {
        Sessionmanager::sessionDestroy();
        return header("Location: /");
    }

    private static function validateAuthorizationForm($user)
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->pregValidate('email', $user['email'], '/@/');
        $formValidator->requiredValidate('email', $user['email']);

        $formValidator->requiredValidate('password', $user['password']);

        $formValidator->passwordVerifyValidate('password', $user['password'], $user['email']);

        return $formValidator->getResultValidate();
    }

    private static function authorize($email)
    {
        SessionManager::sessionStart($email);
    }
}
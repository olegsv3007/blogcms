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

        $resultValidate = self::validateAuthorizationForm();
    
        if (isset($resultValidate['errors'])) {
            return self::index($user, $resultValidate);
        }

        self::authorize($user['email']);
        
        return \App\Controllers\HomeController::index();
    }

    public static function logout()
    {
        Sessionmanager::sessionDestroy();
        return HomeController::index();
    }

    private static function validateAuthorizationForm()
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->pregValidate('email', $_POST['email'], '/@/');
        $formValidator->requiredValidate('email', $_POST['email']);

        $formValidator->requiredValidate('password', $_POST['password']);

        $formValidator->passwordVerifyValidate('password', $_POST['password'], $_POST['email']);

        return $formValidator->getResultValidate();
    }

    private static function authorize($email)
    {
        SessionManager::sessionStart($email);
    }
}
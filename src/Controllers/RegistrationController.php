<?php

namespace App\Controllers;

use App\Helpers\SessionManager;

class RegistrationController
{
    public static function index($user = null, $validationInfo = null)
    {
        $data['user'] = $user;
        $data['validation-info'] = $validationInfo;
        return new \App\View("registration", $data);
    }

    public static function registration()
    {
        $user['name'] = $_POST['name'];
        $user['email'] = $_POST['email'];
        $user['password'] = $_POST['password'];

        $validationInfo = self::validateRegistrationForm();
        if (!$validationInfo['summary']) {
            return self::index($user, $validationInfo);
        }
        self::createUser($user);

        SessionManager::sessionStart($user['email']);
        
        return \App\Controllers\HomeController::index();
    }

    private static function validateRegistrationForm()
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->minLengthValidate('name', $_POST['name'], 5);
        $formValidator->requiredValidate('name', $_POST['name']);

        $formValidator->emailExistValidate('email', $_POST['email']);
        $formValidator->pregValidate('email', $_POST['email'], '/@/');
        $formValidator->requiredValidate('email', $_POST['email']);

        $formValidator->minLengthValidate('password', $_POST['password'], 6);
        $formValidator->maxLengthValidate('password', $_POST['password'], 12);
        $formValidator->requiredValidate('password', $_POST['password']);

        $formValidator->confirmPasswordValidate('confirm-password', $_POST['password'], $_POST['confirm-password']);
        $formValidator->requiredValidate('confirm-password', $_POST['confirm-password']);

        $formValidator->requiredCheckValidate('agree', $_POST['agree'] ?? null);

        return $formValidator->getResultValidate();
    }

    private static function createUser($userData)
    {
        $user = new \App\Model\User;
        $user->name = $userData['name'];
        $user->password = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->email = $userData['email'];

        $user->save();
    }
}
<?php

namespace App\Controllers;

use App\Helpers\SessionManager;

class RegistrationController
{
    public static function index($user = null, $validationInfo = null)
    {
        $data['user'] = $user;
        $data['validation_info'] = $validationInfo;
        return new \App\View("registration", $data);
    }

    public static function registration()
    {
        $user['name'] = $_POST['name'];
        $user['email'] = $_POST['email'];
        $user['password'] = $_POST['password'];
        $user['confirm-password'] = $_POST['confirm-password'];
        $user['agree'] = $_POST['agree'] ?? null;

        $validationInfo = self::validateRegistrationForm($user);
        
        if (isset($validationInfo['errors'])) {
            return self::index($user, $validationInfo);
        }
        self::createUser($user);

        SessionManager::sessionStart($user['email']);
        
        return HomeController::index();
    }

    private static function validateRegistrationForm($user)
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->minLengthValidate('name', $user['name'], 5);
        $formValidator->requiredValidate('name', $user['name']);

        $formValidator->emailExistValidate('email', $user['email']);
        $formValidator->pregValidate('email', $user['email'], '/@/');
        $formValidator->requiredValidate('email', $user['email']);

        $formValidator->minLengthValidate('password', $user['password'], 6);
        $formValidator->maxLengthValidate('password', $user['password'], 12);
        $formValidator->requiredValidate('password', $user['password']);

        $formValidator->confirmPasswordValidate('confirm-password', $user['password'], $user['confirm-password']);
        $formValidator->requiredValidate('confirm-password', $user['confirm-password']);

        $formValidator->requiredCheckValidate('agree', $user['agree']);

        return $formValidator->getResultValidate();
    }

    private static function createUser($userData)
    {
        $user = new \App\Model\User;
        $user->name = $userData['name'];
        $user->password = password_hash($userData['password'], PASSWORD_DEFAULT);
        $email = \App\Model\Email::where('email', $userData['email'])->first();
        
        if (is_null($email)) {
            $email = new \App\Model\Email;
            $email->email = $userData['email'];
            $email->unsub_id = uniqid();
        }

        $email->save();
        $email->user()->save($user);
        $user->roles()->attach(1);
    }
}
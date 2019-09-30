<?php

namespace App\Controllers;

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

        $validationInfo = self::validateRegistrationForm();
        if (!$validationInfo['summary']) {
            return self::index($user, $validationInfo);
        }
    }

    private static function validateRegistrationForm()
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->minLengthValidate('name', $_POST['name'], 5);
        $formValidator->requiredValidate('name', $_POST['name']);

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

    private function createUser()
    {

    }
}
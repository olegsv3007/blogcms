<?php

namespace App\Controllers;

class ProfileController
{
    public static function index($validationInfo = null)
    {
        $data['profile'] = self::getProfile($_SESSION['email']);
        $data['validation_info'] = $validationInfo;
        return new \App\View("profile", $data);
    }

    public static function updateProfile()
    {
        $validationInfo = self::validateProfileForm();
        if (isset($validationInfo['errors'])) {
            return self::index($validationInfo);
        }
        
        return self::index();
    }

    private static function validateProfileForm()
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

        return $formValidator->getResultValidate();
    }

    private static function getProfile($email)
    {
        return \App\Model\User::where('email', $email)->first();
    }
}
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
        
        self::updateProfileDb();

        return self::index();
    }

    private static function updateProfileDb()
    {
        var_dump($_FILES['avatar']);
        if (isset($_FILES['avatar'])) {
            $name = basename($_FILES['avatar']['name']);
            move_uploaded_file($_FILES['avatar']['tmp_name'], APP_DIR . AVATARS_DIR . $name);
        }
    }

    private static function validateProfileForm()
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->minLengthValidate('name', $_POST['name'], 5);
        $formValidator->requiredValidate('name', $_POST['name']);

        $formValidator->emailExistValidate('email', $_POST['email']);
        $formValidator->pregValidate('email', $_POST['email'], '/@/');
        $formValidator->requiredValidate('email', $_POST['email']);

        return $formValidator->getResultValidate();
    }

    private static function getProfile($email)
    {
        return \App\Model\User::where('email', $email)->first();
    }
}
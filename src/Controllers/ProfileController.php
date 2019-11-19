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
        $user = \App\Model\User::find($_POST['user_id']);

        if ($_FILES['avatar']['name']) {
            if (file_exists(APP_DIR . AVATARS_DIR . $user->avatar)) {
                unlink(APP_DIR . AVATARS_DIR . $user->avatar);
            }
            $explodeName = explode('.', $_FILES['avatar']['name']);
            $fileName = uniqid() . "." . end($explodeName);
            move_uploaded_file($_FILES['avatar']['tmp_name'], APP_DIR . AVATARS_DIR . $fileName);
            $user->avatar = $fileName;
        }

        $email = $user->email;
        $email->email = $_POST['email'];
        $email->is_subscribe = isset($_POST['subscribe']) ? 1 : 0;
        $email->save();

        $user->name = $_POST['name'];
        $user->about_self = $_POST['about-self'];

        if ($user->save()) {
            $_SESSION['email'] = $_POST['email'];
        }
    }

    private static function validateProfileForm()
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->minLengthValidate('name', $_POST['name'], 5);
        $formValidator->requiredValidate('name', $_POST['name']);

        $formValidator->emailExistValidate('email', $_POST['email'], $_POST['id']);
        $formValidator->pregValidate('email', $_POST['email'], '/@/');
        $formValidator->requiredValidate('email', $_POST['email']);

        if ($_FILES['avatar']['name']) {
            $mimeTypes = ["image/jpeg", "image/png"];
            $formValidator->validateFile("avatar", $_FILES['avatar'], $mimeTypes);
        }

        return $formValidator->getResultValidate();
    }

    private static function getProfile($email)
    {
        return \App\Model\Email::where('email', $email)->first()->user;
    }
}
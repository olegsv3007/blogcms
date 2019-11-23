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
        $user['id'] = $_POST['user_id'];
        $user['name'] = $_POST['name'];
        $user['email'] = $_POST['email'];
        $user['is_subscribe'] = isset($_POST['subscribe']) ? 1 : 0;
        $user['avatar'] = $_FILES['avatar'];
        $user['about_self'] = $_POST['about-self'];

        $validationInfo = self::validateProfileForm($user);

        if (isset($validationInfo['errors'])) {
            return self::index($validationInfo);
        }

        self::updateProfileDb($user);

        return header("Location: /profile");
    }

    private static function updateProfileDb($userData)
    {
        $user = \App\Model\User::find($userData['id']);

        if ($userData['avatar']['name']) {
            if (file_exists(APP_DIR . AVATARS_DIR . $user->avatar)) {
                unlink(APP_DIR . AVATARS_DIR . $user->avatar);
            }
            $explodeName = explode('.', $userData['avatar']['name']);
            $fileName = uniqid() . "." . end($explodeName);
            move_uploaded_file($userData['avatar']['tmp_name'], APP_DIR . AVATARS_DIR . $fileName);
            $user->avatar = $fileName;
        }

        $email = $user->email;
        $email->email = $userData['email'];
        $email->is_subscribe = $userData['is_subscribe'];
        $email->save();

        $user->name = $userData['name'];
        $user->about_self = $userData['about_self'];

        if ($user->save()) {
            $_SESSION['email'] = $userData['email'];
        }
    }

    private static function validateProfileForm($user)
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->minLengthValidate('name', $user['name'], 5);
        $formValidator->requiredValidate('name', $user['name']);

        $formValidator->emailExistValidate('email', $user['email'], $user['id']);
        $formValidator->pregValidate('email', $user['email'], '/@/');
        $formValidator->requiredValidate('email', $user['email']);

        if ($user['avatar']['name']) {
            $mimeTypes = ["image/jpeg", "image/png"];
            $formValidator->validateFile("avatar", $user['avatar'], $mimeTypes);
        }

        return $formValidator->getResultValidate();
    }

    private static function getProfile($email)
    {
        return \App\Model\Email::where('email', $email)->first()->user;
    }
}
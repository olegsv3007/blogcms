<?php

namespace App\Controllers\Admin;

class UserController
{
    public static function index()
    {
        $data['users'] = \App\Model\User::all();
        return new \App\View('admin\users\index', $data);
    }

    public static function add($user = null, $validationInfo = null)
    {
        $data['roles'] = \App\Model\Role::all();
        $data['user'] = $user;
        $data['validation_info'] = $validationInfo;
        return new \App\View('admin\users\add', $data);
    }

    public static function addUser()
    {
        $validationInfo = self::validateAddUserForm();

        $user['name'] = $_POST['name'];
        $user['email'] = $_POST['email'];
        $user['about-self'] = $_POST['about-self'];
        $user['roles'] = $_POST['roles'];
        $user['subscribe'] = isset($_POST['subscribe']) ? 1 : 0;
        $user['avatar'] = $_FILES['avatar']['name'] ? $_FILES['avatar'] : null;

        if (isset($validationInfo['errors'])) {
            return self::add($user, $validationInfo);
        }

        self::createUser($user);
        return self::index();
    }

    private static function createUser($userData)
    {
        $user = new \App\Model\User;

        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->about_self = $userData['about-self'] ?? null;
        $user->is_subscribe = $userData['subscribe'];

        if ($userData['avatar']) {
            $explodeName = explode('.', $userData['avatar']['name']);
            $fileName = uniqid() . "." . end($explodeName);
            move_uploaded_file($userData['avatar']['tmp_name'], APP_DIR . AVATARS_DIR . $fileName);
            $user->avatar = $fileName;
        }

        $user->save();
        $user->roles()->attach($userData['roles']);
        $user->save();
    }

    private static function validateAddUserForm()
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

        if ($_FILES['avatar']['name']) {
            $mimeTypes = ["image/jpeg", "image/png"];
            $formValidator->validateFile("avatar", $_FILES['avatar'], $mimeTypes);
        }

        return $formValidator->getResultValidate();
    }

    public static function edit()
    {
        return new \App\View('admin\users\edit');
    }
}
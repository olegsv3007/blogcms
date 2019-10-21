<?php

namespace App\Controllers\Admin;

class UserController
{
    public static function index($page = 1)
    {
        if ((int)$page == 0) {
            $page = 1;
        }
        $_SESSION['qty_items'] = isset($_POST['qty_items']) ? $_POST["qty_items"] : (isset($_SESSION['qty_items']) ? $_SESSION['qty_items'] : 20);
        $quantityItemsPerPage = $_SESSION['qty_items'];
        $totalItems = \App\Model\User::all()->count();
        $data['users'] = \App\Model\User::skip(($page - 1) * $quantityItemsPerPage)->take($quantityItemsPerPage)->get();
        $data['paginator'] = new \App\Helpers\Paginator($totalItems, $quantityItemsPerPage, $page);
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
        $validationInfo = self::validateUserForm();

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

    private static function validateUserForm()
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->minLengthValidate('name', $_POST['name'], 5);
        $formValidator->requiredValidate('name', $_POST['name']);

        $formValidator->emailExistValidate('email', $_POST['email'], $_POST['id'] ?? 0);
        $formValidator->pregValidate('email', $_POST['email'], '/@/');
        $formValidator->requiredValidate('email', $_POST['email']);

        $formValidator->minLengthValidate('password', $_POST['password'], 6);
        $formValidator->maxLengthValidate('password', $_POST['password'], 12);

        if (! isset($_POST['id'])) {
            $formValidator->requiredValidate('password', $_POST['password']);    
        }

        if ($_FILES['avatar']['name']) {
            $mimeTypes = ["image/jpeg", "image/png"];
            $formValidator->validateFile("avatar", $_FILES['avatar'], $mimeTypes);
        }

        return $formValidator->getResultValidate();
    }


    public static function edit($user, $validationInfo = null)
    {
        if (! $user) {
            return new \App\View('admin\404');
        }

        $roles = \App\Model\Role::all();

        if(! is_array($user)) {
            $userData['id'] = $user->id;
            $userData['name'] = $user->name;
            $userData['email'] = $user->email;
            $userData['about-self'] = $user->about_self;
            $userData['subscribe'] = $user->is_subscribe;
            $userData['avatar'] = $user->avatar;
            $userData['roles'] = $user->roles()->pluck('id')->toArray();
        } else {
            $userData = $user;
        }

        $data['user'] = $userData;
        $data['roles'] = $roles;
        $data['validation_info'] = $validationInfo;

        return new \App\View('admin\users\edit', $data);
    }


    public static function saveUser() {
        $validationInfo = self::validateUserForm();

        $user['id'] = $_POST['id'];
        $user['name'] = $_POST['name'];
        $user['email'] = $_POST['email'];
        $user['about-self'] = $_POST['about-self'];
        $user['roles'] = $_POST['roles'];
        $user['subscribe'] = isset($_POST['subscribe']) ? 1 : 0;
        $user['avatar'] = $_FILES['avatar']['name'] != '' ? $_FILES['avatar'] : null;

        if (isset($validationInfo['errors'])) {
            return self::edit($user, $validationInfo);
        }

        self::updateUser($user);
        return self::index();
    }


    private static function updateUser($userData)
    {
        $user = \App\Model\User::find($userData['id']);

        $user->name = $userData['name'];
        $user->email = $userData['email'];

        if (isset($_POST['password']) && $_POST['password'] != '') {
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        
        $user->about_self = $userData['about-self'] ?? null;
        $user->is_subscribe = $userData['subscribe'];

        if ($userData['avatar']) {
            $explodeName = explode('.', $userData['avatar']['name']);
            $fileName = uniqid() . "." . end($explodeName);
            move_uploaded_file($userData['avatar']['tmp_name'], APP_DIR . AVATARS_DIR . $fileName);
            $user->avatar = $fileName;
        }

        $user->roles()->detach();
        $user->roles()->attach($userData['roles']);

        $user->save();
    }

    public static function removeUser() {
        if (isset($_POST['id']) && $user = \App\Model\User::find($_POST['id'])) {
            $user->delete();
        }

        return self::index();
    }
}
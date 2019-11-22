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
        if ($quantityItemsPerPage == "Все") {
            $quantityItemsPerPage = $totalItems;
        }
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
        $user['name'] = $_POST['name'];
        $user['email'] = $_POST['email'];
        $user['password'] = $_POST['password'];
        $user['about-self'] = $_POST['about-self'];
        $user['roles'] = $_POST['roles'];
        $user['subscribe'] = isset($_POST['subscribe']) ? 1 : 0;
        $user['avatar'] = $_FILES['avatar']['name'] ? $_FILES['avatar'] : null;
        $validationInfo = self::validateUserForm($user);

        if (isset($validationInfo['errors'])) {
            return self::add($user, $validationInfo);
        }

        self::createUser($user);
        return self::index();
    }

    private static function createUser($userData)
    {
        $user = new \App\Model\User;

        $email = \App\Model\Email::where('email', $userData['email'])->first();
        
        if (is_null($email)) {
            $email = new \App\Model\Email;
            $email->email = $userData['email'];
            $email->unsub_id = uniqid();
        }

        $email->is_subscribe = $userData['subscribe'];

        $user->name = $userData['name'];
        $user->password = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->about_self = $userData['about-self'] ?? null;

        if ($userData['avatar']) {
            $explodeName = explode('.', $userData['avatar']['name']);
            $fileName = uniqid() . "." . end($explodeName);
            move_uploaded_file($userData['avatar']['tmp_name'], APP_DIR . AVATARS_DIR . $fileName);
            $user->avatar = $fileName;
        }
        $email->save();
        $email->user()->save($user);
        $email->user->roles()->attach($userData['roles']);
    }

    private static function validateUserForm($user)
    {
        $formValidator = new \App\Helpers\Validator;

        $formValidator->minLengthValidate('name', $user['name'], 5);
        $formValidator->requiredValidate('name', $user['name']);

        $formValidator->emailExistValidate('email', $user['email'], $user['id'] ?? 0);
        $formValidator->pregValidate('email', $user['email'], '/@/');
        $formValidator->requiredValidate('email', $user['email']);

        $formValidator->minLengthValidate('password', $user['password'], 6);
        $formValidator->maxLengthValidate('password', $user['password'], 12);

        if (! isset($user['id'])) {
            $formValidator->requiredValidate('password', $user['password']);    
        }

        if ($user['avatar']['name']) {
            $mimeTypes = ["image/jpeg", "image/png"];
            $formValidator->validateFile("avatar", $user['avatar'], $mimeTypes);
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
            $userData['email'] = $user->email->email;
            $userData['about-self'] = $user->about_self;
            $userData['subscribe'] = $user->email->is_subscribe;
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
        $user['id'] = $_POST['id'];
        $user['name'] = $_POST['name'];
        $user['email'] = $_POST['email'];
        $user['password'] = $_POST['password'];
        $user['about-self'] = $_POST['about-self'];
        $user['roles'] = $_POST['roles'];
        $user['subscribe'] = isset($_POST['subscribe']) ? 1 : 0;
        $user['avatar'] = $_FILES['avatar']['name'] != '' ? $_FILES['avatar'] : null;

        $validationInfo = self::validateUserForm($user);

        if (isset($validationInfo['errors'])) {
            return self::edit($user, $validationInfo);
        }

        self::updateUser($user);
        return self::index();
    }


    private static function updateUser($userData)
    {
        $user = \App\Model\User::find($userData['id']);

        $email= \App\Model\Email::find($user->email_id);
        $email->email = $userData['email'];
        $email->is_subscribe = $userData['subscribe'];
        $email->save();

        $user->name = $userData['name'];

        if (isset($userData['password']) && $userData['password'] != '') {
            $user->password = password_hash($userData['password'], PASSWORD_DEFAULT);
        }
        
        $user->about_self = $userData['about-self'] ?? null;

        if ($userData['avatar']) {
            if (file_exists(APP_DIR . AVATARS_DIR . $user->avatar)) {
                unlink(APP_DIR . AVATARS_DIR . $user->avatar);
            }
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
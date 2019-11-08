<?php

namespace App\Helpers;

class Validator
{
    private $result = [];

    public function emailExistValidate($fieldName, $email, $userId = 0)
    {
        if ($userId > 0 && \App\Model\User::find($userId)->email->email == $email) {
            return;
        }
        if ($findEmail = \App\Model\Email::where('email', $email)->first()){
            if (\App\Model\User::where('email_id', $findEmail->id)->count()) {
                $this->addError($fieldName, "Пользователь с таким адресом уже зарегистрирован");
            }
        }
    }

    public function passwordVerifyValidate($fieldName, $password, $email)
    {
        $user = \App\Model\User::where('email_id', \App\Model\Email::where('email', $email)->id)->first();
        if (!isset($user->password) || !password_verify($password, $user->password)) {
            $this->addError($fieldName, "Email или пароль введены неверно");
        }
    }

    public function minLengthValidate($fieldName, $str, $minLength)
    {
        if (strlen($str) != 0 && strlen($str) < $minLength) {
            $this->addError($fieldName, "Поле должно содержать не менее $minLength символов");
        }
    }

    public function maxLengthValidate($fieldName, $str, $maxLength)
    {
        if (strlen($str) > $maxLength) {
            $this->addError($fieldName, "Поле должно содержать не более $maxLength символов");
        }
    }

    public function requiredValidate($fieldName, $str)
    {
        if ($str == null || $str == '') {
            $this->addError($fieldName, "Поле не может быть пустым");
        }
    }

    public function pregValidate($fieldName, $str, $preg)
    {
        if (! preg_match($preg, $str)) {
            $this->addError($fieldName, "Неверный формат значения");
        }
    }

    public function requiredCheckValidate($fieldName, $str)
    {
        if ($str != "on") {
            $this->addError($fieldName, "Необходимо отметить флажок");
        }
    }

    public function confirmPasswordValidate($fieldName, $password, $confirmPassword)
    {
        if ($password != $confirmPassword) {
            $this->addError($fieldName, "Пароли должны совпадать");
        }
    }

    public function getResultValidate() 
    {
        return $this->result;
    }

    public function validateFile($fieldName, $file, $mimeTypes, $maxSize = 2 * 1024 * 1024)
    {
        
        if ($file['size'] > $maxSize) {
            $this->addError($fieldName, "Размер файла не должен превышать $maxSize байт");
        }
        
        if(! is_numeric(array_search($file['type'], $mimeTypes))) {
            $this->addError($fieldName, "Недопустимый формат файла");
        }
    }

    private function addError($fieldName, $message)
    {
        $this->result['errors'][$fieldName] = $message;
    }
}
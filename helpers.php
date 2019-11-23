<?php

function array_get($array, $key, $default = null)
{
    $keys = explode('.', $key);
    $result = $array;

    foreach ($keys as $key) {
        if (array_key_exists($key, $result)) {
            $result = $result[$key];
        } else {
            return $default;
        }
    }
    
    return $result ?? $default;
}

function getUser($email)
{
    return \App\Model\Email::where('email', $email)->first()->user;
}

function userHasRole($needleRoles)
{
    if (isset($_SESSION['email'])) {
        $roles = getUser($_SESSION['email'])->roles->toArray();
        $needleRoles = explode('|', $needleRoles);
        foreach ($roles as $role) {
            if (in_array($role['name'], $needleRoles)) {
                return true;
            }
        }
    }
    return false;
}

function saveFile($file, $dir) {
    if (!$file['error']) {
        $explodeName = explode('.', $file['name']);
        $fileName = uniqid() . "." . end($explodeName);
        if (move_uploaded_file($file['tmp_name'], $dir . $fileName)) {
            return $fileName;
        }
    }
    return false;
}

function emailExist($email) 
{
    return \App\Model\Email::where('email', $email)->first();
}

function is_subscriber()
{
    if (isset($_SESSION['email'])) {
        return \App\Model\Email::where('email', $_SESSION['email'])->first()->is_subscribe ? 1 : 0;
    }

    return 0;
}

function sendEmail($adress, $header, $description, $link, $unsubLink)
{
    $logFile = fopen(APP_DIR . "/configs/log.txt", "a");
    $message = "
============================
Сообщения для: $adress
Время отправки: " . date("d.m.y - h:i", time()) ."
============================
Заголовок письма:На сайте добавлена новая запись: $header
Содержимое письма:
Новая статья: $header,
$description
<a href='$link'>Чиать</a>
----------------------------
<a href='$unsubLink'>Отписаться от рассылки</a>
";
    fwrite($logFile, $message);
    fclose($logFile);
}
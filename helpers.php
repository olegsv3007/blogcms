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

function getArrFiles($filesIn)
{
    $files = [];
    for ($i = 0; $i < count($filesIn['name']); $i++) {
        $file['name'] = $filesIn['name'][$i];
        $file['tmp_name'] = $filesIn['tmp_name'][$i];
        $file['size'] = $filesIn['size'][$i];
        $file['type'] = $filesIn['type'][$i];
        $file['error'] = $filesIn['error'][$i];
        $files[] = $file;
    }
    return $files;
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
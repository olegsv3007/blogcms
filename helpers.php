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
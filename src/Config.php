<?php

namespace App;

class Config
{
    private static $instance;
    private $configs = [];

    public static function getInstance() : Config
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function get($config, $default = null)
    {
        return array_get($this->configs, $config, $default);
    }

    private function __construct()
    {
        $this->configs['db'] = require_once CONFIG_DIR . '/db.php';
    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }
}
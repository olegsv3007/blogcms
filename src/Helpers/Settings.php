<?php

namespace App\Helpers;

class Settings
{
    private static $instance;
    private $settings = [];
    private const FILE = APP_DIR . "/configs/settings.dat";

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __construct()
    {
        $this->settings = unserialize(file_get_contents(self::FILE));
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function setSettings($settings)
    {
        $this->settings = $settings;
        $file = fopen(self::FILE, 'w');
        fwrite($file, serialize($this->settings));
    }

    public function set($key, $value)
    {
        $this->settings[$key] = $value;
        $file = fopen(self::FILE, 'w');
        fwrite($file, serialize($this->settings));
    }

    public function get($key)
    {
        return $this->settings[$key];
    }
}
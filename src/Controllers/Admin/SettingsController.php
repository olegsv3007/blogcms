<?php

namespace App\Controllers\Admin;

class SettingsController
{
    public static function index()
    {
        $data = \App\Helpers\Settings::getInstance()->getSettings();
        return new \App\View("admin\settings\index", $data);
    }

    public static function saveSettings()
    {
        $settings = \App\Helpers\Settings::getInstance();
        $settings->set('articles_per_page', $_POST['articles_per_page']);

        return self::index();
    }
}
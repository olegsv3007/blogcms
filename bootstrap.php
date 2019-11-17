<?php

define('APP_DIR', $_SERVER['DOCUMENT_ROOT']);
define('VIEW_DIR', $_SERVER['DOCUMENT_ROOT'] . '/view');
define('CONFIG_DIR', $_SERVER['DOCUMENT_ROOT']. '/configs');
define('MODEL_DIR', $_SERVER['DOCUMENT_ROOT'] . '/src/Model/');
define('ARTICLE_IMAGE_DIR', '/images/articles/');
define('AVATARS_DIR', '/images/avatars/');
define('ARTICLE_PHOTOS', '/images/articles/');
define('TEMPLATES_DIR', APP_DIR . '/view/templates/');
define('PAGES_DIR', APP_DIR . '/view/static_pages/');


require_once 'helpers.php';
require_once __DIR__ . '/vendor/autoload.php';

/*spl_autoload_register(function ($class)
{
    $base_dir = APP_DIR . '/src/';
    $prefix = 'App\\';

    $prefix_length = strlen($prefix);

    if (strncmp($class, $prefix, $prefix_length) !== 0) {
        return;
    }

    $relative_class = substr($class, $prefix_length);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});*/
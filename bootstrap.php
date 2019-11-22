<?php

define('APP_DIR', $_SERVER['DOCUMENT_ROOT']);
define('VIEW_DIR', APP_DIR . '/view');
define('CONFIG_DIR', APP_DIR. '/configs');
define('MODEL_DIR', APP_DIR . '/src/Model/');
define('ARTICLE_IMAGE_DIR', '/images/articles/');
define('AVATARS_DIR', '/images/avatars/');
define('ARTICLE_PHOTOS', '/images/articles/');
define('TEMPLATES_DIR', APP_DIR . '/view/templates/');
define('PAGES_DIR', APP_DIR . '/view/static_pages/');


require_once APP_DIR . '/helpers.php';
require_once APP_DIR . '/vendor/autoload.php';
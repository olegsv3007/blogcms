<?php

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

$router = new \App\Router();

$router->get('/', function() {
    return new \App\View('index', ['title' => 'Index Page']);
});
$router->get('about', \App\Controller::class . '@about');

$router->get('registration', \App\Controllers\RegistrationController::class . "@index");
$router->get('authorization', \App\Controllers\AuthorizationController::class . "@index");
$router->get('profile', \App\Controllers\ProfileController::class . "@index");
$router->get('logout', \App\Controllers\ProfileController::class . "@logout");
$router->get('admin', \App\Controllers\Admin\ArticleController::class . "@index");

$router->get('admin/articles', \App\Controllers\Admin\ArticleController::class . "@index");
$router->get('admin/articles/add', \App\Controllers\Admin\ArticleController::class . "@add");
$router->get('admin/articles/edit', \App\Controllers\Admin\ArticleController::class . "@edit");


$router->get('admin/users', \App\Controllers\Admin\UserController::class . "@index");
$router->get('admin/users/add', \App\Controllers\Admin\UserController::class . "@add");
$router->get('admin/users/edit', \App\Controllers\Admin\UserController::class . "@edit");

$router->get('admin/statics', \App\Controllers\Admin\StaticController::class . "@index");
$router->get('admin/statics/add', \App\Controllers\Admin\StaticController::class . "@add");
$router->get('admin/statics/edit', \App\Controllers\Admin\StaticController::class . "@edit");

$router->get('admin/subscriptions', \App\Controllers\Admin\SubscriptionController::class . "@index");

$router->get('admin/comments', \App\Controllers\Admin\CommentController::class . "@index");



$router->get('admin/settings', \App\Controllers\Admin\SettingsController::class . "@index");



$router->get('delivery/', function() {
    return 'Delivery from callback';
});
$router->get('/test/*/*', function($param1, $param2) {
    return "Test Page with param1 = $param1, param2 = $param2" . PHP_EOL;
});

$router->get('/posts/*/', function($param1) {
    return "Название статьи: $param1";
});

$router->get('/bookcases/*/shelves/*/books/*', function($bookcase, $calve, $book) {
    return "Шкаф: " . $bookcase . ", полка: " . $calve . ", книга:" . $book;
});

$application = new \App\Application($router);

$application->run();
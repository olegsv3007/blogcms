<?php

error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();

require_once 'bootstrap.php';

$router = new \App\Router();

$router->get('/', \App\Controllers\HomeController::class . "@index");

$router->get('about', \App\Controller::class . '@about');

$router->get('registration', \App\Controllers\RegistrationController::class . "@index");
$router->post('registration', \App\Controllers\RegistrationController::class . "@registration");

$router->get('authorization', \App\Controllers\AuthorizationController::class . "@index");
$router->post('authorization', \App\Controllers\AuthorizationController::class . "@login");
$router->get('logout', \App\Controllers\AuthorizationController::class . "@logout");

$router->get('profile', \App\Controllers\ProfileController::class . "@index");
$router->post('update-profile', \App\Controllers\ProfileController::class . "@updateProfile");


$router->get('admin', \App\Controllers\Admin\ArticleController::class . "@index");

$router->get('admin/articles', \App\Controllers\Admin\ArticleController::class . "@index");
$router->get('admin/articles/add', \App\Controllers\Admin\ArticleController::class . "@add");
$router->get('admin/articles/edit', \App\Controllers\Admin\ArticleController::class . "@edit");
$router->post('admin/articles/addArticle', \App\Controllers\Admin\ArticleController::class . "@addArticle");
$router->post('admin/articles/updateArticle', \App\Controllers\Admin\ArticleController::class . "@updateArticle");
$router->post('admin/articles/remove', \App\Controllers\Admin\ArticleController::class . "@removeArticle");
$router->get('admin/articles/edit/*', function($articleId) {
    return call_user_func_array("\App\Controllers\Admin\ArticleController::edit", [\App\Model\Article::find($articleId)]);
});
$router->get('admin/articles/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\ArticleController::index", [$page]);
});
$router->post('admin/articles/', \App\Controllers\Admin\ArticleController::class . "@index");

$router->get('admin/users/', \App\Controllers\Admin\UserController::class . '@index');
$router->get('admin/users/add', \App\Controllers\Admin\UserController::class . "@add");
$router->post('admin/users/addUser', \App\Controllers\Admin\UserController::class . "@addUser");
$router->post('admin/users/saveUser', \App\Controllers\Admin\UserController::class . "@saveUser");
$router->post('admin/users/remove', \App\Controllers\Admin\UserController::class . "@removeUser");
$router->get('admin/users/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\UserController::index", [$page]);
});
$router->post('admin/users/', function($page) {
    return call_user_func_array("\App\Controllers\Admin\UserController::index", [$page]);
});
$router->get('admin/users/edit/*', function($userId) {
    return call_user_func_array("\App\Controllers\Admin\UserController::edit", [\App\Model\User::find($userId)]);
});

$router->get('admin/statics', \App\Controllers\Admin\StaticController::class . "@index");
$router->get('admin/statics/add', \App\Controllers\Admin\StaticController::class . "@add");
$router->get('admin/statics/edit', \App\Controllers\Admin\StaticController::class . "@edit");

$router->get('admin/subscriptions', \App\Controllers\Admin\SubscriptionController::class . "@index");
$router->get('admin/subscriptions/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\SubscriptionController::index", [$page]);
});
$router->post('admin/subscriptions/', function($page) {
    return call_user_func_array("\App\Controllers\Admin\SubscriptionController::index", [$page]);
});
$router->post('admin/subscribtions/change', \App\Controllers\Admin\SubscriptionController::class ."@change");


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
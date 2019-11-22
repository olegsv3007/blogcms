<?php

error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/bootstrap.php';

$router = new \App\Router();

$router->get('/', \App\Controllers\HomeController::class . "@index");

$router->post('news/addcomment', \App\Controllers\HomeController::class . "@addComment", "Пользователь|Администратор|Контент менеджер");
$router->get('news/*', function($articleId) {
    return call_user_func_array("\App\Controllers\HomeController::news", [$articleId]);
});

$router->post('subscribe', \App\Controllers\HomeController::class . "@subscribe");

$router->get('about', \App\Controller::class . '@about');

$router->get('registration', \App\Controllers\RegistrationController::class . "@index");
$router->post('registration', \App\Controllers\RegistrationController::class . "@registration");

$router->get('authorization', \App\Controllers\AuthorizationController::class . "@index");
$router->post('authorization', \App\Controllers\AuthorizationController::class . "@login");
$router->get('logout', \App\Controllers\AuthorizationController::class . "@logout", "Пользователь|Администратор|Контент менеджер");

$router->get('profile', \App\Controllers\ProfileController::class . "@index", "Пользователь|Администратор|Контент менеджер");
$router->post('update-profile', \App\Controllers\ProfileController::class . "@updateProfile", "Пользователь|Администратор|Контент менеджер");
$router->get("unsub/*", function($unsub_id){
    return call_user_func_array("\App\Controllers\HomeController::unsub", [$unsub_id]);
});


$router->get('admin', \App\Controllers\Admin\ArticleController::class . "@index", "Администратор|Контент менеджер");

$router->get('admin/articles/', \App\Controllers\Admin\ArticleController::class . "@index", "Администратор|Контент менеджер");
$router->get('admin/articles/add', \App\Controllers\Admin\ArticleController::class . "@add", "Администратор|Контент менеджер");
$router->get('admin/articles/edit', \App\Controllers\Admin\ArticleController::class . "@edit", "Администратор|Контент менеджер");
$router->post('admin/articles/addArticle', \App\Controllers\Admin\ArticleController::class . "@addArticle", "Администратор|Контент менеджер");
$router->post('admin/articles/updateArticle', \App\Controllers\Admin\ArticleController::class . "@updateArticle", "Администратор|Контент менеджер");
$router->post('admin/articles/remove', \App\Controllers\Admin\ArticleController::class . "@removeArticle", "Администратор|Контент менеджер");
$router->get('admin/articles/edit/*', function($articleId) {
    return call_user_func_array("\App\Controllers\Admin\ArticleController::edit", [\App\Model\Article::find($articleId)]);
}, "Администратор|Контент менеджер");
$router->get('admin/articles/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\ArticleController::index", [$page]);
}, "Администратор|Контент менеджер");
$router->post('admin/articles/', \App\Controllers\Admin\ArticleController::class . "@index", "Администратор|Контент менеджер");

$router->get('admin/users/', \App\Controllers\Admin\UserController::class . '@index', "Администратор");
$router->get('admin/users/add', \App\Controllers\Admin\UserController::class . "@add", "Администратор");
$router->post('admin/users/addUser', \App\Controllers\Admin\UserController::class . "@addUser", "Администратор");
$router->post('admin/users/saveUser', \App\Controllers\Admin\UserController::class . "@saveUser", "Администратор");
$router->post('admin/users/remove', \App\Controllers\Admin\UserController::class . "@removeUser", "Администратор");
$router->get('admin/users/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\UserController::index", [$page]);
}, "Администратор");
$router->post('admin/users/', function($page) {
    return call_user_func_array("\App\Controllers\Admin\UserController::index", [$page]);
}, "Администратор");
$router->get('admin/users/edit/*', function($userId) {
    return call_user_func_array("\App\Controllers\Admin\UserController::edit", [\App\Model\User::find($userId)]);
}, "Администратор");

$router->get('admin/pages/', \App\Controllers\Admin\StaticController::class . "@index", "Администратор|Контент менеджер");
$router->get('admin/pages/add', \App\Controllers\Admin\StaticController::class . "@add", "Администратор|Контент менеджер");
$router->get('admin/pages/edit', \App\Controllers\Admin\StaticController::class . "@edit", "Администратор|Контент менеджер");
$router->post('admin/pages/addPage', \App\Controllers\Admin\StaticController::class . "@addPage", "Администратор|Контент менеджер");
$router->get('admin/pages/edit/*', function($pageId) {
    return call_user_func_array("\App\Controllers\Admin\StaticController::edit", [\App\Model\Page::find($pageId)]);
}, "Администратор|Контент менеджер");
$router->post('admin/pages/updatePage', \App\Controllers\Admin\StaticController::class . "@updatePage", "Администратор|Контент менеджер");
$router->get('admin/pages/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\StaticController::index", [$page]);
}, "Администратор|Контент менеджер");
$router->post('admin/pages/', function($page) {
    return call_user_func_array("\App\Controllers\Admin\StaticController::index", [$page]);
}, "Администратор|Контент менеджер");
$router->post('admin/pages/remove', \App\Controllers\Admin\StaticController::class . "@removePage", "Администратор|Контент менеджер");

$router->get('admin/subscriptions/', \App\Controllers\Admin\SubscriptionController::class . "@index", "Администратор|Контент менеджер");
$router->get('admin/subscriptions/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\SubscriptionController::index", [$page]);
}, "Администратор|Контент менеджер");
$router->post('admin/subscriptions/', function($page) {
    return call_user_func_array("\App\Controllers\Admin\SubscriptionController::index", [$page]);
}, "Администратор|Контент менеджер");
$router->post('admin/subscribtions/change', \App\Controllers\Admin\SubscriptionController::class ."@change", "Администратор|Контент менеджер");


$router->get('admin/comments/', \App\Controllers\Admin\CommentController::class . "@index", "Администратор|Контент менеджер");
$router->get('admin/comments/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\CommentController::index", [$page]);
}, "Администратор|Контент менеджер");
$router->post('admin/comments/', \App\Controllers\Admin\CommentController::class . "@index", "Администратор|Контент менеджер");
$router->post('admin/comments/changeStatus', \App\Controllers\Admin\CommentController::class . "@changeStatus", "Администратор|Контент менеджер");
$router->post('admin/comments/delete', \App\Controllers\Admin\CommentController::class . "@delete", "Администратор|Контент менеджер");

$router->get('admin/settings', \App\Controllers\Admin\SettingsController::class . "@index", "Администратор");
$router->post('admin/settings/save', \App\Controllers\Admin\SettingsController::class . "@saveSettings", "Администратор");


$router->get('page/*', function($route) {
    if ($page = \App\Model\Page::where('url', $route)->first()) {
        if (file_exists(PAGES_DIR . $page->filename . ".php")) {
            return new \App\View("static_pages/" . $page->filename);
        }
    }
    return new \App\View("404");
});

$router->get('*', function($page) {
    return call_user_func_array("\App\Controllers\HomeController::index", [$page]);
});


$application = new \App\Application($router);

$application->run();
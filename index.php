<?php

error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
require_once 'bootstrap.php';

$router = new \App\Router();

$router->get('/', \App\Controllers\HomeController::class . "@index");

$router->post('news/addcomment', \App\Controllers\HomeController::class . "@addComment");
$router->get('news/*', function($articleId) {
    return call_user_func_array("\App\Controllers\HomeController::news", [$articleId]);
});

$router->post('subscribe', \App\Controllers\HomeController::class . "@subscribe");

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

$router->get('admin/pages', \App\Controllers\Admin\StaticController::class . "@index");
$router->get('admin/pages/add', \App\Controllers\Admin\StaticController::class . "@add");
$router->get('admin/pages/edit', \App\Controllers\Admin\StaticController::class . "@edit");
$router->post('admin/pages/addPage', \App\Controllers\Admin\StaticController::class . "@addPage");
$router->get('admin/pages/edit/*', function($pageId) {
    return call_user_func_array("\App\Controllers\Admin\StaticController::edit", [\App\Model\Page::find($pageId)]);
});
$router->post('admin/pages/updatePage', \App\Controllers\Admin\StaticController::class . "@updatePage");
$router->get('admin/pages/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\StaticController::index", [$page]);
});
$router->post('admin/pages/', function($page) {
    return call_user_func_array("\App\Controllers\Admin\StaticController::index", [$page]);
});
$router->post('admin/pages/remove', \App\Controllers\Admin\StaticController::class . "@removePage");

$router->get('admin/subscriptions', \App\Controllers\Admin\SubscriptionController::class . "@index");
$router->get('admin/subscriptions/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\SubscriptionController::index", [$page]);
});
$router->post('admin/subscriptions/', function($page) {
    return call_user_func_array("\App\Controllers\Admin\SubscriptionController::index", [$page]);
});
$router->post('admin/subscribtions/change', \App\Controllers\Admin\SubscriptionController::class ."@change");


$router->get('admin/comments', \App\Controllers\Admin\CommentController::class . "@index");
$router->get('admin/comments/*', function($page) {
    return call_user_func_array("\App\Controllers\Admin\CommentController::index", [$page]);
});
$router->post('admin/comments/', \App\Controllers\Admin\CommentController::class . "@index");
$router->post('admin/comments/changeStatus', \App\Controllers\Admin\CommentController::class . "@changeStatus");
$router->post('admin/comments/delete', \App\Controllers\Admin\CommentController::class . "@delete");

$router->get('admin/settings', \App\Controllers\Admin\SettingsController::class . "@index");

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
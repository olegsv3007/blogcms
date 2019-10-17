<?php
require_once VIEW_DIR . '/layout/base/header.php';
?>
<header>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">MyBlog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['email'])):?>
            <li class="nav-item">
                <a class="nav-link text-light" href="/profile">Профиль</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/logout">Выход</a>
            </li>
        <?php else:?>
            <li class="nav-item">
                <a class="nav-link text-light" href="/registration">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/authorization">Вход</a>
            </li>
        <?endif;?>
        </ul>
    </div>
    </nav>
</div>
</header>
<main>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-2 h-100 bg-light p-0 sidebar">
                <div class="list-group ml-2 mt-2">
                    <a href="/admin/users/" class="list-group-item list-group-item-action active">Пользователи</a>
                    <a href="/admin/articles" class="list-group-item list-group-item-action">Статьи</a>
                    <a href="/admin/subscriptions" class="list-group-item list-group-item-action">Подписки</a>
                    <a href="/admin/comments" class="list-group-item list-group-item-action">Комментарии</a>
                    <a href="/admin/statics" class="list-group-item list-group-item-action">Статичные страницы</a>
                    <a href="/admin/settings" class="list-group-item list-group-item-action">Настройки</a>
                </div>
            </div>
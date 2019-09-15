<?php
require_once APP_DIR . '/include/base/header.php';
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
            <li class="nav-item">
                <a class="nav-link text-light" href="/registration.php">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/authorization.php">Вход</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/profile.php">Профиль</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/logout.php">Выход</a>
            </li>
        </ul>
    </div>
    </nav>
    <nav class="nav justify-content-center align-items-center">
        <a class="nav-link text-dark font-weight-bold" href="/">Главная</a>
        <a class="nav-link text-dark" href="/static_page_1.php">Статичная страница 1</a>
        <a class="nav-link text-dark" href="/static_page_2.php">Статичная страница 2</a>
        <a class="nav-link text-dark" href="/aboutus.php">О нас</a>
    </nav>
    <hr class="m-0 p-0">
</div>
</header>
<main>
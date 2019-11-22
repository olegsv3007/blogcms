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
        <?php if (isset($_SESSION['email'])): ?>
            <li class="nav-item">
                <a class="nav-link text-light" href="/profile">Профиль</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/logout">Выход</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link text-light" href="/registration">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/authorization">Вход</a>
            </li>
        <?php endif; ?>
        </ul>
    </div>
    </nav>
    <nav class="nav justify-content-center align-items-center">
        <a class="nav-link text-dark font-weight-bold" href="/">Главная</a>
        <?php foreach (\App\Model\Page::all() as $page): ?>
        <a class="nav-link text-dark" href="/page/<?= $page->url ?>"><?= $page->name ?></a>
        <?php endforeach; ?>
    </nav>
    <hr class="m-0 p-0">
</div>
</header>
<main>
<div class="container-fluid">
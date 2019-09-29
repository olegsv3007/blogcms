<?php

require_once 'layout/header.php';
?>

<div class="form-container d-flex flex-column justify-content-center align-content-center align-items-center">
    <form action="" method="post" class="bg-light p-5 d-flex flex-column">
        <h1 class="text-center mb-5">Регистрация</h2>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control is-valid" placeholder="Email">
            <!--<div class="valid-feedback">Looks good!</div>-->
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" class="form-control is-invalid" placeholder="Пароль">
            <!--<div class="invalid-feedback">Please choose a username.</div>-->
        </div>
        <div class="form-group">
            <label for="confirm-password">Подтверждение пароля:</label>
            <input type="password" name="confirm-password" id="confirm-password" class="form-control is-invalid" placeholder="Подтверждение пароля">
            <!--<div class="invalid-feedback">Please choose a username.</div>-->
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="agree-checkbox">
            <label class="form-check-label" for="agree-checkbox">Согласен с правилами сайта</label>
        </div>
        <button type="submit" class="btn btn-lg btn-primary mt-2 mx-5">Зарегистрироваться</button>
        <span class="text-center mt-3"><a href="/authorization.php">Войти</a></span>
    </form>
</div>
<?php
require_once 'layout/footer.php';
?>
<?php
require_once 'layout/header.php';
?>
<div class="form-container d-flex flex-column justify-content-center align-content-center align-items-center">
    <form action="/registration" method="post" class="bg-light p-5 d-flex flex-column">
        <h1 class="text-center mb-5">Регистрация</h2>
        <div class="form-group">
            <label for="name">ФИО:</label>
            <input type="text" name="name" id="name" class="form-control is-valid" placeholder="Name" required>
            <!--<div class="valid-feedback">Looks good!</div>-->
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control is-valid" placeholder="Email" required>
            <!--<div class="valid-feedback">Looks good!</div>-->
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" class="form-control is-invalid" placeholder="Пароль" required>
            <!--<div class="invalid-feedback">Please choose a username.</div>-->
        </div>
        <div class="form-group">
            <label for="confirm-password">Подтверждение пароля:</label>
            <input type="password" name="confirm-password" id="confirm-password" class="form-control is-invalid" placeholder="Подтверждение пароля" required>
            <!--<div class="invalid-feedback">Please choose a username.</div>-->
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input is-invalid" id="agree-checkbox" required>
            <label class="form-check-label" for="agree-checkbox">Согласен с правилами сайта</label>
            <!--<div class="invalid-feedback">Please choose a username.</div>-->
        </div>
        <button type="submit" class="btn btn-lg btn-primary mt-2 mx-5" name="send">Зарегистрироваться</button>
        <span class="text-center mt-3"><a href="/authorization">Войти</a></span>
    </form>
</div>
<?php
require_once 'layout/footer.php';
?>
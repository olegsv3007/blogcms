<?php
require_once 'layout/header.php';
?>

<div class="form-container d-flex flex-column justify-content-center align-content-center align-items-center">
    <form action="/registration" method="post" class="bg-light p-5 d-flex flex-column">
        <h1 class="text-center mb-5">Регистрация</h2>
        <div class="form-group">
            <label for="name">ФИО:</label>
            <input type="text" name="name" id="name" class="form-control <?=isset($this->data['user']) ? (isset($this->data['validation_info']['errors']['name']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Name" value="<?=$this->data['user']['name'] ?? ''?>">
            <? if (isset($this->data['validation_info']['errors']['name'])):?>
            <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['name']?></div>
            <?endif;?>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control <?=isset($this->data['user']) ? (isset($this->data['validation_info']['errors']['email']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Email" value="<?=$this->data['user']['email'] ?? ''?>">
            <? if (isset($this->data['validation_info']['errors']['email'])):?>
            <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['email']?></div>
            <?endif;?>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" class="form-control <?=isset($this->data['user']) ? (isset($this->data['validation_info']['errors']['password']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Пароль">
            <? if (isset($this->data['validation_info']['errors']['password'])):?>
            <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['password']?></div>
            <?endif;?>
        </div>
        <div class="form-group">
            <label for="confirm-password">Подтверждение пароля:</label>
            <input type="password" name="confirm-password" id="confirm-password" class="form-control <?=isset($this->data['user']) ? (isset($this->data['validation_info']['errors']['confirm-password']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Подтверждение пароля">
            <? if (isset($this->data['validation_info']['errors']['confirm-password'])):?>
            <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['confirm-password']?></div>
            <?endif;?>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input <?=isset($this->data['user']) ? (isset($this->data['validation_info']['errors']['agree']) ? 'is-invalid' : 'is-valid') : '' ?>" id="agree" name="agree">
            <label class="form-check-label" for="agree">Согласен с правилами сайта</label>
            <? if (isset($this->data['validation_info']['errors']['agree'])):?>
            <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['agree']?></div>
            <?endif;?>
        </div>
        <button type="submit" class="btn btn-lg btn-primary mt-2 mx-5" name="send">Зарегистрироваться</button>
        <span class="text-center mt-3"><a href="/authorization">Войти</a></span>
    </form>
</div>

<?php
require_once 'layout/footer.php';
?>
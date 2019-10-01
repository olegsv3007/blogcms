<?php
require_once 'layout/header.php';
?>

<div class="form-container d-flex flex-column justify-content-center align-content-center align-items-center">
    <form action="" method="post" class="bg-light p-5 d-flex flex-column">
        <h2 class="text-center mb-5">Вход</h2>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control <?=isset($this->data['user']) ? (isset($this->data['validation-info']['errors']['email']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Email" value="<?=$this->data['user']['email'] ?? ''?>">
            <? if (isset($this->data['validation-info']['errors']['email'])):?>
            <div class="invalid-feedback"><?=$this->data['validation-info']['errors']['email']?></div>
            <?endif;?>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control <?=isset($this->data['user']) ? (isset($this->data['validation-info']['errors']['password']) ? 'is-invalid' : 'is-valid') : '' ?>" placeholder="Password">
            <? if (isset($this->data['validation-info']['errors']['password'])):?>
            <div class="invalid-feedback"><?=$this->data['validation-info']['errors']['password']?></div>
            <?endif;?>
        </div>
        <button type="submit" class="btn btn-lg btn-primary mt-2 mx-5 px-5">Войти</button>
        <span class="text-center mt-3"><a href="/registration">Зарегистрироваться</a></span>
    </form>
</div>
<?php
require_once 'layout/footer.php';
?>
<?php
require_once 'layout/header.php';
?>
<div class="container">
<h1 class="display-4 text-center my-4">Редактирование профиля</h1>
    <form class="bg-light my-5 p-5" method="post" action="update-profile" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=\App\Model\User::where('email', $_SESSION['email'])->first()->id;?>">
        <div class="d-flex flex-row justify-content-around">
            <div class="d-flex flex-column align-items-center mt-5">
                <?php if (isset($this->data['profile']->avatar)):?>
                <img src="<?=AVATARS_DIR . $this->data['profile']->avatar?>" alt="" width="200">
                <?php endif;?>
                <div class="form-group mt-5">
                    <label for="user-photo">Фото:</label>
                    <input type="file" class="form-control-file <?=isset($this->data['validation_info']['errors']['avatar']) ? 'is-invalid' : 'is-valid' ?>" id="avatar" name="avatar">
                    <? if (isset($this->data['validation_info']['errors']['avatar'])):?>
                        <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['avatar']?></div>
                    <?endif;?>
                </div>
            </div>
            <div class="d-flex flex-column col-6">
                <input type="hidden" name="user_id" value="<?=$this->data['profile']->id?>">
                <div class="form-group mt-5">
                    <label for="name">Имя:</label>
                    <input type="text" class="form-control <?=isset($this->data['validation_info']['errors']['name']) ? 'is-invalid' : 'is-valid' ?>" name="name" id="name" value="<?=$this->data['profile']->name ?? ''?>">
                    <? if (isset($this->data['validation_info']['errors']['name'])):?>
                        <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['name']?></div>
                    <?endif;?>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control <?=isset($this->data['validation_info']['errors']['email']) ? 'is-invalid' : 'is-valid' ?>" name="email" id="email" value="<?=$this->data['profile']->email ?? ''?>">
                    <? if (isset($this->data['validation_info']['errors']['email'])):?>
                        <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['email']?></div>
                    <?endif;?>
                </div>
                <div class="form-group my-5">
                    <label for="about-self">О себе:</label>
                    <textarea name="about-self" id="about-self" rows="5" class="form-control"><?=$this->data['profile']->about_self ?? ''?></textarea>
                </div>
                <div class="form-check my-5">
                    <input class="form-check-input" type="checkbox" id="subscribe" name="subscribe" <?=$this->data['profile']->is_subscribe ? 'checked' : ''?>>
                    <label class="form-check-label" for="subscribe">
                        Подписаться на уведомления
                    </label>
                </div>
                <button type="submit" class="btn btn-primary my-5">Сохранить изменения</button>
            </div>
        </div>
    </form>
</div>
<?php
require_once 'layout/footer.php';
?>
<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<div class="container">
<h1 class="display-4 text-center my-4">Редактирование профиля</h1>
    <form method="post" action="/admin/users/saveUser" class="bg-light my-5 p-5" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$this->data['user']['id']?>">
        <div class="d-flex flex-row justify-content-around">
            <div class="d-flex flex-column align-items-center mt-5">
                <?php if (isset($this->data['user']['avatar'])):?>
                <img src="<?=AVATARS_DIR . $this->data['user']['avatar']?>" alt="" width="200">
                <?php endif;?>
                <div class="form-group">
                <label for="user-photo">Фото:</label>
                <input type="file" class="form-control-file <?=isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['avatar']) ? 'is-invalid' : 'is-valid') : ''?>" id="avatar" name="avatar">
                <? if (isset($this->data['validation_info']['errors']['name'])):?>
                    <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['avatar']?></div>
                <?endif;?>
            </div>
            </div>
            <div class="d-flex flex-column col-6">
            <div class="form-group mt-5">
                    <label for="name">Имя:</label>
                    <input type="text" class="form-control <?=isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['name']) ? 'is-invalid' : 'is-valid') : ''?>" name="name" id="" value="<?=$this->data['user']['name'] ?? ''?>">
                    <? if (isset($this->data['validation_info']['errors']['name'])):?>
                    <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['name']?></div>
                    <?endif;?>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control <?=isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['email']) ? 'is-invalid' : 'is-valid') : ''?>" name="email" id=""  value="<?=$this->data['user']['email'] ?? ''?>">
                    <? if (isset($this->data['validation_info']['errors']['email'])):?>
                    <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['email']?></div>
                    <?endif;?>
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control <?=isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['password']) ? 'is-invalid' : 'is-valid') : ''?>" name="password" id="">
                    <? if (isset($this->data['validation_info']['errors']['password'])):?>
                    <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['password']?></div>
                    <?endif;?>
                </div>
                <div class="form-group my-5">
                    <label for="about-self">О себе:</label>
                    <textarea name="about-self" id="about-me" rows="5" class="form-control"><?=$this->data['user']['about-self']?></textarea>
                </div>
                <div class="form-group">
                    <label for="role">Роль:</label>
                    <select name="roles[]" id="inputState" class="form-control" multiple>
                    <?php foreach ($this->data['roles'] as $role) :?>
                        <option <?=in_array($role->id, $this->data['user']['roles'] ?? [1]) ? 'selected' : ''?> value="<?=$role->id?>"><?=$role->name?></option>
                    <? endforeach;?>
                    </select>
                </div>
                <div class="form-check my-5">
                    <input class="form-check-input" type="checkbox" id="subscribe" name="subscribe" <?=$this->data['user']['subscribe'] ? 'checked' : ''?>>
                    <label class="form-check-label" for="subscribe">
                        Подписаться на уведомления
                    </label>
                </div>
                <button type="submit" class="btn btn-primary my-5">Сохранить изменения</button>
            </div>
        </div>
    </form>
</div>
</div>
<?php
require_once VIEW_DIR . '/layout/admin_footer.php';
?>
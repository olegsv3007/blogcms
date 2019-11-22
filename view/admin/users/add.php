<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<div class="container">
<h1 class="display-4 text-center my-4">Добавление пользователя</h1>
    <form action="/admin/users/addUser" class="bg-light my-5 p-5" method="post" enctype="multipart/form-data">
        <div class="d-flex flex-row justify-content-around">
            <div class="form-group">
                <label for="avatar">Фото:</label>
                <input type="file" class="form-control-file <?= isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['avatar']) ? 'is-invalid' : 'is-valid') : '' ?>" id="avatar" name="avatar">
                <?php if (isset($this->data['validation_info']['errors']['name'])): ?>
                    <div class="invalid-feedback"><?= $this->data['validation_info']['errors']['avatar'] ?></div>
                <?php endif; ?>
            </div>
            
            <div class="d-flex flex-column col-6">
                <div class="form-group mt-5">
                    <label for="name">Имя:</label>
                    <input type="text" class="form-control <?= isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['name']) ? 'is-invalid' : 'is-valid') : '' ?>" name="name" id="" value="<?= $this->data['user']['name'] ?? '' ?>">
                    <?php if (isset($this->data['validation_info']['errors']['name'])): ?>
                    <div class="invalid-feedback"><?= $this->data['validation_info']['errors']['name'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control <?= isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['email']) ? 'is-invalid' : 'is-valid') : '' ?>" name="email" id=""  value="<?= $this->data['user']['email'] ?? '' ?>">
                    <?php if (isset($this->data['validation_info']['errors']['email'])): ?>
                    <div class="invalid-feedback"><?= $this->data['validation_info']['errors']['email'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control <?= isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['password']) ? 'is-invalid' : 'is-valid') : '' ?>" name="password" id="">
                    <?php if (isset($this->data['validation_info']['errors']['password'])): ?>
                    <div class="invalid-feedback"><?= $this->data['validation_info']['errors']['password'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group my-5">
                    <label for="about-self">О себе:</label>
                    <textarea name="about-self" id="about-me" rows="5" class="form-control"><?= $this->data['user']['about-self'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="role">Роль:</label>
                    <select name="roles[]" id="inputState" class="form-control" multiple>
                    <?php foreach ($this->data['roles'] as $role): ?>
                        <option <?= in_array($role->id, $this->data['user']['roles'] ?? [1]) ? 'selected' : '' ?> value="<?= $role->id ?>"><?= $role->name ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-check my-5">
                    <input class="form-check-input" type="checkbox" id="subscribe" name="subscribe" <?= $this->data['user']['subscribe'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="subscribe">
                        Подписаться на уведомления
                    </label>
                </div>
                <button type="submit" class="btn btn-primary my-5">Добавить пользователя</button>
            </div>
        </div>
    </form>
</div>
</div>
<?php
require_once VIEW_DIR . '/layout/admin_footer.php';
?>
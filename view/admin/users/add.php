<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<div class="container">
<h1 class="display-4 text-center my-4">Добавление пользователя</h1>
    <form class="bg-light my-5 p-5">
        <div class="d-flex flex-row justify-content-around">
            <div class="form-group">
                <label for="user-photo">Фото:</label>
                <input type="file" class="form-control-file" id="user-photo">
            </div>
            
            <div class="d-flex flex-column col-6">
                <div class="form-group mt-5">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="" id="">
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" name="" id="">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Подтверждение пароля:</label>
                    <input type="confirm-password" class="form-control" name="" id="">
                </div>
                <div class="form-group my-5">
                    <label for="about-self">О себе:</label>
                    <textarea name="about-self" id="about-me" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <select id="inputState" class="form-control">
                        <option selected>Роль</option>
                        <option>Администратор</option>
                        <option>Модератор</option>
                        <option>Пользователь</option>
                    </select>
                </div>
                <div class="form-check my-5">
                    <input class="form-check-input" type="checkbox" id="subscribe" name="subscribe">
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
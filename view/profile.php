<?php
require_once 'layout/header.php';
?>
<div class="container">
<h1 class="display-4 text-center my-4">Редактирование профиля</h1>
    <form class="bg-light my-5 p-5" method="post" action="update-profile">
        <div class="d-flex flex-row justify-content-around">
            <div class="form-group">
                <label for="user-photo">Фото:</label>
                <input type="file" class="form-control-file" id="user-photo">
            </div>
            
            <div class="d-flex flex-column col-6">
                <div class="form-group mt-5">
                    <label for="email">Имя:</label>
                    <input type="email" class="form-control" name="" id="" value="<?=$this->data->name ?? ''?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="" id="" value="<?=$this->data->email ?? ''?>">
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
                    <textarea name="about-self" id="about-me" rows="5" value="<?=$this->data->about_self ?? ''?>" class="form-control"></textarea>
                </div>
                <div class="form-check my-5">
                    <input class="form-check-input" type="checkbox" id="subscribe" name="subscribe">
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
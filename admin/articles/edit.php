<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
require_once APP_DIR . '/include/admin_header.php';
?>
<div class="col-9 mx-auto">
<div class="container">
<h1 class="display-4 text-center my-4">Редактирование статьи</h1>
    <form class="bg-light my-5 p-5">
        <div class="d-flex flex-row justify-content-around"> 
            <div class="d-flex flex-column col-12">
                <div class="form-group">
                    <label for="user-photo">Изображение для анонса</label>
                    <input type="file" class="form-control-file" id="user-photo">
                </div>
                <div class="form-group">
                    <label for="user-photo">Фотографии</label>
                    <input type="file" class="form-control-file" id="user-photo">
                </div>
                <div class="form-group mt-5">
                    <label for="header">Заголовок:</label>
                    <input type="text" class="form-control" name="header" id="">
                </div>
                <div class="form-group my-5">
                    <label for="about-self">Текст</label>
                    <textarea name="about-self" id="about-me" rows="5" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary my-5">Сохранить изменения</button>
            </div>
        </div>
    </form>
</div>
</div>
<?php
require_once APP_DIR . '/include/admin_footer.php';
?>
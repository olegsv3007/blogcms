<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<div class="container">
<h1 class="display-4 text-center my-4">Добавление статьи</h1>
    <form class="bg-light my-5 p-5" action="/admin/articles/addArticle" method="post" enctype="multipart/form-data">
        <div class="d-flex flex-row justify-content-around"> 
            <div class="d-flex flex-column col-12">
                <div class="form-group">
                    <label for="image">Изображение для анонса</label>
                    <input type="file" class="form-control-file <?= isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['image']) ? "is-invalid" : "is-valid") : "" ?>" name="image" id="image">
                    <?php if (isset($this->data['validation_info']['errors']['image'])): ?>
                    <div class="invalid-feedback"><?= $this->data['validation_info']['errors']['image'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group mt-5">
                    <label for="header">Заголовок:</label>
                    <input type="text" class="form-control <?= isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['header']) ? "is-invalid" : "is-valid") : "" ?>" name="header" id="header">
                    <?php if (isset($this->data['validation_info']['errors']['header'])): ?>
                    <div class="invalid-feedback"><?= $this->data['validation_info']['errors']['header'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group my-5">
                    <label for="content">Текст</label>
                    <textarea name="content" id="content" rows="5" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary my-5">Добавить статью</button>
            </div>
        </div>
    </form>
</div>
</div>
<?php
require_once VIEW_DIR . '/layout/admin_footer.php';
?>
<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<div class="container">
<h1 class="display-4 text-center my-4">Редактирование страницы</h1>
    <form class="bg-light my-5 p-5" action="/admin/pages/updatePage" method="post">
        <input type="hidden" name="id" value="<?=$this->data['page']['id']?>">
        <div class="d-flex flex-row justify-content-around"> 
            <div class="d-flex flex-column col-12">
                <div class="form-group mt-5">
                    <label for="filename">Имя файла:</label>
                    <input type="text" class="form-control <?=isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['filename']) ? "is-invalid" : "is-valid") : "" ?>" name="filename" id="filename" value="<?=$this->data['page']['filename'] ?? ''?>">
                    <? if (isset($this->data['validation_info']['errors']['filename'])):?>
                    <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['filename']?></div>
                    <?endif;?>
                </div>
                <div class="form-group mt-5">
                    <label for="url">Имя в маршруте:</label>
                    <input type="text" class="form-control <?=isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['url']) ? "is-invalid" : "is-valid") : "" ?>" name="url" id="url" value="<?=$this->data['page']['url'] ?? ''?>">
                    <? if (isset($this->data['validation_info']['errors']['url'])):?>
                    <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['url']?></div>
                    <?endif;?>
                </div>
                <div class="form-group mt-5">
                    <label for="name">Название страницы:</label>
                    <input type="text" class="form-control <?=isset($this->data['validation_info']) ? (isset($this->data['validation_info']['errors']['name']) ? "is-invalid" : "is-valid") : "" ?>" name="name" id="name" value="<?=$this->data['page']['name'] ?? ''?>">
                    <? if (isset($this->data['validation_info']['errors']['name'])):?>
                    <div class="invalid-feedback"><?=$this->data['validation_info']['errors']['name']?></div>
                    <?endif;?>
                </div>
                <div class="form-group my-5">
                    <label for="content">Код страницы</label>
                    <textarea name="content" id="content" rows="5" class="form-control"><?=$this->data['page']['html'] ?? "<?php require_once VIEW_DIR . '/layout/header.php';?>
<?php require_once VIEW_DIR . '/layout/footer.php';?>"?>
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary my-5">Обновить страницу</button>
            </div>
        </div>
    </form>
</div>
</div>
<?php
require_once VIEW_DIR . '/layout/admin_footer.php';a
?>
<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<div class="container">
<h1 class="display-4 text-center my-4">Настройки</h1>
    <form class="bg-light my-5 p-5" method="post" action="/admin/settings/save">
        <div class="d-flex flex-row justify-content-around"> 
            <div class="d-flex flex-column col-12">
                <div class="form-group mt-5">
                    <label for="articles_per_page">Количество статей на главной странице:</label>
                    <input type="number" class="form-control" name="articles_per_page" id="" value="<?=$this->data['articles_per_page'] ?? 10?>">
                </div>
                <div class="form-group mt-5">
                    <label for="articles_per_page">Количество символов в описании к новости:</label>
                    <input type="number" class="form-control" name="short_text" id="" value="<?=$this->data['short_text'] ?? 200?>">
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
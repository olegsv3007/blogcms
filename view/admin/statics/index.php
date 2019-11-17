<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<h2>Управление статичными страницами</h2>
    <a href="/admin/pages/add" class="btn btn-primary my-3 float-left">Добавить страницу</a>
    <form id="qty_items_per_page_form" action="/admin/pages/" method="post">
        <select id="qty_items" name="qty_items" class="form-control float-right w-25 my-3">
            <option <?=$this->data['paginator']->itemsPerPage == 20 ? 'selected' : ''?>>20</option>
            <option <?=$this->data['paginator']->itemsPerPage == 50 ? 'selected' : ''?>>50</option>
            <option <?=$this->data['paginator']->itemsPerPage == 100 ? 'selected' : ''?>>100</option>
        </select>
        <label for="qty-items" class="d-block float-right my-4 mx-2">Элементов на странице:</label>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя страницы</th>
                <th scope="col">Имя в маршруте</th>
                <th scope="col">Имя файла</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->data['pages'] as $page) {
                require TEMPLATES_DIR . "page_row.php";
            }?>
        </tbody>
    </table>
    <?php $this->data['paginator']->render()?>
</div>
<?php
require_once VIEW_DIR . '/layout/admin_footer.php';
?>
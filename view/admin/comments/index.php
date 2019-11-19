<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<h2>Управление комментариями</h2>
    <form id="qty_items_per_page_form" action="/admin/comments" method="post">
        <label for="view_state" class="d-block float-left my-4 mx-2">Отображать:</label>
        <select id="view_state" name="view_state" class="form-control float-left w-25 my-3">
            <option <?=$this->data['view_state'] == "%" ? 'selected' : ''?> value="%">Все</option>
            <option <?=$this->data['view_state'] == "1" ? 'selected' : ''?> value="1">Пршедшие модерацию</option>
            <option <?=$this->data['view_state'] == "0" ? 'selected' : ''?> value="0">Ожидают модерации</option>
        </select>
        
        <select id="qty_items" name="qty_items" class="form-control float-right w-25 my-3">
            <option <?=$this->data['paginator']->itemsPerPage == 10 ? 'selected' : ''?>>1</option>
            <option <?=$this->data['paginator']->itemsPerPage == 20 ? 'selected' : ''?>>20</option>
            <option <?=$this->data['paginator']->itemsPerPage == 50 ? 'selected' : ''?>>50</option>
            <option <?=$this->data['paginator']->itemsPerPage == 200 ? 'selected' : ''?>>200</option>
            <option <?=$_SESSION['qty_items'] == "Все" ? 'selected' : ''?>>Все</option>
        </select>
        <label for="qty_items" class="d-block float-right my-4 mx-2">Элементов на странице:</label>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Автор</th>
                <th scope="col">Комментарий</th>
                <th scope="col">Прошел модерацию</th>
                <th scope="col">Опубликовать</th>
                <th scope="col">Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->data['comments'] as $comment) {
                require TEMPLATES_DIR . "comment_row.php";
            }
            ?>
        </tbody>
    </table>
    <?php $this->data['paginator']->render()?>
</div>
<?php
require_once VIEW_DIR . '/layout/admin_footer.php';
?>
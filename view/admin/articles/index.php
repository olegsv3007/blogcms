<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<h2>Управление статьями</h2>
    <a href="/admin/articles/add" class="btn btn-primary my-3 float-left">Добавить статью</a>
    <form id="qty_items_per_page_form" action="/admin/articles/" method="post">
        <select id="qty_items" name="qty_items" class="form-control float-right w-25 my-3">
            <option <?= $this->data['paginator']->itemsPerPage == 10 ? 'selected' : '' ?>>10</option>
            <option <?= $this->data['paginator']->itemsPerPage == 20 ? 'selected' : '' ?>>20</option>
            <option <?= $this->data['paginator']->itemsPerPage == 50 ? 'selected' : '' ?>>50</option>
            <option <?= $this->data['paginator']->itemsPerPage == 200 ? 'selected' : '' ?>>200</option>
            <option <?= $_SESSION['qty_items'] == "Все" ? 'selected' : '' ?>>Все</option>
        </select>
        <label for="qty-items" class="d-block float-right my-4 mx-2">Элементов на странице:</label>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Дата публикации</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->data['articles'] as $article) {
                require TEMPLATES_DIR . 'article_row.php';
            } ?>
        </tbody>
    </table>
    <?php 
    $this->data['paginator']->render();
    ?>
</div>
<?php
require_once VIEW_DIR . '/layout/admin_footer.php';
?>
<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<h2>Управление статьями</h2>
    <a href="/admin/articles/add" class="btn btn-primary my-3 float-left">Добавить статью</a>
    <select id="inputState" class="form-control float-right w-25 my-3">
        <option selected>Элементов на странице</option>
        <option>20</option>
        <option>50</option>
        <option>100</option>
    </select>
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
            <?foreach ($this->data['articles'] as $article) {
                require TEMPLATES_DIR . 'article_row.php';
            }?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center m-5">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
<?php
require_once VIEW_DIR . '/layout/admin_footer.php';
?>
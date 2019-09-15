<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
require_once APP_DIR . '/include/admin_header.php';
?>
<div class="col-9 mx-auto">
<h2>Управление комментариями</h2>
    <select id="inputState" class="form-control float-left w-25 my-3">
        <option selected>Отображать только</option>
        <option>Все</option>
        <option>Опубликованные</option>
        <option>Новые</option>
    </select>
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
                <th scope="col">Автор</th>
                <th scope="col">Комментарий</th>
                <th scope="col">Прошел модерацию</th>
                <th scope="col">Опубликовать</th>
                <th scope="col">Удалить</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Да</td>
                <td><a href="" class="btn btn-sm btn-success">Опубликовать</a></td>      
                <td><a href="" class="btn btn-sm btn-danger">Удалить</a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>Да</td>
                <td><a href="" class="btn btn-sm btn-success">Опубликовать</a></td>      
                <td><a href="" class="btn btn-sm btn-danger">Удалить</a></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Нет</td>
                <td><a href="" class="btn btn-sm btn-success">Опубликовать</a></td>      
                <td><a href="" class="btn btn-sm btn-danger">Удалить</a></td>
            </tr>
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
require_once APP_DIR . '/include/admin_footer.php';
?>
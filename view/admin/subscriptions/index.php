<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
<h2>Управление подписками</h2>
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
                <th scope="col">Email</th>
                <th scope="col">Фио</th>
                <th scope="col">Подписка оформлена</th>
                <th scope="col">Изменить</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Да</td>      
                <td><a href="" class="btn btn-sm btn-danger">Изменить</a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>Нет</td>      
                <td><a href="" class="btn btn-sm btn-danger">Изменить</a></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Да</td>      
                <td><a href="" class="btn btn-sm btn-danger">Изменить</a></td>
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
require_once VIEW_DIR . '/layout/admin_footer.php';
?>
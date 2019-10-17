<?php
require_once VIEW_DIR . '/layout/admin_header.php';
?>
<div class="col-9 mx-auto">
    <h2>Управление пользователями</h2>
    <a href="/admin/users/add" class="btn btn-primary my-3 float-left">Добавить пользователя</a>
    <select id="qty-items-select" name="qty-items" class="form-control float-right w-25 my-3">
        <option>20</option>
        <option>50</option>
        <option>100</option>
    </select>
    <label for="qty-items" class="d-block float-right my-4 mx-2">Элементов на странице:</label>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">ФИО</th>
                <th scope="col">Дата регистрации</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach ($this->data['users'] as $user) {
               require TEMPLATES_DIR . 'user_row.php';
           }?>
        </tbody>
    </table>
    <?php 
    $this->data['paginator']->render();
    ?>
</div>
<?php
require_once VIEW_DIR . '/layout/admin_footer.php';
?>
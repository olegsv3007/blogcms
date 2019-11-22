<tr>
    <th scope="row"><?= $page->id ?></th>
    <td><?= $page->name ?></td>
    <td><?= $page->url ?></td>
    <td><?= $page->filename ?></td>
    <td><a href="/admin/pages/edit/<?= $page->id ?>" class="btn btn-sm btn-dark">Редактировать</a></td>      
    <td>
        <form method="post" action="/admin/pages/remove">
            <input type="hidden" name="id" value="<?= $page->id ?>">
            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
        </form>
    </td>
</tr>
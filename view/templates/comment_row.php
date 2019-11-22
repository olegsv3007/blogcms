<tr>
    <th scope="row"><?= $comment->id ?></th>
    <td><?= $comment->author->name ?></td>
    <td><?= $comment->text ?></td>
    <td><?= $comment->is_published ? 'Да' : 'Нет' ?></td>
    <form method="post" action="/admin/comments/changeStatus">
        <input type="hidden" name="id" value="<?= $comment->id ?>">
        <td><button type="submit" class="btn btn-sm btn-<?= $comment->is_published ? "warning" : "success" ?>"><?= $comment->is_published ? "Снять с публикации" : "Опубликовать" ?></button></td>      
    </form>
    <form method="post" action="/admin/comments/delete">
        <input type="hidden" name="id" value="<?= $comment->id ?>">
        <td><button type="submit" class="btn btn-sm btn-danger">Удалить</button></td>
    </form>
</tr>
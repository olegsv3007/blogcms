<tr>
    <th scope="row"><?=$article->id?></th>
    <td><?=$article->header?></td>
    <td><?=$article->created_at?></td>
    <td><a href="/admin/articles/edit/<?=$article->id?>" class="btn btn-sm btn-dark">Редактировать</a></td>      
    <td>
        <form method="post" action="/admin/articles/remove">
            <input type="hidden" name="id" value="<?=$article->id?>">
            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
        </form>
    </td>
</tr>
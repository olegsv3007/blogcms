<tr>
    <th scope="row"><?=$user->id?></th>
    <td><?=$user->email->email?></td>
    <td><?=$user->name?></td>
    <td><?=$user->created_at?></td>
    <td><a href="/admin/users/edit/<?=$user->id?>" class="btn btn-sm btn-dark">Редактировать</a></td>      
    <td>
        <form method="post" action="/admin/users/remove">
            <input type="hidden" name="id" value="<?=$user->id?>">
            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
        </form>
    </td>
</tr>
<tr>
    <th scope="row"><?=$user->id?></th>
    <td><?=$user->email?></td>
    <td><?=$user->name?></td>
    <td><?=$user->created_at?></td>
    <td><a href="/admin/users/edit/<?=$user->id?>" class="btn btn-sm btn-dark">Редактировать</a></td>      
    <td><a href="" class="btn btn-sm btn-danger">Удалить</a></td>
</tr>
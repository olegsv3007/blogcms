<tr>
    <th scope="row"><?=$email->id?></th>
    <td><?=$email->email?></td>
    <td><?=$email->is_subscribe ? 'Да' : 'Нет'?></td>  
    <td>
        <form method="post" action="/admin/subscribtions/change">
            <input type="hidden" name="id" value="<?=$email->id?>">
            <button type="submit" class="btn btn-sm btn-danger">Изменить</button>
        </form>
    </td>
</tr>
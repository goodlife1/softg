<p><h3> Автори </h3> </p>
<form method="post">
    <select name="sort">
        <option >сортувати по</option>
        <option value="name">Назві</option>
        <option value="id"> По ід</option>
    </select>
    <input type="submit">
</form>

<table style="width: 800px">
    <tr>
    <tr>
        <th>Ім`я Автора</th>
        <th>Прізвище Автора</th>
        <th>Народився</th>
        <th>Помер</th>
        <th>Громадянство</th>
        <th>Видалити</th>

    </tr>
    <?php
    foreach ($model->authors as $key => $value):?>
        <tr>
            <?php  $id = $value['id']; unset($value['id'])?>
            <?php foreach ($value as $k => $v): ?>
                <td><?php echo $v ?></td>
            <?php endforeach; ?>
            <td>
                <form method="post">
                    <input name="authors[delete]" type="submit" value="<?php echo $id?>">
                </form>
            </td>
        </tr>

    <?php endforeach; ?>

    </tr>

</table>

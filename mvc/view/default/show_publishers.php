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
        <th>Назва</th>
        <th>Країна</th>
        <th>Місто</th>
        <th>Вулиця</th>
        <th>Буд. №</th>
        <th>Індекс</th>
        <th>Видалити</th>

    </tr>
    <?php
    foreach ($model->publishers as $key => $value):?>
        <tr>
            <?php  $id = $value['id']; unset($value['id'])?>
            <?php foreach ($value as $k => $v): ?>
                <td><?php echo $v ?></td>
            <?php endforeach; ?>
            <td>
                <form method="post">
                    <input name="publishers[delete]" type="submit" value="<?php echo $id?>">
                </form>
            </td>
        </tr>

    <?php endforeach; ?>
    </tr>

</table>
<br/>

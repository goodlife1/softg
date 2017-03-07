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
        <th>Книга</th>
        <th>Ім`я автора</th>
        <th>Фамилия автора</th>
        <th>Жанр</th>
        <th>кіл. стор.</th>
        <th>рік виданя</th>
        <th>назва редакціі</th>
        <th>дата поступлення</th>
        <th>Видалити</th>
    </tr>
    <?php
    foreach ($model->books as $key => $value):?>
        <tr>
            <?php  $id = $value['id']; unset($value['id'])?>
            <?php foreach ($value as $k => $v): ?>
                <td><?php echo $v ?></td>
            <?php endforeach; ?>
            <td>
                <form method="post">
                    <input name="books[delete]" type="submit" value="<?php echo $id?>">
                </form>
            </td>
        </tr>

    <?php endforeach; ?>
    </tr>

</table>
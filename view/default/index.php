<input checked class="books" type="radio" name="gender"> Книжки
<input class="authors" type="radio" name="gender"> Автори
<input class="publishers" type="radio" name="gender"> Видавництва
<form method="post">
    <select name="sort">
        <option >сортувати по</option>
        <option value="name">Назві</option>
        <option value="id"> По ід</option>
    </select>
    <input type="submit">
</form>
<script src="/view/default/js/jquery-3.1.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>


<div id="books">

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
</div>
<div id="authors">
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
</div>


<div id="publishers">
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
</div>
<br/>

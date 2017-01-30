<input checked class="books" type="radio" name="gender"> Книжки
<input class="authors" type="radio" name="gender"> Автори
<input class="publishers" type="radio" name="gender" > Видавництва
<div id="books">
<form method="post">
    <select  name="hero">
        <option value="bk.name" >Книгам</option>
        <option value="au.name">Авторас</option>
        <option value="ps.name">Публікаціям</option>
    </select>
    <input type="submit">
</form>
    <table style="width: 800px">
        <tr>
        <tr>
            <td>Книга</td>
            <th>Ім`я автора</th>
            <th>Фамилия автора</th>
            <th>Жанр</th>
            <th>кіл. стор.</th>
            <th>рік виданя</th>
            <th>назва редакціі</th>
            <th>дата поступлення</th>
        </tr>
        <?php

        foreach ($books as $key => $value) {
            $book .= "<tr>";
            foreach ($value as $k => $v) {
                $book .= " <td > $v </td >";
            }
            $book .= " </tr>";
        }
        echo $book;
        ?>
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

        </tr>
        <?php

        foreach ($author as $key => $value) {
            $aut .= "<tr>";
            foreach ($value as $k => $v) {
                $aut .= " <td > $v </td >";
            }
            $aut .= " </tr>";
        }
        echo $aut;
        ?>

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

        </tr>
        <?php

        foreach ($publishers as $key => $value) {
            $pub .= "<tr>";
            foreach ($value as $k => $v) {
                $pub .= " <td > $v </td >";
            }
            $pub .= " </tr>";
        }
        echo $pub;
        ?>

        </tr>

    </table>
</div>
<br/>

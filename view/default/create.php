<p><b>Добавити нову книжку</b><br></p>
<input checked class="books" type="radio" name="gender"> Книжки
<input class="authors" type="radio" name="gender"> Автори
<input class="publishers" type="radio" name="gender" > Видавництва
<div id="books">
<form  method="post" name="Books" style="width: 450px;height:250px ">
    <input type="text" value="<?php echo $_POST['book']['book_name']?>" class="input_form" name="book[book_name]" > <label>Книга</label><br>
    <input type="text" value="<?php echo$_POST['book']['author_name']?>" class="input_form" name="book[author_name]" > <label>Ім`я автора</label><br>
    <input type="text" value="<?php echo$_POST['book']['lost_name']?>" class="input_form" name="book[lost_name]" > <label>Прізвище автора</label><br>
    <input type="text" value="<?php echo$_POST['book']['genre']?>" class="input_form" name="book[genre]" > <label>Жанр</label><br>
    <input type="text" value="<?php echo$_POST['book']['count_page']?>" class="input_form" name="book[count_page]" > <label>кіл. стор.</label><br>
    <input type="text" value="<?php echo$_POST['book']['date_published']?>" value="as" class="input_form" name="book[date_published]" > <label>рік виданя</label><br>
    <input type="text" value="<?php echo$_POST['book']['publisher']?>" class="input_form" name="book[publisher]" > <label>назва редакціі</label><br>
    <input type="text" value="<?php echo$_POST['book']['date_admission']?>" class="input_form" name="book[date_admission]" > <label>дата поступлення</label><br>
    <input type="submit" class="input_form" value="Додати"">
</form>
</div>
<div id="authors">
<form   method="post" name="Books" style="width: 450px;height:250px ">
    <input type="text" class="input_form" name="authors[author_name]" > <label>Ім`я автора</label><br>
    <input type="text" class="input_form" name="authors[lost_name]" > <label>Прізвище автора</label><br>
    <input type="text" class="input_form" name="authors[year_birth]" > <label>Дата народження</label><br>
    <input type="text" class="input_form" name="authors[year_dead]" > <label>Дата смерті</label><br>
    <input type="text" class="input_form" name="authors[citizenship]" > <label> Громадянин </label><br>
    <input type="submit" class="input_form" value="обрахувати"">
</form>
</div>
<div id="publishers">
<form  method="post" name="Books" style="width: 450px;height:250px ">
    <input type="text" class="input_form" name="publishers[name]" > <label>Назва</label><br>
    <input type="text" class="input_form" name="publishers[country]" > <label>Країна</label><br>
    <input type="text" class="input_form" name="publishers[city]" > <label>Місто</label><br>
    <input type="text" class="input_form" name="publishers[street]" > <label>Вулиця</label><br>
    <input type="text" class="input_form" name="publishers[house]" > <label>Дім</label><br>
    <input type="text" class="input_form" name="publishers[index]" > <label>Поштовий індекс</label><br>
    <input type="text" class="input_form" name="publishers[contact]" > <label>Контактна особа</label><br>

    <input type="submit" class="input_form" value="обрахувати"">
</form>
</div>
<?php
if (count($error)!=0){
foreach ($error as $key=>$value){
echo "<br>".$value."<br>";}
}
?>

<div id="answer">
    <p style="color: red"><b> <b/></p>
</div>
<p><b>Добавити нову книжку</b><br></p>
<form method="get" style="width: 450px;height:250px ">

   
    <input type="text" class="input_form" name="author_name" > <label>прізвище і ім’я автора книги</label><br>
    <input type="text" class="input_form" name="book_name" > <label>назва книги</label><br>
    <input type="text" class="input_form" name="page_count" > <label>кількість сторінок</label><br>
    <input type="text" class="input_form" name="year" > <label>рік видання</label><br>
    <input type="text" class="input_form" name="edition_name" > <label>назва видавництва</label><br>
    <input type="text" class="input_form" name="date_admission" > <label>дата поступлення у фонд бібліотеки</label><br>
    <input type="submit" class="input_form" value="обрахувати"">
</form>
<div id="answer">
    <p style="color: red"><b> %errors%<b/></p>
</div>
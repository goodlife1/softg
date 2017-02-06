    <form method="post" name="Books" style="width: 450px;height:250px ">
        <input type="text" value="<?php echo $_POST['book']['book_name'] ?>" class="input_form" name="book[book_name]">
        <label>Книга</label><br>

        <select class="input_form" id="country_a" name="book[author_name]" ">
        <?php foreach ($book->author as $pb): ?>
            <option value="<?php echo $pb['id'] ?>"><?php echo $pb['name']." ".$pb['last_name']; ?></option>
        <?php endforeach; ?>
        </select>
        <label>Імя та Прізвище автора</label><br>

        <select class="input_form" id="country_a" name="book[genre]" ">
        <?php foreach ($book->genres as $pb): ?>
            <option value="<?php echo $pb['genres_id'] ?>"><?php echo $pb['genre'] ?></option>
        <?php endforeach; ?>
        </select>
        <label>Жанр</label><br>

        <input type="text" value="<?php echo $_POST['book']['count_page'] ?>" class="input_form"
               name="book[count_page]"> <label>кіл. стор.</label><br>
        <input type="text" value="<?php echo $_POST['book']['date_published'] ?>" value="as" class="input_form"
               name="book[date_published]"> <label>рік виданя</label><br>

        <select class="input_form" id="country_a" name="book[publisher]" ">
        <option>Видавництва</option>
        <?php foreach ($book->publisher as $pb): ?>
            <option value="<?php echo $pb['id'] ?>"><?php echo $pb['name'] ?></option>
        <?php endforeach; ?>
        </select> <label>назва редакціі</label><br>

        <input type="text" value="<?php echo $_POST['book']['date_admission'] ?>" class="input_form"
               name="book[date_admission]"> <label>дата поступлення</label><br>
        <input type="submit" class="input_form" value="Додати"">
    </form>
    
    <?php
    if (count($book->errors) != 0) {
        foreach ($book->errors as $key => $value) {
            echo "<br>" . $value . "<br>";
        }
    }
    ?>
    <form method="post" name="Books" style="width: 450px;height:250px ">
        <input type="text" class="input_form" name="authors[author_name]"> <label>Ім`я автора</label><br>
        <input type="text" class="input_form" name="authors[lost_name]"> <label>Прізвище автора</label><br>
        <input type="text" class="input_form" name="authors[year_birth]"> <label>Дата народження</label><br>
        <input type="text" class="input_form" name="authors[year_dead]"> <label>Дата смерті</label><br>
        <select class="input_form" id="country_a" name="authors[country]" ">
        <option>Країни</option>
        <?php foreach ($author->country as $country): ?>
            <option value="<?php echo $country['country_id'] ?>"><?php echo $country['name'] ?></option>
        <?php endforeach; ?>
        </select> <label> Громадянин </label><br>
        <input type="submit" class="input_form" value="обрахувати"">
    </form>
    <?php
    if (count($author->errors) != 0) {
            foreach ($author->errors as $key => $value) {
                    echo "<br>" . $value . "<br>";
            }
    }
    ?>
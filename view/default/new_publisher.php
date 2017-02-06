    <div id="a"></div>
    <form method="post" name="Books" style="width: 450px;height:250px ">
        <input type="text" class="input_form" name="publishers[name]"> <label>Назва</label><br>
        <select class="input_form" id="country_p" name="publishers[country]" onclick="country() ">
            <option>Країни</option>
            <?php foreach ($publisher->country as $country): ?>
                <option value="<?php echo $country['country_id'] ?>"><?php echo $country['name'] ?></option>
            <?php endforeach; ?>
        </select> <label>Країна</label><br>
        <div id="vasya"></div>
        <script type="text/javascript">
            function country() {
                $('#country_p').change(function () {
                    var d = $("#country_p option:selected").val();
                    $.post("/books/ajax_create", {country: d}, function (data) {
                        $('#region').html(data);
                    });
                });
            }
        </script>
        <script type="text/javascript">
            function city() {
                $('#region').change(function () {
                    var d = $("#region option:selected").val();
                    $.post("/books/ajax_create", {region: d}, function (data) {
                        $('#city_id').html(data);
                    });
                });
            }
        </script>
        <select class="input_form" id="region" onclick="city()" name="publishers[region]">
            <option onclick="city()">Області</option>
        </select><br>

        <select class="input_form" id="city_id" name="publishers[city]">
            <option>Місто</option>
        </select><br>

        <input type="text" class="input_form" name="publishers[street]"> <label>Вулиця</label><br>
        <input type="text" class="input_form" name="publishers[house]"> <label>Дім</label><br>
        <input type="text" class="input_form" name="publishers[index]"> <label>Поштовий індекс</label><br>
        <input type="text" class="input_form" name="publishers[contact]"> <label>Контактна особа</label><br>
        <input type="submit" class="input_form" value="обрахувати"">
    </form>

    <?php
    if (count($publisher->errors) != 0) {
        foreach ($publisher->errors as $key => $value) {
            echo "<br>" . $value . "<br>";
        }
    }
    ?>
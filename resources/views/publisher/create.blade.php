@extends('layouts.app')

@section('content')
    <script src="js/jquery-3.1.1.js"></script>
    <div class="result"></div>

        <script type="text/javascript">
            function olac(id, type,parent) {
                var href = '/location/' + $(parent).val();
                $.ajax({
                    type: 'POST',
                    url: href,
                    data: '_token={{csrf_token()}}&_method=' + type,
                    success: function (data) {
                        var output_inf = "<option>Вибирайте</option>";
                        for (var i = 0; i < data.length; i++) {
                            output_inf += '<option value="' + data[i].id + '">' + data[i].name + '</option>'
                        }
                        $(id).html(output_inf);
                    }
                });
            }
        </script>
    <h2>Дбавити нове Видавництво</h2>
    <form method="POST" name="Books" action="/publishers" style="width: 450px;height:250px ">
        <input type="text" class="input_form" name="name"> <label>Назва</label><br>
<div style="background-color: #adadad; width: 60%;color: white; border-radius: 15px">
    <h3 style="color: white;margin-left: 15px">Адрес</h3>
        <select class="input_form" id="country_p" onchange="olac('#region','REGION','#country_p')" onclick="olac('#region','REGION','#country_p')" name="country">
            <option>Країни</option>
            @foreach ($country as $key=>$value)
                <option value=" {{$value->country_id}}">{{$value->name}}</option>
            @endforeach
        </select> <label>Країна</label><br>

        <select  class="input_form" id="region" onchange="olac('#city_id','CITY','#region')" name="region">
            <option onclick="city()">Області</option>
        </select><label>Регіон</label><br>

        <select class="input_form" id="city_id" name="city_id" >
            <option>Місто</option>
        </select><label >Місто</label><br>

        <input type="text" class="input_form" name="street"> <label>Вулиця</label><br>
        <input type="text" class="input_form" name="house"> <label>Дім</label><br>
        <input type="text" class="input_form" name="zip_code"> <label>Ідекс</label><br>
</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" class="input_form" name="contact"> <label style="margin-bottom: 15px">Контактна особа</label><br>
        <input type="submit" class="input_form" value="обрахувати">
    </form>

@endsection
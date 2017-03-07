@extends('layouts.app')

@section('content')
    <h2>Дбавити нового Автора</h2>
    <form method="post" action="/authors"  style="width: 450px;height:250px ">
         {{csrf_field()}}
        <input type="text" class="input_form" name="name"> <label>Ім`я автора</label><br>

        <input type="text" class="input_form" name="last_name"> <label>Прізвище автора</label><br>

        <input   type="date" class="input_form" name="year_of_birth"> <label>Дата народження</label><br>

        <input type="date" class="input_form" name="year_dead"> <label>Дата смерті</label><br>

        <select class="input_form" id="country_a" name="citizenship" >
        <option>Країни</option>
            @foreach($country as $key=>$value)
                <option value="{{$value->country_id}}">{{$value->name}}</option>
            @endforeach
        </select>
            <label> Громадянин </label><br>
            <input type="submit" class="input_form" value="обрахувати">
    </form>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>

                @endforeach

            </ul>
        </div>
    @endif
@endsection
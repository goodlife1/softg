@extends('layouts.app')

@section('content')
    <form method="post" action="/authors/{{$model->author_id}}"  style="width: 450px;height:250px ">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="text" class="input_form"  value="{{$model->name}}" name="name"> <label>Ім`я автора</label><br>

        <input type="text" class="input_form" value="{{$model->last_name}}" name="last_name"> <label>Прізвище автора</label><br>

        <input type="date" class="input_form" value="{{$model->year_of_birth}}" name="year_of_birth"> <label>Дата народження</label><br>

        <input type="date" class="input_form" value="{{$model->year_death}}" name="year_dead"> <label>Дата смерті</label><br>

        <select class="input_form" id="country_a" name="citizenship" >
            <option>Країни</option>
            @foreach($country as $key=>$value)
                <option <?php if ($model->citizenship == $value->country_id) echo "selected"?> value="{{$value->country_id}}">{{$value->name}}</option>
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
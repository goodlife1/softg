@extends('layouts.app')


@section('content')
    <h2>Дбавити нову книжку</h2>
    <form method="post" action="/books" style="width: 450px;height:250px ">
        <input type="text" value="" class="input_form" name="name">
        <label>Книга</label><br>

        <select class="input_form" id="country_a" name="author_id">
            <option>Виберіть Автора</option>
            @foreach($authors as $key=>$value)
                <option value="{{$value->author_id}}">{{$value->name}} {{$value->last_name}}</option>
            @endforeach
        </select>
        <label>Імя та Прізвище автора</label><br>

        <select class="input_form" id="country_a" name="genres_id">
            <option>Виберіть Жанр</option>
            @foreach($genres as $key=>$value)
                <option value="{{$value->genres_id}}">{{$value->genre}}</option>
            @endforeach
        </select>
        <label>Жанр</label><br>

        <input type="text" value="" class="input_form" name="count_pages">
        <label>кіл. стор.</label><br>

        <input type="text"  class="input_form" name="publishing_year">
        <label>рік виданя</label><br>

        <select class="input_form" id="country_a" name="publisher_id">
            <option>Виберіть видавництво</option>
            @foreach($publishers as $key=>$value)
                <option value="{{$value->publisher_id}}">{{$value->name}}</option>
            @endforeach
        </select> <label>назва редакціі</label><br>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="date" class="input_form" name="date_of_receipt">
        <label>дата поступлення</label><br>

        <input type="submit" class="input_form" value="Додати">
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

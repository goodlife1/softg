@extends('layouts.app')

@section('content')
    <p><h3> Автори </h3> </p>
    <table style="width: 105%">
        <tr>
        <tr>
            <th><a href="/authors/order/name">Ім`я Автора</a></th>
            <th><a href="/authors/order/last_name">Прізвище Автора</a></th>
            <th><a href="/authors/order/year_of_birth">Народився</a></th>
            <th><a href="/authors/order/year_death">Помер</a></th>
            <th><a href="/authors/order/citizenship">Громадянство</a></th>
            <th>редагувати</th>
            <th>Видалити</th>

        </tr>
        @foreach($content as $key=>$value)
        <tr>
            <td>{{$value->name}}</td>
            <td>{{$value->last_name}}</td>
            <td>{{$value->year_of_birth}}</td>
            <td>{{$value->year_death}}</td>
            <td>{{$value->citizenship}}</td>
            <td><a href="/authors/{{$value->id}}/edit">редагувати</a></td>
            <td>
                <form method="post" action="/authors/{{$value->id}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="submit" value="видалити" style="border-radius: 5px">
                </form>
            </td>

        </tr>
       @endforeach
       </tr>

    </table>
    {{$content->links()}}
@endsection
@extends('layouts.app')
@section('content')
    <p><h3> Видавництво </h3> </p>
    <table style="width: 105%">
        <tr>
        <tr>
            <th><a href="/publishers/order/name">Назва</a></th>
            <th><a href="/publishers/order/cnt_name">Країна</a></th>
            <th><a href="/publishers/order/cit_name">Місто</a></th>
            <th><a href="/publishers/order/street">Вулиця</a></th>
            <th><a href="/publishers/order/house">Буд. №</a></th>
            <th><a href="/publishers/order/zip_code">Індекс</a></th>
            <th>редагувати</th>
            <th>Видалити</th>

        </tr>
        @foreach($publisher as $key=>$value)
        <tr>

                <td>{{$value->name}}</td>

                <td>{{$value->cnt_name}}</td>
                <td>{{$value->cit_name}}</td>
                <td>{{$value->street}}</td>
                <td>{{$value->house}}</td>
                <td>{{$value->zip_code}}</td>
                <td><a href="/publishers/{{$value->id}}/edit">редагувати</a></td>
                <td> <form method="post" action="/publishers/{{$value->id}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="submit" value="видалити" style="border-radius: 5px">
                    </form>
                </td>

        </tr>
        @endforeach
        </tr>

    </table>
    <br/>
{{$publisher->links()}}
@endsection
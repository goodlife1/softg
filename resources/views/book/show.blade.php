@extends('layouts.app')
@section('content')
   <br>
   <p><h3> Книжки </h3> </p>
    <table style="width: 105%">

        <tr>
            <th>№</th>
            <th><a href="/books/order/name">Книга</a></th>
            <th><a href="/books/order/author_name">Ім`я автора</a></th>
            <th><a href="/books/order/last_name">Фамилия автора</a></th>
            <th><a href="/books/order/genre">Жанр</a></th>
            <th><a href="/books/order/count_pages">кіл. стор.</a></th>
            <th><a href="/books/order/publishing_year">рік виданя</a></th>
            <th><a href="/books/order/publication_name">назва редакціі</a></th>
            <th><a href="/books/order/date_of_receipt">дата поступлення</a></th>
            <th>Редагувати</th>
            <th>Видалити</th>
        </tr>
        <?php $i = 0?>
        @foreach($model as $key=>$value)
            <?php $i++?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->author_name}}</td>
                <td>{{$value->last_name}}</td>
                <td>{{$value->genre}}</td>
                <td>{{$value->count_pages}}</td>
                <td>{{$value->publishing_year}}</td>
                <td>{{$value->publication_name}}</td>
                <td>{{$value->date_of_receipt}}</td>
                <td><a href="/books/{{$value->id}}/edit">редагувати</a></td>
                <td>
                    <form method="POST" action="/books/{{$value->id}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}

                        <input style="border-radius: 5px" type="submit" value="Видалити">
                    </form>
                </td>
            </tr>
        @endforeach


    </table>
    {{$model->links()}}
@endsection

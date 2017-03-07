<table style="width: 105%">

    <tr>
        <th>№</th>
        <th>Книга</th>
        <th>Ім`я автора</th>
        <th>Фамилия автора</th>
        <th>Жанр</th>
        <th>кіл. стор.</th>
        <th>рік виданя</th>
        <th>назва редакціі</th>
        <th>дата поступлення</th>
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
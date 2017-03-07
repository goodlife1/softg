@extends('layouts.app')

@section('content')
<p>Пошук</p>
    <form method="post">

        <select class="input_form" id="author_id" name="author_id">
            <option>Виберіть Автора</option>
            @foreach($authors as $key=>$value)
                <option value="{{$value->author_id}}">{{$value->name}} {{$value->last_name}}</option>
            @endforeach
        </select><label>Автор</label>
        <input type="button" id="author_books" class="input_form" value="Шукати" onclick="find('#author_id','author')"><br>

        <select class="input_form" id="publisher_id" name="publisher_id">
            <option>Виберіть видавництво</option>
            @foreach($publishers as $key=>$value)
                <option value="{{$value->publisher_id}}">{{$value->name}}</option>
            @endforeach
        </select>
        <label>назва редакціі</label>
        <input type="button" id="publishers_books" class="input_form" value="Шукати" onclick="find('#publisher_id','publisher')"><br>


        <input type="text" class="input_form" id="words" name="sub_words" oninput="find_d()" >
        <label>По частині слова</label><br>
        <input type="button" class="input_form" value="Шукати">
    </form>
    <div id="a"></div>
<script src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript">
    function find(id_d,name) {

        var id = $(id_d).val();
        var href = "/books/"+name+"/"+id;
        $.ajax({
            type: 'GET',
            url: href,
            data: '_token={{csrf_token()}}',
            success: function (data) {

                $('#a').html(data);
            }
        });

    }
    function find_d() {

        var id = $('#words').val();
        var href = " /books/get_sub/"+id;
        $.ajax({
            type: 'GET',
            url: href,
            data: '_token={{csrf_token()}}',
            success: function (data) {

                $('#a').html(data);
            }
        });
    }

</script>
    @endsection
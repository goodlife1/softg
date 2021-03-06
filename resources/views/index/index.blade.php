@extends('layouts.app')

@section('content')
    <p>Книжковий фонд бібліотеки.
    </p>

    <p>Предметні області:</p>

    1. Книжка:
    <li>- прізвище і ім’я автора;</li>
    <li>- назва книги;</li>
    <li>- жанр;</li>
    <li>- кількість сторінок;</li>
    <li>- рік видання;</li>
    <li>- видавництво;</li>
    <li>- дата поступлення у фонд бібліотеки.</li>

    2. Видавництво:
    <li>- назва;</li>
    <li>- адреса (країна, місто, вулиця, дім, поштовий індекс);</li>
    <li>- контактна особа.</li>

    3. Автор:
    <li>- прізвище;</li>
    <li>- імя;</li>
    <li>- рік народження;</li>
    <li>- рік смерті(може бути пусто);</li>
    <li>- громадянство (назва країни).</li>
    <p>
    <li>Реалізувати добавлення і вилучення книг, авторів, видавництв;</li>
    <li>Вивід усіх книг, авторів, видавництв;</li>
    <li>Пошук по частині назві книги, видавництва чи прізвища автора;</li>
    <li>Вивід книг заданого автора; заданого видавництва;</li>
    <li>Передбачити можливість сортування.</li>
    </p>

    @endsection
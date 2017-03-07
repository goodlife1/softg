<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/', 'IndexController@index');
Route::get('/site_author', 'IndexController@author');
Route::get('/search', 'IndexController@searching');
Route::get('/books/order/{id}', 'BookController@index');
Route::get('/books/author/{id}', 'BookController@getBooksByAuthor');
Route::get('/books/get_sub/{id}', 'BookController@getByString');
Route::get('/books/publisher/{id}', 'BookController@getBooksByPublisher');
Route::get('/authors/order/{id}', 'AuthorController@index');
Route::get('/publishers/order/{id}', 'PublisherController@index');
Route::match(['region','city','get'],'/location/{id}', 'AjaxController@location');
Route::resource('books','BookController');
Route::resource('authors','AuthorController');
Route::resource('publishers','PublisherController');
Auth::routes();
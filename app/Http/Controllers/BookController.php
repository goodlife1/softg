<?php

namespace App\Http\Controllers;

use App\models\Author;
use App\models\Book;
use App\models\Genre;
use App\models\Publisher;
use Illuminate\Http\Request;
use  App\Http\Requests;

class BookController extends Controller
{

    public function index($order = [])
    {
        if (empty($order)) {
            $order = "name";
        }
        $model = new Book();
        $book_inf = $model->getInfOfBooks($order);


        return view('book.show', ['model' => $book_inf]);
    }



    public function create()
    {
        $genres = Genre::all();
        $author = new Author();
        $authors = $author->getIdAndName();
        $publisher = new Publisher();
        $publishers = $publisher->getIdAndName();
        return view('book.new',
            ['authors' => $authors, 'publishers' => $publishers, 'genres' => $genres]);
    }


    public function store(Requests\StoreBookPost $request)
    {
        Book::create($request->all());

        return redirect('/books');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $genres = Genre::all();
        $author = new Author();
        $authors = $author->getIdAndName();
        $publisher = new Publisher();
        $publishers = $publisher->getIdAndName();
        $content = Book::find($id);
        return view('book.edit',
            ['authors' => $authors, 'publishers' => $publishers,
                'genres' => $genres, 'content' => $content]
        );
    }


    public function update(Requests\StoreBookPost $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect("/books");
    }

    public function getBooksByAuthor($id)
    {
        $book = new Book();
        $books = $book->getInfOfBooksByAuthor($id);
        return view('book.extends.getByName', ['model' => $books]);

    }

    public function getBooksByPublisher($id)
    {
        $book = new Book();
        $books = $book->getInfOfBooksByPublisher($id);
        return view('book.extends.getByName', ['model' => $books]);
    }
    public function getByString($id){
        $book = new Book();
        $books = $book->getBySubStr($id);
        return view('book.extends.getByName', ['model' => $books]);

    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect("/books");
    }
}

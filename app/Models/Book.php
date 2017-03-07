<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Book extends \Eloquent
{
    public $timestamps = false;
    protected $fillable = [
        'author_id','name','genres_id','count_pages','publishing_year','publisher_id','date_of_receipt'
    ];

    public function getInfOfBooks($order)
    {
        $books = self::leftJoin('authors', 'books.author_id', '=', 'authors.author_id')
            ->leftJoin('genres', 'books.genres_id', '=', 'genres.genres_id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
            ->select('books.id as id', 'books.name as name', 'authors.name as author_name',
                     'authors.last_name', 'genres.genre', 'books.count_pages',
                     'books.publishing_year', 'publishers.name as publication_name', 'books.date_of_receipt')
            ->orderBy($order)
            ->paginate(20);
        return $books;
    }
    public function alea(){
        return "ceva";
    }
    public function getInfOfBooksByAuthor($id)
    {
        $books = self::leftJoin('authors', 'books.author_id', '=', 'authors.author_id')
            ->leftJoin('genres', 'books.genres_id', '=', 'genres.genres_id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
            ->select('books.id as id', 'books.name as name', 'authors.name as author_name',
                     'authors.last_name', 'genres.genre', 'books.count_pages',
                     'books.publishing_year', 'publishers.name as publication_name', 'books.date_of_receipt')
            ->where('authors.author_id','=',$id)
            ->paginate(20);
        return $books;
    }

    public function getInfOfBooksByPublisher($id)
    {
        $books = self::leftJoin('authors', 'books.author_id', '=', 'authors.author_id')
            ->leftJoin('genres', 'books.genres_id', '=', 'genres.genres_id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
            ->select('books.id as id', 'books.name as name', 'authors.name as author_name',
                     'authors.last_name', 'genres.genre', 'books.count_pages',
                     'books.publishing_year', 'publishers.name as publication_name', 'books.date_of_receipt')
            ->where('publishers.publisher_id','=',$id)
            ->paginate(20);
        return $books;
    }

    public function getBySubStr($id)
    {
        $books = self::leftJoin('authors', 'books.author_id', '=', 'authors.author_id')
            ->leftJoin('genres', 'books.genres_id', '=', 'genres.genres_id')
            ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
            ->select('books.id as id', 'books.name as name', 'authors.name as author_name',
                     'authors.last_name', 'genres.genre', 'books.count_pages',
                     'books.publishing_year', 'publishers.name as publication_name', 'books.date_of_receipt')
            ->where('publishers.name','like','%'.$id.'%')
            ->orWhere('authors.last_name','like','%'.$id.'%')
            ->orWhere('books.name','like','%'.$id.'%')
            ->paginate(20);
        return $books;
    }

    public function publisher()
    {
        return $this->belongsTo('App\models\Publisher','publisher_id');
    }

    public function author()
    {
        return $this->belongsTo('App\models\Author','author_id');
    }
    public function genre()
    {
        return $this->belongsTo('App\models\Genre','genres_id');
    }

}

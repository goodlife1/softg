<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.02.2017
 * Time: 12:07
 */

namespace models;

use app\db\ActiveRecord;
use models\Genres;
use models\Authors;
use models\Publishers;

class Books extends ActiveRecord
{
    public $author;
    public $publisher;
    public $genres;
    protected $table = "books";
    public $books;
    protected function rules()
    {
        return [
            [['book_name', 'count_page', 'date_published', 'date_admission'], 'required', 'message' => 'Всі поля мають бути заповнені'],
            [['date_admission'], 'date', 'message' => 'Дата має бути у вигляді рік-міс-день наприклад 1998-05-13'],
        ];
    }

    public function getBooksInf($order)
    {

        $result = $this->select('bk.id as id ,bk.name as name, au.name as author_name, au.last_name , gs.genre , 
                               bk.count_pages, bk.publishing_year, ps.name as publication_name,bk.date_of_receipt')
            ->how('bk')
            ->join([
                    ['authors au on bk.author_id = au.author_id'],
                    ['genres gs on bk.genres_id = gs.genres_id'],
                    ['publishers ps on bk.publisher_id = ps.publisher_id']]
            )->order($order)->all();
        $this->books = $result;
    }

    public function addNewBook($array)
    {
        $this->insert([
            'id' => NULL,
            'author_id' => $array['author_name'],
            'genres_id' => $array['genre'],
            'publisher_id' => $array['publisher'],
            'name' => $array['book_name'],
            'count_pages' => $array['count_page'],
            'publishing_year' => $array['date_published'],
            'date_of_receipt' => $array['date_admission']
        ]);
    }

    public function initParam()
    {
        $publisher = new Publishers();
        $author = new Authors();
        $genre = new Genres();
        $this->genres = $genre->getAllGenres();
        $this->author = $author->getAllAuthors();
        $this->publisher = $publisher->getAllPublishers();
    }

}
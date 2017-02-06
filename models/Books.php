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

    protected function rules()
    {
        return [
            [['book_name', 'count_page', 'date_published', 'date_admission'], 'required', 'message' => 'Всі поля мають бути заповнені'],
            [['date_admission'], 'date', 'message' => 'Дата має бути у вигляді рік-міс-день наприклад 1998-05-13'],
        ];
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
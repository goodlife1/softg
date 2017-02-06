<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26.01.2017
 * Time: 19:14
 */

namespace models;
use app\db\ActiveRecord;
use models\Books;
use models\Authors;
use models\Publishers;
class Index extends ActiveRecord
{
   protected $table = "cities";
    public $books;
    public $authors;
    public $publishers;

    public function initParams($order){
        $this->books = $this->getAllBooks($order);
        $this->authors = $this->getAllAuthors($order);
        $this->publishers = $this->getAllPublishers($order);
    }
    public function deleteBook($id){
        $book = new Books();
        $book->delete(" id =$id");
    }
    public function deleteAuthor($id){
        $author = new Authors();
        $author->delete(" author_id = $id");
    }
    public function deletePublisher($id){
        $publisher = new Publishers();
        $publisher->delete(" publisher_id  = $id");
    }
    protected function getAllBooks($order)
    {
        $book = new Books();
        
       $result = $book->select('bk.id as id ,bk.name as name, au.name as author_name, au.last_name , gs.genre , 
                               bk.count_pages, bk.publishing_year, ps.name as publication_name,bk.date_of_receipt')
           ->how('bk')
           ->join([
           ['authors au on bk.author_id = au.author_id'],
           ['genres gs on bk.genres_id = gs.genres_id'],
           ['publishers ps on bk.publisher_id = ps.publisher_id']]
       )->order($order)->all();
        return $result;
    }

    protected function getAllAuthors($order)
    {
        $author = new Authors();
        $result = $author->select(' au.author_id as id, au.name  as name, au.last_name , au.year_of_birth, au.year_death, ct.name as citizenship')
            ->how('au')
            ->join([
            ['countries ct on au.citizenship = ct.country_id']
        ])->order($order)->all();
        return $result;
    }

    protected function getAllPublishers($order)
    {
        $publisher = new Publishers();

        $result = $publisher->select('pub.publisher_id as id , pub.name as name , cnt.name as cnt_name , cit.name cit_name , adr.street, adr.house , adr.zip_code')
            ->how('pub')
            ->join([
                ['addresses adr on pub.address_id = adr.address_id'],
                ['cities cit  on cit.city_id = adr.city_id'],
                ['countries cnt on cit.country_id= cnt.country_id']
            ])->order($order)->all();
        return $result;
    }

    /**
     * @return mysqli
     */

}
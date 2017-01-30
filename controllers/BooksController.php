<?php
/**
 * Created by PhpStorm.
 * User: Vasya
 * Date: 26.01.2017
 * Time: 16:43
 */

namespace controllers;

use models\Index;
use models\Create;
use models\Search;

class BooksController extends Core
{
    public $tpl;

    public function actionIndex()
    {
        $order = "bk.publishing_year";
//        $a = func_get_args();
        if($_POST['hero']!=''){
            $order =$_POST['hero'];
        }
        $model = new Index();
        $books = $model->getAllBooks($order);
        $author = $model->getAllAuthors();
        $publishers = $model->getAllPublishers();
        return $this->render('index', ['books' => $books, 'author' => $author, "publishers" => $publishers]);
    }

    public function actionCreate()
    {
        $model = new Create();
        if (isset($_POST['book'])) {
            $error = $model->setBook($_POST['book']);
        }
        if (isset($_POST['authors']))
            $error = $model->setAuthors($_POST['authors']);
        if (isset($_POST['publishers']))
            $error = $model->setPublishers($_POST['publishers']);

        return $this->render('create',['error'=>$error]);
    }

    public function actionSearch()
    {
        $model = new Search();
        if(isset($_POST['find'])){
            $result = $model->bookSearch($_POST['find']);
        }
        if(isset($_POST['search'])){
           $result = $model->Search($_POST['search']);
        }
        return $this->render('search',['result'=>$result]);
    }
    

    public function actionAuthor_Book()
    {
        return $this->render('author_book');
    }


}
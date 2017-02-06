<?php
/**
 * Created by PhpStorm.
 * User: Vasya
 * Date: 26.01.2017
 * Time: 16:43
 */

namespace controllers;

use models\Books;
use models\Index;
use models\Search;
use models\Countries;
use models\Regions;
use models\Cities;
use models\Addresses;
use models\Authors;
use models\Publishers;

class BooksController extends Core
{
    public $tpl;

    public function actionIndex()
    {
        $model = new Index();
        if (isset($_POST['books']['delete'])) {
            $model->deleteBook($_POST['books']['delete']);
        } elseif (isset($_POST['authors']['delete'])) {
            $model->deleteAuthor($_POST['authors']['delete']);
        } elseif (isset($_POST['publishers']['delete'])) {
            $model->deletePublisher($_POST['publishers']['delete']);
        }
        $order = "name";
        if ($_POST['sort'] != '') {

            $order = $_POST['sort'];
        }


        $model->initParams($order);


        return $this->render('index', ['model' => $model]);
    }


    public function actionNew_Publisher()
    {
        $publisher = new Publishers();
        $publisher->countries();
        if (isset($_POST['publishers']) && $publisher->validate($_POST['publishers'])) {
            $publisher->addNewPublisher($_POST['publishers']);
            header("Location: /");
        }
        return $this->render('new_publisher', ['publisher' => $publisher]);
    }

    public function actionNew_Author()
    {
        $author = new Authors();
        $author->initParams();
        if (isset($_POST['authors']) && $author->validate($_POST['authors'])) {
            $author->addNewAuthor($_POST['authors']);
            header("Location: /");
        }
        return $this->render('new_author', ['author' => $author]);
    }

    public function actionNew_Book()
    {
        $book = new Books();
        $book->initParam();
        if (isset($_POST['book']) && $book->validate($_POST['book'])) {
            $book->addNewBook($_POST['book']);
            header("Location: /");
        }
        return $this->render('new_book', ['book' => $book]);
    }

    public function actionAjax_Create()
    {

        if ($_POST['country'] != '') {
            $regions = new Regions();
            $result = $regions->getAllRegions($_POST['country']);
            $this->render_view('/extends/ajax_create', ['region' => $result]);
        }
        if ($_POST['region'] != '') {
            $city = new Cities();
            $result = $city->getAllCities($_POST['region']);
            $this->render_view('/extends/ajax_create', ['region' => $result]);
        }
    }

    public function actionSearch()
    {
        $model = new Search();
        if (isset($_POST['find'])) {
            $result = $model->bookSearch($_POST['find']);
        }
        if (isset($_POST['search'])) {
            $result = $model->Search($_POST['search']);
        }
        return $this->render('search', ['result' => $result]);
    }


    public function actionAuthor()
    {
        return $this->render('author');
    }


}
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

class BooksController extends Controller
{
    public $tpl;

    public function actionBooks()
    {
        $model = new Books();
        if (isset($_POST['books']['delete'])) {
            $model->delete("id = ".$_POST['books']['delete']);
        }
        if ($_POST['sort'] != '') {

            $order = $_POST['sort'];
        } else {
            $order = "id";
        }
        $model->getBooksInf($order);
        return $this->render('show_books', ['model' => $model]);
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


  


}
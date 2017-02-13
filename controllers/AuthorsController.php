<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.02.2017
 * Time: 10:47
 */

namespace controllers;

use models\Authors;

class AuthorsController extends Controller
{
    public function actionAuthors()
    {
        $model = new Authors();
        if (isset($_POST['authors']['delete'])) {
            $model->delete($_POST['authors']['delete']);
        }
        if ($_POST['sort']) {
            $order = $_POST['sort'];
        } else {
            $order = 'id';
        }

        $model->getAuthorsInf($order);
        return $this->render("show_authors", ['model' => $model]);
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

}
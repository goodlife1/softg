<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.02.2017
 * Time: 10:47
 */

namespace controllers;

use models\Publishers;

class PublishersController extends Controller
{
    public function actionPublisher()
    {
        $model = new Publishers();
        if (isset($_POST['publishers']['delete'])) {
            $model->delete("publisher_id = ".$_POST['publishers']['delete']);
        }
        if($_POST['sort']){
            $order =$_POST['sort'];
        }else{
            $order = 'id';
        }
            $model->getPublishersInf($order);
        return $this->render("show_publishers",['model'=>$model]);
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
}
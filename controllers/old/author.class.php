<?php
class Author extends Core{


    public function getContent(){

        $str = file_get_contents(ROOT."/view/default/author.php");
        return $str;

    }
    public  function new_book(){
        return $this->render('new_book');
    }
    public  function author(){
        return $this->render('author');
    }
    public  function index(){
        return $this->render('index');
    }

}
?>

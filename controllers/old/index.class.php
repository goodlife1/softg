<?php

class Index extends Core
{

//    public  function author(){
//        return $this->render('author');
//    }
    public function getContent()
    {
        $book = "";
        if (file_exists($this->file_path)) {
            $lib_bd = file_get_contents($this->file_path);
            $array = $this->breakToArray($lib_bd);
            foreach ($array as $base_key => $base_value) {
                $book .= "<tr><td>" . ($base_key + 1) . "</td>";
                foreach ($base_value as $key => $value) {
                    $book .= " <td > $value </td >";
                }
                $book .= " </tr>";
            }
        }


        $str = file_get_contents(ROOT . "/view/default/Index.php");
        $str = str_replace('%content%', $book, $str);
        return $this->render('index');

    }
    public  function new_book(){
        return $this->render('new_book');
    }

    public  function index(){
echo 'index is this pages';
//        return $this->render('index');
    }

}

?>

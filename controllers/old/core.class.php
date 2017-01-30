<?php

abstract class Core
{
    public $valid_error = array();
    public $file_path;
    public $key_get = array('author_name', 'book_name', 'page_count', 'year', 'edition_name', 'date_admission');
    public $array_assoc;
    public function __construct()
    {
    }

    public function getBody()
    {
        $this->file_path = ROOT . "/view/default/files/library.txt";
        $path = ROOT . "/view/default/main.php";
        $content_temp = file_exists($path) ? file_get_contents($path) :
            "file main.php is not find";
//        $content_temp = str_replace("%path%", "/view/default", $content_temp);
//        $content_temp = str_replace("%content%", $this->getContent(), $content_temp);
        
//        return $content_temp;
    }

    public function breakToArray($str)
    {
        $array = explode("\n", $str);

        foreach ($array as $key => $value) {

            $value = trim($value);
            $array[$key] = explode("\t", $value);
        }
        unset($array[count($array) - 1]);


        return $array;
    }


    public function getContent()
    {
    }

    public function getResult($description, $answer)
    {
        if (is_array($answer)) {
            $answer = implode(" ", $answer);
        }
        return $description . " " . $answer;
    }

    public function isNumeric($array)
    {
        foreach ($array as $value) {
            if (!is_numeric($value) && $value > 2) {
                return false;
            }
        }
        return true;
    }

    public function isDate($value)
    {
        $array = explode('-', $value);
        if (!count($array) != 3 && !@checkdate($array[0], $array[1], $array[2])) {
            $this->valid_error['date'] = "дата має бути у вигляді місяць-день-рік наприклад 4-23-2012";
            return false;
        }
        return true;
    }
    public function extract_sub_array($array, $key)
    {
        $sub_arr = array();
        foreach ($array as $keys => $value) {
            $sub_arr[$keys] = $value[$key];

        }
        return $sub_arr;
    }
    public function trans_arr_assoc($array)
    {
        foreach ($array as $key => $value) {
            $this->array_assoc[$key] = array_combine($this->key_get, $value);
        }

        return $this->array_assoc;
    }
    public function render($tplname,$nested=false) {
        if (!$nested) {
            $this->tpl = $tplname;
            include ROOT."/view/default/main.php";
        } else{}
            include ROOT."/view/default/" . $tplname.".php";
    }
}


?>
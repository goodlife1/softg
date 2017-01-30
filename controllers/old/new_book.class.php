<?php

class new_book extends Core
{
    public $content;
    public $input_data = array();
    


    public function getContent()
    {
        $this->content = file_get_contents(ROOT . "/view/default/create.php");
        if(count($_GET)>0)
        if ($this->issetGet() && $this->Validate()) {
            if (file_exists($this->file_path)) {
                $this->input_data = $_GET;
                $rows = implode("\t", $this->input_data);
                $file = fopen($this->file_path, 'a');
                fwrite($file, $rows . "\n");
                fclose($file);
            } else {
                $this->valid_error['file'] = "файл library.txt на найден";
            }

        }
        if (count($this->valid_error) > 0) {
            $this->valid_error = implode('</br>', $this->valid_error);
            $this->content = str_replace("%errors%", $this->valid_error, $this->content);
        } else {
            $this->content = str_replace("%errors%", '', $this->content);
        }

        return $this->content;

    }


    public function Validate()
    {
//        extract($_GET);
//        echo $page_count;

        if ($this->isNumeric([$_GET['page_count'], $_GET['year']]) && $this->isDate($_GET['date_admission'])) {
            return true;
        } else {
            $this->valid_error['int'] = "кількість сторінок ,рік видання мають бути  цілими числами та мають бути быльше 0";
            var_dump($this->valid_error);
            return false;
        }
    }

    public function issetGet()
    {
        if (count($_GET) != count($this->key_get) && count($_GET) > 0) {
            $this->valid_error['get'] = 'В адрессній строці забагато змінних';
            return false;
        }

        foreach ($this->key_get as $key) {
            if (isset($_GET[$key]) && $_GET[$key] != '') {
                continue;
            } else {
                $this->valid_error[$key] = 'Всі поля мають бути заповнені';
                return false;
            }
        }

        return true;
    }
}

?>
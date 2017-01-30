<?php

class Search_book extends Core
{


    public function getContent()
    {
        $finds_books = "";
        if (isset($_GET['search']))
            if (file_exists($this->file_path)) {
                $lib_bd = file_get_contents($this->file_path);
                $array = $this->breakToArray($lib_bd);
                $this->trans_arr_assoc($array);
                $book = $this->extract_sub_array($this->array_assoc, 'book_name');
                $find = $this->search($book, $_GET['search']);
                if (count($find) == 0) {
                    $find[] = "файлів з такими символами не найденно";
                }

                foreach ($find as $value) {
                    $finds_books .= $value . "</br>";
                }
            }

        $str = file_get_contents(ROOT . "/view/default/search.php");
        $str = str_replace('%finds%', $finds_books, $str);
        return $str;

    }

    public function search($array, $looking)
    {
        $arr = array_filter($array, function ($item) use ($looking) {

            $it = " " . $item;
            return (bool)stripos($it, $looking);
        });

        return $arr;
    }

}

?>

<?php

class author_book extends Core
{
    

    public function getContent()
    {
        $content = file_get_contents(ROOT . "/templates/default/author_book.php");
        if (file_exists($this->file_path)) {
            $book_lib = file_get_contents($this->file_path);
            $array = $this->breakToArray($book_lib);
            $this->trans_arr_assoc($array);

            $author = $this->extract_sub_array($this->array_assoc, 'author_name');
            $unique_author = array_unique($author);

            $array_page_count = $this->extract_sub_array($this->array_assoc, 'page_count');
            array_multisort($array_page_count, SORT_NUMERIC, $this->array_assoc);
            $sorted_authors = $this->extract_sub_array($this->array_assoc, 'author_name');
            $sorted_authors = implode("</br>", $sorted_authors);
        }
        $content = str_replace('%unique_authors%', count($unique_author), $content);
        $content = str_replace('%authors%', $sorted_authors, $content);


        return $content;
    }


    

   


}

?>
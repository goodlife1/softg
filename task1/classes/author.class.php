<?php
class Author extends Core{


    public function getContent(){

        $str = file_get_contents(ROOT."/templates/default/author.php");
        return $str;

    }

}
?>

<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.01.2017
 * Time: 20:01
 */

namespace models;

class Create extends \Database
{

    public function setBook($array)
    {
        if (!$this->isNumeric($array['count_page'], "Кількість сторінок має бути чимлои") &&
            !$this->isNumeric($array['date_published'], "Введіть рік наприклад 1999") &&
            !$this->isDate($array['date_admission'], "дата має бути у вигляді місяць-день-рік наприклад 2012-12-23")
        ) {
            return $this->errors;
        } else {

            $this->query("CALL insert_book('" . $array['book_name'] . "' , '" . $array['author_name'] . "' , '" . $array['lost_name'] . "' , '" . $array['genre'] . "' , '" . $array['count_page'] . "'  , '" . $array['date_published'] . "' , '" . $array['publisher'] . "' , '" . $array['date_admission'] . "')");
            header('Location: /');
        }

    }

    public function setPublishers($array)
    {
        if ($this->isNumeric($array['index'], "Індекс  має бути чимлои"))
            $this->query("CALL `inset_publisher`('" . $array['name'] . "', '" . $array['country'] . "', '" . $array['city'] . "', '" . $array['street'] . "', '" . $array['house'] . "', '" . $array['index'] . "', '" . $array['contact'] . "')");
        return $this->errors;
    }

    public function setAuthors($array)
    {

        if ($this->isDate($array['year_birth'], "дата народження має бути у вигляді місяць-день-рік наприклад 2012-12-23") && $this->isDate($array['year_dead'], "дата смерті має бути у вигляді місяць-день-рік наприклад 2012-12-23"))
            $this->query("CALL `inset_author`('" . $array['author_name'] . "', '" . $array['lost_name'] . "', '" . $array['year_birth'] . "', '" . $array['year_dead'] . "', '" . $array['citizenship'] . "')");
        return $this->errors;
    }


}

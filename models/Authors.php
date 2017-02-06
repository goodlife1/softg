<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.02.2017
 * Time: 12:06
 */

namespace models;

use app\db\ActiveRecord;
use models\Countries;

class Authors extends ActiveRecord
{
    protected $table = "authors";
    public $country;

    protected function rules()
    {
        return [
            [['lost_name','author_name','year_birth'],'required','message'=>'Всі поля мають бути заповненні'],
            [['year_birth','year_dead'], 'date', "message" => "дата народження має бути датою"]

        ];
    }

    public function addNewAuthor($array)
    {
        $exist = $this->select('author_id')->where("citizenship = '" . $array['author_name'] . "' AND
                                        last_name = '" . $array['lost_name'] . "'")->all();
        if (count($exist<1)) {

            $this->insert([
                "author_id" => NULL,
                "citizenship" => $array['country'],
                "last_name" => $array['lost_name'],
                "name" => $array['author_name'],
                "year_of_birth" => $array['year_birth'],
                "year_death" => $array['year_dead']
            ]);
        }

    }

    public function initParams()
    {
        $country = new Countries();
        $this->country = $country->getAllCountries();
    }

    public function getAllAuthors()
    {
        return $this->select("author_id as id , name, last_name")->all();
    }

}
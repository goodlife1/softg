<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.02.2017
 * Time: 12:09
 */

namespace models;

use app\db\ActiveRecord;
use models\Addresses;
use models\Countries;

class Publishers extends ActiveRecord
{
    protected $table = "publishers";
    public $country;
    protected function rules()
    {
        return [
            [['name','index','street','house','contact'],'required','message'=>"Всі поля мають бути заповненні"],
            ['index','isNumeric','message'=>" Індекс має бути числом"]

        ];
    }

    public function getAllPublishers()
    {
        return $this->select("publisher_id as id , name")->all();
    }

    public function countries()
    {
        $country = new Countries();
        $this->country =  $country->getAllCountries();
    }

    public function addNewPublisher($array)
    {

        $address = new Addresses();

        $address_id = $address->select("address_id")->where("city_id = '" . $array['city'] . "' and 
        street = '" . $array['street'] . "' and house = '" . $array['house'] . "' 
            and zip_code = '" . $array['index'] . "' ")->all();
        if (count($address_id) == 0) {
            $address->insert([
                "address_id" => NULL,
                "city_id" => $array['city'],
                "street" => $array['street'],
                "house" => $array['house'],
                "zip_code" => $array['index']
            ]);
        }

        $address_id = $address->select("address_id")->where("city_id = '" . $array['city'] . "' and 
        street = '" . $array['street'] . "' and house = '" . $array['house'] . "' 
            and zip_code = '" . $array['index'] . "' ")->all();
        
        $this->insert([
            "publisher_id" => NULL,
            "address_id" => $address_id[0]['address_id'],
            "name" => $array["name"],
            "contact_person" => $array['contact']
        ]);
    }
}

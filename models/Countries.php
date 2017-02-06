<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.02.2017
 * Time: 12:08
 */

namespace models;

use app\db\ActiveRecord;

class Countries extends ActiveRecord
{
    protected $table = "countries";

    public function getAllCountries()
    {
        return $this->select()->all();
    }

}
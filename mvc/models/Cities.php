<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.02.2017
 * Time: 12:07
 */

namespace models;

use app\db\ActiveRecord;

class Cities extends ActiveRecord
{
    protected $table = "cities";

    public function getAllCities($region)
    {
        return $this->select("city_id as id, name")->where("region_id = $region")->all();
    }
}
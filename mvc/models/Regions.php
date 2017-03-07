<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.02.2017
 * Time: 12:28
 */

namespace models;

use app\db\ActiveRecord;

class Regions extends ActiveRecord
{
    protected $table = "regions";

    public function getAllRegions($country_id)
    {
        return $this->select("region_id as id, name")->where("country_id = $country_id")->all();
    }
}
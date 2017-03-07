<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends \Eloquent
{
    protected $table = "cities";
    protected $primaryKey = "city_id";

    public function getCitiesFromRegion($id)
    {

        return self::select('city_id as id','name')
            ->where('region_id','=',$id)->get();
    }
}

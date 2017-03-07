<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Region extends \Eloquent
{
    protected $primaryKey = 'region_id';
    public function getRegionFromCountry($id)
    {
        return self::select('region_id as id','name')
            ->where('country_id','=',$id)->get();
    }
}

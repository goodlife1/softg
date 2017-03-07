<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends \Eloquent
{
    public $timestamps = false;
    protected $primaryKey = 'publisher_id';
    protected $fillable = ['name'];
    public function getIdAndName()
    {

        return self::select('publisher_id', 'name')->get();
    }

    public function getInfAboutPublishers($order){
       $content =  self::select('publishers.publisher_id as id' , 'publishers.name as name'
        , 'countries.name as cnt_name' , 'cities.name as cit_name' , 'addresses.street'
            ,'addresses.house' , 'addresses.zip_code')
            ->leftJoin('addresses','publishers.address_id','=','addresses.address_id')
            ->leftJoin('cities','cities.city_id', '=' ,'addresses.city_id')
            ->leftJoin('countries','cities.country_id','=', 'countries.country_id')
            ->orderBy($order)
            ->paginate(20);
       return $content;
    }

  

}

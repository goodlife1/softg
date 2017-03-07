<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Address extends \Eloquent
{
    public $timestamps = false;
    protected $table = "addresses";
    protected $primaryKey = "address_id";
    protected $fillable = [
        'city_id','street','house','zip_code'
    ];

    public function issetAddress($request)
    {
        return self::select('address_id as id')
            ->where('city_id', '=', $request->city_id)
            ->where('street', '=', $request->street)
            ->where('house', '=', $request->house)
            ->where('zip_code', '=', $request->zip_code)->first();
    }

}

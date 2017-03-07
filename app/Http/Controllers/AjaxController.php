<?php

namespace App\Http\Controllers;

use App\models\Country;
use App\models\City;
use App\models\Region;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function location(Request $request,$id)
    {

        if ($request->isMethod('CITY'))
        {
            $city = new City();
            return $city->getCitiesFromRegion($id);
        }
        if ($request->isMethod('REGION'))
        {
        $regions = new Region();
            return $regions->getRegionFromCountry($id) ;
        }
    }
}

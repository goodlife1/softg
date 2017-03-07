<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherPost;
use App\models\Address;
use App\models\Country;
use App\models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{

    public function index($order = [])
    {
        if (empty($order)) {
            $order = "name";
        }
        $model = new Publisher();
        $publisher = $model->getInfAboutPublishers($order);
        return view('publisher.show', ['publisher' => $publisher]);
    }


    public function create()
    {
        $country = Country::all();
        return view('publisher.create', ['country' => $country]);
    }


    public function store(StorePublisherPost $request)
    {

        $publisher = new Publisher();
        $publisher->name = $request->name;
        $publisher->address_id = $this->addressId($request);
        $publisher->contact_person = $request->contact;
        $publisher->save();
        return redirect('/publishers');
    }

    private function addressId($request)
    {
        $address = new Address();
        if (!isset($address->issetAddress($request)->id)) {
            Address::create($request->all());
        }

        $addres_id = $address->issetAddress($request)->id;
        return $addres_id;
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $country = Country::all();
        $model = Publisher::find($id);
        return view('publisher.edit', ['model' => $model, 'country' => $country]);
    }


    public function update(StorePublisherPost $request, $id)
    {

        $id = Publisher::findOrFail($id);
        $id->name = $request->name;
        $id->address_id = $this->addressId($request);
        $id->contact_person = $request->contact;
        $id->update();
        return redirect('/publishers');
    }


    public function destroy($id)
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Publisher::destroy($id);
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        return redirect('/publishers');
    }
}

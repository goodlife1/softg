<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorsPost;
use App\models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Author;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order = [])
    {
        if (empty($order)){
            $order = "name";
        }
        $aut = new Author();
        $content  = $aut->getAllInfAboutAuthors($order);
//
        return view('author.show',['content'=>$content]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('author.create',['country'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorsPost $request)
    {
        Author::create($request->all());
        return redirect('/authors');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $model = Author::find($id);
        return view('author.edit',['model'=>$model,'country'=>$countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAuthorsPost $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        return redirect('/authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::destroy($id);
        return redirect('/authors');
    }
}

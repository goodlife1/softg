<?php

namespace App\Http\Controllers;
use App\models\Author;
use App\models\Publisher;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {

        return view('index.index');
    }

    public function author()
    {
        return view('index.author');
    }

    public function searching(){
        $author = new Author();
        $authors = $author->getIdAndName();
        $publisher = new Publisher();
        $publishers = $publisher->getIdAndName();
        return view('index.search',['authors' => $authors, 'publishers' => $publishers]);
    }

}

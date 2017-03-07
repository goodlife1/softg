<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Author extends \Eloquent
{
    public $timestamps = false;
    protected $primaryKey = 'author_id';
    protected $fillable = [
      'name','last_name','year_of_birth','year_death','citizenship'
    ];
    public function getAllInfAboutAuthors($order)
    {
        $content= self::select('authors.author_id as id', 'authors.name', 'authors.last_name'
            ,'authors.year_of_birth', 'authors.year_death', 'countries.name as citizenship')
            ->leftJoin('countries' ,'authors.citizenship','=','countries.country_id')
            ->orderBy($order)
            ->paginate(20);


        return $content;
    }
    public function getIdAndName()
    {
        return self::select('author_id', 'name', 'last_name')->get();
    }

}

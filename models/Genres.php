<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.02.2017
 * Time: 12:08
 */

namespace models;

use app\db\ActiveRecord;
class Genres extends ActiveRecord
{
    protected $table = "genres";

    public function getAllGenres()
    {
        return $this->select()->all();
    }
}
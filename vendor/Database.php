<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26.01.2017
 * Time: 20:22
 */
class Database extends app\Validator
{

    public $_bd;
    public $query;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        require_once ROOT . "/config.php";
        $obj_mysqli = @new mysqli('localhost', 'vasya', '141995', 'soft_group');
        if (@!$obj_mysqli->error) {
            $this->_bd = $obj_mysqli;

        }
    }


    public function query($sql)
    {

        return $this->_bd->query($sql);
    }

    public function assoc($query)
    {
        while ($result = $query->fetch_assoc()) {
            $array[] = $result;
        }
        return $array;
    }


}
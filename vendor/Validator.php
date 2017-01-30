<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26.01.2017
 * Time: 19:23
 */

namespace app;
class Validator
{
    public $errors;
    public function isNumeric($array, $message)
    {
        if (is_array($array)){
        foreach ($array as $value) {
            if (!is_numeric($value) && $value > 2) {
                $this->errors[] = $message;
                return false;
            }
        }
        }else {
            if (!is_numeric($array)){
                $this->errors[] = $message;
                return false;
            }
        }

        return true;
    }

    public function isDate($value,$message)
    {
        $array = explode('-', $value);
        if (!count($array) != 3 && !@checkdate($array[0], $array[1], $array[2])) {
            $this->errors[] = $message;
            return false;
        }
        return true;
    }
}
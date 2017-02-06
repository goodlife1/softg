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

    protected function isNumeric($array, $message)
    {
        if (is_array($array)) {
            foreach ($array as $value) {
                if (!is_numeric($value) && $value > 2) {
                    $this->errors[] = $message;
                    return false;
                }
            }
        } else {
            if (!is_numeric($array)) {
                $this->errors[] = $message;
                return false;
            }
        }

        return true;
    }

    public function required($value,$message)
    {
        if ($value == "") {
            $this->errors[] = $message;
            return false;
        } else {
            return true;
        }
    }

    protected function date($value, $message)
    {
        $array = explode('-', $value);
        if (!count($array) != 3 && !@checkdate($array[2], $array[1], $array[0])) {
            $this->errors[] = $message;
            return false;
        }
        return true;
    }

    protected function rules()
    {
        return 0;
    }

    public function validate($array)
    {
        $rules = $this->rules();
        foreach ($rules as $val) {
                if (method_exists($this, $val[1])) {
                    if (is_array($val[0])) {
                        foreach ($val[0] as $value) {
                            if (!$this->$val[1]($array[$value], $val['message'])){
                                return false;
                            }
                        }
                    } else {
                        if (!$this->$val[1]($array[$val[0]], $val['message'])) {
                            echo "false";
                            return false;
                        }
                    }
                }
        }
        return true;

    }
}
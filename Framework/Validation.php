<?php

namespace Framework;

class Validation
{



    //check for string length if a specific lengtا is required   
    public static function string($value, $min = 1, $max = INF)
    {
        if (is_string($value)) {
            $value = trim($value);
            $length = strlen($value);
            return $length >= $min && $length <= $max;
        }

        return false;
    }

    //email validation
    public static function email($value)
    {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    // public static function required($value)
    // {
    //   if (empty($value)) {
    //     return false;
    //   }
    //   return true;
    // }



    //check for password matching
    public static function match($value1, $value2)
    {
        $value1 = trim($value1);
        $value = trim($value2);

        return $value1 === $value2;
    }

    public static function validateLength($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        $length = strlen($value);
        return $length >= $min && $length <= $max;
    }

    public static function validateEmail($value)
    {
        $value = trim($value);
        return filter_var($value, FILTER_VALIDATE_EMAIL);

    }

    public static function validateMatched($value1, $value2)
    {
        $value1 = trim($value1);
        $value2 = trim($value2);
        return $value1 === $value2;

    }
}

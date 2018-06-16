<?php

namespace Core;

class Util
{
    public static function formatGETArguments()
    {
        $getArguments = '.';
        if (isset($_GET) and !empty($_GET)) {
            $address = [];
            foreach ($_GET as $k => $v) {
                $address [] = $k . "=" . $v;
            }
            $getArguments ='?'. implode('&amp;', $address);
        }
        return $getArguments;
    }

    public static function arrayAssocToNum(array $assocs)
    {
        $results = [];
        foreach ($assocs as $results_key => $values) {
            foreach ($values as $index => $value) {
                $results[$index][$results_key] = $value;
            }
        }
        return $results;
    }
}

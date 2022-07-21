<?php

namespace app\Helper;

class ArrayHelper
{
    public static $data;

    public static function set($input)
    {
        ArrayHelper::$data = $input;
    }

    public static function add($item)
    {
        ArrayHelper::$data[] = $item;
    }

    public static function read()
    {
        return ArrayHelper::$data;
    }
}

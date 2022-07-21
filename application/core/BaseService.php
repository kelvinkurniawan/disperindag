<?php

namespace app\Core;

class BaseService
{
    public function __construct()
    {
        log_message('debug', "Service Class Initialized");
    }

    public function __get($key)
    {
        $CI = &get_instance();
        return $CI->$key;
    }
}

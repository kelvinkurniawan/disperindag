<?php

class TestMiddleware
{
    protected $controller;
    protected $ci;

    public function __construct($controller, $ci)
    {
        $this->controller = $controller;
        $this->ci = $ci;
    }

    public function run()
    {
        echo "Running the middleware\n";
    }
}

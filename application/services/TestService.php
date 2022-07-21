<?php

namespace app\Service;

use app\Core\BaseService;
use app\Service\DBService as DB;

class TestService extends BaseService
{
    protected $DBService;
    public function __construct(DB $DBService, DB $DBService2, DB $DBService3)
    {
        parent::__construct();
        $this->DBService = $DBService;
        $this->DBService2 = $DBService2;
        $this->DBService3 = $DBService3;
    }

    public function hello()
    {
        return "Hello World";
    }
}

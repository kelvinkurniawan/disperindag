<?php

namespace app\Service;

use app\Core\BaseService;
use app\Model\TestModel;

class DBService extends BaseService
{
    protected $model;
    public function __construct(TestModel $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}

<?php

namespace app\Model;
use app\Core\BaseModel;

class StoreModel extends BaseModel{
  protected $table = "store";
  protected $guarded = [];
  public function __construct()
  {
    parent::__construct();
  }

}
<?php

namespace app\Model;

use app\Core\BaseModel;

class AccountModel extends BaseModel{
  protected $table = "users";
  protected $guarded = [];
  public function __construct()
  {
    parent::__construct();
  }
}
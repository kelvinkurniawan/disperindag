<?php

namespace app\Service;
use app\Core\BaseService;
use app\Model\AccountModel;

class AccountService extends BaseService{
  public function __construct()
  {
    parent::__construct();
    $this->model = new AccountModel();
  }

  public function create($data){
    if($this->model->where('email', $data['email'])->first()) return false;

    return $this->model->create($data);
  }

  public function verify($username, $password){
    $data = $this->model->where('email', $username)->where('password', $password)->first();

    if($data) return $data;

    return false;
  }
}
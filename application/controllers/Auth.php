<?php

use app\Core\BaseRestController;
use app\Service\AccountService;

class Auth extends BaseRestController{
  public function __construct()
  {
    parent::__construct();
    $container = new Container();
    $this->service = $container->resolve(AccountService::class);
  }

  public function login_post(){
    $data = $this->post();

    $result = $this->service->verify($data['email'], $data['password']);

    if($result){
      $this->session->set_userdata('user', $result);
      
      $this->response([
        'status' => true,
        'message' => 'Login success'
      ], 200);
    }else{
      $this->response([
        'status' => false,
        'message' => "Login gagal"
      ], 400);
    }
  }

  public function register_post(){
    $data = $this->post();
    $result = $this->service->create($data);
    if($result){
      $this->response($result, 200);
      return;
    }

    $this->response(['message'=>'Email sudah terdaftar'], 400);
  }
}
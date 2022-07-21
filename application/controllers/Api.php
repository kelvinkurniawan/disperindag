<?php

use app\Core\BaseRestController;
use app\Service\ExhibitorService;

class Api extends BaseRestController{
  public function __construct()
  {
    parent::__construct();
    $container = new Container();
    $this->service = $container->resolve(ExhibitorService::class);
  }

  public function index_get(){
    if($this->get('id')){
      $this->response($this->service->getById($this->get('id')));
      return;
    }
    $this->response($this->service->getAll());
  }

  public function index_delete(){
      $this->response($this->service->deleteExhibitor($this->input->get('id')));
  }

  public function index_post(){
    $this->response($this->service->saveExhibitor($this->post()));
  }

  public function gallery_post(){
    $this->response($this->service->saveGallery($this->post()));
  }

  public function store_post(){
    $this->response($this->service->saveStore($this->post()));
  }

  public function social_media_post(){
    $this->response($this->service->saveSocialMedia($this->post()));
  }

  public function gallery_delete(){
    $this->response($this->service->deleteGallery($this->input->get('id')));
  }

  public function store_delete(){
    $this->response($this->service->deleteStore($this->input->get('id')));
  }

  public function social_media_delete(){
    $this->response($this->service->deleteSocialMedia($this->input->get('id')));
  }

}
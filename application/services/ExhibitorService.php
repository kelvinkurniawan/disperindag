<?php

namespace app\Service;
use app\Core\BaseService;
use app\Model\ExhibitorModel;
use app\Model\GalleryModel;
use app\Model\SocialModel;
use app\Model\StoreModel;

class ExhibitorService extends BaseService{
  public function __construct()
  {
    parent::__construct();
    $this->model = new ExhibitorModel();
    $this->social = new SocialModel();
    $this->store = new StoreModel();
    $this->gallery = new GalleryModel();
  }

  public function getAll(){
    return $this->model->with(['store', 'social_media', 'gallery'])->get();
  }

  public function getById($id){
    return $this->model->with(['store', 'social_media', 'gallery'])->where('id', $id)->first();
  }

  public function deleteExhibitor($id){
    return $this->model->where('id', $id)->delete();
  }

  public function saveExhibitor($data){
    if(isset($data['id'])){
      return $this->model->where("id", $data['id'])->update($data);
    }
    return $this->model->create($data);
  }

  public function saveGallery($data){
    return $this->gallery->create($data);
  }

  public function saveSocialMedia($data){
    return $this->social->create($data);
  }

  public function saveStore($data){
    return $this->store->create($data);
  }

  public function deleteGallery($id){
    return $this->gallery->where('id', $id)->delete();
  }

  public function deleteSocialMedia($id){
    return $this->social->where('id', $id)->delete();
  }

  public function deleteStore($id){
    return $this->store->where("id", $id)->delete();
  }
}
<?php

namespace app\Model;
use app\Core\BaseModel;

class ExhibitorModel extends BaseModel{
  protected $table = "exhibitor";
  protected $guarded = [];

  public function __construct()
  {
    parent::__construct();
  }

  public function social_media(){
    return $this->hasMany(SocialModel::class, 'exhibitor_id', 'id');
  }

  public function store(){
    return $this->hasMany(StoreModel::class, 'exhibitor_id', 'id');
  }

  public function gallery(){
    return $this->hasMany(GalleryModel::class, 'exhibitor_id', 'id');
  }
  
}
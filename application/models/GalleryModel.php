<?php

namespace app\Model;
use app\Core\BaseModel;

class GalleryModel extends BaseModel{
  protected $table = "gallery";
  protected $guarded = [];

  public function __construct()
  {
    parent::__construct();
  }

}
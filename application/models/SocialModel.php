<?php

namespace app\Model;
use app\Core\BaseModel;

class SocialModel extends BaseModel{
  protected $table = "social_media";
  protected $guarded = [];
  public function __construct()
  {
    parent::__construct();
  }
}
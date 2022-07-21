<?php
namespace app\Core;

use Illuminate\Database\Eloquent\Model as Eloquent;

class BaseModel extends Eloquent
{
    public function __construct()
    {
        parent::__construct();
    }
}

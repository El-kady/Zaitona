<?php

namespace Modules\Frontend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Category extends BaseModel
{
    protected $table = "categories";
    

    public function getTree(){
        return $this->buildTree($this->getAll());
    }

}
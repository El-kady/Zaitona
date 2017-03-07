<?php

namespace Modules\Frontend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Category extends BaseModel
{
    protected $table = "categories";
    

    public function getTree(){
        $tree = [];
        foreach ($this->getAll() as $category){
            $category['subcategories'] = [];
            if ($category['parent_id'] == 0){
                $tree[$category['id']] = $category;
            }else{
                $tree[$category['parent_id']]['subcategories'][] = $category;
            }
        }
        return $tree;
    }

}
<?php

namespace Modules\Backend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Category extends BaseModel
{
    protected $table = "categories";

    public function getTree(){
        return $this->buildTree($this->getAll());
    }

    public function saveData($data,$id = 0)
    {
        foreach ($data as $key => $value) {
            if ($value === "") {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            $record = [
                "title" => $data["title"],
                "parent_id" => $data["parent_id"],
            ];

            $where = "";
            $bind = [];

            if ($id > 0) {
                $where .= "id = :id";
                $bind[":id"] = $id;
            }

            $this->save($record,$where,$bind);

            return true;

        }
        return false;

    }

}
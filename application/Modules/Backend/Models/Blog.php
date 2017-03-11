<?php

namespace Modules\Backend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Blog extends BaseModel
{
    protected $table = "blog_posts";

    public function saveData($data, $id = 0)
    {
        foreach ($data as $key => $value) {
            if ($value === "") {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            $record = [
                "title" => $data["title"],
                "content" => $data["content"],
            ];

            $where = "";
            $bind = [];

            if ($id > 0) {
                $where .= "id = :id";
                $bind[":id"] = $id;
            }

            $this->save($record, $where, $bind);

            return true;

        }
        return false;

    }
}
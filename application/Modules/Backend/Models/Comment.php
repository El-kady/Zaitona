<?php

namespace Modules\Backend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Comment extends BaseModel
{
    protected $table = "comments";

    public function saveData($data, $id = 0)
    {
        foreach ($data as $key => $value) {
            if ($value === "") {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            $record = [
                "comment" => $data["comment"],
            ];

            $where = "";
            $bind = [];

            if ($id > 0) {
                $where .= "id = :id";
                $bind[":id"] = $id;
            }

            $this->update($record, $where, $bind);

            return true;

        }
        return false;

    }
}
<?php

namespace Modules\Frontend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Request extends BaseModel
{
    protected $table = "requests";

    public function saveData($data)
    {
        foreach ($data as $key => $value) {
            if ($value === "") {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            $record = [
                "request" => $data["request"],
                "course_id" => $data["course_id"]
            ];

            $this->insert($record);

            return true;

        }
        return false;

    }

}
<?php

namespace Modules\Backend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Config extends BaseModel
{
    protected $table = "configs";

    public function saveData($data)
    {
        foreach ($data as $key => $value) {
            if ($value === "") {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            foreach ($data as $key => $value) {
                $where = "name = :name";
                $bind[":name"] = $key;
                $this->save(["name" => $key,"value" => $value], $where, $bind);
            }
            return true;

        }
        return false;

    }

}
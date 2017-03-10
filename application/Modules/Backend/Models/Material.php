<?php

namespace Modules\Backend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Material extends BaseModel
{
    protected $table = "materials";

    private function validate($data)
    {
        foreach ($data as $key => $value) {
            if (is_string($value) && $value === "") {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }
    }

    public function insertData($data)
    {
        $this->validate($data);
        try {
            Service::getUploader()->upload("file", ["image", "text", "document", "video"]);
        } catch (\Exception $e) {
            Service::getSession()->add('feedback_negative', Service::getText()->get($e->getMessage()) );
        }
        if (count(Service::getSession()->get('feedback_negative')) == 0) {

            $data["file_name"] = Service::getUploader()->getFile("physical_url");
            $data["file_type"] = Service::getUploader()->getFile("type");
            $data["file_size"] = Service::getUploader()->getFile("size");

            $this->insert($data);

            return true;
        }
        return false;

    }

    public function updateData($data, $id = 0)
    {
        $this->validate($data);
        $record = [
            "title" => $data["title"],
        ];

        if (count(Service::getSession()->get('feedback_negative')) == 0) {

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
<?php

namespace Modules\Backend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Material extends BaseModel
{
    protected $table = "materials";

    private $rules = [
        "youtube" => "~v=(?:[a-z0-9_-]+)~i"
    ];

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

        if ((int)$data["type"] == 1) {
            try {
                Service::getUploader()->upload("file", ["image", "text", "document", "video"]);
                $data["file_name"] = Service::getUploader()->getFile("physical_url");
                $data["file_type"] = Service::getUploader()->getFile("type");
                $data["file_size"] = Service::getUploader()->getFile("size");
            } catch (\Exception $e) {
                Service::getSession()->add('feedback_negative', Service::getText()->get($e->getMessage()));
            }
        }

        if ((int)$data["type"] == 2 && !preg_match($this->rules[$data["provider"]], $data["link"])) {
            Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("LINK_NOT_SUPPORTED"), Service::getText()->get($data["provider"])));
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
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
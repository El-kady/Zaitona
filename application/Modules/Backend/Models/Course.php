<?php

namespace Modules\Backend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class Course extends BaseModel
{
    protected $table = "courses";

    private function validate($data)
    {
        foreach ($data as $key => $value) {
            if (is_string($value) && $value === "") {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }
    }

    public function saveData($data, $id = 0)
    {
        return ($id == 0) ? $this->insertData($data) : $this->updateData($data, $id);
    }

    private function insertData($data)
    {
        $this->validate($data);
        try {
            Service::getUploader()->upload("featured_image", ["image"]);
        } catch (\Exception $e) {
            Service::getSession()->add('feedback_negative', Service::getText()->get($e->getMessage()) );
        }
        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            $this->insert([
                "title" => $data["title"],
                "introduction" => $data["introduction"],
                "description" => $data["description"],
                "requirement" => $data["requirement"],
                "audience" => $data["audience"],
                "category_id" => (int)$data["category_id"],
                "user_id" => Service::getAuth()->getUserId(),
                "featured_image" => (Service::getUploader()->isUploaded()) ? Service::getUploader()->getFile("physical_url") : "",
            ]);
            return true;
        }
        return false;

    }

    private function updateData($data, $id = 0)
    {
        $this->validate($data);
        $record = [
            "title" => $data["title"],
            "introduction" => $data["introduction"],
            "description" => $data["description"],
            "requirement" => $data["requirement"],
            "audience" => $data["audience"],
            "category_id" => (int)$data["category_id"],
        ];

        if ($data["featured_image"]["name"] != "") {
            try {
                Service::getUploader()->upload("featured_image", ["image"]);
                if (Service::getUploader()->isUploaded()) {
                    $record["featured_image"] = Service::getUploader()->getFile("physical_url");
                }
            } catch (\Exception $e) {
                Service::getSession()->add('feedback_negative', Service::getText()->get($e->getMessage()));
            }
        }

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
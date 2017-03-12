<?php

namespace Modules\Backend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class User extends BaseModel
{
    protected $table = "users";

    public function saveData($data,$id = 0)
    {

        $required = ["name","email"];

        if ($id == 0) {
            $required[] = "password";
            $required[] = "retype_password";
        }

        foreach ($required as $key => $value) {
            if ($value === "") {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }

        if (!empty($data["email"])) {
            if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
                Service::getSession()->add('feedback_negative', Service::getText()->get("EMAIL_NOT_VALID"));
            }

            if ($user_email_row = $this->getRow($data["email"], "email")) {
                if ($id == 0 || ($id > 0 && $user_email_row["id"] != Service::getAuth()->getUserId())) {
                    Service::getSession()->add('feedback_negative', Service::getText()->get("EMAIL_ALREADY_EXISTS"));
                }
            }
        }

        if (!empty($data["retype_password"]) && $data["retype_password"] != $data["password"]) {
            Service::getSession()->add('feedback_negative', Service::getText()->get("PASSWORDS_NOT_MATCH"));
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            $record = [
                "session_id" => "",
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => md5($data["password"]),
                "account_type" => $data["account_type"],
                "status" => $data["status"]
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
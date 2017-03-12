<?php

namespace Modules\Frontend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class User extends BaseModel
{
    protected $table = "users";

    public function login($email, $password)
    {
        if (!empty($email) && !empty($password)) {
            if (($user = $this->getRow($email, "email"))) {
                if (md5($password) == $user['password']) {
                    if (Service::getAuth()->setLogin($user)) {
                        return true;
                    }
                } else {
                    Service::getSession()->add('feedback_negative', Service::getText()->get("EMAIL_OR_PASSWORD_WRONG"));
                }
            } else {
                Service::getSession()->add('feedback_negative', Service::getText()->get("EMAIL_OR_PASSWORD_WRONG"));
            }
        } else {
            Service::getSession()->add('feedback_negative', Service::getText()->get("FILL_ALL_FIELDS"));
        }
        return false;
    }

    public function register($data)
    {

        Service::getForm()->fillTmp('register', $data);

        foreach ($data as $key => $value) {
            if (empty($value)) {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }

        if (!empty($data["email"]) && !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            Service::getSession()->add('feedback_negative', Service::getText()->get("EMAIL_NOT_VALID"));
        }

        if (!empty($data["email"]) && $this->getRow($data["email"], "email")) {
            Service::getSession()->add('feedback_negative', Service::getText()->get("EMAIL_ALREADY_EXISTS"));
        }

        if (!empty($data["retype_password"]) && $data["retype_password"] != $data["password"]) {
            Service::getSession()->add('feedback_negative', Service::getText()->get("PASSWORDS_NOT_MATCH"));
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            $record = [
                "account_type" => 1,
                "name" => $data["name"],
                "email" => $data["email"],
                "country" => $data["country"],
                "gender" => $data["gender"],
                "password" => md5($data["password"]),
                "status" => 1
            ];
            if ($this->insert($record)) {

                $mailer = Service::getMailer();
                $mailer->setFrom(Service::getConfig()->get("site_email"),Service::getConfig()->get("site_name"));
                $mailer->addTo($data["email"],$data["name"]);
                $mailer->setSubject(Service::getConfig()->get("site_name"));
                $mailer->setMessage(
                    nl2br(Service::getConfig()->get("welcome_email_template")),
                    true,
                    [
                        "name" => $data["name"],
                        "email" => $data["email"],
                        "site_name" => Service::getConfig()->get("site_name"),
                        "site_email" => Service::getConfig()->get("site_email"),
                    ]
                );
                $mailer->send();

                return true;
            }
        }
        return false;

    }
    public function saveData($data)
    {

        Service::getForm()->fillTmp('user_edit', $data);

        $required = ["name","email"];

        if (!empty($data["password"])) {
            $required[] = "retype_password";
        }

        $record = [
            "name" => $data["name"],
            "email" => $data["email"],
            "country" => $data["country"],
            "gender" => $data["gender"],
        ];

        foreach ($required as $field) {
            if ($data[$field] == "") {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($field)));
            }
        }

        if (!empty($data["email"]) && !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            Service::getSession()->add('feedback_negative', Service::getText()->get("EMAIL_NOT_VALID"));
        }

        if (!empty($data["email"]) && $user_email_row = $this->getRow($data["email"], "email")) {
            if (Service::getAuth()->getUserId() != $user_email_row["id"]) {
                Service::getSession()->add('feedback_negative', Service::getText()->get("EMAIL_ALREADY_EXISTS"));
            }
        }

        if (!empty($data["retype_password"]) && $data["retype_password"] != $data["password"]) {
            Service::getSession()->add('feedback_negative', Service::getText()->get("PASSWORDS_NOT_MATCH"));
        }


        if ($data["user_photo"]["name"] != "") {
            try {
                Service::getUploader()->upload("user_photo", ["image"]);
                if (Service::getUploader()->isUploaded()) {
                    $record["user_photo"] = Service::getUploader()->getFile("physical_url");
                }
            } catch (\Exception $e) {
                Service::getSession()->add('feedback_negative', Service::getText()->get($e->getMessage()));
            }
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            if ($data["password"] != "") {
                $record["password"] = md5($data["password"]);
            }
            if ($this->update($record,"id = :id",["id" => Service::getAuth()->getUserId()])) {
                return true;
            }
        }
        return false;

    }


}
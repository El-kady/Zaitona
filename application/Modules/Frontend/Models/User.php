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
            if ($user = $this->getRow($email, "email")) {

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
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => md5($data["password"]),
                "active" => 1
            ];
            if ($this->insert($record)) {
                return true;
            }
        }
        return false;

    }

}
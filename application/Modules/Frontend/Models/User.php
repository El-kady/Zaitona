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

                if (password_verify($password, $user['password_hash'])) {

                } else {
                    Service::getSession()->add('feedback_negative', Service::getText()->get("USERNAME_OR_PASSWORD_WRONG"));
                }
            } else {
                Service::getSession()->add('feedback_negative', Service::getText()->get("USERNAME_OR_PASSWORD_WRONG"));
            }
        } else {
            Service::getSession()->add('feedback_negative', Service::getText()->get("FILL_ALL_FIELDS"));
        }
        return false;
    }

    public function register($data)
    {

        foreach ($data as $key => $value) {
            if (empty($value)) {
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"), Service::getText()->get($key)));
            }
        }

        if (!empty($data["email"]) && $this->getRow($data["email"], "email")) {
            Service::getSession()->add('feedback_negative', Service::getText()->get("EMAIL_ALREADY_EXISTS"));
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0) {
            $data["password"] = md5($data["password"]);
            $data["active"] = 1;
            if($this->insert($data)){
                return true;
            }

        }

        return false;

    }

}
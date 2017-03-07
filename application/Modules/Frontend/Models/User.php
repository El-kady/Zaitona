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
                    if($this->doLogin($user)){
                        return true;
                    }
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
        public function doLogin($user){

            session_regenerate_id(true);
            $_SESSION = array();
            Service::getSession()->set('user_id',$user["id"]);
            Service::getSession()->set('name',$user["name"]);
            Service::getSession()->set('email',$user["email"]);
            Service::getSession()->set('account_type',$user["account_type"]);
            Service::getSession()->set('user_logged_in',true);

            return true;
        }
}
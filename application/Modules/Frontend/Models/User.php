<?php

namespace Modules\Frontend\Models;

use \Core\Service\Service;
use \Core\System\BaseModel;

class User extends BaseModel
{
    protected $table = "users";

    public function login($email,$password)
    {
        if (!empty($email) && !empty($password)) {
            if ($user = $this->getRow($email,"email")) {

                if (password_verify($password, $user['password_hash'])) {

                }else{
                    Service::getSession()->add('feedback_negative', Service::getText()->get("USERNAME_OR_PASSWORD_WRONG"));
                }
            }else{
                Service::getSession()->add('feedback_negative', Service::getText()->get("USERNAME_OR_PASSWORD_WRONG"));
            }
        }else{
            Service::getSession()->add('feedback_negative', Service::getText()->get("FILL_ALL_FIELDS"));
        }
        return false;
    }

    public function register($data){

        foreach ($data as $key => $value) {
            if(empty($value)){
                Service::getSession()->add('feedback_negative', sprintf(Service::getText()->get("FIELD_IS_REQUIRED"),Service::getText()->get($key)));
            }
        }

        if (count(Service::getSession()->get('feedback_negative')) == 0)
        {

            $data["password"] = password_hash($data["password"],PASSWORD_DEFAULT);
            $data["active"] = 1;

            $this->insert($data);
            return true;
        }

        return false;

    }

}
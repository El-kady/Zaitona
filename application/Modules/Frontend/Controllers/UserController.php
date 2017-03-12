<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\User;

class UserController extends FrontendController
{
    private $user;

    function __construct()
    {
        parent::__construct();

        Service::getAuth()->checkAuthentication();

        $this->user = new User();
    }

    public function edit()
    {
        $row = $this->user->getRow(Service::getAuth()->getUserId());
        Service::getForm()->fillData('user_edit', $row);
        Service::getView()->setTitle(Service::getText()->get("MY_ACCOUNT"))->render("user/edit",["row" => $row]);
    }

    public function save()
    {
        $data = [
            "name" => Service::getRequest()->post("name"),
            "email" => Service::getRequest()->post("email"),
            "password" => Service::getRequest()->post("password"),
            "retype_password" => Service::getRequest()->post("retype_password"),
            "user_photo" => Service::getRequest()->file("user_photo"),
            "country" => Service::getRequest()->post("country"),
            "gender" => Service::getRequest()->post("gender"),
        ];

        if ($this->user->saveData($data)) {
            Service::getAuth()->logout();
            Service::getRedirect()->to("/user/edit");
        }

        Service::getRedirect()->to("/user/edit");
    }

    public function logout()
    {
        Service::getAuth()->logout();
        Service::getRedirect()->to("/home");
    }

}

<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\User;

class RegisterController extends FrontendController
{
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = new User();

        if (Service::getAuth()->IsLoggedIn()) {
            Service::getRedirect()->to("/home");
        }
    }

    public function index()
    {
        Service::getView()->setTitle(Service::getText()->get("REGISTER_TITLE"))->render("register/index");
    }

    public function register()
    {
        $data = [

            "name" => Service::getRequest()->post("name"),
            "email" => Service::getRequest()->post("email"),
            "password" => Service::getRequest()->post("password"),
            "retype_password" => Service::getRequest()->post("retype_password"),
            "country" => Service::getRequest()->post("country"),
            "gender" => Service::getRequest()->post("gender"),
        ];


        if ($this->user->register($data)) {
            Service::getRedirect()->to("/login");
        } else {
            Service::getRedirect()->to("/register");
        }

    }

}

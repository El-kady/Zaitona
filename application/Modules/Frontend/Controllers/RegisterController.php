<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\User;

class RegisterController extends BaseController
{
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function index()
    {
        Service::getView()->setTitle(Service::getText()->get("REGISTER_TITLE"))->render("register/index");
    }

    public function register()
    {
        $data = [

            "name" =>  Service::getRequest()->post("name"),
            "email" => Service::getRequest()->post("email"),
            "password" => Service::getRequest()->post("password")
        ];

       
        if($this->user->register($data)){

        }else{
            Service::getRedirect()->to("/register");
        }

    }

}

<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\User;

class LoginController extends FrontendController
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
        Service::getView()->setTitle(Service::getText()->get("LOGIN_TITLE"))->render("login/index");
    }

    public function login()
    {

        $email = Service::getRequest()->post("email");
        $password = Service::getRequest()->post("password");

        if ($this->user->login($email,$password)) {
            Service::getRedirect()->to("/home");
        }else{
            Service::getRedirect()->to("/login");
        }

    }

}

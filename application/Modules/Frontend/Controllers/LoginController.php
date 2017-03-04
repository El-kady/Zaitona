<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

class LoginController extends BaseController
{

    public function index()
    {
        Service::getView()->render("login/index");
    }

    public function login()
    {
        Service::getSession()->add('feedback_negative', Service::getText()->get("FEEDBACK_USERNAME_OR_PASSWORD_WRONG"));
        Service::getRedirect()->to("/login");
    }

}

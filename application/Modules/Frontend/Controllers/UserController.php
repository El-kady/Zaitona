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
        $this->user = new User();
    }

    public function logout()
    {
        Service::getAuth()->logout();
        Service::getRedirect()->to("/home");
    }

}

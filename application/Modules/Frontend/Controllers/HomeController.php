<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

class HomeController extends FrontendController
{

    public function index()
    {

        var_dump(Service::getConfig()->get("site_name"));

        foreach (Service::getDatabase()->fetchAll("SELECT * FROM `users` ") as $user) {
            echo $user['id']."<br>";
        }
        echo 'hello from frontend home';
    }

}

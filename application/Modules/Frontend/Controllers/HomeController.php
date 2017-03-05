<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

class HomeController extends FrontendController
{

    public function index()
    {
    	
        Service::getView()->setTitle(Service::getConfig()->get("site_name"))->render("index");
    }

}

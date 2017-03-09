<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;

class PageController extends FrontendController
{

    function __construct()
    {

    }

    public function about()
    {
        Service::getView()->render("pages/about");
    }


}

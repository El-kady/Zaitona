<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;

class PageController extends FrontendController
{

    public function about()
    {
        Service::getView()->render("pages/about");
    }


}

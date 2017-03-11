<?php

namespace Core\System;

use \Core\System\Controller;
use \Core\Service\Service;

class BaseController
{
    public function __construct()
    {
        // always initialize a session
        Service::getSession()->init();

        // check session concurrency
        Service::getAuth()->checkSessionConcurrency();
    }
}

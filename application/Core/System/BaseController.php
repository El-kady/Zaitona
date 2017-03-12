<?php

namespace Core\System;

use \Core\System\Controller;
use \Core\Service\Service;

class BaseController
{
    var $name;

    public function __construct()
    {

        $this->name = (new \ReflectionClass($this))->getShortName();

        // always initialize a session
        Service::getSession()->init();

        // check session concurrency
        Service::getAuth()->checkSessionConcurrency();

        if (Service::getAuth()->isBanned() && !in_array($this->name,["UserController"])) {
            Service::getView()->errorPage();
        }
    }
}

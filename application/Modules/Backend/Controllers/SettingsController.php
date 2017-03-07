<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;

class SettingsController extends BackendController
{

    public function index()
    {
        Service::getView()->setTitle(Service::getConfig()->get("site_name"))->render("settings");
    }

}

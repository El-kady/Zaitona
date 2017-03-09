<?php

namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

class BackendController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function delete_confirm($id)
    {
        Service::getView()
            ->setTitle(Service::getText()->get("DELETE"))
            ->render("delete", ["id" => $id]);
    }
}

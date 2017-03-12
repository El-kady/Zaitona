<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use Modules\Backend\Models\User;

class HomeController extends BackendController
{

    public function index()
    {

        $data = [];
        $data["users"] = (int) Service::getDatabase()->fetchOne("SELECT count(id) as total FROM users");
        $data["courses"] = (int) Service::getDatabase()->fetchOne("SELECT count(id) as total FROM courses");
        $data["materials"] = (int) Service::getDatabase()->fetchOne("SELECT count(id) as total FROM materials");
        $data["downloads"] = (int) Service::getDatabase()->fetchOne("SELECT sum(hits) as total FROM materials");

        Service::getView()->setTitle(Service::getConfig()->get("site_name"))->render("index",$data);
    }

}

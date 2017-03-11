<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\Request;

class RequestsController extends BackendController
{

    private $Request;

    function __construct()
    {
        parent::__construct();
        $this->Request = new Request();
    }

    public function index()
    {
        $rows = $this->Request->getAll();
        Service::getView()
            ->setTitle(Service::getText()->get("REQUESTS"))
            ->render("requests/index", ["rows" => $rows]);
    }

    public function delete($id)
    {
        if (Service::getRequest()->post("delete")) {
            $this->Request->delete("id = :id ", [":id" => (int)$id]);
        }
        Service::getRedirect()->to("/backend/requests");
    }
}
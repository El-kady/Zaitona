<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\User;

class UsersController extends BackendController
{

    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function index()
    {
        $rows = $this->user->getAll();
        Service::getView()
            ->setTitle(Service::getText()->get("USERS"))
            ->render("users/index", ["rows" => $rows]);
    }

    public function add()
    {

        Service::getView()
            ->setTitle(Service::getText()->get("ADD"))
            ->render("users/form", []);
    }

    public function edit($id)
    {
        $row = $this->user->getRow((int)$id);
        Service::getForm()->fillData('users', $row);

        Service::getView()
            ->setTitle(Service::getText()->get("EDIT"))
            ->render("users/form", ["id" => $row["id"]]);
    }

    public function save($id = 0)
    {
        $data = [
            "name" => Service::getRequest()->post("name"),
            "email" => Service::getRequest()->post("email"),
            "password" => Service::getRequest()->post("password"),
            "retype_password" => Service::getRequest()->post("retype_password"),
            "account_type" => Service::getRequest()->post("account_type"),
            "status" => Service::getRequest()->post("status"),
        ];

        if ($this->user->saveData($data, (int)$id)) {
            Service::getRedirect()->to("/backend/users/");
        } else {
            Service::getForm()->fillTmp('users', $data);
            Service::getRedirect()->absolute(Service::getRequest()->post("back"));
        }
    }

    public function delete($id)
    {
        if ($id == Service::getAuth()->getUserId()) {
            Service::getView()->errorPage();
        }

        $row = $this->user->getRow($id) OR Service::getView()->errorPage();
        if (Service::getRequest()->post("delete")) {
            $this->user->delete("id = :id ",[":id" => (int) $id]);
        }
        Service::getRedirect()->to("/backend/users/");
    }

}

<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;

class CategoriesController extends BackendController
{

    public function index()
    {
        Service::getView()->setTitle(Service::getText()->get("CATEGORIES"))->render("categories/index");
    }

    public function add()
    {
        Service::getView()->setTitle(Service::getText()->get("ADD"))->render("categories/add");
    }

    public function edit($id)
    {

    }

    public function save($id){

    }

    public function delete($id)
    {

    }

}

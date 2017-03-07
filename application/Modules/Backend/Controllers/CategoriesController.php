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

    }

    public function edit()
    {

    }

    public function delete()
    {

    }

}

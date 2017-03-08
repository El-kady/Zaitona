<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\Category;

class CategoriesController extends BackendController
{

    private $category;

    function __construct()
    {
        parent::__construct();
        $this->category = new Category();
    }

    public function index()
    {
        $tree = $this->category->getTree();
        Service::getView()->setTitle(Service::getText()->get("CATEGORIES"))->render("categories/index", ["tree" => $tree]);
    }

    public function add()
    {
        $parent_cats = $this->category->getAllByCond(0, "parent_id");
        Service::getView()->setTitle(Service::getText()->get("ADD"))->render("categories/form", ["parent_cats" => $parent_cats]);
    }

    public function edit($id)
    {
        $row = $this->category->getRow((int)$id);
        Service::getForm()->fillData('categories', $row);

        $parent_cats = $this->category->getAllByCond(0, "parent_id");
        Service::getView()
            ->setTitle(Service::getText()->get("ADD"))
            ->render("categories/form", ["id" => $row["id"],"parent_cats" => $parent_cats]);
    }

    public function save($id = 0)
    {
        $data = [
            "title" => Service::getRequest()->post("title"),
            "parent_id" => (int)Service::getRequest()->post("parent_id"),
        ];

        if ($this->category->saveData($data, (int) $id)) {
            Service::getRedirect()->to("/backend/categories");
        } else {
            Service::getForm()->fillTmp('categories', $data);
            Service::getRedirect()->absolute( Service::getRequest()->post("back"));
        }
    }

    public function delete($id)
    {
        $this->category->delete("id = :id ",[":id" => (int) $id]);
        Service::getRedirect()->to("/backend/categories");
    }

}

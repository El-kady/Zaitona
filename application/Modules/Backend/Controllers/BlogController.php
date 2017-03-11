<?php
namespace Modules\Backend\Controllers;

use \Core\Service\Service;
use \Modules\Backend\Models\Blog;

class BlogController extends BackendController
{

    private $blog;

    function __construct()
    {
        parent::__construct();
        $this->blog = new Blog();
    }

    public function index()
    {
        $rows = $this->blog->getAll();
        Service::getView()
            ->setTitle(Service::getText()->get("BLOG"))
            ->render("blog/index", ["rows" => $rows]);
    }

    public function add()
    {

        Service::getView()
            ->setTitle(Service::getText()->get("ADD"))
            ->render("blog/form", []);
    }

    public function edit($id)
    {
        $row = $this->blog->getRow((int)$id);
        Service::getForm()->fillData('blog', $row);

        Service::getView()
            ->setTitle(Service::getText()->get("EDIT"))
            ->render("blog/form", ["id" => $row["id"]]);
    }

    public function save($id = 0)
    {
        $data = [
            "title" => Service::getRequest()->post("title"),
            "content" => Service::getRequest()->post("content")
        ];

        if ($this->blog->saveData($data, (int)$id)) {
            Service::getRedirect()->to("/backend/blog");
        } else {
            Service::getForm()->fillTmp('blog', $data);
            Service::getRedirect()->absolute(Service::getRequest()->post("back"));
        }
    }

    public function delete($id)
    {
        if (Service::getRequest()->post("delete")) {
            $this->blog->delete("id = :id ", [":id" => (int)$id]);
        }
        Service::getRedirect()->to("/backend/blog");
    }
}

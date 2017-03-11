<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\Blog;


class BlogController extends FrontendController
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
        Service::getView()->setTitle(Service::getText()->get("BLOG_TITLE"))->render("blog/index", ["rows" => $rows]);

    }

    public function view($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $row = $this->blog->getRow($id);
            Service::getView()->setTitle($row["title"])->render("blog/view", ["row" => $row]);
        } else {
            Service::getRedirect()->to("/home");
        }
    }


}

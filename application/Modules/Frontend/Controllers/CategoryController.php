<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\Category;
use \Modules\Frontend\Models\Course;

class CategoryController extends FrontendController
{
    private $category;
    private $course;
    function __construct()
    {
        parent::__construct();
        $this->category = new Category();
        $this->course = new Course();
    }

    public function index()
    {
        Service::getRedirect()->to("/home");
    }

    public function view($id,$page = 0)
    {
        $id = (int)$id;
        if($id > 0){
            $data['category'] = $this->category->getRow($id,'id');
            $data['courses'] = $this->course->getAllByCond($id,'category_id');
            Service::getView()->setTitle(Service::getText()->get("CATEGORIES_TITLE"))->render("category/view",$data);
        }else{
            Service::getRedirect()->to("/home");
        }
    }


}

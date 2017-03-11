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
            $row = $this->category->getRow($id,'id');
            $courses = $this->course->getAllByCond($id,'category_id');
            Service::getView()->setTitle($row["title"])->render("category/view",["row" => $row,"courses" => $courses]);
        }else{
            Service::getRedirect()->to("/home");
        }
    }


}

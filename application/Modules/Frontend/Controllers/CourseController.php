<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\Category;
use \Modules\Frontend\Models\Course;

class CourseController extends FrontendController
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
            $data['course'] = $this->course->getRow($id,'id');
            $data['category'] = $this->category->getRow($data['course']['category_id'],'id');
            Service::getView()->setTitle(Service::getText()->get("COURSES_TITLE"))->render("course/view",$data);            
        }else{
            Service::getRedirect()->to("/home");
        }
    }


}

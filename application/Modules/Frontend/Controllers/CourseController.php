<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\Category;
use \Modules\Frontend\Models\Course;
use \Modules\Frontend\Models\Section;

class CourseController extends FrontendController
{
    private $category;
    private $course;
    private $section;
    function __construct()
    {
        parent::__construct();
        $this->category = new Category();
        $this->course = new Course();
        $this->section = new Section();
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
            $data['category_parent'] = $this->category->getRow($data['category']['parent_id'],'id');
            $data['sections'] = $this->section->getAllByCond($data['course']['id'],'course_id');
            

            Service::getView()->setTitle(Service::getText()->get("COURSES_TITLE"))->render("course/view",$data);            
        }else{
            Service::getRedirect()->to("/home");
        }
    }


}

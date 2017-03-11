<?php

namespace Modules\Frontend\Controllers;

use \Core\Service\Service;
use \Core\System\BaseController;

use \Modules\Frontend\Models\Category;
use \Modules\Frontend\Models\Course;
use Modules\Frontend\Models\Request;
use \Modules\Frontend\Models\Section;
use \Modules\Frontend\Models\Material;

class CourseController extends FrontendController
{
    private $category;
    private $course;
    private $section;
    private $material;
    private $request;
    function __construct()
    {
        parent::__construct();
        $this->category = new Category();
        $this->course = new Course();
        $this->section = new Section();
        $this->material = new Material();
        $this->request = new Request();
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
            for ($i=0; $i<count($data['sections']); $i++) {
                $data['sections'][$i]['materials'] = $this->material->getAllByCond($data['sections'][$i]['id'],'section_id');
            }
            
            Service::getView()->setTitle(Service::getText()->get("COURSES_TITLE"))->render("course/view",$data);            
        }else{
            Service::getRedirect()->to("/home");
        }
    }

    public function request($course_id)
    {
        Service::getView()->setTitle(Service::getText()->get("REQUEST_TITLE"))->render("request/request",["course_id" => $course_id]);
    }

    public function saveRequest(){

        $course_id = Service::getRequest()->post("course_id");

        $data = [
            "request" => Service::getRequest()->post("request"),
            "course_id" => $course_id,
        ];

        if ($this->request->saveData($data)) {
            Service::getSession()->add('feedback_positive', Service::getText()->get("REQUEST_SENT"));
        }

        Service::getRedirect()->to("/course/request/" . $course_id);
    }

}
